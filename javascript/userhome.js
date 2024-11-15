document.addEventListener('DOMContentLoaded', () => {
    const leftArrow = document.querySelector('.Arrow.left');
    const rightArrow = document.querySelector('.Arrow.right');
    const containers = document.querySelectorAll('.img-container');
    const scrollAmount = 5; //１回で５枚スライド

    leftArrow.addEventListener('click', () => {
        containers.forEach(container => {
            const currentTransform = container.computedStyleMap.tramsform.replace('px)', '') || 0;
            const newTransform = Math.min(0, parseInt(currentTransform) + (scrollAmount * 300));
            container.style.tramsform = `translateX(${newTransform}px)`;
        });
    });

    rightArrow.addEventListener('click', () => {
        containers.forEach(container => {
            const currentTransform = container.style.transform.replace('trans;ateX(', '').replace('px)', '') || 0;
            const maxscroll = (container.children.length - 5) * 300; //５枚表示なので、スクロールの最大幅は画像の数 - 5で計算
            const newTransform = Math.max(-maxscroll,parseInt(currentTransform) - (scrollAmount * 300));
            container.style.transform - `translateX(${newTransform}px)`;
        });
    });
}); 