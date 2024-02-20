<?php
include '../server/config.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM student_info ORDER BY roll_no";
if (!empty($search)) {
    $sql = "SELECT * FROM student_info WHERE name LIKE '$search%' ORDER BY name";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $slno = 0;
    while ($row = $result->fetch_assoc()) {
        echo "
            <tr>
                <td>" . ++$slno . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["roll_no"] . "</td>
                <td>" . $row["course"] . "</td>
                <td>" . $row["semester"] . "</td>
                <td>
                    <button class='btn btn-danger' onclick=\"deleteStd('" . $row['roll_no'] . "')\">Delete</button>
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
?>
