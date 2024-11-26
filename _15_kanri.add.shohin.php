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
    <link rel="stylesheet" href="">
    <title>商品追加</title>
</head>
<body>
    <h2>商品追加</h2>
        <form action="./_12_kanri.shohin.php" method="post" enctype="multipart/form-data">
            <input type="file" name="product_img[]" id="product_img" multiple accept="image/*">
            <br>
            <label for="country_category" id="country_category">国/地域
                <select name="country">
                    <option value="日本">日本</option>
                    <option value="アメリカ">アメリカ</option>
                    <option value="イギリス">イギリス</option>
                    <option value="カナダ">カナダ</option>
                    <option value="オーストラリア">オーストラリア</option>
                </select></label>
                <br>
                <label class="form_data">山名
                    <input type="text" name="country_name"></label>
                <br>
                <label class="form_data">金額
                    <input type="text" name="price"></label>
                <br>
                <label class="form_data">詳細
                    <textarea name="detail" rows="4" cols="30"></textarea></label>
                
                    <input type="submit" value="商品を追加する">
        </form>
</body>
</html>