let currentSlideIndex = {}; // Posisi slide untuk tiap slider
let isTransitioning = {}; // Status transisi

function initSlider(sliderId) {
    const slider = document.getElementById(sliderId);
    const slides = slider.querySelector(".slides");
    const totalSlides = slides.children.length;

    // Inisialisasi posisi awal
    currentSlideIndex[sliderId] = 1; // Mulai di slide pertama
    isTransitioning[sliderId] = false;

    // Atur auto-slide
    setInterval(() => moveSlide(sliderId, 1), 5000);

    // Reset posisi jika di clone
    slides.addEventListener("transitionend", () => {
        if (currentSlideIndex[sliderId] === 0) {
            slides.style.transition = "none"; // Matikan animasi
            currentSlideIndex[sliderId] = totalSlides - 2; // Pindah ke slide terakhir
            updateSlide(sliderId);
            setTimeout(() => (slides.style.transition = "transform 0.5s ease"), 0);
        } else if (currentSlideIndex[sliderId] === totalSlides - 1) {
            slides.style.transition = "none"; // Matikan animasi
            currentSlideIndex[sliderId] = 1; // Pindah ke slide pertama
            updateSlide(sliderId);
            setTimeout(() => (slides.style.transition = "transform 0.5s ease"), 0);
        }
    });
}

function moveSlide(sliderId, step) {
    if (isTransitioning[sliderId]) return; // Jangan geser jika sedang transisi

    const slider = document.getElementById(sliderId);
    const slides = slider.querySelector(".slides");
    const totalSlides = slides.children.length;

    currentSlideIndex[sliderId] += step; // Perbarui index
    updateSlide(sliderId);

    isTransitioning[sliderId] = true;
    setTimeout(() => (isTransitioning[sliderId] = false), 500); // Atur waktu transisi
}

function updateSlide(sliderId) {
    const slider = document.getElementById(sliderId);
    const slides = slider.querySelector(".slides");
    const totalSlides = slides.children.length;

    slides.style.transform = `translateX(-${currentSlideIndex[sliderId] * 100}%)`;
}

// Inisialisasi semua slider setelah DOM siap
document.addEventListener("DOMContentLoaded", () => {
    initSlider("slidegoarancang");
    initSlider("slidesejarahgoa");
});