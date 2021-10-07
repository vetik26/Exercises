<?php



class BankAccount
{

    private string $name;
    private  $balance;

    public function __construct(string $name, float $balance)
    {

        $this->name = $name;
        $this->balance = $balance;
    }

    public function show_user_name_and_balance()
    {
        return "$this->name, $$this->balance" . PHP_EOL;
    }
}
$ben = new BankAccount('Benson', 17.25);
echo $ben->show_user_name_and_balance();