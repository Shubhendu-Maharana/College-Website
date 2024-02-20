<?php

include 'config.php';

$roll_no = $_POST['roll-no'];
$password = $_POST['password'];

$sql = "INSERT INTO student_credentials (roll_no, password) VALUES ('$roll_no', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Credentials inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
