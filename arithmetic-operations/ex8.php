<?php

class Employee {
    public  $id;
    public  $basePay;
    public  $hours;
    public function __construct($id, $basePay, $hours)
    {
        $this ->basePay= $basePay;
        $this ->hours=$hours;
        $this ->id=$id;
    }
}

$employees = [
    new Employee(1, 7.5 , 35),
    new Employee(2, 8.2 , 47),
    new Employee(3, 10 , 73),
    ];


foreach ($employees as $employee) {
    switch (true) {
        case $employee->hours > 60 || $employee->basePay < 8:
            echo 'Error' . PHP_EOL;
            break;
        case $employee ->hours > 40:
            echo ($employee->basePay * 40) + ($employee->hours - 40) * ($employee->basePay * 1.5) . PHP_EOL;
            break;
        default:
        echo $employee->basePay * $employee->hours . PHP_EOL;
            break;
    }
}