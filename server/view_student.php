<?php

include 'config.php';
$roll_no = $_POST['roll_no'];

$std_profile = $conn->query("SELECT * FROM student_info WHERE roll_no = '$roll_no'");
if ($std_profile->num_rows > 0) {
    $profile = $std_profile->fetch_assoc();
}

$conn->close();

?>