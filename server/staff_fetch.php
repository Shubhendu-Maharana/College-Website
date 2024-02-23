<?php

include 'config.php';

$response = array();

$sql = "SELECT * FROM staff_info";
$result = $conn->query($sql);

if (!$result) {
    $response['error'] = 'Error executing SQL query: ' . $conn->error;
} else {
    $staff_info = array();

    while ($row = $result->fetch_assoc()) {
        $staff_info[] = array(
            'name' => $row['name'],
            'age' => $row['age'],
            'expertise' => $row['expertise']
        );
    }

    $response = $staff_info;
}



$conn->close();

header('Content-Type: application/json');
echo json_encode($response);

?>