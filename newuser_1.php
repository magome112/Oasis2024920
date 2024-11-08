<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesheet_1.css">
    <title>アカウント作成</title>
</head>
<body>
    <form action="./home_3.php" method="post">
        <img src="./images/oasislogo.jpg" id="center-img" width="100" height="50">
        <hr>
        <input type="radio" name="new" value="new" class="radio">アカウント新規作成

            <p class="p">メールアドレスまたは電話番号</p>
            <input type="text" name="mail" class="textbox">

            <p class="p">新しいパスワードを入力</p>
            <input type="text" name="password" class="textbox">

        <p class="p"><input type="submit" value="新規作成"></p>

        <input type="radio" name="guest" value="guest" class="radio">ゲストでログイン
        <input type="radio" name="login" value="login" class="radio">ログイン
    
    </form>
</body>
</html>