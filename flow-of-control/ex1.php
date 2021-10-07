<?php


$amount1 = (int) readline("Input the 1st number: ");
$amount2 = (int) readline("Input the 2st number: ");
$amount3 = (int) readline("Input the 3st number: ");

if ($amount1 > $amount2 && $amount1 > $amount3 )
    {
        echo 'The largest number is: ' . $amount1 . PHP_EOL;
    }
        elseif ($amount2 > $amount1 && $amount2 > $amount3)
        {
            echo 'The largest number is: ' . $amount2 . PHP_EOL;
        }
        elseif ($amount3 > $amount1 && $amount3 > $amount2)
        {
            echo 'The largest number is: ' . $amount3 . PHP_EOL;
        }
        else{
               echo 'All numbers are the same' . PHP_EOL;
            }