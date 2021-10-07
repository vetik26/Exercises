<?php


$wieght = 186;
$height = 73;
$BMI = ($wieght * 703) / ($height * $height);
    echo  (round($BMI, 1));
    if ($BMI > 25)
    {
        echo ' The person is considered overweight';
    }
    else if ($BMI < 18.5)
    {
    echo ' The person is considered underweight';
    }
    else
    {
        echo ' Persons weight is considered optimal';
    }