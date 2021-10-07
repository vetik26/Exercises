<?php

$slots = [];

$winning = [
        'X' => 80,
        '&' => 40,
        '%' => 20,
        '@' => 10
];

$rows = 3;
$columns = 4;

$elements = array_keys($winning);

for($r = 0;$r < $rows;$r++)
{
    for($c = 0;$c < $columns; $c++)
    {
        $slots[$r][$c] = $elements[array_rand($elements)];
    }
}

foreach ($slots as $row)
{
    foreach ($row as $element)
    {
    echo $element . ' ';
    }
echo PHP_EOL;
}



$conditions = [
    [
        [0,0] , [0,1] , [0,2] , [0,3]
    ],
    [
         [1,0] , [1,1] , [1,2] , [1,3]
    ],
    [
        [2,0] , [2,1] , [2,2] , [2,3]
    ],
    [
        [0,0] , [0,1] , [1,2] , [2,3]
    ],
    [
        [0,0] , [1,0] , [2,0]
    ],
    [
        [0,1] , [1,1] , [2,1]
    ],
    [
        [0,2] , [1,2] , [2,2]
    ],
    [
        [0,3] , [1,3] , [2,3]
    ]

];
$cef = 0;
$win = 0;
foreach ($conditions as $condition)
{
    $x = [];
    foreach ($condition as $position)
    {
        $row = $position[0];
        $column = $position[1];

        $x[] = $slots[$row][$column];
    }
    if (count(array_unique($x)) == 1)
    {
        $win += $winning[$x[0]];
        $cef = (count(array_unique($x)));
    }
}
echo 'You won ' .  $win * $cef . PHP_EOL;