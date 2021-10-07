<?php

class SniperRifle extends Weapon
{
    public function __construct(string $name, int $price)
    {
        parent::__construct($name, $price);
        $this->license= 'Sniper Rifle';
        $this->bulletSpeed = 2;
    }
}