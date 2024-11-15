let currentIndex = 0;

function slideImages(containerId) {
    const container = document.getElementById(containerId);
    const slideWidth = container.querySelector('.img-slide').offsetWidth + 15;

    //次のスライド位置へスクロール
    container.scrollBy({
       left: slideWidth,
       behavior: 'smooth' 
    });

    //最後まで行ったら最初に戻す
    currentIndex += 1;
    if(currentIndex >= container.children.length - 5) {
        currentIndex = 0;
        container.scrollTo({ left: 0, behavior: 'smooth' });
    }
}