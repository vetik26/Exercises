<?php


class Account
{
    private string $name;
    private float $balance;

    public function __construct(string $name , float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function accountBalance()
    {
        return number_format($this->balance, '2', '.', ',');
    }


    public function deposit(int $amount )
    {
        return $this->balance += $amount;
    }
    public function withdrawal(int $amount)
    {
        return $this->balance -= $amount;
    }

    public static function transfer(Account $from, Account $to, int $howMuch)
    {
        $from->withdrawal($howMuch);
        $to->deposit($howMuch);
    }
}

$A =  new Account('A', 100.0);
$B =  new Account('B', 0.0);
$C =  new Account('C', 0.0);

Account::transfer($A, $B, 50);
Account::transfer($B, $C, 25);

echo "{$A->getName()}: {$A->accountBalance()}$" . PHP_EOL;
echo "{$B->getName()}: {$B->accountBalance()}$" . PHP_EOL;
echo "{$C->getName()}: {$C->accountBalance()}$" . PHP_EOL;

