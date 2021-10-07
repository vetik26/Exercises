<?php


$a = -9.81;
$t = 10;
$vi = 0;
$xi = 0;

$x = 0.5 * ($a * ($t * $t)) + $vi * $t + $xi;
echo $x . "m.";