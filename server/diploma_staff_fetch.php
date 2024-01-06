<?php

include 'config.php';

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = array();

$sql = "SELECT * FROM staff_info WHERE qualification = 'diploma'";
$result = $conn->query($sql);

if (!$result) {
    $response['error'] = 'Error executing SQL query: ' . $conn->error;
} else {
    $staff_info = array();

    while ($row = $result->fetch_assoc()) {
        $staff_info[] = array(
            'name' => $row['name'],
            'age' => $row['age'],
            'qual' => $row['qualification']
        );
    }

    $response = $staff_info;
}



$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
