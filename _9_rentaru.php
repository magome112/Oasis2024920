<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // データベース接続
        $pdo = new PDO('mysql:host=mysql306.phy.lolipop.lan;dbname=LAA1602729-oasis;charset=utf8', 'LAA1602729', 'oasis5');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // フォームデータを取得
        $u_address = htmlspecialchars($_POST['u_address'], ENT_QUOTES, 'UTF-8');
        $purchaser_country = htmlspecialchars($_POST['purchaser_country'], ENT_QUOTES, 'UTF-8');
        $purchaser_user_name = htmlspecialchars($_POST['purchaser_user_name'], ENT_QUOTES, 'UTF-8'); // 修正: 購入者名 -> purchaser_user_name
        $u_tell = htmlspecialchars($_POST['u_tell'], ENT_QUOTES, 'UTF-8');  // 電話番号
        $payment = htmlspecialchars($_POST['payment'], ENT_QUOTES, 'UTF-8');

        // レンタル開始日と終了日を取得
        $rental_start = htmlspecialchars($_POST['rental_start'], ENT_QUOTES, 'UTF-8');
        $rental_finish = htmlspecialchars($_POST['rental_finish'], ENT_QUOTES, 'UTF-8');

        // データベースに登録
        $sql = "INSERT INTO Oasis_rental (u_address, purchaser_country, purchaser_user_name, u_tell, payment, rental_start, rental_finish) 
                VALUES (:u_address, :purchaser_country, :purchaser_user_name, :u_tell, :payment, :rental_start, :rental_finish)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':u_address', $u_address);
        $stmt->bindParam(':purchaser_country', $purchaser_country);
        $stmt->bindParam(':purchaser_user_name', $purchaser_user_name); // 修正: purchaser_name -> purchaser_user_name
        $stmt->bindParam(':u_tell', $u_tell);  // 電話番号の登録
        $stmt->bindParam(':payment', $payment);
        $stmt->bindParam(':rental_start', $rental_start);
        $stmt->bindParam(':rental_finish', $rental_finish);
        $stmt->execute();

        // データが正常に登録された後、指定したページにリダイレクト
        header('Location: /_3_home.php'); // 指定したページにリダイレクト
        exit; // リダイレクト後はスクリプトを終了
    } catch (PDOException $e) {
        echo "エラー: " . $e->getMessage();
    }
} else {
    // 現在の日付を取得（年-月-日形式）
    $current_date = date('Y-m-d');
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
    <h2>1.レンタル情報</h2>
    <form action="" method="POST">
        <!-- 国/地域 -->
        <label for="purchaser_country">国/地域</label>
        <select id="purchaser_country" name="purchaser_country" required>
            <option value="日本">日本</option>
            <option value="アメリカ">アメリカ</option>
            <option value="イギリス">イギリス</option>
            <option value="カナダ">カナダ</option>
            <option value="オーストラリア">オーストラリア</option>
        </select><br><br>

        <!-- 購入者名 -->
        <label for="purchaser_user_name">氏名</label>
        <input type="text" id="purchaser_user_name" name="purchaser_user_name" required><br><br> <!-- 修正: purchaser_name -> purchaser_user_name -->

        <!-- 住所 -->
        <label for="u_address">住所</label>
        <input type="text" id="u_address" name="u_address" required><br><br>

        <!-- 電話番号 -->
        <label for="u_tell">電話番号</label>
        <input type="text" id="u_tell" name="u_tell" required><br><br>  <!-- 電話番号フィールドを追加 -->
    </fieldset>
    <fieldset>
        <h2>2.お支払方法</h2>
        <!-- 支払方法 -->
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
        <br><br>
    </fieldset>

    <fieldset>    
         <!-- レンタル期間 -->
        <h2>3.レンタル期間</h2>
        <label for="rental_start">開始日:</label>
        <!-- カレンダー形式で選択 -->
        <input type="date" name="rental_start" value="<?php echo $current_date; ?>" required><br><br>

        <label for="rental_finish">終了日:</label>
        <!-- カレンダー形式で選択 -->
        <input type="date" name="rental_finish" required><br><br>
    </fieldset>

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