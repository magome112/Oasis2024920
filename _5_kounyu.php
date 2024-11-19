
<!-- データベース接続情報
$host = 'localhost';
$dbname = 'ecommerce';
$username = 'LAA1553845';
$password = 'pass1234';



    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
-->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購入情報画面</title>
</head>
<body>
<?php
    $pdo = new PDO('mysql:host=mysql306.phy.lolipop.lan;
                    dbname=LAA1602729-oasis;charset=utf8',
                    'LAA1602729',
                    'oasis5');
?>
<fieldset>
    <h3>1.購入者情報</h3>
    国/地域
    <br>
    <select name="purchaser_country" >
        <option value = "japan" selected>Japan</option>
        <option value = "US">America</option>
        <option value = "UK">United Kingdom</option>
    </select>
    <br>
    <form action="_5_kounyu.php" method="POST">
        <label for="purchaser_name">氏名:</label>
        <input type="text" name="p_name" id="name" required>
        <br>
        <label for="u_address">住所</label>
        <input type="text" name="u_adrs" id="address" required>
        <br>
        <button type="submit">送信</button>
    </form>
    氏名
    <br>
    <input type="text" name="purchaser_name">
    <br>
    住所
    <br>
    <input type="text" name="u_address">
    <br>
    電話番号
    <br>
    <input type="text" name="tell">

    <h3>2.お支払方法</h3>

    <input type="radio" name="payment" value="visa">VISAの画像
    <input type="radio" name="payment" value="jcb">JCBの画像
    <input type="radio" name="payment" value="paypay">paypayの画像
    <input type="radio" name="payment" value="R_pay">R_payの画像
    
</fieldset>

<fieldset>

    

    <input type="checkbox" name="kiyaku">利用規約に同意する
    
    <form action="_3_home.php" method="post">
        <input type="submit" value="購入する">
    </form>

</fieldset>
</body>
</html>

$name = $_POST['name'];
$email = $_POST['email'];

// 4. SQLクエリを準備して実行
$sql = "INSERT INTO users (name, email) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name, $email); // パラメータをバインド (s = 文字列)

// 実行と確認
if ($stmt->execute()) {
    echo "データが正常に保存されました！";
} else {
    echo "エラー: " . $stmt->error;
}

// 接続を閉じる
$stmt->close();
$conn->close();
?>