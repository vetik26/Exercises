<?php

require_once 'Customer.php';
require_once 'Weapon.php';
require_once 'Shotgun.php';
require_once 'SniperRifle.php';
require_once 'GunStore.php';
require_once 'UserInterface.php';

$customer = new Customer(['Shotgun','SniperRifle'], 50000 );

$weapons = [new SniperRifle('AWP', 2570),
            new Shotgun('Spas', 1234),
            new SniperRifle('M120', 4444),
            new Shotgun('Sas', 2000)];

$gunStore = new GunStore($weapons);

$interface = new UserInterface($gunStore, $customer);

while(true)
{
    system('clear');
    $interface->shop();
    readline('Continue? Press Enter');
}
