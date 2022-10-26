<?php
require('getData.php');
connect();

// インスタンス
$data = new getData();
$userData = $data -> getUserData();
$postData = $data -> getPostData();
$fullname =  $userData['last_name']. $userData['first_name'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
   <div class="header">
        <div class="logo">
            <img src="img/Y&I.png">
        </div>

        <div class="user_name">
                <p class="p_username">ようこそ <?php echo $fullname;?> さん</P>
        </div>

        <div class="lastlogin">
                <p class="p_lastlogin">最終ログイン日：<?php echo $userData['last_login'];?></p>
        </div>
    </div>
    
    <table>
        <tr class="headline">
            <th>記事ID</th>
            <th>タイトル</th>
            <th>カテゴリ</th>
            <th>本文</th>
            <th>投稿日</th>
        </tr>
        <?php foreach($postData as $post){ ?>
        <tr class="article">
            <td><?php echo $post['id']; ?></td>
            <td><?php echo $post['title']; ?></td>
            <td><?php  if($post['category_no'] == 1){
                            echo "食事";
                        }
                        elseif($post['category_no'] == 2) {
                            echo "旅行";
                        }
                        else {
                            echo "その他";
                        }?>
            </td>
            <td><?php echo $post['comment']; ?></td>
            <td><?php echo $post['created']; ?></td>
        </tr> 
        <?php } ?>      
    </table>                 

    <div class="footer">
        <p>Y&I group.inc</p>
    </div>

</body>
</html>