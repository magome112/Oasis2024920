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
    <title>レビュー記入</title>
</head>
<body>
<div class="header-img">
        <input type="search" name="search">
        <img src="./images/oasislogo.jpg" width="100" height="50">
    </div>
    <hr>
    <form action="_7_review.php" method="post" enctype="multipart/form-data">

    <h1>レビューの記入</h1>
    <p><h5>総合評価(必須)</h5><input type="radio" name="star" value="5">
                    <input type="radio" name="star" value="4">
                    <input type="radio" name="star" value="3">
                    <input type="radio" name="star" value="2">
                    <input type="radio" name="star" value="1"></p>

    <p><h5>コメント(必須)</h5> <textarea rows="5" cols="50"></textarea></p>

    <h5>画像アップロード(任意)</h5><input type="file" name="upload" accept="image/*">
    </form>
    <button></button>

</body>
</html>