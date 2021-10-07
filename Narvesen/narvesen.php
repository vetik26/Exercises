<?php

    class Products {

        public  $name;
        public  $price;
        public  $qty;

        public function __construct($name, $price, $qty)
        {
            $this -> qty = $qty;
            $this -> price = $price;
            $this -> name = $name;

        }
    }

    $products = [
    new Products('tea', 10 , 3),
    new Products('coffee', 13 , 5),
    new Products('sandwich', 17 , 3),
    new Products('croissant', 10, 7),
    new Products('snickers', 11, 13),
    new Products('latte', 12, 4 ),
    new Products('burger', 15, 8 ),
    new Products('cigarettes', 30, 20)
];


foreach ($products as $key => $product)
{
    $price = $product -> price / 10;
    echo " {$product->name} ({$price}$) [{$product->qty}]" . PHP_EOL;
}

$selection = (int) readLine('Enter selection of product: ');

if(!isset($products[$selection]))
{
    echo 'Product not found' . PHP_EOL;
    exit;
}

$qty = (int) readline("Enter amount: ");

if($qty > $products[$selection]-> qty)
{
    echo 'Too many products selected' . PHP_EOL;
    exit;
}

$selectedProduct = clone $products[$selection];
$selectedProduct->qty = $qty;
$cart[] = $selectedProduct;

$products[$selection]->qty-=$qty;

$total = 0;
foreach ($cart as $product)
{
    $total += $product -> price * $product -> qty;
}

echo $total / 10 . '$' . PHP_EOL;