let slideIndex = 0;

function showSlides() {
    let slides = document.querySelector('.slides');
    let totalSlides = document.querySelectorAll('.slide-box').length;
    slides.style.transform = `translateX(${-slideIndex * 100}%)`;
}

function nextSlide() {
    let totalSlides = document.querySelectorAll('.slide-box').length;
    slideIndex = (slideIndex + 1) % totalSlides;
    showSlides();
}

document.addEventListener('DOMContentLoaded', (event) => {
    showSlides();
    setInterval(nextSlide, 3000); // Change slide every 3 seconds
});

