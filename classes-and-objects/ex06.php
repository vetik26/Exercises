<?php


$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;


class EnergyDrunk
{

    public static function calculate_energy_drinkers(int $numberSurveyed, float $purchased_energy_drinks)
    {
        return $numberSurveyed * $purchased_energy_drinks;
    }

    public static function calculate_prefer_citrus(int $numberSurveyed,float $purchased_energy_drinks, float $prefer_citrus_drinks)
    {
        return round((EnergyDrunk::calculate_energy_drinkers($numberSurveyed, $purchased_energy_drinks)* $prefer_citrus_drinks),0) . PHP_EOL;
    }

}

echo EnergyDrunk::calculate_prefer_citrus($surveyed, $purchased_energy_drinks,$prefer_citrus_drinks);
