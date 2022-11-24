<?php
// db_connect.phpの読み込み
include_once("db_connect.php");

// function.phpの読み込み
include_once("function.php");

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

$errorMessage = "";
$postMessage = "";

// 提出ボタンが押された場合
if (isset($_POST["post"])) {
    // titleとcontentの入力チェック
    if (empty($_POST["title"])) {
        echo 'タイトルが未入力です。';
    } elseif (empty($_POST["content"])) {
        echo 'コンテンツが未入力です。';
    }

    if (!empty($_POST["title"]) && !empty($_POST["content"])) {
        // 入力したtitleとcontentを格納
        $title = $_POST["title"];
        $content = $_POST["content"];

        // PDOのインスタンスを取得
        $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

        try {
            // SQL文の準備
            $pdo = new PDO($dsn, $db['title'], $db['content'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            // プリペアドステートメントの準備
            $stmt = $pdo->prepare("INSERT INTO posts(title, content) VALUES (?, ?)");
            // タイトルをバインド
            $title = $pdo->(); 
            // 本文をバインド
            FILL_IN
            // 実行
            FILL_IN
            // main.phpにリダイレクト
            FILL_IN
        } catch (PDOException $e) {
            // エラーメッセージの出力
            FILL_IN
            // 終了
            FILL_IN
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h1>記事登録</h1>
    <form method="POST" action="">
        title:<br>
        <input type="text" name="title" id="title" style="width:200px;height:50px;">
        <br>
        content:<br>
        <input type="text" name="content" id="content" style="width:200px;height:100px;"><br>
        <input type="submit" value="submit" id="post" name="post">
    </form>
</body>
</html>