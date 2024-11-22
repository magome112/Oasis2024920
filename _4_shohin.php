<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesheet_4.css">
    <title>商品情報</title>
</head>
<body>
    <div class="header-img">
            <a href="./_3_home.php"><img src="./images/oasislogo.jpg" width="100" height="50"></a>
        </div>
        <hr>

<?php
    $pdo = new PDO('mysql:host=mysql306.phy.lolipop.lan;
                    dbname=LAA1602729-oasis;charset=utf8',
                    'LAA1602729',
                    'oasis5');

    // yama_nameを使って、同レコードの情報を取得
    $sql = "SELECT * FROM Oasis_yama WHERE yama_name = :yama_name";
    // データベースから取得した情報を表示
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':yama_name', $yama_name, PDO::PARAM_STR);
    $stmt->execute();

    // 結果を取得
    $result = $stmt->fetch(PDO::FETCH_ASSOC);  // 1件の結果を連想配列として取得

    echo $result['yama_img']. 'id="body_img"';
    echo '<div class="body_text">';
    echo $result['yama_name'];
    echo $result['price'];
    echo '</div>';
    echo $result['yama_info']. 'id="mt_info"';

    // 他のカラムを利用
    echo "山の名前: " . $result['yama_name'];
    echo "山の画像: " . $result['yama_img'];
    echo "山のID: " . $result['yama_id'];



?>
</body>
</html>