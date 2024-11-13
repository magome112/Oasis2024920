let currentIndex = 0;
const images = document.querySelectorAll('.img-container img');
const nextButton = document.getElementById('next_img');

nextButton.addEventListener('click', function() {
    if (currentIndex < images.length - 5) {
        currentIndex++;
        updateSlide();
    }
});

function updateSlide() {
    const containerWidth = document.querySelector('.img-container').offsetWidth;
    const slideWidth = images[0].offsetWidth + 15;  // 画像の幅 + ギャップ
    const offset = -(currentIndex * slideWidth);   // スライド幅に基づいてオフセットを計算
    document.querySelector('.img-container').style.transform = `translateX(${offset}px)`;
}
