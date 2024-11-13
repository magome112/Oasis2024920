<?php

$imageUrl = "./images/oasislogo.jpg";
$redirectUrl = "https://aso2301032.girlfriend.jp/Oasis2024920/_3_home.php";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesheet_3.css">
    <title>商品一覧画面</title>
    <style>
        img{
            cursor: pointer;

        }    
    </style>

</head>
<body>
<!--<form action="_3_home.php" method="post">
<img src="./images/oasislogo.jpg" id="center-img" width="100" height="50">-->
<div class="header-img">
        <img src="<?php echo htmlspecialchars($imageUrl, ENT_QUOTES , 'UTF-8'); ?>"
        alt="クリックで遷移する画像"
        onclick="locathion.herf='<?php echo htmlspecialchars($redirectUrl, ENT_QUOTES, 'UTF-8'); ?>';" width="100" height="50"/>
</div>

<h1>商品一覧</h1>
    <div class="product-list">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                <p><?php echo htmlspecialchars($product['description']); ?></p>
                <p>価格: ¥<?php echo number_format($product['price']); ?></p>
                <?php if (!empty($product['image_url'])): ?>
                    <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
