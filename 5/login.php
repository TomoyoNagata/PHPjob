<?php
require_once('db_connect.php');
// セッション開始
//session_start();
// セッションに値を保存
//$_SESSION['user_id'] = $row['id'];
//$_SESSION['user_name'] = $row['name'];

if(!empty($_POST)){
    if(empty($_POST["name"])){
    echo "名前が未入力です。";
    }

    if(empty($_POST["pass"])){
        echo "パスワードが未入力です。";
    }


    if(!empty($_POST["name"]) && !empty($_POST["pass"])){
        $name = htmlspecialchars($_POST["name"], ENT_QUOTES);
        $pass = htmlspecialchars($_POST["pass"], ENT_QUOTES); 

        $pdo = db_connect();

        try {
            $sql = "SELECT * FROM users WHERE name = :name";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
        } catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
            die();
        }

        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            if(password_verify($pass, $row['password'])){
                $_SESSION["user_id"] = $row['id'];
                $_SESSION["user_name"] = $row['name'];

                header("Location: main.php");
                exit;
            } else {
                echo "パスワードに誤りがあります。";
            }
        }else {
            echo "ユーザー名かパスワードに誤りがあります。";
        }
    }
}
?>

<!doctype html>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <title>ログインページ</title>
    </head>
    <body>
        <br>
        <h2 class="login_h2">ログイン画面</h2><button class="login_btn2" onclick="location.href='./signUp.php'" class="btn">新規ユーザー登録</button>
        <form method="post" action="">
            <input class="login_name" type="text" name="name" size="15" placeholder="ユーザー名"><br>
            <input class="login_pass" type="text" name="pass" size="15" placeholder="パスワード"><br>
            <input class="login_btn" type="submit" value="ログイン">
        </form>
    </body>
</html>
