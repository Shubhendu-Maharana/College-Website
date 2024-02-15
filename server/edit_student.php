<?php

include 'config.php';

$currname = $_POST['currname'];
$newname = $_POST['newname'];
$age = $_POST['age'];
$class = $_POST['stdclass'];

if (!empty($newname)) {
    $sql = "UPDATE student_info SET age = '$age', class = '$class', name = '$newname' WHERE name = '$currname'";
} else {
    $sql = "UPDATE student_info SET age = '$age', class = '$class' WHERE name = '$currname'";
}

if ($conn->query($sql) === TRUE) {
    echo "Information updated successfully";
} else {
    echo "Error updating information: ". $conn->error;
}

$conn->close();

?>