<?php

require_once '../server/session-check.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="admin-board.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Neuton">
    <title>Document</title>
</head>

<body>
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
        </div>
    </div>
    <div class="contents">

        <div class="tab-content card" id="dashboard">
            <div id="currentTime"></div>
            <div id="calendar" class="full-month"></div>
        </div>

        <div class="tab-content" id="staff">
            <h2>Add Staff Details</h2>

            <form autocomplete="off">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" required> <br>

                <label for="age">Age: </label>
                <input type="number" name="age" id="age" min="18" required> <br>

                <label for="qual">Qualification: </label>
                <input type="text" name="qual" id="qual" required> <br>

                <!-- <label for="picture">Profile Picture: </label>
                <input type="file" name="picture" id="picture" accept="image/*" required> <br> -->

                <input type="submit" id="submitBtn">
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".contents").on("submit", ".tab-content form", function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "../server/staff_store.php",
                    data: $(this).serialize(),
                    success: function (response) {
                        alert(response);
                        $(this).trigger("reset");
                    }
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            tab(event, 'dashboard');
            document.getElementById("first").className += " active";
        })
        function tab(evt, ele) {
            let i, tabcontent, tablink;

            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            tablink = document.getElementsByClassName("link");
            for (i = 0; i < tablink.length; i++) {
                tablink[i].className = tablink[i].className.replace(" active", "");
            }

            document.getElementById(ele).style.display = "flex";
            evt.currentTarget.className += " active";
        }

        document.addEventListener("DOMContentLoaded", function () {
            function updateTime() {
                const currentTimeElement = document.getElementById("currentTime");
                const now = new Date();
                const timeString = now.toLocaleTimeString();
                currentTimeElement.innerHTML = `
                    <h1>Time: ${timeString}</h1>
                `;
            }

            function displayCalendar() {
                const calendarElement = document.getElementById("calendar");
                const now = new Date();
                const currentMonth = now.getMonth();
                const currentYear = now.getFullYear();
                const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

                // Clear previous content
                calendarElement.innerHTML = "";

                // Create table header with day names
                const tableHeader = document.createElement("thead");
                const dayNames = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
                const headerRow = document.createElement("tr");
                dayNames.forEach(day => {
                    const th = document.createElement("th");
                    th.textContent = day;
                    headerRow.appendChild(th);
                });
                tableHeader.appendChild(headerRow);
                calendarElement.appendChild(tableHeader);

                // Create table body with day numbers
                const tableBody = document.createElement("tbody");
                let dayCounter = 1;
                for (let i = 0; i < 6; i++) {
                    const row = document.createElement("tr");
                    for (let j = 0; j < 7; j++) {
                        const cell = document.createElement("td");
                        if ((i === 0 && j < now.getDay()) || dayCounter > daysInMonth) {
                            cell.textContent = "";
                        } else {
                            cell.textContent = dayCounter;
                            dayCounter++;
                        }
                        row.appendChild(cell);
                    }
                    tableBody.appendChild(row);
                }
                calendarElement.appendChild(tableBody);
            }

            // Update time and calendar every second
            setInterval(function () {
                updateTime();
                displayCalendar();
            }, 1000);

            // Initial update
            updateTime();
            displayCalendar();
        });


    </script>
</body>

</html>