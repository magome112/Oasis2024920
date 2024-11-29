document.getElementById("product_img").addEventListener("change", function (event) {
    const files = event.target.files;
    const preview = document.getElementById("preview");
    const thumbnails = document.getElementById("thumbnails");

    // プレビュー画像を変更
    if (files.length > 0) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(files[0]);
    }

    // サムネイルを表示
    thumbnails.innerHTML = ""; // サムネイルリセット
    Array.from(files).forEach((file) => {
        const reader = new FileReader();
        reader.onload = function (e) {
            const thumbnail = document.createElement("div");
            thumbnail.className = "thumbnail";
            thumbnail.style.backgroundImage = `url(${e.target.result})`;
            thumbnail.style.backgroundSize = "cover";
            thumbnails.appendChild(thumbnail);
        };
        reader.readAsDataURL(file);
    });
});
