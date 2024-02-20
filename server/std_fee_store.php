<?php

include 'config.php';

$roll_no = $_POST['roll-no'];
$payment_amt = $_POST['payment_amt'];
$payment_date = $_POST['payment_date'];
$remark = $_POST['remark'];

$sql = "INSERT INTO student_payments (roll_no, payment_amt, payment_date, remark) VALUES ('$roll_no', $payment_amt, '$payment_date', '$remark')";

$conn->query("UPDATE student_fees SET paid = (paid + $payment_amt) WHERE roll_no = '$roll_no'");

if ($conn->query($sql) === TRUE) {
    echo "Fee record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
