<?php


$dayNumber = (int) readline(" Enter the of number: ");

switch ($dayNumber)
{
    case $dayNumber ===  0:
        echo 'Sunday' . PHP_EOL;
        break;

    case $dayNumber === 1:
        echo 'Monday' . PHP_EOL;
        break;

    case $dayNumber === 2:
        echo 'Tuesday'. PHP_EOL;
        break;

    case $dayNumber === 3:
        echo 'Wednesday' . PHP_EOL;
        break;

    case $dayNumber === 4:
        echo 'Thursday'. PHP_EOL;
        break;

    case $dayNumber === 5:
        echo 'Friday'. PHP_EOL;
        break;

    case $dayNumber === 6:
        echo 'Saturday'. PHP_EOL;
        break;

    default:
       echo 'Not a valid day, try again'. PHP_EOL;
}