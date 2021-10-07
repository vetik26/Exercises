<?php

class Shotgun extends Weapon
{
    public function __construct(string $name, int $price)
    {
        parent::__construct($name, $price);
        $this->license= 'Shotgun';
        $this->bulletSpeed = 2;
    }
}