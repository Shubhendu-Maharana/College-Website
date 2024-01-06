<?php

include 'config.php';

$sql = "SELECT * FROM staff_info";
$result = $conn->query($sql);

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $staffData[] = array (
            'name' => $row['name'],
            'age' => $row['age'],
            'qual' => $row['qual'],
        );
    }
}

?>