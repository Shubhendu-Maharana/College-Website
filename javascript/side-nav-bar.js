//Function for opening and closing Side Navigatoin panel (For mobile users only)
var SideNavBtn = document.getElementById("sideNavToggler");
var sideNav = document.getElementById("mySideNav");
var menuState = 0;

SideNavBtn.addEventListener("click", function () {
    if (menuState === 0) {
        menuState = 1;
        sideNav.style.width = "100%";
    } else {
        menuState = 0;
        sideNav.style.width = "0";
    }
});

//Function for all dropdown bottons in Side Navigation bar (For mobile users only)
var dropBtn = document.getElementsByClassName("dropdown");
var i;

for (i = 0; i < dropBtn.length; i++) {
    dropBtn[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var dropdowncontent = this.nextElementSibling;
        if (dropdowncontent.style.display === "flex") {
            dropdowncontent.style.display = "none";
        } else {
            dropdowncontent.style.display = "flex";
        }
    });
}