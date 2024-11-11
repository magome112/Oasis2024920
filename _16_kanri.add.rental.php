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