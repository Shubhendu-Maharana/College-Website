<?php

session_start();

include 'config.php';

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM admin_list WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $_SESSION['username'] = $username;
    $out[] = "../admin/admin-dashboard.php";
    $out[] = 1;
    echo json_encode($out);
} else {
    $out[] = "Invalid username or password";
    $out[] = 0;
    echo json_encode($out);
}

$conn->close();
