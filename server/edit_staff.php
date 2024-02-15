<?php

include 'config.php';

$currname = $_POST['currname'];
$newname = $_POST['newname'];
$age = $_POST['age'];
$qualification = $_POST['qualification'];

$sql = "UPDATE staff_info SET age = '$age', qualification = '$qualification', name = '$newname' WHERE name = '$currname'";

if ($conn->query($sql) === TRUE) {
    echo "Information updated successfully";
} else {
    echo "Error updating information: ". $conn->error;
}

$conn->close();

?>