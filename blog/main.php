<?php
// db_connect.phpの読み込み
include_once("db_connect.php");

// function.phpの読み込み
include_once("function.php");

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

$errorMessage = "";

// PDOのインスタンスを取得
FILL_IN

try {
    // SQL文の準備
    FILL_IN
    // プリペアドステートメントの作成
    FILL_IN
    // 実行
    FILL_IN
    // エラーメッセージの出力
    $errorMessage = 'データベースエラー';
    // 終了
    die();
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>メイン</title>
</head>
<body>
    <h1>メインページ</h1>
    <p>ようこそ<?php echo $_SESSION["user_name"];?>さん</p>
    <a href="logout.php">ログアウト</a><br />
    <a href="create_post.php">記事投稿！</a><br />
    <table>
        <tr>
            <td>記事ID</td>
            <td>タイトル</td>
            <td>本文</td>
            <td>投稿日</td>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['content']; ?></td>
                <td><?php echo $row['time']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>