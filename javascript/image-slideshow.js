//Image slideshow
let slideIndex = 0;

function showSlides() {
    let i;
    const slides = document.getElementsByClassName("slides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    slides[slideIndex - 1].style.display = "block";
    slides[slideIndex - 1].classList.add("fade");
    setTimeout(showSlides, 6000); // Change slide every 3 seconds
}
document.addEventListener("DOMContentLoaded", showSlides);
