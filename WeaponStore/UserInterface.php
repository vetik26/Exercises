<?php

class UserInterface
{
    private GunStore $gunStore;
    private Customer $customer;

    public function __construct(GunStore $gunStore, Customer $customer)
         {
             $this->gunStore = $gunStore;
             $this->customer = $customer;
         }

    public function shop():void
    {
        echo "THE best Gun Store in the World!!!!" . PHP_EOL;
        echo 'Your money: ' . $this->customer->getCash() . PHP_EOL;
        $this->gunStore->printGuns();
        $choose = (int)readline('Choose your weapon: ');

        if (in_array($this->gunStore->getGuns()[$choose]->getLicense(), $this->customer->getLicenses()))
        {
            if($this->customer->getCash() >= $this->gunStore->getGuns()[$choose]->getPrice())
            {
                $this->customer->setCash($this->gunStore->getGuns()[$choose]->getPrice());
                echo 'You bought this weapon' . PHP_EOL;
            }
            else
            {
               echo  "Not enough money" . PHP_EOL;
            }
        }
        else
        {
            echo "Not the Same License" . PHP_EOL;
        }
    }
}