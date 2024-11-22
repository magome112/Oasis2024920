<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // データベース接続
        $pdo = new PDO('mysql:host=mysql306.phy.lolipop.lan;dbname=LAA1602729-oasis;charset=utf8', 'LAA1602729', 'oasis5');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // フォームデータを取得
        $u_address = htmlspecialchars($_POST['u_address'], ENT_QUOTES, 'UTF-8');
        $purchaser_country = htmlspecialchars($_POST['purchaser_country'], ENT_QUOTES, 'UTF-8');
        $purchaser_name = htmlspecialchars($_POST['purchaser_name'], ENT_QUOTES, 'UTF-8');
        $payment = htmlspecialchars($_POST['payment'], ENT_QUOTES, 'UTF-8');

        // データベースに登録
        $sql = "INSERT INTO Oasis_kounyutyumon (u_address, purchaser_country, purchaser_name, payment) 
                VALUES (:u_address, :purchaser_country, :purchaser_name, :payment)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':u_address', $u_address);
        $stmt->bindParam(':purchaser_country', $purchaser_country);
        $stmt->bindParam(':purchaser_name', $purchaser_name);
        $stmt->bindParam(':payment', $payment);
        $stmt->execute();

        echo "購入情報が登録されました。";
        header('Location: /_3_home.php'); // 指定したページにリダイレクト
        exit; // リダイレクト後はスクリプトを終了
    } catch (PDOException $e) {
        echo "エラー: " . $e->getMessage();
    }
} else {
    // フォームを表示
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購入情報入力</title>
</head>
<body>
    <fieldset>
    <h2>1.購入者様情報</h2>
    <form action="" method="POST">
        <label for="purchaser_country">国/地域:</label>
            <select id="purchaser_country" name="purchaser_country" required>
                <option value="日本">日本</option>
                <option value="アメリカ">アメリカ</option>
                <option value="イギリス">イギリス</option>
                <option value="カナダ">カナダ</option>
                <option value="オーストラリア">オーストラリア</option>
            </select><br><br>
    
        <label for="u_address">住所</label>
        <input type="text" id="u_address" name="u_address" required><br><br>

        <label for="purchaser_name">氏名</label>
        <input type="text" id="purchaser_name" name="purchaser_name" required><br><br>
    </fieldset>
    <fieldset>
            <h2>2.お支払方法</h2>

        <label for="payment"></label><br>
        <label>
            <input type="radio" name="payment" value="VISA" required>
            <img src="./images/visa.png" alt="VISA" width="100">
        </label>
        <label>
            <input type="radio" name="payment" value="JCB" required>
            <img src="./images/jcb.png" alt="JCB" width="100">
        </label>
        <label>
            <input type="radio" name="payment" value="PayPay" required>
            <img src="./images/Paypay.jpg" alt="PayPay" width="100">
        </label>
        <label>
            <input type="radio" name="payment" value="RPay" required>
            <img src="./images/rpay.png" alt="RPay" width="100">
        </label>
    </fieldset>
        <br><br>

        <fieldset>
            <input type="checkbox" name="kiyaku" required>
            利用規約に同意する

            <input type="submit" value="購入する">
        </fieldset>

    </form>
</body>
</html>
<?php
}
?>