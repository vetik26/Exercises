<?php


$board = [[" "," "," "],
          [" "," "," "],
          [" "," "," "]];

function displayBoard (array $board)
{
    echo  " {$board[0][0]} | {$board[0][1]} | {$board[0][2]} " . PHP_EOL;
    echo  "---+---+---" . PHP_EOL;
    echo  " {$board[1][0]} | {$board[1][1]} | {$board[1][2]} ". PHP_EOL;
    echo  "---+---+---" . PHP_EOL;
    echo  " {$board[2][0]} | {$board[2][1]} | {$board[2][2]} ". PHP_EOL;
}

displayBoard($board);

$gameIsOn = true;
$turn = 1;

while ($gameIsOn)
{
    if ($turn % 2 == 0)
    {
        $o = explode(" ", readline("'O', choose your location (Row, Column): "));

        if ($board[$o[0]][$o[1]] !== " ")
        {
            echo 'This slot is taken' . PHP_EOL;
            continue;
        }
        else
        {
            $board[$o[0]][$o[1]] = 'O';
        }
    }
    else
    {
        $x = explode(" ", readline("'X', choose your location (Row, Column): "));

        if ($board[$x[0]][$x[1]] !== " "){
            echo 'This slot is taken' . PHP_EOL;
            continue;
        }
        else
        {
            $board[$x[0]][$x[1]] = 'X';
        }
    }
    displayBoard($board);

    for ($i = 0; $i < 3; $i++)
    {
        if ($board[$i][0] == 'X' && $board[$i][1] == 'X' && $board[$i][2] == 'X')
        {
            echo "The winner is 'X' " . PHP_EOL;
            exit;
        }
        elseif ($board[$i][0] == 'O' && $board[$i][1] == 'O' && $board[$i][2] == 'O')
        {
            echo "The winner is 'O' " . PHP_EOL;
            exit;
        }
    }

    if ($board[0][0] == 'X' && $board[1][1] == 'X' && $board[2][2] == 'X')
    {
        echo "The winner is 'X' " . PHP_EOL;
        exit;
    }
    elseif ($board[0][0] == 'O' && $board[1][1] == 'O' && $board[2][2] == 'O')
    {
        echo "The winner is 'O' " . PHP_EOL;
        exit;
    }

    if ($board[0][2] == 'X' && $board[1][1] == 'X' && $board[2][2] == 'X')
    {
        echo "The winner is 'X' " . PHP_EOL;
        exit;
    }
    elseif ($board[0][2] == 'O' && $board[1][1] == 'O' && $board[2][0] == 'O')
    {
        echo "The winner is 'O' " . PHP_EOL;
        exit;
    }

    if ($turn == 9)
    {
        $gameIsOn =false;
        echo "It'a tie, good game." . PHP_EOL;
    }

    $turn++;
}


