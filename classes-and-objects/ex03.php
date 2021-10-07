<?php


class fuelGauge
{
    private int $amountOfFuel;

    public function __construct(int $amountOfFuel = 12)
    {
        $this->amountOfFuel = $amountOfFuel;
    }
    public function getFuel(): int
    {
        return $this->amountOfFuel;
    }
    public function incrementFuel(): int
    {
        return $this->amountOfFuel++;
    }

    public function decrementFuel(): int
    {
        return $this->amountOfFuel--;
    }
}

class Odometer
{
    private $distance = 0;
    private $mileage;
    private fuelGauge $amountOfFuel;

    public function __construct(int $mileage, fuelGauge $amountOfFuel )
    {
        $this->mileage = $mileage;
        $this->amountOfFuel = $amountOfFuel;
    }

    public function  getMileage()
    {
        return $this->mileage;
    }

    public function incrementMileage(): void
    {
        $this->distance++;
        if($this->mileage >= 999)
        {
            $this->mileage = 0;
        }else {
            $this->mileage++;
        }
        if($this->distance % 10 === 0)
        {
            $this->amountOfFuel->decrementFuel();
        }
    }


}

$fuel = new fuelGauge();


$odometer = new Odometer(0, $fuel);

while ($fuel->getFuel() > 0 )
{
    $odometer->incrementMileage();
    echo 'Mileage' . $odometer->getMileage() . PHP_EOL;
    echo 'Cars Fuel(L): ' . $fuel->getFuel() . PHP_EOL;
    echo '------' . PHP_EOL;
}
