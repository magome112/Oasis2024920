function slideImages(containerId) {
    const container = document.getElementById(containerId);
    const slideWidth = container.querySelector('.img-slide').offsetWidth + 15;

    //スクロールを行う
    container.scrollBy({
       left: slideWidth,
       behavior: 'smooth' 
    });
}