const carousel = document.getElementById('carousel');
const cardWidth = carousel.querySelector('.card').offsetWidth + 20; // Include margin
const numVisibleCards = 4;
let currentIndex = 0;

function updateCarousel() {
    carousel.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % (carousel.children.length - numVisibleCards + 1);
    updateCarousel();
}

function prevSlide() {
    currentIndex = (currentIndex - 1 + carousel.children.length) % (carousel.children.length - numVisibleCards + 1);
    updateCarousel();
}

setInterval(nextSlide, 3000); // Auto advance every 3 seconds






