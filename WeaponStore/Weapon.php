<?php

class Weapon
{
    protected string $name;
    protected int $price;
    protected string $license;
    protected int $bulletSpeed;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }


    public function getName(): string
    {
        return $this->name;
    }
    public function getPrice(): int
    {
        return $this->price;
    }
    public function getLicense(): string
    {
        return $this->license;
    }
    public function getBulletSpeed(): int
    {
        return $this->bulletSpeed;
    }
    public function getWeapon():string
    {
        return "$this->license: $this->name | $this->price $ | bullet speed:({$this->calculateBullet()})";
    }

    protected function calculateBullet(): int
    {
        return ($this->bulletSpeed * $this->bulletSpeed) / 2;
    }

}