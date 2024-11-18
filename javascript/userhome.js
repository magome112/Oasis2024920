document.addEventListener('DOMContentLoaded', () => {
    const arrows = document.querySelectorAll('.Arrow');

    arrows.forEach(arrow => {
        arrow.addEventListener('click', () => {
            const targetId = arrow.getAttribute('data-target');
            const container = document.getElementById(targetId);
            const scrollAmount = 300; // スライドする距離
            let currentTransform = parseInt(getComputedStyle(container).transform.split(',')[4]) || 0;

            if (arrow.classList.contains('left')) {
                // 左ボタンクリック時
                currentTransform = Math.min(0, currentTransform + scrollAmount);
            } else {
                // 右ボタンクリック時
                const maxScroll = (container.children.length - 5) * scrollAmount;
                currentTransform = Math.max(-maxScroll, currentTransform - scrollAmount);
            }

            container.style.transform = `translateX(${currentTransform}px)`;
        });
    });
});
