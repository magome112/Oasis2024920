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
    <link rel="icon" href="/favicon.ico" />
    <title>購入履歴</title>

</head>


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

<style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: black;
        }
        .search-bar {
            display: flex;
            align-items: center;
        }
        .search-bar input[type="text"] {
            padding: 5px;
        }

    
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: black;
        }          
        
        .history-container {
            padding: 20px;
        }
        .history-item {
            border: 1px solid #ccc;
            margin-bottom: 20px;
            display: flex;
            flex-direction: row;
            align-items: center;
        }
        .history-item img {
            width: 200px;
            height: auto;
        }
        .history-details {
            padding: 20px;
            flex: 1;
        }
        .purchase-info {
            margin-bottom: 10px;
        }
        .label {
            font-weight: bold;
        }
        .rental-tag {
            color: orange;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">Oasis</div>
        <div class="search-bar">
            <input type="text" placeholder="検索">
        </div>
        <div class="login">ログイン</div>
    </div>

    <div class="history-container">
        <h1>購入履歴</h1>

        <!-- First Item -->
        <div class="history-item">
            <img src="volcano.jpg" alt="Volcano">
            <div class="history-details">
                <div class="purchase-info">
                    <span class="label">購入日:</span> ○○月××日<br>
                    <span class="label">合計:</span> ¥500,000,000,000 (税込)<br>
                    <span class="label">購入者様名:</span> 山﨑 亮佑
                </div>
            </div>
        </div>

        <!-- Second Item -->
        <div class="history-item">
            <img src="mountain.jpg" alt="Mountain">
            <div class="history-details">
                <div class="purchase-info">
                    <span class="label">購入日:</span> ○○月××日<br>
                    <span class="label">合計:</span> ¥500,000,000 (税込, 日割)<br>
                    <span class="rental-tag">レンタル</span><br>
                    <span class="label">購入者様名:</span> 山﨑 亮佑<br>
                    <span class="label">レンタル期間:</span> △△△△年○○月○○日 ～ △△△△年○○月○○日まで
                </div>
            </div>
        </div>
    </div>
</body>
</html>
