<?php

include 'config.php';
$roll_no = $_POST['roll_no'];

$sql = "DELETE FROM student_info WHERE roll_no = '$roll_no'";

if ($conn->query($sql) === TRUE) {
    echo "Student information deleted successfully";
} else {
    echo "Error deleting staff information: " . $conn->error;
}

$conn->close();

?>