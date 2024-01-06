$(document).ready(function () {
    $(".page-contents").on("submit", ".staff-info form", function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "./server/staff_store.php",
            data: $(this).serialize(),
            success: function (response) {
                alert(response);
                $(this).trigger("reset");
            }
        });
    });
});