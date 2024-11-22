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
    // データベース接続（PDO）
    $pdo = new PDO('mysql:host=mysql306.phy.lolipop.lan;
                    dbname=LAA1602729-oasis;charset=utf8',
                    'LAA1602729',
                    'oasis5');
    
    // POSTされたyama_nameを受け取る
    if (isset($_POST['name'])) {
        // POSTで送信されたyama_nameを取得
        $yama_name = $_POST['name'];
    
        // yama_nameに基づいて情報を取得するSQLクエリ
        $sql = "SELECT * FROM Oasis_yama WHERE yama_name = :yama_name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':yama_name', $yama_name, PDO::PARAM_STR);
        $stmt->execute();
    
        // 結果を取得
        $result = $stmt->fetch(PDO::FETCH_ASSOC);  // 1件の結果を連想配列として取得
    
            // 取得したデータを表示
            echo '<div class="body_img">';
            echo '<img id="mt_img" src="' . $result['yama_img'] . '" alt="' . $result['yama_name'] . '" />';  // 画像
            echo '</div>';
            echo '<div class="body_text">';
            echo '<label>' . $result['yama_name'] . '</label>'; 
            echo '<label>' . '￥' . $result['price'] . '</label>'; // 山の名前と価格
            echo '</div>';
            echo '<div class="text_container">';
            echo '<p id="mt_imfo">' . $result['yama_info'] . '</p>';
            echo '</div>';
    
            // それぞれのボタン
            echo '<div class="btn_container">';
            echo '<a href="./_5_kounyu.php" id="btn_buy">購入する</a>';
            echo '<a href="./_9_rentaru.php" id="btn_rental">レンタルする</a>';
            echo '<a href="./_7_review.php" id="btn_review">レビューを見る</a>';
            echo '</div>';
            
    }
    ?>

</body>
</html>

