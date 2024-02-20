<?php

include 'config.php';

$username = $_POST['phpVar'];

$result = $conn->query("SELECT * FROM student_info WHERE roll_no = '$username'");

if ($result->num_rows > 0) {
    $std_info = $result->fetch_assoc();
}

$conn->close();

?>