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
                <td>" . $row["age"] . "</td>
                <td>" . $row["expertise"] . "</td>
                <td>" . $row["join_date"] . "</td>
                <td>
                    <button class='btn btn-danger' onclick=\"deleteStaff('" . $row['name'] . "')\">Delete</button>
                </td>
            </tr>
        ";
    }
} else {
    echo "
        <tr>
            <td colspan='6'>No data available</td>
        <tr>
    ";
}

$conn->close();

?>
