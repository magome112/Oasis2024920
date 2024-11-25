<?php
// データベース接続
try {
    $pdo = new PDO('mysql:host=mysql306.phy.lolipop.lan;dbname=LAA1602729-oasis;charset=utf8', 'LAA1602729', 'oasis5');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // レビュー情報を取得
    $stmt = $pdo->query("SELECT * FROM Oasis_review ORDER BY created_at DESC");
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("エラー: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レビュー画面</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header img {
            height: 40px;
            margin: auto; /* ロゴを中央揃え */
        }

        header input[type="search"] {
            width: 200px;
            padding: 5px;
        }

        header a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 10px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .review {
            margin-bottom: 20px;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .review img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .review h3 {
            margin: 10px 0;
            color: #333;
        }

        .review p {
            margin: 5px 0;
            line-height: 1.6;
        }

        .stars {
            color: #FFD700;
            font-size: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .rating {
            color: #555;
            font-size: 14px;
        }
    </style>
</head>
<body>
<header>
    <input type="search" placeholder="検索">
    <img src="./images/oasislogo.jpg" alt="Oasis ロゴ">
    
</header>

<div class="container">
    <h2>購入者からのレビュー</h2>

    <?php foreach ($reviews as $review): ?>
        <div class="review">
            <div class="user-info">
                <img src="./images/user.png" alt="ユーザーアイコン">
                <div>
                    <strong><?php echo htmlspecialchars($review['user_name']); ?></strong>
                    <p class="rating">投稿日: <?php echo htmlspecialchars($review['created_at']); ?></p>
                </div>
            </div>
            <div class="stars">
                <?php echo str_repeat('★', $review['star_rating']); ?>
                <?php echo str_repeat('☆', 5 - $review['star_rating']); ?>
            </div>
            <h3><?php echo htmlspecialchars($review['title']); ?></h3>
            <p><?php echo nl2br(htmlspecialchars($review['comment'])); ?></p>
            <?php if (!empty($review['image_path'])): ?>
                <img src="<?php echo htmlspecialchars($review['image_path']); ?>" alt="レビュー画像">
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
