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
            width: 200px; /* 検索バーの幅 */
        }

        .login {
            margin-left: 10px;
            font-weight: bold;
        }

        /* ロゴ部分を中央に配置 */
        .header-logo {
            text-align: center;
            flex-grow: 1;
        }

        .header-logo img {
            width: 150px; /* ロゴの幅を指定 */
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
    <?php
$pdo = new PDO('mysql:host=mysql306.phy.lolipop.lan;
                dbname=LAA1602729-oasis;charset=utf8',
                'LAA1602729',
                'oasis5');

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $sql = "INSERT INTO Oasis_review (review_id, email) VALUES (:username, :email)";
    $stmt = $conn->prepare($sql);

    // フォームデータをバインドして実行
    $stmt->bindParam(':username', $user_name);
    $stmt->bindParam(':email', $user_email);
    $stmt->execute();

    if ($stmt->execute()) {
        echo "データが正常に保存されました！";
    } else {
        echo "エラー: " . $stmt->error;
    }

// 接続を閉じる
$conn = null;
?>

</body>
</html>