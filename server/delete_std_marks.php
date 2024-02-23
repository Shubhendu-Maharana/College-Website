<?php

include 'config.php';
$roll_no = $_POST['roll_no'];
$exam_name = $_POST['exam_name'];

$sql = "DELETE FROM student_marks WHERE roll_no = '$roll_no' AND exam_name = '$exam_name'";

if ($conn->query($sql) === TRUE) {
    echo "Student marks deleted successfully";
} else {
    echo "Error deleting staff information: " . $conn->error;
}

$conn->close();

?>