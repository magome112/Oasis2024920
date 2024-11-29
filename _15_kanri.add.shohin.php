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
    $region = $_POST['region'] ?? '';
    $mountain_name = $_POST['mountain_name'] ?? '';
    $price = $_POST['price'] ?? '';
    $details = $_POST['details'] ?? '';
    $image_path = '';

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
    $stmt = $pdo->prepare("INSERT INTO products (region, mountain_name, price, details, image_path) VALUES (:region, :mountain_name, :price, :details, :image_path)");
    $stmt->bindParam(':region', $region);
    $stmt->bindParam(':mountain_name', $mountain_name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':details', $details);
    $stmt->bindParam(':image_path', $image_path);
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
</head>
<body>
    <div class="sidebar">
        <h3>山崎 亮佑</h3>
        <a href="#">ダッシュボード</a>
        <a href="#">商品追加</a>
        <a href="#">商品削除</a>
        <a href="#">ユーザー管理</a>
        <a href="#">購入商品管理</a>
        <a href="#">レンタル商品管理</a>
        <a href="#">ログアウト</a>
    </div>

    <div class="main-content">
        <h1>商品追加</h1>
        <form method="POST" enctype="multipart/form-data">
            <label for="region">国/地域</label>
            <select name="region" id="region">
                <option value="Japan">Japan</option>
                <option value="USA">USA</option>
                <option value="France">France</option>
            </select>

            <label for="mountain_name">山名</label>
            <input type="text" name="mountain_name" id="mountain_name" placeholder="例：○○山" required>

            <label for="price">金額</label>
            <input type="number" name="price" id="price" placeholder="例：100000000" required>

            <label for="details">詳細</label>
            <textarea name="details" id="details" placeholder="例：日本最高峰の山" rows="4" required></textarea>

            <label for="image">画像</label>
            <input type="file" name="image" id="image" accept="image/*" required>

            <button type="submit">商品を追加する</button>
        </form>
    </div>
</body>
</html>
