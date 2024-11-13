let currentIndex = 0;
const images = document.querySelectorAll('.img-container img-slide');
const nextButton = document.getElementById('next_img');

nextButton.addEventListener('click', function() {
    if (currentIndex < images.length - 1) {
        currentIndex++;
        updateSlide();
    }
});

function updateSlide() {
    const slideWidth = images[0].offsetWidth + 15;
    const offset = -(currentIndex * slideWidth);
    document.querySelector('.img-container').style.transform = 'translateX(${offset}px)';
}