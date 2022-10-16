<?php

//$get_number = $_POST['number']
$number = $_POST['number'];
$num = str_split($number);
$r = array_rand($num);


//$fortune = mt_rand(0,9);

echo date("Y/m/d");
echo "の運勢は". '<br>';
echo "選ばれた数字は". $r. '<br>';

if($r == 0){
    echo "凶";
} elseif($r == 1){
    echo "小吉";
} elseif($r == 2){
    echo "小吉";
} elseif($r == 3){
    echo "小吉";
} elseif($r == 4){
    echo "中吉";
} elseif($r == 5){
    echo "中吉";
} elseif($r == 6){
    echo "中吉";
} elseif($r == 7){
    echo "吉";
} elseif($r == 8){
    echo "吉";
} elseif($r == 9){
    echo "大吉";
}

?>