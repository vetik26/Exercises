<?php

$start = 1;
$end = 110;



for($i = 1; $i <= 110; $i++)
{
    if($i % 3 === 0 && $i % 5 === 0 && $i % 7 !== 0){
        echo 'CozaLoza ';
    }
    else if ($i % 3 === 0 && $i % 7 === 0 && $i % 5 !== 0){
        echo 'CozaWoza ';
    }
    else if ($i % 3 === 0  && $i % 5 !== 0 && $i % 7 !== 0)
    {
        echo 'Coza ';
    }
    else if ($i % 5 ===0 && $i % 3 !== 0 && $i % 7 !== 0 )
    {
        echo 'Loza ';
    }
    else if ($i % 7 === 0 && $i % 5 !== 0 && $i % 3 !== 0){
        echo 'Woza ';
    }
    else if ($i % 7 === 0 && $i % 5 ===0 && $i % 3 !== 0)
    {
        echo 'WozaLoza ';
    }
    else if ($i % 3 === 0 && $i % 5 === 0 && $i % 7 === 0)
    {
        echo 'CozaLozaWoza ';
    }
    else {
    echo $i . " ";
    }

    if ($i % 11 === 0){
        echo PHP_EOL;
    }
}




