<?php

$testFile1 = "text1.txt";
$testFile2 = "text2.txt";
$contents = "おはようございます。";

if(is_writable($testFile1)){
    $fp = fopen($testFile1, "w");
    fwrite($fp, $contents);
    fclose($fp);
    echo "finish writting!!";
}else {
    echo "not writtable!";
    exit;
}

echo '<br>';

if(is_readable($testFile2)){

    $fp2 = fopen($testFile2, "r");
    while($line = fgets($fp2)){
        echo $line. '<br>';
    } 
    fclose($fp2);

}else{
    echo "not readable!!";
    exit;
}

?>
