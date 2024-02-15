<?php

include 'config.php';
$name = $_POST['currname'];

$sql = "DELETE FROM student_info WHERE name = '$name'";

if ($conn->query($sql) === TRUE) {
    echo "Student information deleted successfully";
} else {
    echo "Error deleting staff information: " . $conn->error;
}

$conn->close();

?>