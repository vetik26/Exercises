<?php
class Gun {

    public $name;
    public $price;
    public $license;

    public function __construct($name, $price, $license)
    {
        $this->name = $name;
        $this->price = $price;
        $this-> license = $license;

    }

}

$weapons = [

    new Gun('Ak-47', 300, 'rifle'),
    new Gun('Bizon', 200, 'tt'),
    new Gun('Deagle', 100, 'pistol'),

];

$person = new stdClass();
$person -> name= 'John';
$person -> price= 1000;
$person -> licenses= ['tt'];

//$pistol = new stdClass();
//$pistol -> name = 'Pistol';
//$pistol -> price = 200;
//$pistol -> license = 'P';
//
//$shotgun = new stdClass();
//$shotgun -> name = 'Shotgun';
//$shotgun -> price = 300;
//$shotgun -> license = 'H';
//
//$rifle = new stdClass();
//$rifle -> name = 'Rifle';
//$rifle -> price = 250;
//$rifle -> license = 'H';




foreach ($weapons as $key => $weapon){
    echo "{$key} | {$weapon->name} ({$weapon -> price}$) [{$weapon->license}]" . PHP_EOL;
}
$selection = (int) readLine('Enter selection: ');

if (!isset($weapons[$selection]))
{
echo 'INVALID SELECTION';
exit;
}

$selectedWeapon = $weapons[$selection];

if (!in_array($selectedWeapon->license, $person->licenses) && $person->price >= $selectedWeapon->price)
{
    echo 'Person cannot buy this weapon';
    exit;
}
echo "Person can purchase ($selectedWeapon->name)";

