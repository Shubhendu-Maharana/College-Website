<?php

include 'config.php';

$name = $_POST['name'];
$roll_no = $_POST['roll-no'];
$age = $_POST['age'];
$course = $_POST['course'];
$semester = $_POST['semester'];
$number = $_POST['number'];
$address = $_POST['address'];
$admission_date = $_POST['admission-date'];
$payable = $_POST['payable'];

// File upload directory
$targetDir = "student_images/";
$fileName = $roll_no . "." . pathinfo($_FILES["pfp"]["name"], PATHINFO_EXTENSION);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

// Allow certain file formats
$allowTypes = array('jpg', 'png', 'jpeg');

if (in_array($fileType, $allowTypes)) {
    // Upload file to server
    move_uploaded_file($_FILES["pfp"]["tmp_name"], $targetFilePath);
    $profile_pic = "../server/" . $targetFilePath;
}


// // SQL query to check if the table exists
// $table_name = "student_info";
// $table_check_query = "SHOW TABLES LIKE '$table_name'";
// $result = $conn->query($table_check_query);

// // If the table doesn't exist, create it
// if ($result->num_rows == 0) {
//     $create_table_query = "CREATE TABLE student_info (
//         name VARCHAR(255),
//         age INT,
//         class VARCHAR(255)
//     )";
//     $conn->query($create_table_query);
// }

$sql = "INSERT INTO student_info (roll_no, name, age, course, semester, contact_no, address, admission_date, picture) VALUES ('$roll_no', '$name', '$age', '$course', '$semester', '$number', '$address', '$admission_date', '$profile_pic')";

$conn->query("INSERT INTO student_fees (roll_no, payable) VALUES ('$roll_no', $payable)");

if ($conn->query($sql) === TRUE) {
    echo "Student information successfully inserted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
