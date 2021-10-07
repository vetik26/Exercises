<?php

class GunStore
{
    private array $guns;

    public function __construct(array $guns)
    {
        $this->guns = $guns;
    }

    public function getGuns(): array
    {
        return $this->guns;
    }

    public function printGuns()
    {
        foreach ($this->guns as $key => $gun)
        {
            echo $key. ': '. $gun->getWeapon() . PHP_EOL;
        }
    }
}