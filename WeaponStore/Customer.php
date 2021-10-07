<?php

class Customer
{
    private array $licenses = [];
    private int $cash;

    public function __construct(array $licenses, int $cash)
    {
        $this->licenses = $licenses;
        $this->cash = $cash;
    }

    public function setCash(int $cash): void
    {
        $this->cash-= $cash;
    }
    public function getLicenses(): array
    {
        return $this->licenses;
    }
    public function getCash(): int
    {
        return $this->cash;
    }

}