<?php
include 'config.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

$std_payments = "SELECT * FROM student_info JOIN student_fees ON student_info.roll_no = student_fees.roll_no JOIN student_payments ON student_info.roll_no = student_payments.roll_no WHERE student_info.roll_no = student_fees.roll_no AND student_info.roll_no = student_payments.roll_no ORDER BY student_payments.payment_date DESC;
";

if (!empty($search)) {
    $std_payments = "SELECT * FROM student_info JOIN student_fees ON student_info.roll_no = student_fees.roll_no JOIN student_payments ON student_info.roll_no = student_payments.roll_no WHERE student_info.roll_no = student_fees.roll_no AND student_info.roll_no = student_payments.roll_no AND name LIKE '$search%' ORDER BY student_payments.payment_date DESC";
}

$result = $conn->query($std_payments);

if ($result->num_rows > 0) {
    $slno = 0;
    while ($row = $result->fetch_assoc()) {
        echo "
            <tr>
                <td>" . ++$slno . "</td>
                <td>" . $row["roll_no"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["remark"] . "</td>
                <td>&#8377;" . number_format($row['payment_amt']) . "</td>
                <td>" . $row['payment_date'] . "</td>
                <td>
                    <button class='btn btn-danger' onclick=\"deleteStdfee('" . $row['roll_no'] . "', '" . $row['payment_amt'] . "')\">Delete</button>
                </td>
            </tr>
        ";
    }
} else {
    echo "
        <tr>
            <td colspan='6'>No data available</td>
        <tr>
    ";
}

$conn->close();
?>
