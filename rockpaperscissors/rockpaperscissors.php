<?php



$choose = [1 => 'rock', 2 => 'paper', 3 => 'scissors'];

$pc =  $choose[ round(rand(1,3))];

$user = strtolower((string)readline('Enter your choose: '));



echo "You choosed: $user, PC choosed: $pc" . PHP_EOL;

if ($user === 'rock' && $pc === 'paper'){
    echo 'PC wins with paper'. PHP_EOL;
    exit;
}else if ($user === 'paper' && $pc === 'rock'){
    echo 'User wins with paper'. PHP_EOL;
    exit;
}else if ($user === 'scissors' && $pc === 'paper'){
    echo 'User wins with scissors'. PHP_EOL;
    exit;
}else if ($user === 'paper' && $pc === 'scissors'){
    echo 'PC wins with scissors'. PHP_EOL;
    exit;
}else if($user === 'rock' && $pc === 'scissors'){
    echo 'User wins with rock'. PHP_EOL;
    exit;
}else if ($user === 'scissors' && $pc === 'rock'){
    echo 'PC wins with rock'. PHP_EOL;
    exit;
}else if ($user === 'rock' && $pc === 'rock'){
    echo 'Its a tie'. PHP_EOL;
    exit;
}else if ($user === 'paper' && $pc === 'paper'){
    echo 'Its a tie'. PHP_EOL;
    exit;
}else if ($user === 'scissors' && $pc === 'scissors'){
    echo 'Its a tie'. PHP_EOL;
    exit;
}else{
    echo 'something wrong' . PHP_EOL;
}


