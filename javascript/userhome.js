document.addEventListener('DOMContentLoaded', () => {
    const arrows = document.querySelectorAll('.Arrow');

    arrows.forEach(arrow => {
        arrow.addEventListener('click', () => {
            const targetId = arrow.getAttribute('data-target');
            const container = document.getElementById(targetId);
            const slides = container.querySelectorAll('.img-slide');

            // 1画像分の幅（マージン込み）を取得
            const slideWidth = slides[0].offsetWidth + parseInt(getComputedStyle(slides[0]).marginRight);

            // 現在のtransform値を取得
            const transformMatrix = getComputedStyle(container).transform;
            const currentTransform = transformMatrix === 'none' ? 0 : parseInt(transformMatrix.split(',')[4]);
            

            let newTransform;

            if (arrow.classList.contains('left')) {
                // 左ボタンクリック時
                newTransform = Math.min(0, currentTransform + slideWidth); // 左端を超えない
            } else {
                // 右ボタンクリック時
                const containerWidth = container.offsetWidth; // コンテナの幅を取得
                const slideWidth = slides[0].offsetWidth + parseInt(getComputedStyle(slides[0]).marginRight); // 1枚分の幅（マージン込み）
                const visibleSlides = Math.floor(containerWidth / slideWidth); // 表示されるスライド数を計算
                const maxScroll = (slides.length - visibleSlides) * slideWidth; // 最大スクロール量を計算
                newTransform = Math.max(-maxScroll, Math.min(0,currentTransform - slideWidth));
            }

            container.style.transform = `translateX(${newTransform}px)`;
        });
    });
});
