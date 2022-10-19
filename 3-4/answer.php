<?php 
//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
$my_name = $_POST['my_name'];

$your_ans1 = $_POST['your_ans1'];
$your_ans2 = $_POST['your_ans2'];
$your_ans3 = $_POST['your_ans3'];

$q1ans = $_POST['$q1ans'];
$q2ans = $_POST['$q2ans'];
$q3ans = $_POST['$q3ans'];

//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
function result($your_ans, $ans){
     if($your_ans === $ans){
        $result = "正解！";
    }else{
        $result = "残念･･･";
    }
    echo $result;
}

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
<p class="p"><?php echo $my_name; ?><!--POST通信で送られてきた名前を表示-->さんの結果は・・・？</p>
<p>①の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php 
result($your_ans1, $q1ans)
?>

<p>②の答え</p>
<!--作成した関数を呼び出して結果を表示-->

<p>③の答え</p>
<!--作成した関数を呼び出して結果を表示-->

</body>
</html>