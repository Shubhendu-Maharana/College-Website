<?php

include 'config.php';

$name = $_POST['name'];
$age = $_POST['age'];
$class = $_POST['class'];

// SQL query to check if the table exists
$table_name = "student_info";
$table_check_query = "SHOW TABLES LIKE '$table_name'";
$result = $conn->query($table_check_query);

// If the table doesn't exist, create it
if ($result->num_rows == 0) {
    $create_table_query = "CREATE TABLE student_info (
        name VARCHAR(255),
        age INT,
        class VARCHAR(255)
    )";
    $conn->query($create_table_query);
}

$sql = "INSERT INTO student_info (name, age, class) VALUES ('$name', $age, '$class')";

if ($conn->query($sql) === TRUE) {
    echo "Student information successfully inserted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
