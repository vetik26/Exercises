<?php

$min = readline('Min? ');
$max = readline('Max? ');

for ($i = $min; $i <= $max; $i++)
{

    for ($j = $i; $j <= $max; $j++)
    {
        echo  $j ;
    }
    for ($j = $min; $j < $i; $j++)
    {
        echo $j ;
    }
    echo PHP_EOL;
}


