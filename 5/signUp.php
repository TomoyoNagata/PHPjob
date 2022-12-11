<?php

include_once("db_connect.php");

$errorMessage = "";
$signUpMessage = "";

if (isset($_POST["signUp"])) {
    if (empty($_POST["name"])) {  
        $errorMessage = 'ユーザー名が未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    } 

    if (!empty($_POST["name"]) && !empty($_POST["password"])) {
        $username = $_POST["name"];
        $password = $_POST["password"];

        //$dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

        try {
            //$pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $pdo = db_connect();

            $stmt = $pdo->prepare("INSERT INTO users(name, password) VALUES (?, ?)");

            $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT))); 
            $userid = $pdo->lastinsertid(); 

            $signUpMessage = '登録が完了しました。' ; 
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
            //$e->getMessage() //でエラー内容を参照可能（デバック時のみ表示）
            echo $e->getMessage();
        }
    }
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <title>ユーザー登録画面</title>
    </head>
    <body>
    <br>
    <h2>ユーザー登録画面</h2>
        <form id="loginForm" name="loginForm" action="" method="POST">            
                <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
                <div><font color="#212121"><?php echo htmlspecialchars($signUpMessage, ENT_QUOTES); ?></font></div>
                <label for="name">
                <input class="sign_name" type="text" id="name" name="name" value="" placeholder="ユーザー名"
                <?php if (!empty($_POST["username"])) {echo htmlspecialchars($_POST["username"], ENT_QUOTES);} ?>">
                </label><br>
                <label for="password"><input class="sign_pass" type="password" id="password" name="password" value="" placeholder="パスワード">
                </label><br>
                <input type="submit" id="signUp" name="signUp" value="新規登録" class="sign_btn">
        </form>
    </body>
</html>