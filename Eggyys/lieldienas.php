<?php


function winningChance($percentage)
{
    if($percentage < 1 || $percentage > 100)
        {
           echo 'Invalid percentage';
        }
    $choose = [1 => 'Eggyy Egg',
               2 => 'Batman Egg',
               3 => 'Super Egg',
               4 => 'Egplesis Egg',
               5 => 'Daddy Egg'
                                 ];

    $pc =  $choose[round(mt_rand(1,5))];
    print_r ($choose);
    $user = strtolower((string)readline('Enter your choose: '));
    if($user < 0 || $user > 5)
    {
        echo 'This number is not found, try again' . PHP_EOL;
        exit;
    }
    echo "You choosed: Egg $user, PC choosed: $pc" . PHP_EOL;

    if(rand(1, 100) <= $percentage)
        {
            $result = "You won with  Egg $user" . PHP_EOL;
        }
        else
        {
            $result = "PC won with $pc" . PHP_EOL;
        }
    return $result;
}
echo winningChance(50).'!' ;

