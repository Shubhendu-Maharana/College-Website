<?php

include_once '../server/std-session-check.php';
include '../server/fetch_std_info.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="dashboard.css">

    <title>Student Dashboard</title>
</head>

<body>
    <div class="container sidenav">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <div class="container">
                    <p class="text-capitalize h3 text-white name">Hii, <strong><?php echo substr($std_info["name"], 0, strpos($std_info["name"], ' ')) ?></strong></p>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link link" id="home" onclick="tab(event, 'tab-1')">
                    <i class="fa-solid fa-chart-line"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link link" onclick="tab(event, 'tab-2')">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Profile
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link link" onclick="tab(event, 'tab-3')">
                    <i class="fa-solid fa-book-bookmark"></i>
                    Marks
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link link" onclick="tab(event, 'tab-4')">
                    <i class="fa-solid fa-credit-card"></i>
                    Fee Payments
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link link" onclick="student_logout()">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Log out
                </a>
            </li>
        </ul>
    </div>

    <div class="main">
        <div class="container tab-content" id="tab-1">
            <div class="container dashboard">
                <div class="container d-flex fees">
                    <div class="container box">
                        <p class="fa-solid fa-sack-dollar fee-head"></p>
                        <p class="d-inline fee-head">Total Payable</p>
                        <div class="container" style="padding: 0;">
                            <p class="text-start amount">&#8377;<?php echo number_format($std_fees['payable']) ?></p>
                            <p class="study-year">Study year: 2021 - 2024</p>
                        </div>
                    </div>
                    <div class="container box">
                        <p class="fa-solid fa-sack-dollar fee-head"></p>
                        <p class="d-inline fee-head">Total Others</p>
                        <div class="container" style="padding: 0;">
                            <p class="text-start amount">&#8377;<?php echo number_format($std_fees['others']) ?></p>
                            <p class="study-year">Study year: 2021 - 2024</p>
                        </div>
                    </div>
                    <div class="container box">
                        <p class="fa-solid fa-sack-dollar fee-head"></p>
                        <p class="d-inline fee-head">Total Paid</p>
                        <div class="container" style="padding: 0;">
                            <p class="text-start amount">&#8377;<?php echo number_format($std_fees['paid']) ?></p>
                            <p class="study-year">Study year: 2021 - 2024</p>
                        </div>
                    </div>
                    <div class="container box">
                        <p class="fa-solid fa-sack-dollar  fee-head"></p>
                        <p class="d-inline fee-head">Total Dues</p>
                        <div class="container" style="padding: 0;">
                            <p class="text-start amount">&#8377;<?php echo number_format($std_fees['dues']) ?></p>
                            <p class="study-year">Study year: 2021 - 2024</p>
                        </div>
                    </div>
                </div>

                <div class="bottom-box">
                    <div id="profile">
                        <h2 class="text-center">Basic Info</h2>
                        <table class="table table-striped">
                            <tr>
                                <td><b>Name: </b><?php echo $std_info['name'] ?></td>
                                <td id="profile-pic" rowspan="5"><img class="img-thumbnail" src="<?php echo $std_info['picture'] ?>" alt=""></td>
                            </tr>
                            <tr>
                                <td><b>Roll No: </b><?php echo $std_info['roll_no'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Course: </b><?php echo $std_info['course'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Semester: </b><?php echo $std_info['semester'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Contact No: </b><?php echo $std_info['contact_no'] ?></td>
                            </tr>
                        </table>
                    </div>

                    <div id="marks-chart">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>

            </div>
        </div>

        <div class="container tab-content" id="tab-2">
            <div class="container profile">
                <div class="container">
                    <h1 class="text-center">
                        Your
                        <small class="text-body-secondary">Profile</small>
                    </h1>
                </div>
                <table class="table table-striped table-hover">
                    <tr>
                        <td><b>Name: </b><?php echo $std_info['name'] ?></td>
                        <td><b>Roll No: </b><?php echo $std_info['roll_no'] ?></td>
                        <td rowspan="6" class="text-center"><img src="<?php echo $std_info['picture'] ?>" class="object-fit-cover border rounded img-thumbnail" id="pfp" alt="profile picture"></td>
                    </tr>
                    <tr>
                        <td><b>Age: </b><?php echo $std_info['age'] ?></td>
                        <td><b>Phone No: </b><?php echo $std_info['contact_no'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Address: </b><?php echo $std_info['address'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Course: </b><?php echo $std_info['course'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Semester: </b><?php echo $std_info['semester'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Admission Date: </b><?php echo date('d-M-Y', strtotime($std_info['admission_date'])) ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="container tab-content" id="tab-3">
            <div class="container profile">
                <div class="container">
                    <h1 class="text-center">
                        Your
                        <small class="text-body-secondary">Marks</small>
                    </h1>
                </div>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Exam Date</th>
                        <th>Exam Name</th>
                        <th>Full Marks</th>
                        <th>Marks Secured</th>
                    </tr>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($marks = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $marks['exam_date'] . "</td>";
                            echo "<td>" . $marks['exam_name'] . "</td>";
                            echo "<td>" . $marks['full_marks'] . "</td>";
                            echo "<td>" . $marks['mark'] . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>

        <div class="container tab-content" id="tab-4">
            <div class="container profile">
                <div class="container">
                    <h1 class="text-center">
                        Your
                        <small class="text-body-secondary">Payments</small>
                    </h1>
                </div>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Payment Date</th>
                        <th>Payment Amount</th>
                        <th>Remarks</th>
                    </tr>
                    <?php
                    if ($payment->num_rows > 0) {
                        while ($pay = $payment->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $pay['payment_date'] . "</td>";
                            echo "<td>&#8377;" . number_format($pay['payment_amt']) . "</td>";
                            echo "<td>" . $pay['remark'] . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="script.js"></script>
    <script>
        const xValues = <?php echo json_encode(array_reverse($exam_name)) ?>;
        const yValues = <?php echo json_encode(array_reverse($exam_mark)) ?>;
        const barColors = ["#4e79a7", "#f28e2b", "#e15759", "#76b7b2", "#59a14f"];

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Your marks"
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: <?php echo $full_marks ?>
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>