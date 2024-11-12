<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesheet_3.css">
    <title>ホーム</title>
</head>
<body>
    <form action="_4_shohin.php" method="post">
        <div class="header-img">
            <input type="search" name="search">
            <img src="./images/oasislogo.jpg" width="100" height="50">
        </div>
        <hr>

        <?php
        try{
        $pdo = new PDO('mysql:host=localhost;
        dbname=LAA1602729-oasis;charset=utf8mb4',
        'root',
        '');

        $sql1 = "SELECT `yama_img` FROM `Oasis_yama` WHERE `Region` = 1 ";
        $result1 = $pdo->query($sql);
        $rowCount = $result1->rowCount();

        if($rowCount > 0){
            echo '<h2>海外</h2>';
            echo '<div class="img-side">';
            echo '<div class="img-item">';
            while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="img-item">';
                echo '<img src="' . $row["yama_img"] . '" width="200" height="100">';
                echo '</div>';
            }
            echo '</div>', '</div>';
        }
        }catch(PDOException $e) {
            // データベース接続やクエリ実行でエラーが発生した場合の処理
            echo "データベースエラー: " . $e->getMessage();
        } catch (Exception $e) {
            // その他のエラーが発生した場合の処理
            echo "エラー: " . $e->getMessage();
        }
        ?>
        

        
                <button id="scroll" class="scroll-btn">></button>
            </div>

        <h2>国内</h2>
            <div class="img-side">
                <div class="img-item">
                    <img src="./images/hujisan.jpg" width="200" height="100">
                    <p>富士山</p>
                </div>
                <div class="img-item">
                    <img src="./images/hodaka.jpg" width="200" height="100">
                    <p>穂高岳</p>
                </div>
                <div class="img-item">
                    <img src="./images/sakurajima.jpg" width="200" height="100">
                    <p>桜島</p>
                </div>
                <div class="img-item">
                    <img src="./images/asozan.jpg" width="200" height="100">
                    <p>阿蘇山</p>
                </div>
                <div class="img-item">
                    <img src="./images/rijirizan.jpg" width="200" height="100">
                    <p>利尻山</p>
                </div>
            </div>

        <img src="./images/oasislogo.jpg" width="100" height="50">
        <a href="_8_kounyurireki.php">購入履歴</a>
        <script src="./javascript/userhome.js"></script>
    </form>
</body>
</html> 