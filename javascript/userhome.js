document.addEventListener('DOMContentLoaded', () => {
    const arrows = document.querySelectorAll('.Arrow');

    arrows.forEach(arrow => {
        arrow.addEventListener('click', () => {
            const targetId = arrow.getAttribute('data-target');
            const container = document.getElementById(targetId);
            const slides = container.querySelectorAll('.img-slide');

            // 画像のスライド幅を計算し、コンテナの幅を設定する
            const slideWidth = slides[0].offsetWidth + parseInt(getComputedStyle(slides[0]).marginRight);
            const containerWidth = slides.length * slideWidth;
            container.style.width = `${containerWidth}px`;

            // 現在のtransform値を取得
            const currentTransform = parseInt(getComputedStyle(container).transform.split(',')[4]) || 0;

            let newTransform;

            if (arrow.classList.contains('left')) {
                // 左ボタンクリック時
                newTransform = Math.min(0, currentTransform + slideWidth); // 左端を超えない
            } else {
                // 右ボタンクリック時
                const maxScroll = (slides.length - 5) * slideWidth; // 右端を超えない
                newTransform = Math.max(-maxScroll, currentTransform - slideWidth);
            }

            // スライドの位置を変更
            container.style.transform = `translateX(${newTransform}px)`;
        });
    });
});
