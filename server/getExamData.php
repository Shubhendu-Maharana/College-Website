<?php
include 'config.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

$std_marks = "SELECT * FROM student_marks;
";

if (!empty($search)) {
    $std_marks = "SELECT * FROM student_marks WHERE roll_no LIKE '$search%'";
}

$result = $conn->query($std_marks);

if ($result->num_rows > 0) {
    $slno = 0;
    while ($row = $result->fetch_assoc()) {
        echo "
            <tr>
                <td>" . ++$slno . "</td>
                <td>" . $row["roll_no"] . "</td>
                <td>" . $row["exam_date"] . "</td>
                <td>" . $row["exam_name"] . "</td>
                <td>" . $row["mark"] . "</td>
                <td>" . $row["full_marks"] . "</td>
                <td>
                    <button class='btn btn-danger' onclick=\"deleteStdmark('" . $row['roll_no'] . "', '" . $row['exam_name'] . "')\">Delete</button>
                </td>
            </tr>
        ";
    }
} else {
    echo "
        <tr>
            <td colspan='7'>No data available</td>
        <tr>
    ";
}

$conn->close();
?>
