<?php


class SavingsAccount
{
    private int $rate;
    private int $balance;

    public function __construct(int $rate, int $balance)
    {
        $this->rate = $rate;
        $this->balance = $balance;
    }

    public function getBalance()
    {
       return $this->balance;
    }

    public function setBalance($newBalance)
    {
        $this->balance = $newBalance;
    }

    public function withdrawal($amount)
    {
        $this->balance -= $amount;
    }

    public function deposit($amount)
    {
        $this->balance += $amount;
    }

    public function monthInterests()
    {
        $this->balance = $this->balance +($this->balance * ($this->rate / 12));
    }
}

$balance = readline('How much money is in the account?: ');
$rate = readline('Enter the annual interest rate: ');
$months = readline('How long has the account been opened?: ');

$totalDeposits = 0;
$totalWithdraws = 0;
$earn = 0;

$savingsAccount = new SavingsAccount($balance, $rate);

for($i = 1; $i <= $months; $i++){

    $deposits = readline("Enter amount deposited for month $i: ");
    $withdraws = readline("Enter amount withdrawn for month $i: ");

    $totalDeposits+=$deposits;
    $totalWithdraws+=$withdraws;

    $savingsAccount->withdrawal($withdraws);
    $savingsAccount->deposit($deposits);

    $oldBalance =  $savingsAccount->getBalance();
    $savingsAccount->monthInterests();
    $earn+=($savingsAccount->getBalance() - $oldBalance);


}

$totalDeposits = number_format($totalDeposits, 2, ".", ",") . "$";
$totalWithdraws = number_format($totalWithdraws, 2, ".", ",") . "$";
$interestEarned = number_format($earn, 2 ,'.', ',') . "$";
$savingsMoney =  number_format($savingsAccount->getBalance(), 2 ,'.', ',') . "$";

echo "Total deposited: $totalDeposits" . PHP_EOL;
echo "Total withdrawn: $totalWithdraws" . PHP_EOL;

echo "Interest earned: " . $interestEarned . PHP_EOL;
echo "Ending balance: " . $savingsMoney . PHP_EOL;
