<?php


$john = new stdClass();
$john->name = "vitaly";
$john->surname = "upene";
$john->age = 20;
$john->birth = "2000";

$jana = new stdClass();
$jana->name = "lena";
$jana->surname = "ziza";
$jana->age = 30;
$jana->birth = "1995";

$persons = [$john, $jana];

foreach ($persons as $person)
{
    echo "{$person->name}{$person->surname}{$person->age}{$person-> birth}" . PHP_EOL
    ;
}