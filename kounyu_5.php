<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購入情報画面</title>
</head>
<body>
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
    
    <form action="home_3.php" method="post">
        <input type="submit" value="購入する">
    </form>

</fieldset>
</body>
</html>