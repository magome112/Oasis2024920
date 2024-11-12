<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesheet_3.css">
    <title>ホーム</title>
</head>
<body>
<?php
$dsn = 'mysql:host=mysql306.phy.lolipop.lan;dbname=LAA1602729-oasis;charset=utf8mb4';  // DSN（データソース名）
$username = 'LAA1602729';  // ユーザー名
$password = 'oasis5';  // パスワード

try {
    // PDOインスタンスを作成してデータベースに接続
    $pdo = new PDO($dsn, $username, $password);
    
    // エラーモードを設定（例外を投げる設定）
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 接続成功のメッセージを表示
    echo "データベースに接続しました！";
    
} catch (PDOException $e) {
    // 接続失敗時のエラーメッセージを表示
    echo "接続失敗: " . $e->getMessage();
}
?>

</body>
</html> 