<?php

include 'config.php';

$name = $_POST['name'];
$age = $_POST['age'];
$qual = $_POST['qual'];

// SQL query to check if the table exists
$table_name = "staff_info";
$table_check_query = "SHOW TABLES LIKE '$table_name'";
$result = $conn->query($table_check_query);

// If the table doesn't exist, create it
if ($result->num_rows == 0) {
    $create_table_query = "CREATE TABLE staff_info (
        name VARCHAR(255),
        age INT,
        qualification VARCHAR(255)
    )";
    $conn->query($create_table_query);
}

$sql = "INSERT INTO staff_info (name, age, qualification) VALUES ('$name', $age, '$qual')";

if ($conn->query($sql) === TRUE) {
    echo "Staff information successfully inserted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
