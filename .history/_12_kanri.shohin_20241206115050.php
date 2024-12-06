<?php
// データベース接続設定
$host = 'mysql306.phy.lolipop.lan';
$dbname = 'LAA1602729-oasis';
$user = 'LAA1602729';
$password = 'oasis5';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "データベース接続エラー: " . $e->getMessage();
    exit;
}

// フォーム送信処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $yama_name = $_POST['yama_name'] ?? "";
    $country_name = $_POST['country_name'] ?? '';
    $Region = $_POST['Region'] ?? '';
    $price = $_POST['price'] ?? '';
    $yama_img = '';
    $yama_info = $_POST['yama_info'] ?? '';

    // 画像のアップロード処理
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        $image_path = $upload_dir . basename($_FILES['image']['name']);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
            echo "画像アップロードに失敗しました。";
            exit;
        }
    }

    // データベースに挿入
    $stmt = $pdo->prepare("INSERT INTO Oasis_yama (yama_name, country_name, Region, price, yama_img, yama_info) VALUES (:yama_name, :country_name, :Region, :price, :yama_img, :yama_info)");
    $stmt->bindParam(':yama_name', $yama_name);
    $stmt->bindParam(':country_name', $country_name);
    $stmt->bindParam(':Region', $Region);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':yama_img', $yama_img);
    $stmt->bindParam(':yama_info', $yama_info);
    $stmt->execute();

    echo "商品が追加されました！";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品追加</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .sidebar {
            width: 200px;
            background-color: #2c3e50;
            color: #fff;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
            box-sizing: border-box;
        }
        .sidebar h3 {
            margin-bottom: 30px;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            margin-bottom: 15px;
        }
        .main-content {
            margin-left: 220px;
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        /* ラジオボタン用のスタイル */
        .radio-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .radio-group label {
            margin-right: 10px; /* 「分類」ラベルの余白 */
            font-weight: bold; /* 見やすくするために太字 */
        }
        .radio-group input[type="radio"] {
            margin-left: 10px; /* ボタンとテキストの間のスペース */
            margin-right: 5px; /* 国内/海外テキストとボタン間のスペース */
        }
        button {
            background-color: #2c3e50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #34495e;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <ul>
        <li><a>ダッシュボード</a></li>
        <li><a href="_12_kanri.shohin.php">商品追加</a></li>
        <li><a href="_13_kanri.shohindel.php">商品削除</a></li>
        <li><a href="_14_kanri.user.php">ユーザー管理</a></li>
        <li><a href="_15_kanri.add.shohin.php">購入商品管理</a></li>
        <li><a href="_16_kanri.add.rental.php">レンタル商品管理</a></li>
    </ul>
</div>

    <div class="main-content">
        <h1>商品追加</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="radio-group">
                <label for="country_name">国/地域</label>
                <input type="text" name="country_name" id="country_name" required>
            </div>

            <label for="region">分類</label>
            <input type="radio" name="region" value="0" required>国内
            <input type="radio" name="region" value="1">海外

            <label for="yama_name">山名</label>
            <input type="text" name="yama_name" id="yama_name" placeholder="例：○○山" required>

            <label for="price">金額</label>
            <input type="number" name="price" id="price" placeholder="例：100000000" required>

            <label for="yama_info">詳細</label>
            <textarea name="yama_info" id="yama_info" placeholder="例：日本最高峰の山" rows="4" required></textarea>

            <label for="yama_img">画像</label>
            <input type="file" name="yama_img" id="yama_img" accept="image/*" required>

            <button type="submit">商品を追加する</button>
        </form>
    </div>
</body>
</html>
