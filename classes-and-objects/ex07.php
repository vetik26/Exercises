<?php

class Dog
{
    public $name;
    public $sex;
    public $dogsMother;
    public $dogsFather;

    public function __construct(string $name,string $sex, string $dogsMother ='unknown',string $dogsFather ='unknown')
    {
        $this -> name = $name;
        $this -> sex = $sex;
        $this -> dogsFather = $dogsFather;
        $this ->dogsMother = $dogsMother;
    }
    public static function checkDog(Dog $dogChild)
    {
        echo "$dogChild->name has mother $dogChild->dogsMother and father $dogChild->dogsFather " . PHP_EOL;
    }
    public static function checkMother(Dog $dogChild, Dog $dogChild1)
    {
        if($dogChild->dogsMother === $dogChild1->dogsMother)
        {
            echo 'They have the same mother' . PHP_EOL;
        }else{
            echo 'They do not';
        }
    }
}

$dogs = [ new Dog('Max', 'male', 'Lady', 'Rocky'),
          new Dog('Rocky', 'male','Molly','Sam'),
          new Dog('Sparky', 'male'),
          new Dog('Buster', 'male','Lady','Sparky'),
          new Dog('Sam', 'male'),
          new Dog('Lady', 'female'),
          new Dog('Molly', 'female'),
          new Dog('Coco', 'female','Molly','Buster'),

    ];

Dog::checkDog($dogs[1]);
Dog::checkMother($dogs[0],$dogs[3]);