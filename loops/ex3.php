<?php


$firstWord = readline('Enter first word: ');
$secondWord = readline('Enter second word: ');

$firstWordLength = strlen($firstWord);
$secondWordLength = strlen($secondWord);
$bothWordLength = $firstWordLength + $secondWordLength;
$numberOfDots = 30 - $bothWordLength;
$periods = 0;


echo $firstWord;
for($i = 0; $i < $numberOfDots; $i++)
{
    echo '.' ;

}
echo $secondWord . PHP_EOL ;

