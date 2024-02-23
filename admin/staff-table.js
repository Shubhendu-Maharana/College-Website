// // Function to dynamically update staff info table
// function updateTable() {
//     let searchValue = document.getElementById("searchInput").value;
//     $.ajax({
//         type: "GET",
//         url: "getData.php",
//         data: {
//             search: searchValue
//         },
//         success: function (response) {
//             $("#tableBody").html(response);
//         }
//     });
// }

// // Retriving staff info reapetedly after 5 seconds
// updateTable();
// // setInterval(updateTable, 2000);

// // Function to show add staff info card
// const overlay = document.getElementById("overlay");
// function on() {
//     overlay.style.display = "flex";
//     overlay.classList.remove("hide");
//     overlay.classList.add("show");
// }

// // Function to hide add staff info card
// function off() {
//     overlay.classList.remove("show");
//     overlay.classList.add("hide");
//     setTimeout(p => {
//         overlay.style.display = "none";
//     }, 400);
// }

// // Function to show add staff info card
// const edit_overlay = document.getElementById("edit-overlay");
// function edit_show(myname, age, qualification) {
//     edit_overlay.style.display = "flex";
//     edit_overlay.classList.remove("hide");
//     edit_overlay.classList.add("show");
//     document.body.style.overflow = "hidden";
//     document.getElementById("currname").value = myname;
//     document.getElementById("age").value = age;
//     document.getElementById("qualification").value = qualification;
// }

// // Function to hide add staff info card
// function edit_hide() {
//     edit_overlay.classList.remove("show");
//     edit_overlay.classList.add("hide");
//     document.body.style.overflow = "auto";
//     setTimeout(p => {
//         edit_overlay.style.display = "none";
//     }, 400);
// }

// $(document).ready(function () {
//     $("#edit_staff").on("submit", function (e) {
//         e.preventDefault();
//         let form = this;
//         $.ajax({
//             type: "POST",
//             url: "../server/edit_staff.php",
//             data: new FormData(this),
//             contentType: false,
//             processData: false,
//             success: function (response) {
//                 alert(response);
//                 $(form).trigger("reset");
//                 updateTable();
//                 edit_hide();
//             }
//         });
//     });
// });

// $(document).ready(function () {
//     $("#deleteBtn").click(function () {
//         $.ajax({
//             type: "POST",
//             url: "../server/delete_staff.php",
//             data: $("#edit_staff").serialize(),
//             success: function (response) {
//                 alert(response);
//                 updateTable();
//                 edit_hide();
//             }
//         });
//     });
// });

$(document).ready(function () {
    $("#staffAddForm").on("submit", function (e) {
        e.preventDefault();
        let formData = new FormData($("#staffAddForm")[0]);

        $.ajax({
            url: "../server/staff_store.php",
            type: "POST",
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#staffAddForm").trigger("reset");
                $("#staffModal").modal("hide");
                updateStaffTable();
                alert(response);
            }
        });
    });
});

// Function to dynamically update student info table
function updateStaffTable() {
    let searchValue = document.getElementById("StaffsearchInput").value;
    $.ajax({
        type: "GET",
        url: "get_Staff_Data.php",
        data: {
            search: searchValue
        },
        success: function (response) {
            $("#StafftableBody").html(response);
        }
    });
}

updateStaffTable();
document.getElementById("StaffsearchInput").addEventListener("keyup", () => {
    updateStaffTable();
})

function deleteStaff(name) {
    if (confirm("Are you sure?")) {
        $.ajax({
            type: "POST",
            url: "../server/delete_staff.php",
            data: {
                name: name
            },
            success: function (response) {
                alert(response);
                updateStaffTable();
            }
        });
    } else {
        return;
    }
}