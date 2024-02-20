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
    $("#stdAddForm").on("submit", function (e) {
        e.preventDefault();
        let formData = new FormData($("#stdAddForm")[0]);

        $.ajax({
            url: "../server/student_store.php",
            type: "POST",
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#stdAddForm").trigger("reset");
                $("#myModal").modal("hide");
                alert(response);
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



// $(document).ready(function () {
//     $("#edit_student").on("submit", function (e) {
//         e.preventDefault();
//         let form = this;
//         $.ajax({
//             type: "POST",
//             url: "../server/edit_student.php",
//             data: new FormData(this),
//             contentType: false,
//             processData: false,
//             success: function (response) {
//                 alert(response);
//                 $(form).trigger("reset");
//                 updateStdTable();
//                 edit_std_hide();
//             }
//         });
//     });
// });

function deleteStd(roll_no) {
    if (confirm("Are you sure?")) {
        $.ajax({
            type: "POST",
            url: "../server/delete_student.php",
            data: {
                roll_no: roll_no
            },
            success: function (response) {
                alert(response);
                updateStdTable();
            }
        });
    } else {
        return;
    }
}



// Function to dynamically update student info table
function updateFeeTable() {
    let searchValue = document.getElementById("feeSearch").value;
    $.ajax({
        type: "GET",
        url: "../server/getFeeData.php",
        data: {
            search: searchValue
        },
        success: function (response) {
            $("#feeTableBody").html(response);
        }
    });
}

updateFeeTable();
setInterval(updateFeeTable, 2000);

$(document).ready(function () {
    $("#stdFeeForm").on("submit", function (e) {
        e.preventDefault();
        let formData = new FormData($("#stdFeeForm")[0]);

        $.ajax({
            url: "../server/std_fee_store.php",
            type: "POST",
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#stdFeeForm").trigger("reset");
                $("#addFee").modal("hide");
                updateFeeTable();
                alert(response);
            }
        });
    });
});