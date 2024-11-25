<?php
session_start();

// ユーザーがログインしていない場合、ログインページにリダイレクト
if (!isset($_SESSION['user_id'])) {
    header('Location:/_2_login.php');
    exit;
}

// ユーザーIDを取得
$user_id = $_SESSION['user_id'];

// データベース接続（PDO）
$pdo = new PDO('mysql:host=mysql306.phy.lolipop.lan;dbname=LAA1602729-oasis;charset=utf8', 'LAA1602729', 'oasis5');

// 現在の日付を取得（レンタル開始日のデフォルトとして使用）
$current_date = date('Y-m-d');

// POSTされたデータがあればレンタル処理を実行
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // フォームデータを取得
        $u_address = htmlspecialchars($_POST['u_address'], ENT_QUOTES, 'UTF-8');
        $purchaser_country = htmlspecialchars($_POST['purchaser_country'], ENT_QUOTES, 'UTF-8');
        $purchaser_user_name = htmlspecialchars($_POST['purchaser_user_name'], ENT_QUOTES, 'UTF-8');
        $u_tell = htmlspecialchars($_POST['u_tell'], ENT_QUOTES, 'UTF-8');
        $payment = htmlspecialchars($_POST['payment'], ENT_QUOTES, 'UTF-8');
        $rental_start = htmlspecialchars($_POST['rental_start'], ENT_QUOTES, 'UTF-8');
        $rental_finish = htmlspecialchars($_POST['rental_finish'], ENT_QUOTES, 'UTF-8');
        $yama_id = $_POST['yama_id'];  // 山ID
        $price = $_POST['price'];      // 価格

        // レンタル情報をデータベースに登録
        $sql = "INSERT INTO Oasis_rental (u_id, yama_id, purchaser_country, purchaser_user_name, u_address, u_tell, payment, rental_start, rental_finish, order_date, pay_confirmation_flag) 
                VALUES (:u_id, :yama_id, :purchaser_country, :purchaser_user_name, :u_address, :u_tell, :payment, :rental_start, :rental_finish, CURDATE(), 0)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':u_id', $user_id);
        $stmt->bindParam(':yama_id', $yama_id);
        $stmt->bindParam(':purchaser_country', $purchaser_country);
        $stmt->bindParam(':purchaser_user_name', $purchaser_user_name);
        $stmt->bindParam(':u_address', $u_address);
        $stmt->bindParam(':u_tell', $u_tell);
        $stmt->bindParam(':payment', $payment);
        $stmt->bindParam(':rental_start', $rental_start);
        $stmt->bindParam(':rental_finish', $rental_finish);
        $stmt->execute();

        // データが正常に登録された後、指定したページにリダイレクト
        header('Location: /_3_home.php');
        exit;

    } catch (PDOException $e) {
        echo "エラー: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesheet_3.css">
    <link rel="icon" href="/favicon.ico" />
    <title>レンタル</title>
</head>
<body>
    <div class="header-img">
        <input type="search" name="search">
        <img src="./images/oasislogo.jpg" width="100" height="50">
    </div>
    <hr>

    <h2>レンタル情報</h2>

    <form action="" method="POST">
        <!-- 隠しフィールドで選択された山のIDと価格を送信 -->
        <input type="hidden" name="yama_id" value="<?php echo htmlspecialchars($_POST['yama_id']); ?>">
        <input type="hidden" name="price" value="<?php echo htmlspecialchars($_POST['price']); ?>">

        <fieldset>
            <h3>1. 購入者情報</h3>
            <label for="purchaser_country">国/地域:</label>
            <select id="purchaser_country" name="purchaser_country" required>
                <option value="日本">日本</option>
                <option value="アメリカ">アメリカ</option>
                <option value="イギリス">イギリス</option>
                <option value="カナダ">カナダ</option>
                <option value="オーストラリア">オーストラリア</option>
            </select><br><br>

            <label for="purchaser_user_name">氏名:</label>
            <input type="text" id="purchaser_user_name" name="purchaser_user_name" required><br><br>

            <label for="u_address">住所:</label>
            <input type="text" id="u_address" name="u_address" required><br><br>

            <label for="u_tell">電話番号:</label>
            <input type="text" id="u_tell" name="u_tell" required><br><br>
        </fieldset>

        <fieldset>
            <h3>2. 支払い方法</h3>
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
            </label><br><br>
        </fieldset>

        <fieldset>
            <h3>3. レンタル期間</h3>
            <label for="rental_start">開始日:</label>
            <input type="date" name="rental_start" value="<?php echo $current_date; ?>" required><br><br>

            <label for="rental_finish">終了日:</label>
            <input type="date" name="rental_finish" required><br><br>
        </fieldset>

        <fieldset>
            <input type="checkbox" name="kiyaku" required> 利用規約に同意する
            <input type="submit" value="レンタルする">
        </fieldset>
    </form>
</body>
</html>
