<?php

$mySum = readline('Enter your desired sum: ');
if ($mySum > 12)
{
    echo 'Maximum sum of those numbers can be only: 12' . PHP_EOL;
    exit;
}


for ($i=1; $i = $mySum; $i++)
{

    $x = rand(1, 6);
    $y = rand(1, 6);
    $sum = $x + $y;
    echo "$x and $y = $sum" . PHP_EOL;

    if($mySum == $sum)
    {
        break;
    }

}
