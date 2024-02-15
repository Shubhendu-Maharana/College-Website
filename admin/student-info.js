$(document).ready(function () {
    $("#student").on("submit", ".add-student-box .form form", function (e) {
        e.preventDefault();
        let form = this;
        $.ajax({
            type: "POST",
            url: "../server/student_store.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (response) {
                alert(response);
                $(form).trigger("reset");
                hide_student_box();
            }
        });
    });
});


// Function to hide add student info card
const std_overlay = document.getElementById("add-student-overlay");
function show_student_box() {
    std_overlay.style.display = "flex";
    std_overlay.classList.remove("hide");
    std_overlay.classList.add("show");
}

// Function to hide add student info card
function hide_student_box() {
    std_overlay.classList.remove("show");
    std_overlay.classList.add("hide");
    setTimeout(p => {
        std_overlay.style.display = "none";
    }, 400);
}

// Function to show add student info card
const edit_std_overlay = document.getElementById("edit-student-overlay");
function edit_std_show(myname, age, qualification) {
    edit_std_overlay.style.display = "flex";
    edit_std_overlay.classList.remove("hide");
    edit_std_overlay.classList.add("show");
    document.body.style.overflow = "hidden";
    document.getElementById("currStudentname").value = myname;
    document.getElementById("Stdage").value = age;
    document.getElementById("stdclass").value = qualification;
}

// Function to hide add student info card
function edit_std_hide() {
    edit_std_overlay.classList.remove("show");
    edit_std_overlay.classList.add("hide");
    document.body.style.overflow = "auto";
    setTimeout(p => {
        edit_std_overlay.style.display = "none";
    }, 400);
}


// Function to dynamically update student info table
function updateStdTable() {
    let searchValue = document.getElementById("StdsearchInput").value;
    $.ajax({
        type: "GET",
        url: "getstdData.php",
        data: {
            search: searchValue
        },
        success: function (response) {
            $("#StdtableBody").html(response);
        }
    });
}

updateStdTable();
setInterval(updateStdTable, 2000);

$(document).ready(function () {
    $("#edit_student").on("submit", function (e) {
        e.preventDefault();
        let form = this;
        $.ajax({
            type: "POST",
            url: "../server/edit_student.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (response) {
                alert(response);
                $(form).trigger("reset");
                updateStdTable();
                edit_std_hide();
            }
        });
    });
});

$(document).ready(function () {
    $("#StddeleteBtn").click(function () {
        $.ajax({
            type: "POST",
            url: "../server/delete_student.php",
            data: $("#edit_student").serialize(),
            success: function (response) {
                alert(response);
                updateTable();
                edit_hide();
            }
        });
    });
});