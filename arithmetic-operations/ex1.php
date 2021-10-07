<?php


function testing($x, $y)
{
    return $x == 15 || $y == 15 || $x + $y == 15 || $x - $y == 15 || $y - $x ==15;
}

var_dump(testing(5, 10));
var_dump(testing(12, 3));
var_dump(testing(15, 0));
