<?php
include '../server/config.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM staff_info";
if (!empty($search)) {
    $sql .= " WHERE name LIKE '$search%'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $slno = 0;
    while ($row = $result->fetch_assoc()) {
        echo "
            <tr>
                <td>" . ++$slno . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["qualification"] . "</td>
                <td>" . $row["age"] . "</td>
                <td>
                    <span style='cursor: pointer; color: blue' onclick=\"edit_show('" . $row['name'] . "', '" . $row['age'] . "', '" . $row["qualification"] . "')\">View/Edit</span>
                </td>
            </tr>
        ";
    }
} else {
    echo "
        <tr>
            <td colspan='5'>No data available</td>
        <tr>
    ";
}

$conn->close();