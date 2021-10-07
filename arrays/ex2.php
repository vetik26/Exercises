<?php


$numbers = [20, 30, 25, 35, -16, 60, -100];

$arraySum = array_sum($numbers);

$average = $arraySum / count($numbers);

echo round($average, 2);