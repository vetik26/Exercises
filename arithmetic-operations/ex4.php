<?php


$start = 1;
$end = 10;
$sum = 0;
function factorial($number){
    for($i = 1; $i <= $number; $i++){
        if($i === 1){
            $sum = 1;
        }
        $sum*=$i;
    }
    return $sum;
}



echo factorial(5);