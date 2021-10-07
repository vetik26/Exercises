<?php


class Car
{
    private $brand;
    private $engine;
    private $fuelType;

    public function __construct(string $brand, float $engine, string $fuelType)
    {
        $this->brand=$brand;
        $this->engine=$engine;
        $this->fuelType=$fuelType;
    }

    public function getBrand()
    {
        return $this->brand;
    }
    public function getEngine()
    {
        return $this->engine;
    }
    public function GetfuelType()
    {
        return $this->fuelType;
    }


}

class StoreItems
{
    private int $price;
    private Car $car;

    public function __construct(int $price, Car $car)
    {
    $this->price=$price;
    $this->car=$car;
    }

    public function getPrice()
    {
        return $this->price;
    }
    public function getCar()
    {
        return $this->car;
    }

    public function printCar()
    {
       return "Cars Brand: {$this->car->getBrand()}| Engine: {$this->car->getEngine()}L {$this->car->GetfuelType()}| Car cost: {$this->price}"   ;
    }
}


class Store
{
    private array $storeItems;

    public function __construct(array $storeItems )
    {
        $this->storeItems = $storeItems;
    }
    public function getStoreItems()
    {
        foreach ($this->storeItems as $storeItem)
        {
            echo $storeItem->printCar() . PHP_EOL;
        }
    }
    public function buyCar(int $id)
    {
        $choose = readline('Choose your car: ');
        array_splice($this->storeItems,$choose == $id, 1);
    }
}

$storeItems = [
    new StoreItems(1500 ,new Car('Audi', 2.5, 'petrol')),
    new StoreItems(1662 ,new Car('BEHA', 3.0, 'petrol')),
    new StoreItems(1654 ,new Car('Toyota', 2.3, 'diesel')),
    new StoreItems(2000 ,new Car('LAMBA', 6.0, 'petrol')),

];

$store = new Store($storeItems);
$store->getStoreItems();
$store->buyCar(1);

