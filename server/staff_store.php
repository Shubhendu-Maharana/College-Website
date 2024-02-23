<?php

include 'config.php';

$name = $_POST['name'];
$age = $_POST['age'];
$expertise = $_POST['expertise'];
$join_date = $_POST['join_date'];
// $profile_picture = $_POST['profile_picture'];

// SQL query to check if the table exists
$table_name = "staff_info";
$table_check_query = "SHOW TABLES LIKE '$table_name'";
$result = $conn->query($table_check_query);

// If the table doesn't exist, create it
if ($result->num_rows == 0) {
    $create_table_query = "CREATE TABLE staff_info (
        name VARCHAR(255),
        age INT(11),
        expertise VARCHAR(255),
        join_date DATE DEFAULT NULL
    )";
    $conn->query($create_table_query);
}

$sql = "INSERT INTO staff_info (name, age, expertise, join_date) VALUES ('$name', $age, '$expertise', '$join_date')";

if ($conn->query($sql) === TRUE) {
    echo "Staff Information inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>