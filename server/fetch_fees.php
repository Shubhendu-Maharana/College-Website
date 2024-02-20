<?php

include 'config.php';
$username = $_SESSION['username'];

$sql = "SELECT * FROM student_fees WHERE roll_no = '$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $fees = $result->fetch_assoc();
}

$conn->close();

?>