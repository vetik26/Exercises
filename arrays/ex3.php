<?php



$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

//echo "Enter the value to search for: ";

$arrlength = count($numbers);
for($i = 0; $i < $arrlength; $i++)
{
    $amount = (int) readline("Enter the value to search for: ");
    if (in_array($amount, $numbers))
    {
        echo 'You found this value' . PHP_EOL;
    }
    else
    {
        echo "You didn't found this value" . PHP_EOL;

    }

//    echo $numbers[$i] . PHP_EOL;
}



//todo check if an array contains a value user entered