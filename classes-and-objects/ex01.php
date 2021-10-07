<?php
 class Product
 {
    public $name;
    public $price;
    public $amount;

    public function __construct(string $name, float $price, int $amount)
    {
        $this -> price = $price;
        $this -> name = $name;
        $this -> amount = $amount;
    }
     public function printProduct()
     {
         return "{$this->name} {$this->price}$ {$this->amount} units";
     }

 }

 $products =[ new Product('Banana', 1.2, 13),
              new Product('Apple', 2.3, 10),
              new Product('Orange', 3.5, 40),
              new Product('Pineapple', 2.7, 11),
              new Product('Iphine', 1000, 3),
              new Product('Buuchgati', 10000000, 1),
                                                                        ];

 foreach ($products as $product)
 {
     echo $product->printProduct() . PHP_EOL;
 }
