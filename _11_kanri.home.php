<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // ログインしていない場合、ログイン画面にリダイレクト
    header('Location: _10_kanri.login.php');
    exit();
}
?>
<?php
//データベース接続情報
$host = 'localhost';
$dbname = 'LAA1553845-2024php';
$username = 'LAA1553845';
$password = 'pass1234';


// データベースに接続
$pdo = new PDO('mysql:host=mysql306.phy.lolipop.lan;
dbname=LAA1602729-oasis;charset=utf8',
'LAA1602729',
'oasis5');

$uploadFileDir = './uploaded_files/';
if (!is_dir($uploadFileDir)) {
    mkdir($uploadFileDir, 0777, true);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesheet_3.css">
    <title>ホーム</title>
</head>
<body>
<style>
        .icon {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                object-fit: cover;
                margin: 10px;
              }
        .container {
                text-align: left;
                   }
        .upload-form {
                margin-top: 20px;
                     }
        .icons {
                display: flex;
                justify-content: flex-start; /* より適切なプロパティ値 */
                flex-wrap: wrap;
               }
</style>
</head>
<body>
<?php
// アップロードされた画像を保存するディレクトリ
$uploadDir = './uploads/';

// ディレクトリが存在しない場合は作成
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// アップロード処理
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // 許可される拡張子
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileExtension, $allowedExtensions)) {
        $newFileName = uniqid() . '.' . $fileExtension; // 一意の名前を付ける
        $destination = $uploadDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $destination)) {
            $uploadSuccess = "画像がアップロードされました！";
        } else {
            $uploadError = "画像のアップロードに失敗しました。";
        }
    } else {
        $uploadError = "許可されていないファイル形式です。";
    }
}

// アップロードディレクトリ内の画像を取得
$uploadedImages = array_diff(scandir($uploadDir), ['.', '..']);
?>
<style>
        .icon {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin: 10px;
        }
        .container {
            text-align: reft;
        }
        .upload-form {
            margin-top: 20px;
        }
        .icons {
            display: flex;
            justify-content: reft;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
        <!-- アップロードフォーム -->
        <div class="upload-form">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="file">画像を選択:</label>
                <input type="file" name="file" id="file" accept="image/*">
                <input type="submit" value="アップロード">
            </form>
        </div>

        <!-- アップロード成功または失敗のメッセージ -->
        <?php if (isset($uploadSuccess)): ?>
            <p style="color: green;"><?php echo $uploadSuccess; ?></p>
        <?php elseif (isset($uploadError)): ?>
            <p style="color: red;"><?php echo $uploadError; ?></p>
        <?php endif; ?>

        <!-- デフォルトアイコンとアップロード画像の表示 -->
        <div class="icons">
            <!-- デフォルトアイコン -->
            <img src="./images/default.png" alt="デフォルトアイコン" class="icon">

            <!-- アップロードされた画像をアイコンとして表示 -->
            <?php foreach ($uploadedImages as $image): ?>
                <img src="<?php echo $uploadDir . $image; ?>" alt="アップロードされた画像" class="icon">
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['file']['tmp_name'];
                $fileName = uniqid() . '.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

                $mimeType = mime_content_type($fileTmpPath);
                if (!in_array(pathinfo($fileName, PATHINFO_EXTENSION), $allowedExts) || !in_array($mimeType, ['image/jpeg', 'image/png', 'image/gif'])) {
                    echo 'この形式のファイルはアップロードできません。';
                    exit;
                    }

                if ($_FILES['file']['size'] > 2 * 1024 * 1024) { // 2MB制限
                    echo 'ファイルサイズが大きすぎます。';
                    exit;
                    }

                if (move_uploaded_file($fileTmpPath, $uploadFileDir . $fileName)) {
                    echo 'ファイルが正常にアップロードされました。';
                } else {
                        echo 'ファイルのアップロードに失敗しました。';
                }
                } else {
                    echo 'ファイルのアップロード中にエラーが発生しました。';
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
