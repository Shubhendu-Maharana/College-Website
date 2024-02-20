<?php

session_start();
unset($_SESSION['roll_no']);
header("Location: ../student/login.html");

?>