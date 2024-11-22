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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* ヘッダー部分のスタイル */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            background-color: #f0f0f0;
        }

        .search-bar {
            display: flex;
            align-items: center;
        }
        
        .search-bar input[type="text"] {
            padding: 5px;
        }

        .login {
            margin-left: 10px;
        }

        /* ロゴ部分を中央に配置 */
        .header-img {
            text-align: center;
            padding: 20px 0;
        }

        .header-img img {
            width: 200px; /* ロゴの幅を指定 */
            height: auto;
        }

        /* 購入履歴のスタイル */
        .history-container {
            padding: 20px;
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
    <!-- ヘッダー -->
    <div class="header">
        <div class="search-bar">
            <input type="text" placeholder="検索">
        </div>
        <div class="login">ログイン</div>
    </div>

    <!-- ロゴ部分 -->
    <div class="header-img">
        <a href="<?php echo $redirectUrl; ?>"><img src="<?php echo $imageUrl; ?>" alt="Oasis ロゴ"></a>
    </div>
    
    <hr>

    <!-- 購入履歴 -->
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
