<?php

require_once '../server/session-check.php';
include '../server/config.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="admin-board.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="topnav">
        <div class="logo"></div>
    </div>
    <div class="sidenav">
        <div class="logo">
            <img src="../images/logo.png" alt="">
        </div>
        <div class="links">
            <button class="link" id="first" onclick="tab(event, 'dashboard')">
                <i class="fa-solid fa-chart-line"></i>
                Dashboard
            </button>
            <button class="link" onclick="tab(event, 'staff')">
                <i class="fa-solid fa-clipboard-user"></i>
                Staff Management
            </button>
            <button class="link" onclick="tab(event, 'student')">
                <i class="fa-solid fa-graduation-cap"></i>
                Student Management
            </button>
            <button class="link" onclick="tab(event, 'stdCreds')">
                <i class="fa-solid fa-graduation-cap"></i>
                Student Credentials
            </button>
            <button class="link" onclick="tab(event, 'examMarks')">
                <i class="fa-solid fa-marker"></i>
                Exam Marks
            </button>
            <button class="link" onclick="tab(event, 'fees')">
                <i class="fa-solid fa-credit-card"></i>
                Fees
            </button>
            <button class="link" id="first" onclick="logout()">
                <i class="fa-solid fa-right-from-bracket"></i>
                Log out
            </button>
        </div>
    </div>

    <div class="tab-content" id="dashboard">
        <div class="message">
            <div class="name">
                <h2>Hii
                    <?php echo ucfirst($_SESSION['admin']) ?>
                </h2>
                <h3 id="greeting"></h3>
            </div>
            <div class="quote">
                <h3>Today's quote: </h3>
                <p id="quote"></p>
                <i id="author"></i>
            </div>
        </div>

        <div class="timedate">
            <div class="time" id="time"></div>
            <div class="date" id="date"></div>
        </div>

        <div class="weather">
            <div class="today" id="currentWeather"></div>
            <div class="forecast">
                <div class="days" id="forecast"></div>
            </div>
        </div>
    </div>

    <!-- <div class="tab-content" id="staff">

        <div id="edit-overlay" class="edit-staff-box">
            <div class="closeBtn">
                <button onclick="edit_hide()">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="header">
                <h2>Edit Staff Info</h2>
            </div>

            <div class="form">
                <form autocomplete="off" id="edit_staff">
                    <label for="currname">Current Name: </label>
                    <input type="text" name="currname" id="currname" readonly value=''>

                    <label for="newname">New Name: </label>
                    <input type="text" name="newname" id="newname" value=''>

                    <label for="age">Age: </label>
                    <input type="number" name="age" id="age" min="18" required value=''>

                    <label for="qualification">Qualification: </label>
                    <input type="text" name="qualification" id="qualification" required value=''>

                    <div class="submit-box">
                        <input type="submit" id="submitBtn" class="Btn">
                        <button class="Btn" id="deleteBtn" style="margin: 0 10px;">Delete</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="overlay" class="add-staff-box">
            <div class="closeBtn">
                <button onclick="off()">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="header">
                <h2>Add Staff Information</h2>
            </div>

            <div class="form">
                <form autocomplete="off" id="form">
                    <label for="name">Name: </label>
                    <input type="text" name="name" id="name" required>

                    <label for="age">Age: </label>
                    <input type="number" name="age" id="age" min="18" required>

                    <label for="qual">Qualification: </label>
                    <input type="text" name="qual" id="qual" required>

                    <div class="submit-box">
                        <input type="submit" id="submitBtn" class="Btn">
                    </div>
                </form>
            </div>
        </div>

        <div class="box">
            <div class="top-box">
                <h2>Staff Information</h2>
                <div class="info-box">
                    <div class="search-box">
                        <input id="searchInput" name="searchInput" type="text" placeholder="Search staff" oninput="updateTable()">
                    </div>
                    <a href="javascript:void(0)" onclick="on()">Add Staff</a>
                </div>
            </div>
            <div class="staff-table">
                <table>
                    <thead>
                        <tr>
                            <th>Sl. No.</th>
                            <th>Name</th>
                            <th>Dept</th>
                            <th>Age</th>
                            <th>Info</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody"></tbody>
                </table>
            </div>
        </div>
    </div> -->
    <div class="tab-content" id="staff">
        <div class="container">
            <div class="container">
                <h1 class="text-center p-4">Staff Information</h1>
            </div>
            <div class="input-group w-50 mx-auto">
                <input type="text" class="form-control rounded px-3 fs-5" placeholder="Enter name" id="StaffsearchInput" aria-label="Recipient's username" aria-describedby="searchBtn">

                <button class="btn rounded btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#staffModal">Add New Staff</button>

                <div class="modal" id="staffModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h2 class="text-center">Add Staff Information</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body" id="modalBody">
                                <form id="staffAddForm" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="name" type="text" class="form-control" id="name" placeholder="name">
                                                <label for="name">Name</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="age" type="number" class="form-control" id="age" placeholder="age">
                                                <label for="age">Age</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="expertise" type="text" class="form-control" id="expertise" placeholder="expertise">
                                                <label for="expertise">Expertise</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="join_date" type="date" class="form-control" id="join_date" placeholder="join_date">
                                                <label for="join_date">Date of Join</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary w-auto" id="addStdBtn">Add Staff</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-hover mt-2">
                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Expertise</th>
                        <th>Date of Join</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="StafftableBody"></tbody>
            </table>
        </div>
    </div>

    <div class="tab-content" id="student">
        <div class="container">
            <div class="container">
                <h1 class="text-center p-4">Student Information</h1>
            </div>
            <div class="input-group w-50 mx-auto">
                <input type="text" class="form-control rounded px-3 fs-5" placeholder="Enter name" id="StdsearchInput" aria-label="Recipient's username" aria-describedby="searchBtn">

                <button class="btn rounded btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#myModal">Add New Student</button>

                <div class="modal" id="myModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h2 class="text-center">Add Student Information</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body" id="modalBody">
                                <form id="stdAddForm" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="name" type="text" class="form-control" id="name" placeholder="name">
                                                <label for="name">Name</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="roll-no" type="text" class="form-control" id="roll-no" placeholder="roll-no">
                                                <label for="roll-no">Roll No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="age" type="number" class="form-control" id="age" placeholder="age">
                                                <label for="age">Age</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="number" type="number" class="form-control" id="number" placeholder="number">
                                                <label for="number">Contact No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="course" type="text" class="form-control" id="course" placeholder="course">
                                                <label for="course">Course</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="semester" type="text" class="form-control" id="semester" placeholder="semester">
                                                <label for="semester">Semester</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="payable" type="number" class="form-control" id="payable" placeholder="payable">
                                                <label for="payable">Course Fee</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="address" type="text" class="form-control" id="address" placeholder="address">
                                                <label for="address">Address</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="admission-date" type="date" class="form-control" id="admission-date" placeholder="admission-date">
                                                <label for="admission-date">Admission Date</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form mb-3">
                                                <label for="pfp">Profile Picture</label>
                                                <input required name="pfp" type="file" class="form-control" id="pfp" placeholder="pfp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary w-auto" id="addStdBtn">Add Student</button>
                                    </div>
                                </form>
                            </div>



                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-hover mt-2">
                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Name</th>
                        <th>Roll No</th>
                        <th>Course</th>
                        <th>Semester</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="StdtableBody"></tbody>
            </table>
        </div>
    </div>
    <div class="tab-content" id="stdCreds">
        <div class="container">
            <div class="container">
                <h1 class="text-center p-4">Student Credentials</h1>
            </div>
            <div class="input-group w-50 mx-auto">
                <input type="text" class="form-control rounded px-3 fs-5" placeholder="Enter Roll No" id="credsSearch" aria-label="Recipient's username" aria-describedby="searchBtn">

                <button class="btn rounded btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#addStdCreds">Add Student Credentials</button>


                <div class="modal" id="addStdCreds">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">


                            <div class="modal-header">
                                <h2 class="text-center">Add Student Credentials</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>


                            <div class="modal-body" id="modalBody">
                                <form id="stdCredsForm" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="roll-no" type="text" class="form-control" id="roll-no" placeholder="roll-no" value="">
                                                <label for="roll-no">Username/Roll No</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="password" type="text" class="form-control" id="password" placeholder="password">
                                                <label for="password">New Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary w-auto" id="addStdBtn">Add Credentials</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-hover mt-2">
                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Roll No</th>
                        <th>Password</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="credsTableBody"></tbody>
            </table>
        </div>
    </div>

    <div class="tab-content" id="fees">
        <div class="container">
            <div class="container">
                <h1 class="text-center p-4">Fee Information</h1>
            </div>
            <div class="input-group w-50 mx-auto">
                <input type="text" class="form-control rounded px-3 fs-5" placeholder="Enter name" id="feeSearch" aria-label="Recipient's username" aria-describedby="searchBtn">

                <button class="btn rounded btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#addFee">Add Fee record</button>

                <div class="modal" id="addFee">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h2 class="text-center">Add Fee Record</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body" id="modalBody">
                                <form id="stdFeeForm" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="roll-no" type="text" class="form-control" id="roll-no" placeholder="name@example.com">
                                                <label for="roll-no">Roll No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="payment_amt" type="number" class="form-control" id="payment_amt" placeholder="payment_amt">
                                                <label for="payment_amt">Amount</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="payment_date" type="date" class="form-control" id="payment_date" placeholder="payment_date">
                                                <label for="payment_date">Payment Date</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="remark" type="text" class="form-control" id="remark" placeholder="remark">
                                                <label for="remark">Remark</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary w-auto" id="addStdBtn">Add Record</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-hover mt-3">
                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Roll No</th>
                        <th>Name</th>
                        <th>Remark</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="feeTableBody"></tbody>
            </table>
        </div>
    </div>
    <div class="tab-content" id="examMarks">
        <div class="container">
            <div class="container">
                <h1 class="text-center p-4">Student Marks</h1>
            </div>
            <div class="input-group w-50 mx-auto">
                <input type="text" class="form-control rounded px-3 fs-5" placeholder="Enter name" id="examSearch" aria-label="Recipient's username" aria-describedby="searchBtn">

                <button class="btn rounded btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#addMark">Add Exam & Marks</button>

                <div class="modal" id="addMark">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h2 class="text-center">Add Marks</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body" id="modalBody">
                                <form id="stdMarkForm" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="roll-no" type="text" class="form-control" id="roll-no" placeholder="name@example.com">
                                                <label for="roll-no">Roll No</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="exam_name" type="text" class="form-control" id="exam_name" placeholder="exam_name">
                                                <label for="exam_name">Exam Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="mark" type="number" class="form-control" id="mark" placeholder="mark">
                                                <label for="mark">Secured marks</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="full_marks" type="number" class="form-control" id="full_marks" placeholder="full_marks">
                                                <label for="full_marks">Full marks</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input required name="exam_date" type="date" class="form-control" id="exam_date" placeholder="exam_date">
                                                <label for="exam_date">Exam Date</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary w-auto" id="addStdBtn">Add exam info</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-hover mt-3">
                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Roll No</th>
                        <th>Exam Date</th>
                        <th>Exam Name</th>
                        <th>Secured marks</th>
                        <th>Full marks</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="examTableBody"></tbody>
            </table>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
    <script src="staff-table.js"></script>
    <script src="student-info.js"></script>
    <!-- <script>
        function edit_std_show(value) {
            $.ajax({
                url: '../server/edit_std_info.php',
                type: 'POST',
                data: {
                    phpVar: value
                },
                success: function(response) {
                    $('#editModal').modal('show');
                }
            });
        }
    </script> -->
</body>

</html>