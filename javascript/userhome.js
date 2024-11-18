document.addEventListener('DOMContentLoaded', () => {
    const leftArrow = document.querySelector('.Arrow.left');
    const rightArrow = document.querySelector('.Arrow.right');
    const containers = document.querySelectorAll('.img-container');
    const scrollAmount = 300; // 1回でスライドする距離（画像の幅）

    containers.forEach((container) => {
        let currentTransform = 0; // 現在の位置を記録

        leftArrow.addEventListener('click', () => {
            // 左矢印クリック時
            currentTransform = Math.min(0, currentTransform + scrollAmount); // 左端を超えないように制限
            container.style.transform = `translateX(${currentTransform}px)`;
        });

        rightArrow.addEventListener('click', () => {
            // 右矢印クリック時
            const maxScroll = (container.children.length - 5) * scrollAmount; // スクロール最大幅
            currentTransform = Math.max(-maxScroll, currentTransform - scrollAmount); // 右端を超えないように制限
            container.style.transform = `translateX(${currentTransform}px)`;
        });
    });
});
