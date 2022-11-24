<?php

include_once("db_connect.php");

$errorMessage = "";
$signUpMessage = "";


if (isset($_POST["signUp"])) {
    if (empty($_POST)) {  
        $errorMessage = 'ユーザーIDが未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    } 

    if (!empty($_POST["name"]) && !empty($_POST["password"])) {
        $username = $_POST["name"];
        $password = $_POST["password"];

        $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

        try {
            $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            $stmt = $pdo->prepare("INSERT INTO users(name, password) VALUES (?, ?)");

            $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT))); 
            $userid = $pdo->lastinsertid(); 

            $signUpMessage = '登録が完了しました。' ; 
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
            // $e->getMessage() でエラー内容を参照可能（デバック時のみ表示）
             //echo $e->getMessage();
        }
    }
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>新規登録</title>
    </head>
    <body>
    <h1>新規登録</h1>
        <form id="loginForm" name="loginForm" action="" method="POST">            
                <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
                <div><font color="#212121"><?php echo htmlspecialchars($signUpMessage, ENT_QUOTES); ?></font></div>
                <label for="name">user:<br></label>
                <input type="text" id="name" name="name" placeholder="ユーザー名を入力" value="
                <?php if (!empty($_POST["username"])) {echo htmlspecialchars($_POST["username"], ENT_QUOTES);} ?>">
                <br>
                <label for="password">password:</label><br><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
                <br>
                <input type="submit" id="signUp" name="signUp" value="submit">
        </form>
    </body>
</html>
