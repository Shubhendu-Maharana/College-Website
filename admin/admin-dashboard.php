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
                    <?php echo $_SESSION['username']; ?> !
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

    <div class="tab-content" id="staff">

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
    </div>

    <div class="tab-content" id="student">
        <div id="edit-student-overlay" class="edit-student-box">
            <div class="closeBtn">
                <button onclick="edit_std_hide()">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="header">
                <h2>Edit Student Information</h2>
            </div>

            <div class="form">
                <form autocomplete="off" id="edit_student">
                    <label for="currStudentname">Current Name: </label>
                    <input type="text" name="currname" id="currStudentname" readonly value=''>

                    <label for="newStudentname">New Name: </label>
                    <input type="text" name="newname" id="newStudentname" value=''>

                    <label for="Stdage">Age: </label>
                    <input type="number" name="age" id="Stdage" min="18" required value=''>

                    <label for="stdclass">Class: </label>
                    <input type="text" name="stdclass" id="stdclass" required value=''>

                    <div class="submit-box">
                        <input type="submit" id="StdsubmitBtn" class="Btn">
                        <button class="Btn" id="StddeleteBtn" style="margin: 0 10px;">Delete</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="add-student-overlay" class="add-student-box">
            <div class="closeBtn">
                <button onclick="hide_student_box()">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="header">
                <h2>Add Student Information</h2>
            </div>

            <div class="form">
                <form autocomplete="off" id="Stdform">
                    <label for="Stdname">Name: </label>
                    <input type="text" name="name" id="Stdname" required>

                    <label for="Stdage">Age: </label>
                    <input type="number" name="age" id="Stdage" min="18" required>

                    <label for="class">Class: </label>
                    <input type="text" name="class" id="class" required>

                    <div class="submit-box">
                        <input type="submit" id="StdsubmitBtn" class="Btn">
                    </div>
                </form>
            </div>
        </div>

        <div class="box">
            <div class="top-box">
                <h2>Student Information</h2>
                <div class="info-box">
                    <div class="search-box">
                        <input id="StdsearchInput" name="searchInput" type="text" placeholder="Search student" oninput="updateStdTable()">
                    </div>
                    <a href="javascript:void(0)" onclick="show_student_box()">Add Student</a>
                </div>
            </div>
            <div class="student-table">
                <table>
                    <thead>
                        <tr>
                            <th>Sl. No.</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Age</th>
                            <th>Info</th>
                        </tr>
                    </thead>
                    <tbody id="StdtableBody"></tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="dashboard.js"></script>
    <script src="staff-table.js"></script>
    <script src="student-info.js"></script>
</body>

</html>