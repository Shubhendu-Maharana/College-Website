<?php

include 'config.php';
$roll_no = $_POST['roll_no'];
$payment_amt = $_POST['payment_amt'];

$sql = "DELETE FROM student_payments WHERE roll_no = '$roll_no' AND payment_amt = '$payment_amt'";

$conn->query("UPDATE student_fees SET paid = (paid - $payment_amt) where roll_no = '$roll_no'");

if ($conn->query($sql) === TRUE) {
    echo "Student fee deleted successfully";
} else {
    echo "Error deleting staff information: " . $conn->error;
}

$conn->close();

?>