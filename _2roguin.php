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
    <title>ログイン</title>
</head>
<body>
    <form action="./home_3.php" method="post">
        <p><h3><input type="radio" name="login">ログイン</h3></p>
        <p><h4>メールアドレスまたは電話番号</h4></p>
        <h3><input type="text" name="u_mail"></h3>
        <h3>パスワードを入力</h3>
        <h3><input type="text" name="u_password"></h3>
        <input type="submit" value="次に進む">
        <br>
        <input type="radio" name="guest/newuser" value="ゲストでログイン">
        <input type="radio" name="guest/newuser" value="アカウント新規作成">
    </form>
</body>
</html>