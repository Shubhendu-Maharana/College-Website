<?php

include 'config.php';
$name = $_POST['name'];

$sql = "DELETE FROM staff_info WHERE name = '$name'";

if ($conn->query($sql) === TRUE) {
    echo "Staff information deleted successfully";
} else {
    echo "Error deleting staff information: " . $conn->error;
}

$conn->close();

?>