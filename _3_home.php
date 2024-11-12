<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesheet_3.css">
    <title>ホーム</title>
</head>
<body>
<form action="_4_shohin.php" method="post">
    <div class="header-img">
        <input type="search" name="search">
        <img src="./images/oasislogo.jpg" width="100" height="50">
    </div>
    <hr>

<?php
    $pdo = new PDO('mysql:host=mysql306.phy.lolipop.lan;
                    dbname=LAA1602729-oasis;charset=utf8',
                    'LAA1602729',
                    'oasis5');

    $sql1 = "SELECT `yama_img`, `yama_name` FROM `Oasis_yama` WHERE `Region` = 1 ";
    $result1 = $pdo->query($sql1);
    $rowCount = $result1->rowCount();

    if($rowCount > 0){
        echo '<h2 class="h2">海外</h2>';
        echo '<div class="img-side">';
            while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="img-item">';
                echo '<img src="' . $row["yama_img"] . '" width="200" height="100">';
                echo '<p>'. $row["yama_name"];
                echo '</div>';
            }
        echo '</div>';
    }
   
?>
</form>
</body>
</html> 