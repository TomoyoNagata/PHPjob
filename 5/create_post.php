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
    } elseif (empty($_POST["date"])) {
        echo '日付が未入力です。';
    } elseif (empty($_POST["stock"])) {
        echo '在庫数が未入力です。';
    }

    if (!empty($_POST["title"]) && !empty($_POST["date"]) && !empty($_POST["stock"])) {
        // 入力したtitleとcontentを格納
        $title = $_POST["title"];
        $date = $_POST["date"];
        $stock = $_POST["stock"];

        // PDOのインスタンスを取得
        $pdo = db_connect();

        try {
            // SQL文の準備
            //$sql = 'insert into posts (id,title,content,time )values(:id,:title,:content,:time)';
            $sql = 'insert into books (title,date,stock)values(:title,:date,:stock)';
            // プリペアドステートメントの準備
            $stmt = $pdo->prepare($sql);
            // タイトルをバインド
            $stmt->bindParam(':title', $title);
            // 発売日をバインド
            $stmt->bindParam(':date', $date);
            // 在庫数をバインド
            $stmt->bindParam(':stock', $stock);
            // 実行
            $stmt->execute();
            // main.phpにリダイレクト
            header("Location: main.php");
                exit;
            // エラーメッセージの出力
            } catch (PDOException $e){
                echo 'Error: ' . $e->getMessage();
            // 終了
            die();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <br>
    <h2>本 登録画面</h2>
    <form method="POST" action="">
        <br>
        <input class="title" type="text" name="title" id="title" value="" placeholder="タイトル">
        <br>
        <input class="date" type="text" name="date" id="date" value="" placeholder="発売日"><br>
        <p>在庫数</p>
        <select class="select_btn" name="stock" id="stock" value="" >
        <option value="" selected>選択してください</option>
            <?php
                for($i = 1; $i < 100; $i++){
                echo '<option value="'.$i.'">'.$i.'</option>';
                }
            ?>
        </select>
       <br>
        <input class="input_btn" type="submit" value="登録" id="post" name="post">
    </form>
</body>
</html>