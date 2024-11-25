<?php

session_start();

    $pdo = new PDO('mysql:host=mysql306.phy.lolipop.lan;
                        dbname=LAA1602729-oasis;charset=utf8',
                        'LAA1602729',
                        'oasis5');


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //データ取得
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $stmt = $pdo->prepare("SELECT * FROM Oasis_user WHERE u_mail = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['u_password'])) {
            $_SESSION['user_id'] = 
        }                 
    }      
?>
