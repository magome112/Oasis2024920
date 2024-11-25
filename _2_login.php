<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesheet_2.css">
    <title>ログイン</title>
</head>
<body>
    <div class="login-container">
        <h2>ログイン</h2>
        <form action="./_2_login_cfm.php" method="POST">
            <div class="form-group">
                <label for="email">メールアドレスまたはユーザー名</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">ログイン</button>
        </form>
        <p><a href="./_1_newuser.php">新規登録はこちら</a></p>
    </div>
    <?php if (!empty($error_message)): ?>
        <p style="color:red;"><?php echo htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>
</body>
</html>