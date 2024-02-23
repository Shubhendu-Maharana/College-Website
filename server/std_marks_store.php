<?php

include 'config.php';

$roll_no = $_POST['roll-no'];
$exam_name = $_POST['exam_name'];
$mark = $_POST['mark'];
$full_marks = $_POST['full_marks'];
$exam_date = $_POST['exam_date'];

$sql = "INSERT INTO student_marks (roll_no, exam_name, mark, full_marks, exam_date) VALUES ('$roll_no', '$exam_name', $mark, $full_marks, '$exam_date')";


if ($conn->query($sql) === TRUE) {
    echo "Mark record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
