<?php

$servername = "localhost";
$username = "root";
$password = "shubhendu";
$database = "college_website";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM staff_info";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/nav-bar.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <link rel="stylesheet" href="./staff-info.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Neuton">
    <title>RMIT GROUP OF INSTITUTION</title>
</head>

<body>
    <header>
        <div class="header-top">
            <div class="header-top-left">
                <marquee onmouseover="this.stop()" onmouseout="this.start()">RAJIV MEMORIAL GROUP OF INSTITUTIONS
                </marquee>
            </div>


            <div class="header-top-right">
                <a href="">LIBRARY</a>
                <a href="">CONTACT US</a>
                <a href=""><i class="fa-solid fa-phone" style="color: blue;"></i></a>
                <a href=""><i class="fa-brands fa-whatsapp" style="color: green;"></i></a>
                <a href=""><i class="fa-brands fa-instagram" style="color: red;"></i></a>
                <a href=""><i class="fa-brands fa-facebook" style="color: blue;"></i></a>
                <a href=""><i class="fa-solid fa-location-dot" style="color: green;"></i></a>
                <a href=""><i class="fa-solid fa-envelope" style="color: brown;"></i></a>
            </div>
        </div>

        <div class="header-main">
            <a href="./index.html" class="logo">
                <img src="./images/logo.png" alt="">
                <h2>RMIT</h2>
            </a>
            <ul class="links">
                <li><span>ABOUT</span>
                    <div class="content">
                        <a href="about-us.html">About us</a>
                        <a href="object-mission.html">Object, Mission</a>
                        <a href="infrastructure.html">Infrastructure</a>
                        <a href="facilities.html">Facilities</a>
                        <a href="affiliation.html">Affiliation</a>
                    </div>
                </li>
                <li><span>PROGRAMS</span>
                    <div class="alt-content">
                        <div class="section">
                            <h2 class="clg">RMIT</h2>

                            <a href="">BCA</a>
                            <a href="">BES</a>
                        </div>
                        <div class="section">
                            <h2 class="clg">HIT</h2>

                            <a href="">Mechanical</a>
                            <a href="">Electrical</a>
                            <a href="">Civil</a>
                            <a href="">Computer Science</a>
                        </div>
                        <div class="section">
                            <h2 class="clg">RMITC</h2>

                            <a href="">ITI</a>
                        </div>
                    </div>
                </li>
                <li><span>ACADEMICS</span>
                    <div class="content">
                        <a href="">Academics Overview</a>
                        <a href="">Institutes</a>
                        <a href="">Academic Calander</a>
                        <a href="">List Of Holidays</a>
                        <a href="">System Of Evaluation</a>
                    </div>
                </li>
                <li><span>ADMISSION</span>
                    <div class="content">
                        <a href="">Overview</a>
                        <a href="">Course Fees</a>
                        <a href="">How To Apply</a>
                        <a href="">Admission Criteria</a>
                        <a href="">Scholarship</a>
                        <a href="">Hostel Fees</a>
                        <a href="">Admission Status</a>
                    </div>
                </li>
                <li><span>PLACEMENT</span>
                    <div class="content">
                        <a href="">Overview</a>
                        <a href="">Recruiting Companies</a>
                        <a href="">Career</a>
                    </div>
                </li>
                <li><span>ADMINISTRATION</span>
                    <div class="content">
                        <a href="">Administration</a>
                        <a href="">Staff Information</a>
                    </div>
                </li>
                <li><span>CAMPUS LIFE</span>
                    <div class="content">
                        <a href="">Overview</a>
                        <a href="cultural.html">Cultural & Cosmopolitian</a>
                        <a href="sports.html">Sports & Advanture</a>
                        <a href="">Convocations</a>
                    </div>
                </li>
                <li><span>STUDENT</span>
                    <div class="content">
                        <a href="">Student Login</a>
                        <a href="">Time-table</a>
                        <a href="">Syllabus</a>
                    </div>
                </li>
            </ul>

            <div class="menu-icon">
                <button id="sideNavToggler"><i class="fa-solid fa-bars fa-2xl" style="color: white;"></i></button>
            </div>

            <div class="help">
                <div class="icon">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div class="contact">
                    <p>Admission Helpline <br> 1234567890</p>
                </div>
            </div>
        </div>
    </header>


    <section class="page-contents">

        <h2>Staff Information</h2>
        <div class="staff-info">
            <div class="cards"></div>
            <div class="cards"></div>
            <div class="cards"></div>
            <div class="cards"></div>
            <div class="cards"></div>
        </div>

        <div class="sideNav" id="mySideNav">
            <button class="dropdown">ABOUT
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="about-us.html">About us</a>
                <a href="object-mission.html">Object, Mission</a>
                <a href="infrastructure.html">Infrastructure</a>
                <a href="facilities.html">Facilities</a>
                <a href="affiliation.html">Affiliation</a>
            </div>

            <button class="dropdown">PROGRAMS
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <div class="alt-dropdown-container">
                <div class="alt-section">
                    <h2>RMIT</h2>

                    <a href="">BCA</a>
                    <a href="">BES</a>
                </div>
                <div class="alt-section">
                    <h2>HIT</h2>

                    <a href="">Mechanical</a>
                    <a href="">Electrical</a>
                    <a href="">Civil</a>
                    <a href="">Computer Science</a>
                </div>
                <div class="alt-section">
                    <h2>RMITC</h2>

                    <a href="">ITI</a>
                </div>
            </div>

            <button class="dropdown">ACADEMICS
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="">Academics Overview</a>
                <a href="">Institutes</a>
                <a href="">Academic Calander</a>
                <a href="">List Of Holidays</a>
                <a href="">System Of Evaluation</a>
            </div>

            <button class="dropdown">ADMISSION
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="">Overview</a>
                <a href="">Course Fees</a>
                <a href="">How To Apply</a>
                <a href="">Admission Criteria</a>
                <a href="">Scholarship</a>
                <a href="">Hostel Fees</a>
                <a href="">Admission Status</a>
            </div>

            <button class="dropdown">PLACEMENT
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="">Overview</a>
                <a href="">Recruiting Companies</a>
                <a href="">Career</a>
            </div>


            <button class="dropdown">ADMINISTRATION
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="">Administration</a>
                <a href="">Staff Information</a>
            </div>


            <button class="dropdown">CAMPUS LIFE
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="">Overview</a>
                <a href="cultural.html">Cultural & Cosmopolitian</a>
                <a href="sports.html">Sports & Advanture</a>
                <a href="">Convocations</a>
            </div>


            <button class="dropdown">STUDENT
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="">Student Login</a>
                <a href="">Time-table</a>
                <a href="">Syllabus</a>
            </div>

        </div>
    </section>

    <footer>
        <div class="footer-content">
            <!-- <div class="mail-content">
                <input type="email" placeholder="Your e-mail">
                <button>Subscribe Now!</button>
            </div> -->
            <div class="footer-links">
                <div class="links">
                    <h2>Apply Here</h2>

                    <a href=""><i class="fa-solid fa-angles-right"></i> Admission</a>
                    <a href=""><i class="fa-solid fa-angles-right"></i> How to Apply</a>
                    <a href=""><i class="fa-solid fa-angles-right"></i> Admission Criteria</a>
                    <a href=""><i class="fa-solid fa-angles-right"></i> Course Fee</a>
                    <a href=""><i class="fa-solid fa-angles-right"></i> Scholarship</a>
                </div>

                <div class="links">
                    <h2>Live Here</h2>

                    <a href=""><i class="fa-solid fa-angles-right"></i> Hostels</a>
                    <a href=""><i class="fa-solid fa-angles-right"></i> Transport</a>
                    <a href="sports.html"><i class="fa-solid fa-angles-right"></i> Sports</a>
                    <a href="cultural.html"><i class="fa-solid fa-angles-right"></i> Cultural Activities</a>
                </div>

                <div class="links">
                    <h2>Get in Touch</h2>

                    <a style="pointer-events: none;">Rajiv Memorial and Holy Institute of Technology,
                        Govindpur, Konisi, Berhampur, Ganjam, Odisha (India)
                    </a>
                    <a style="pointer-events: none;">Contact No.: 1234567890</a>
                </div>
            </div>
            <div class="hr-line"></div>
            <div class="footer-contacts">
                <p class="footer-copyright">
                    &copy Copyright to Monalisa and Shubhendu
                </p>

                <div class="footer-icons">
                    <a href=""><i class="fa-solid fa-phone" style="color: blue;"></i></a>
                    <a href=""><i class="fa-brands fa-whatsapp" style="color: green;"></i></a>
                    <a href=""><i class="fa-brands fa-instagram" style="color: red;"></i></a>
                    <a href=""><i class="fa-brands fa-facebook" style="color: blue;"></i></a>
                    <a href=""><i class="fa-solid fa-location-dot" style="color: green;"></i></a>
                    <a href=""><i class="fa-solid fa-envelope" style="color: brown;"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-image">
            <img src="./images/footer-image.jpg">
        </div>
    </footer>

    <script src="./javascript/image-slideshow.js"></script>
    <script src="./javascript/side-nav-bar.js"></script>
</body>

</html>