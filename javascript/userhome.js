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

            container.style.transform = `translateX(${newTransform}px)`;
        });
    });
});
