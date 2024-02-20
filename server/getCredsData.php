<?php
include 'config.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

$std_creds = "SELECT * FROM student_credentials;
";

if (!empty($search)) {
    $std_creds = "SELECT * FROM student_credentials WHERE roll_no LIKE '$search%'";
}

$result = $conn->query($std_creds);

if ($result->num_rows > 0) {
    $slno = 0;
    while ($row = $result->fetch_assoc()) {
        echo "
            <tr>
                <td>" . ++$slno . "</td>
                <td>" . $row["roll_no"] . "</td>
                <td>" . $row["password"] . "</td>
                <td>
                    <button class='btn btn-danger' onclick=\"deleteStdCreds('" . $row['roll_no'] . "')\">Delete</button>
                </td>
            </tr>
        ";
    }
} else {
    echo "
        <tr>
            <td colspan='4'>No data available</td>
        <tr>
    ";
}

$conn->close();
?>
