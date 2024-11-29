<?php
$pdo = new PDO('mysql:host=mysql306.phy.lolipop.lan;
    dbname=LAA1602729-oasis;charset=utf8',
    'LAA1602729',
    'oasis5');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesheet_15.css">
    <title>商品追加</title>
</head>
<body>
    <div class="main-container">
        <h2>商品追加</h2>
        <div class="container">
            <form action="./_12_kanri.shohin.php" method="post" enctype="multipart/form-data">
                <div class="img_section">
                    <label for="product_img" class="img_placeholder">
                        <input type="file" name="product_img[]" id="product_img" multiple accept="image/*" hidden>
                        <img src="placeholder-icon.png" alt="イメージ" class="placeholder-icon" id="preview">
                    </label>
                    <div class="thumbnail-container" id="thumbnails">
                        <!-- サムネイルがここに表示される -->
                    </div>
                </div>
                <div class="form_section">
                    <label for="country_category">国/地域
                        <select name="country">
                            <option value="日本">日本</option>
                            <option value="アメリカ">アメリカ</option>
                            <option value="イギリス">イギリス</option>
                            <option value="カナダ">カナダ</option>
                            <option value="オーストラリア">オーストラリア</option>
                        </select>
                    </label>
                    <label for="country_name">山名
                        <input type="text" name="country_name" placeholder="例：富士山">
                    </label>
                    <label for="country_price">金額
                        <input type="text" name="country_price" placeholder="例：100,000,000">
                    </label>
                    <label for="country_detail">詳細
                        <textarea rows="4" cols="30" name="country_detail" placeholder="日本最高峰の山"></textarea>
                    </label>
                </div>
                <button type="submit" class="submit_btn">商品を追加する</button>
            </form>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>
