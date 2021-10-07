<?php


class Person {

    public $name;
    public $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

}

$persons = [

    new Person('John', 19),
    new Person('Jane', 121),
    new Person('Johnn', 11),

];



//$john = new stdClass();
//$john->name ="vitaly";
//$john->age =17;
//
//
//$jane = new stdClass();
//$jane->name ="lean";
//$jane->age =25;
//
//$persons = [$john, $jane];

function isEighteen(Person $person): bool
{
    return $person->age>=18;
}

foreach ($persons as $person) {
    if (isEighteen($person)) {
        echo "{$person->name} is an adult.";
    } else {
        echo "{$person->name} is not an adult.";
}
}
