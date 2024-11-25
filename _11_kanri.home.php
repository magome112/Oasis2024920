<?php
//データベース接続情報
$host = 'localhost';
$dbname = 'LAA1553845-2024php';
$username = 'LAA1553845';
$password = 'pass1234';


// データベースに接続
$pdo = new PDO('mysql:host=mysql306.phy.lolipop.lan;
dbname=LAA1602729-oasis;charset=utf8',
'LAA1602729',
'oasis5');

$uploadFileDir = './uploaded_files/';
if (!is_dir($uploadFileDir)) {
    mkdir($uploadFileDir, 0777, true);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesheet_3.css">
    <title>ホーム</title>
</head>
<body>
    <div class="container">
        <div style="text-align: left;">
            <img src="./images/aikon.png" width="250" height="100">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="file">画像を選択:</label>
                <input type="file" name="file" id="file" accept="image/*">
                <input type="submit" value="アップロード">
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                    $fileTmpPath = $_FILES['file']['tmp_name'];
                    $fileName = uniqid() . '.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

                    $mimeType = mime_content_type($fileTmpPath);
                    if (!in_array(pathinfo($fileName, PATHINFO_EXTENSION), $allowedExts) || !in_array($mimeType, ['image/jpeg', 'image/png', 'image/gif'])) {
                        echo 'この形式のファイルはアップロードできません。';
                        exit;
                    }

                    if ($_FILES['file']['size'] > 2 * 1024 * 1024) { // 2MB制限
                        echo 'ファイルサイズが大きすぎます。';
                        exit;
                    }

                    if (move_uploaded_file($fileTmpPath, $uploadFileDir . $fileName)) {
                        echo 'ファイルが正常にアップロードされました。';
                    } else {
                        echo 'ファイルのアップロードに失敗しました。';
                    }
                } else {
                    echo 'ファイルのアップロード中にエラーが発生しました。';
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
