<?php

//$get_number = $_POST['number']

$fortune = mt_rand(0,9);

echo date("Y/m/d");
echo "の運勢は". '<br>';
echo "選ばれた数字は". $fortune. '<br>';

if($fortune == 0){
    echo "凶";
} elseif($fortune == 1){
    echo "小吉";
} elseif($fortune == 2){
    echo "小吉";
} elseif($fortune == 3){
    echo "小吉";
} elseif($fortune == 4){
    echo "中吉";
} elseif($fortune == 5){
    echo "中吉";
} elseif($fortune == 6){
    echo "中吉";
} elseif($fortune == 7){
    echo "吉";
} elseif($fortune == 8){
    echo "吉";
} elseif($fortune == 9){
    echo "大吉";
}

?>