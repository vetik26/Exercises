<?php

echo 'Welcome to piglet' . PHP_EOL;

$sum = 0;

while (true)

{
    $number = rand(1,6);
    echo "You rolled $number" . PHP_EOL;
 if ($number == 1 )
{
    $sum = 0;
    echo 'You got 0 points.' . PHP_EOL;
    exit;
}
    $sum +=$number;
    echo 'Roll again?' . PHP_EOL;
    $answer = readline("Enter 'yes' or 'no': ");

if ($answer !== 'no' && $answer!== 'yes')
{
    echo "Enter ONLY 'yes' or 'no'" . PHP_EOL;
    echo 'Roll again?' . PHP_EOL;
    $answer = readline("Enter 'yes' or 'no': ");
}
    else if ($answer ==='no')
    {
        echo "You got $sum" . PHP_EOL;
        exit;
    }
}