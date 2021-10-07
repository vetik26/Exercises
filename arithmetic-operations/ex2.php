<?php

$number = 51;
function check($number)
{
    if ($number % 2 === 0) {
        return "Even Number" . PHP_EOL . 'bye!';
    }
        return "Odd Number". PHP_EOL . 'bye!';


}
echo check($number);

