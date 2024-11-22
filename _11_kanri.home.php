<?php
// データベース接続情報
$host = 'localhost';
$dbname = 'ecommerce';
$username = 'LAA1553845';
$password = 'pass1234';


    // データベースに接続
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesheet_4.css">
    <title>ホーム</title>
</head>
<body>
    <div style="background-color: #27476C; width:100px; padding:500px; border:1px solid #ccc">
        <div style="text-align: left;"><img src="aikon.png" width="150" height="75">
        <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">画像を選択:</label>
        <input type="file" name="file" id="file">
        <input type="submit" value="アップロード">
        </form>
        <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $uploadFileDir = './uploaded_files/';
        
        if (move_uploaded_file($fileTmpPath, $uploadFileDir . $fileName)) {
            echo 'ファイルが正常にアップロードされました。';
        } else {
            echo 'ファイルのアップロードに失敗しました。';
        }
    } else {
        echo 'ファイルのアップロード中にエラーが発生しました。';
    }
}

$allowedExts = array('jpg', 'jpeg', 'png', 'gif');
$extension = pathinfo($fileName, PATHINFO_EXTENSION);
if (!in_array($extension, $allowedExts)) {
    echo 'この形式のファイルはアップロードできません。';
    exit;
}
?>
        </div>
    </div> 
</body>