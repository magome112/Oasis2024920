<?php
// データベース接続設定
$host = 'mysql306.phy.lolipop.lan';
$dbname = 'LAA1602729-oasis';
$user = 'LAA1602729';
$password = 'oasis5';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "データベース接続エラー: " . $e->getMessage();
    exit;
}

// 削除処理
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    if (!empty($_POST['delete_ids'])) {
        $delete_ids = implode(',', array_map('intval', $_POST['delete_ids']));
        $query = "DELETE FROM products WHERE id IN ($delete_ids)";
        $pdo->exec($query);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// 商品情報取得
$query = "SELECT id, product_name, country, price FROM products";
$stmt = $pdo->query($query);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesheet_sidebar.css">
    <title>商品一覧</title>
</head>
<body>
    <!-- サイドバー -->
    <div class="sidebar">
        <h3>山崎 亮佑</h3>
        <a href="./_11_kanri.home.php">ダッシュボード</a>
        <a href="./_15_kanri.add.shohin.php">商品追加</a>
        <a href="./_13_kanri.shohindel.php">商品削除</a>
        <a href="./_14_kanri.user.php">ユーザー管理</a>
        <a href="./_15_kanri.add.shohin.php">購入商品管理</a>
        <a href="./_16_kanri.add.rental.php">レンタル商品管理</a>
        <a href="#">ログアウト</a>
    </div>

    <!-- メインコンテンツ -->
    <div class="main-content">
        <h1>商品一覧</h1>
        <form method="POST" action="">
            <div class="search-box">
                <input type="text" placeholder="商品名・国名など">
                <button type="button">検索</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all"></th>
                        <th>ID</th>
                        <th>商品名</th>
                        <th>国名</th>
                        <th>価格</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><input type="checkbox" name="delete_ids[]" value="<?= htmlspecialchars($product['id']) ?>"></td>
                            <td><?= htmlspecialchars($product['id']) ?></td>
                            <td><?= htmlspecialchars($product['product_name']) ?></td>
                            <td><?= htmlspecialchars($product['country']) ?></td>
                            <td><?= htmlspecialchars($product['price']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit" name="delete">削除</button>
        </form>
    </div>

    <script>
        // 全選択/全解除
        document.getElementById('select-all').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"][name="delete_ids[]"]');
            for (const checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        });
    </script>
</body>
</html>
