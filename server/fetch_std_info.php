<?php

include 'config.php';

$username = $_SESSION['roll_no'];

$result = $conn->query("SELECT * FROM student_info WHERE roll_no = '$username'");

if ($result->num_rows > 0) {
    $std_info = $result->fetch_assoc();
}

$result = $conn->query("SELECT * FROM student_fees WHERE roll_no = '$username'");

if ($result->num_rows > 0) {
    $std_fees = $result->fetch_assoc();
}

$result = $conn->query("SELECT * FROM student_marks WHERE roll_no = '$username' ORDER BY exam_date DESC LIMIT 4");

$exam_name = array();
$exam_mark = array();
$full_marks_result = array();

while ($std_marks = $result->fetch_assoc()) {
    $exam_name[] = $std_marks['exam_name'];
    $exam_mark[] = $std_marks['mark'];
    $full_marks_result[] = $std_marks['full_marks'];
}

if (empty($exam_name) || empty($exam_mark)) {
    $xValues = ["No marks available"];
    $yValues = [0];
    $full_marks = 10;
} else {
    $full_marks = max($full_marks_result);
}

$result = $conn->query("SELECT * FROM student_marks WHERE roll_no = '$username' ORDER BY exam_date DESC");
$payment = $conn->query("SELECT * FROM student_payments WHERE roll_no = '$username' ORDER BY payment_date DESC");

$conn->close();
?>