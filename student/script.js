document.addEventListener("DOMContentLoaded", function () {
    tab(event, 'tab-1');
    document.getElementById("home").className += " active";
});

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

function student_logout() {
    if(confirm("Are you sure to log out?")) {
        window.location.href = '../server/student_logout.php';
    }
}

