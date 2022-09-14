<?php

$fruits = ["りんご" => "30", "みかん" => "15", "もも" => "300"];

function getTotal($price, $number)
{
  $total = $price * $number;
  return $total;
}

foreach($fruits as $key => $value){
    $answer = getTotal($value, 10);
    echo $key. "は". $answer. "円です。". '<br>';
}

?>

