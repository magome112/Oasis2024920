
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesheet_3.css">
    <title>購入履歴</title>
</head>
<body>
<form action="_8_kounyurireki.php" method="post">
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


?>
