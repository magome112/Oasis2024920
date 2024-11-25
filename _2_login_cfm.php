<?php
session_start();
    $pdo = new PDO('mysql:host=mysql306.phy.lolipop.lan;
                        dbname=LAA1602729-oasis;charset=utf8',
                        'LAA1602729',
                        'oasis5');


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //データ取得
        $email = $_POST['email'];
        $pass = $_POST['password'];

        //データベースから値を取得
        $stmt = $pdo->prepare("SELECT * FROM Oasis_user WHERE u_mail = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //入力した情報とデータベースの情報が一致するか
        if ($user && password_verify($pass, $user['u_password'])) {
            $_SESSION['user_id'] = $user['u_id'];
            $_SESSION['user_name'] = $user['u_name'];

        // ホーム画面にリダイレクト
        header('Location: _3_home.php');
        exit();
        } else {
            //エラーメッセージ
            $_SESSION['error_msg'] = "メールアドレスまたはパスワードが正しくありません。";
            header('Location: _2_login.php');
            exit();
        }     
    }      
?>
