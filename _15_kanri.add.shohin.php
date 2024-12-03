<?php
// データベース接続設定
$pdo = new PDO('mysql:host=mysql306.phy.lolipop.lan;
                    dbname=LAA1602729-oasis;charset=utf8',
                    'LAA1602729',
                    'oasis5');

// フォーム送信処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $yama_name = $_POST['yama_name'] ?? '';
    $country_name = $_POST['country_name'] ?? '';
    $region = $_POST['region'] ?? '';  // ラジオボタンで選択された値
    $price = $_POST['price'] ?? '';
    $yama_info = $_POST['yama_info'];

    // 画像のアップロード処理
    $yama_img = '';  // 初期化
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'images/';  // アップロード先ディレクトリ
        $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);  // ファイルの拡張子を取得
        $image_name = uniqid('img_', true) . '.' . $image_ext;  // ユニークなファイル名を作成
        $image_path = $upload_dir . $image_name;  // アップロード先のパスを作成
        
        // ディレクトリが存在しない場合は作成
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);  // ディレクトリを作成
        }

        // アップロードしたファイルを指定したパスに移動
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
            echo "画像アップロードに失敗しました。";
            exit;
        }
        $yama_img = $image_path;  // 保存された画像のパス
    }

    // データベースに挿入
    $stmt = $pdo->prepare("INSERT INTO products (yama_name, country_name, region, price, yama_img, yama_info) 
                           VALUES (:yama_name, :country_name, :region, :price, :yama_img, :yama_info)");
    $stmt->bindParam(':yama_name', $yama_name);
    $stmt->bindParam(':country_name', $country_name);
    $stmt->bindParam(':region', $region);  // ラジオボタンで選択された値を挿入
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':yama_img', $yama_img);  // 画像のパスを保存
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
    <link rel="stylesheet" href="./css/stylesheet_sidebar.css">
</head>
<body>
    <div class="sidebar">
        <h3>山崎 亮佑</h3>
        <a href="./_11_kanri.home.php">ダッシュボード</a>
        <a href="./_15_kanri.add.shohin.php">商品追加</a>
        <a href="./_13_kanri.shohindel.php">商品削除</a>
        <a href="./_14_kanri.user.php">ユーザー管理</a>
        <a href="./_15_kanri.add.shohin.php">購入商品管理</a>
        <a href="./_16_kanri.add.rental.php">レンタル商品管理</a>
        <a href="#">ログアウト</a>
    </div>

    <div class="main-content">
        <h1>商品追加</h1>
        <form method="POST" action="./_15_kanri.add.shohin.php" enctype="multipart/form-data">
            <label for="country">国/地域
                <input type="text" name="country_name" placeholder="例：日本">
            </label>

            <label for="yama_name">山名
                <input type="text" name="yama_name" placeholder="例：○○山" required>
            </label>

            <label for="region">分類
                <input type="radio" name="region" value="0" required>国内
                <input type="radio" name="region" value="1">海外
            </label>

            <label for="price">金額
                <input type="number" name="price" placeholder="例：100000000" required>
            </label>

            <label for="yama_info">詳細
                <textarea name="yama_info" placeholder="例：日本最高峰の山" rows="4" required></textarea>
            </label>

            <label for="yama_img">画像
                <input type="file" name="yama_img" accept="image/*" required>
            </label>

            <button type="submit">商品を追加する</button>
        </form>
    </div>
</body>
</html>
