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
    $yama_name = $_POST['yama_name'];
    $country_name = $_POST['country_name'];
    $Region = $_POST['Region'];
    $price = $_POST['price'];
    $yama_img = $_POST['yama_img'];
    $yama_info = $_POST['yama_info'];

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
    $stmt = $pdo->prepare("INSERT INTO products (yama_name, country_name, Region, price, yama_img, yama_info) VALUES (:yama_name, :country_name, :Region, :price, yama_img, :yama_info)");
    $stmt->bindParam(':yama_info', $yama_name);
    $stmt->bindParam(':country_name', $country_name);
    $stmt->bindParam(':Region', $Region);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':yama_img', $yama_img);
    $stmt->bindParam(':yama_info', $yama_info);
    

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
        <a href="./_15_kanri.add.shohin.php">商品追加</a>
        <a href="./_13_kanri.shohindel.php">商品削除</a>
        <a href="./_14_kanri.user.php">ユーザー管理</a>
        <a href="./_12_kanri.shohin.php">購入商品管理</a>
        <a href="./_16_kanri.add.rental.php">レンタル商品管理</a>
        <a href="#">ログアウト</a>
    </div>

    <div class="main-content">
        <h1>商品追加</h1>
        <form method="POST" action="./_15_kanri.add.shohin.php" enctype="multipart/form-data">
            <label for="country">国/地域
            <input type="text" name="country_name" placeholder="例：日本" required>
            </label>

            <label for="mountain_name">山名
            <input type="text" name="yama_name" id="mountain_name" placeholder="例：○○山" required>
            </label>

            <label for="price">金額
            <input type="number" name="price" id="price" placeholder="例：100000000" required>
            </label>

            <label for="classification">分類
            <input type="radio" name="Region" value="0" required>国内
            <input type="radio" name="Region" value="1">海外
            </label>

            <label for="details">詳細
            <textarea name="yama_info" id="details" placeholder="例：日本最高峰の山" rows="4" required></textarea>
            </label>

            <label for="image">画像
            <input type="file" name="yama_img" id="image" accept="image/*" required>
            </label>

            <button type="submit">商品を追加する</button>
        </form>
    </div>
</body>
</html>
