<?php


function countDigits ($number)
{
    return strlen((string)$number);
}

$number = (int) readline(" Enter the of number: ");

if ($number = countDigits($number))
{
    echo 'Number have ' . $number . ' numbers of digits.' . PHP_EOL;
}
