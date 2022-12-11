<?php
// db_connect.phpの読み込み
include_once("db_connect.php");

// function.phpの読み込み
include_once("function.php");

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

// PDOのインスタンスを取得
$pdo = db_connect();

try {
    // SQL文の準備
    $sql = "SELECT * FROM books ORDER BY id ASC";
    // プリペアドステートメントの作成
    $stmt = $pdo->prepare($sql);
    // 実行
    $stmt->execute();
    // エラーメッセージの出力
    } catch (PDOException $e){
        echo 'Error: ' . $e->getMessage();
    // 終了
    die();
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>メイン</title>
</head>
<body>
    <h2 class="main">在庫一覧画面</h2>
    <button class="main_btn" onclick="location.href='./create_post.php'" class="btn">新規登録</button>
    <button class="main_btn2" onclick="location.href='./logout.php'" class="btn">ログアウト</button>
    <br><br>

    <table class="table">
        <tr class="headline">
           
            <td>タイトル</td>
            <td>発売日</td>
            <td>在庫数</td>
            <td></td>
            
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                
                <td><button class="delete_btn" onclick="location.href='./delete_post.php?id=<?php echo $row['id']; ?>'" class="btn">削除</button></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>