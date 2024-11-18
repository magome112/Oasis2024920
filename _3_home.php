<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/stylesheet_3.css">
    <title>ホーム</title>
</head>
<body>
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

    //海外の山画像
    $sql1 = "SELECT `yama_img`, `yama_name` FROM `Oasis_yama` WHERE `Region` = 1 ";
    $result1 = $pdo->query($sql1);
    $rowCount = $result1->rowCount();

    if($rowCount > 0){
        echo '<h2 class="h2">海外</h2>';
        echo '<div class="img-container-wrapper">';
        echo '<div class="img-container" id="img-container-1">';
            while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="img-slide">';
                echo '<img src="' . $row["yama_img"] . '">';
                echo '<p>'. $row["yama_name"]. '</p>';
                echo '</div>';
            }
        echo '</div>';
        echo '<div class="Arrow left">&lt;</div>';
        echo '<div class="Arrow right>&gt;</div>';
        echo '</div>';
    }

    //国内の山画像
    $sql2 = "SELECT `yama_img`, `yama_name` FROM `Oasis_yama` WHERE `Region` = 0 ";
    $result2 = $pdo->query($sql2);
    $rowCount = $result2->rowCount();

    if($rowCount > 0){
        echo '<h2 class="h2">国内</h2>';
        echo '<div class="img-container-wrapper">';
        echo '<div class="img-container" id="img-container-2">';
            while ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="img-slide">';
                echo '<img src="' . $row["yama_img"] . '">';
                echo '<p>'. $row["yama_name"]. '</p>';
                echo '</div>';
            }
        echo '</div>';
        echo '<div class="Arrow left">&lt;</div>';
        echo '<div class="Arrow right>&gt;</div>';
        echo '</div>';
    }
?>

<script src="/javascript/userhome.js"></script>
</body>
</html>
