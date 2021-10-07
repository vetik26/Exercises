<?php

$number = rand(1 , 100);
$guess = (int) readline('Enter the number: ');
switch (true){
    case $number === $guess:
        echo 'You guessed it!';
        break;
    case $guess > $number:
        echo "Sorry, you are too high. I was thinking of $number";
        break;
    case $guess < $number:
        echo "Sorry, you are too low. I was thinking of $number";
        break;
}