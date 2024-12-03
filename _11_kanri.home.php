<?php
session_start();

// セッション確認：ログイン状態でなければログイン画面へリダイレクト
if (!isset($_SESSION['user_id'])) {
    header('Location: _10_kanri.login.php');
    exit(); // ここで終了しているか確認
}

// アップロード用ディレクトリ
$uploadDir = './uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// アップロード処理
$uploadMessage = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // 許可される拡張子
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileExtension, $allowedExtensions)) {
        $newFileName = uniqid() . '.' . $fileExtension; // 一意の名前を付ける
        $destination = $uploadDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $destination)) {
            $uploadMessage = "画像がアップロードされました！";
        } else {
            $uploadMessage = "画像のアップロードに失敗しました。";
        }
    } else {
        $uploadMessage = "許可されていないファイル形式です。";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesheet_sidebar.css">
    <title>ダッシュボード - 画像アップロード</title>
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
    <!-- コンテンツ部分 -->
    <div class="content">
        <h1>ダッシュボード</h1>
        <div class="dashboard-buttons">
            <div class="button" style="background-color: #3498db;">
                <a href="add_product.php">商品追加</a>
            </div>
            <div class="button" style="background-color: #2ecc71;">
                <a href="delete_product.php">商品削除</a>
            </div>
            <div class="button" style="background-color: #f39c12;">
                <a href="user_info.php">ユーザー情報</a>
            </div>
            <div class="button" style="background-color: #9b59b6;">
                <a href="purchase_management.php">購入商品管理</a>
            </div>
            <div class="button" style="background-color: #e74c3c;">
                <a href="rental_management.php">レンタル商品管理</a>
            </div>
        </div>
    </div>
</body>
</html>
