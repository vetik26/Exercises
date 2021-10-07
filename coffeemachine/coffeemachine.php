<?php


class Wallet
{
    public  $price;
    public  $qty;

    public function __construct(int $price, int $qty)
    {
        $this -> qty = $qty;
        $this -> price = $price;
    }
}

$wallets =
[
    new Wallet(1, 5),
    new Wallet(2,9),
    new Wallet(5, 7),
    new Wallet(10, 4),
    new Wallet(20, 4),
    new Wallet(50, 2)
];

class Products
{
    public $price;
    public $name;

    public function __construct(int $price, string $name)
    {
        $this -> price = $price;
        $this -> name = $name;
    }
}

$products =
    [
        new Products(10, 'Coffee'),
        new Products(12, 'Latte'),
        new Products(20, 'Mocha'),
        new Products(15, 'Tea'),
        new Products(18, 'Irish Coffee'),
    ];

echo PHP_EOL;
echo 'You have in your Wallet: ' . PHP_EOL;

foreach ($wallets as $key => $wallet)
{
    $price = $wallet -> price / 10;
    echo "($wallet->qty) coins of ({$price}$)  " . PHP_EOL;
}
echo PHP_EOL;
echo 'List of products: ' . PHP_EOL;

foreach ($products as $key => $product)
{
    $price = $product -> price / 10;
    echo " {$product->name} ({$price}$)" . PHP_EOL;
}

echo  PHP_EOL;
$selection = (integer) readLine('Enter the number of product: ');

if(!isset($products[$selection]))
{
    echo 'Product not found' . PHP_EOL;
    exit;
}

if($selection === array_search($products[$selection],$products))
{
    $drink = $products[$selection];
    echo $drink->name . " cost $drink->price" . PHP_EOL;
    echo 'Please insert the coins.' . PHP_EOL;
}


