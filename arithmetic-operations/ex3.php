<?php


$start = 1;
$end = 100;

$sum = 0;
for ($i = $start; $i <= $end; $i++) {
    $sum += $i;
}

echo "The sum of " . $start . " to " . $end . " = " . $sum . PHP_EOL;
echo 'The average is ' . ($start + $end) / 2;

