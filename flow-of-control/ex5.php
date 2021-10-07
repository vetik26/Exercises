<?php


$word =   strtolower(readline('Enter a word: '));
$letters = str_split($word);

function letterToDigit(string $letter): string
{
    $keypad = [
        'abc' => '2',
        'def' => '3',
        'fhi' => '4',
        'jkl' => '5',
        'mno' => '6',
        'pqrs' => '7',
        'tuv' => '8',
        'wxyz' => '9',
    ];


    foreach ($keypad as $key => $value)
    {
        $position = strpos($key, $letter);
        if ($position!== false )
        {
            return $value . str_repeat($value, $position);
        }
    }
    return 'E';
}

$keypad = "";

foreach ($letters as $letter)
{
    $keypad .= letterToDigit($letter);
}
echo $keypad;




//
//    switch ($letter)
//    {
//        case in_array($letter, ['a', 'b', 'c']):
//            return '2';
//        case in_array($letter, ['d', 'e', 'f']):
//            return  '3';
//        case in_array($letter, ['f', 'h', 'i']):
//            return  '4';
//        case in_array($letter, ['j', 'k', 'l']):
//            return '5';
//        case in_array($letter, ['m', 'n', 'o']):
//            return '6';
//        case in_array($letter, ['p', 'q', 'r','s']):
//            return '7';
//        case in_array($letter, ['t', 'u', 'v']):
//            return '8';
//        case in_array($letter, ['w', 'x', 'y','z']):
//            return '9';
//    }
//}