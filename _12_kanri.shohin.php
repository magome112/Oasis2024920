<?php
//データベース接続情報
$host = 'localhost';
$dbname = 'LAA1553845-2024php';
$username = 'LAA1553845';
$password = 'pass1234';


    //データベースに接続
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>test</title>
  <style>
    div{
        display: flex;
        justify-content: center;
    }
    .container{
        background-color: black;
        width: 200px;
        height: 200px;
        margin-right: 50px;
    }
    .box1{
        border-radius: 10px 30px 0 40px;
    }
    .box2{
        border-radius: 50%;
    }
    .box3{
        border-radius: 20px 60px;
    }
  </style>
</head>
<body>
  <div>
    <div class="container box1"></div>
    <div class="container box2"></div>
    <div class="container box3"></div>
  </div>
</body>
</html>