<?php
//POST送信で送られてきた名前を受け取を作成
$my_name = $_POST['my_name'];

//①画像を参考に問題文の選択肢の配列を作成してください。
$q1 = ['80', '22', '20', '21'];
$q2 = ['PHP', 'Python', 'Java', 'HTML'];
$q3 = ['join', 'select', 'insert', 'update'];


//② ①で作成した、配列から正解の選択肢の変数を作成してください
$q1ans = $q1[0];
$q2ans = $q2[3];
$q3ans = $q3[1];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<p class="p">お疲れ様です<?php echo $my_name; ?><!--POST通信で送られてきた名前を出力-->さん</p>
<!--フォームの作成 通信はPOST通信で-->
<h2>①ネットワークのポート番号は何番？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<form action="answer.php" method="post">
<?php
    foreach ($q1 as $value) { ?>
        <input type="radio" name="your_ans1" value=<?php echo $value;?>>
        <?php echo $value;
    }
?>
<h2>②Webページを作成するための言語は？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<?php
    foreach ($q2 as $value) { ?>
        <input type="radio" name="your_ans2" value=<?php echo $value;?>>
        <?php echo $value;
    }?>
<h2>③MySQLで情報を取得するためのコマンドは？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<?php
    foreach ($q3 as $value) { ?>
        <input type="radio" name="your_ans3" value=<?php echo $value;?>>
        <?php echo $value;
    }
?>
<br>
<!--問題の正解の変数と名前の変数を[answer.php]に送る-->

<input type="hidden" name="my_name" value="<?php echo $my_name; ?>">

<input type="hidden" name="$q1ans" value="<?php echo $q1ans; ?>">
<input type="hidden" name="$q2ans" value="<?php echo $q2ans; ?>">
<input type="hidden" name="$q3ans" value="<?php echo $q3ans; ?>">

<input type="submit" name="answer" value="回答する">
</form>
</body>
</html>