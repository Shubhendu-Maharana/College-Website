const showPassword = document.getElementById('showPassword');
const passwordInput = document.getElementById('password');

function passwordToggle() {
    if (showPassword.checked) {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}

$(document).ready(function () {
    $(".box").on("submit", "form", function (e) {
        e.preventDefault();
        let form = this;
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../server/student_login.php",
            data: $(form).serialize(),
            success: function (response) {
                if (response[1]) {
                    document.location.href = response[0];
                } else {
                    alert(response[0]);
                }
                $(form)[0].reset();
            }
        });
    });
});