<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント作成</title>
</head>
<body>
    <form action="./home_3.php" method="post">
        <img src="">
        <hr>
        
        <input type="radio" name="new" value="アカウント新規作成">
        <p>メールアドレスまたは電話番号</p>
        <input type="text" name="mail">
        <p>新しいパスワードを入力</p>
        <input type="text" name="password">

        <input type="submit" value="新規作成">

        <input type="radio" name="guest" value="ゲストでログイン">
        <input type="radio" name="roguin" value="ログイン">
    </form>
</body>
</html>