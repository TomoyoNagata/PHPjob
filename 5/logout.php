<?php
session_start();
$_SESSION = array();
session_destroy();
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>ログアウト</title>
</head>
    <body>
        <br>
        <h1>ログアウト画面</h1>
        <div>ログアウトしました</div>
        <button class="logout_btn" onclick="location.href='./login.php'" class="logout_btn">ログイン画面に戻る</button>
    </body>
</html>