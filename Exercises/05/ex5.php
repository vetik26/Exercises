<?php


$fruits = [
  'apple'=> 8,
  'orange'=>18,
  'pinapple'=>10
];
$price = [
    "cost 2$",
    "cost 1$"
];

function isOverTen ($fruit){
    if ($fruit > 10){
        return true;
    }else{
        return false;
    }
}

foreach ($fruits as $key => $fruit){
    if (isOverTen($fruit )) {
        echo $key . $price[0];
    }else{
        echo $key . $price[1];
    }
}