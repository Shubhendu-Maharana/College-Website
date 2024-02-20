<?php

session_start();

include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM student_credentials WHERE BINARY roll_no = '$username' AND BINARY password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $_SESSION['roll_no'] = $username;
    $out[] = "student-dashboard.php";
    $out[] = 1;
    echo json_encode($out);
} else {
    $out[] = "Invalid username or password";
    $out[] = 0;
    echo json_encode($out);
}

$conn->close();

?>