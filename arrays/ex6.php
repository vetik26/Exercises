<?php


$listOfWords = ['majoklis', 'lidmasina', 'rehabilitacija', 'javascript', 'perpendiculars'];
$wordToGuess = $listOfWords[array_rand($listOfWords)];
$splitWord = str_split($wordToGuess);
$wordToDisplay = array_fill(0, count($splitWord), '_');
$lives = 10;
$missedLetter = [];

$display = function () use (&$wordToDisplay, &$lives, &$missedLetter)
{
    echo "-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
    echo 'Word: ';
    echo implode(' ',$wordToDisplay) . PHP_EOL;
    echo "Guesses: " . implode(' ', $missedLetter) . PHP_EOL;
    echo "Your lives: $lives" . PHP_EOL;
};
$display();



while($lives > 0)
{
    $input = readline('Enter a letter: ');

    if (strlen($input) > 1)
    {
        echo 'Only one letter please!' . PHP_EOL;
        continue;
    }
    if (is_numeric($input))
    {
        echo 'Only letters please!' . PHP_EOL;
        continue;
    }
    if (!in_array($input, $splitWord))
    {
        if (in_array($input, $missedLetter))
        {
            echo 'You already tried this one!' . PHP_EOL;
            continue;
        }

        $missedLetter[] = $input;
        $lives--;

        if ($lives <= 0)
        {
            $lives = false;
            echo "You lost! The word Was $wordToGuess!" . PHP_EOL;
        }
        $display();
        continue;
    }

    $positons = array_keys($splitWord, $input);

    foreach ($positons as $positon)
    {
        $wordToDisplay[$positon] = $input;
    }

    if (implode('', $wordToDisplay) === $wordToGuess)
    {
        echo "You won!" . PHP_EOL;
        echo "The word was '$wordToGuess'" . PHP_EOL;
        $gameIsON = false;
        exit;
    }
    $display();
}
