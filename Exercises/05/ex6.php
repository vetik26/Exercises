<?php


$arrayOfNumbers = [5, 1, 3, 3.3, '10'];

function numberDouble ($array)
{
    system('clear');
    for($i = 0; $i < count($array); $i++)
{
    if (is_int($array[$i])){
        echo $array[$i] * 2 . PHP_EOL;
    }
}

}
numberDouble($arrayOfNumbers);