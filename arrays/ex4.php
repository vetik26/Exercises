<?php

echo "Array 1: " ;
$array1 = [];


    for ($i = 0; $i < 10; $i++)
    {
         array_push($array1, rand(1, 100));
    }



$array2 = $array1;
 $array1[count($array1 ) - 1] = -7;
foreach ($array1 as $key)
{
    echo $key . " ";
}

echo PHP_EOL . "Array 2: " ;
 foreach ($array2 as $key)
 {
     echo $key . " ";
 }