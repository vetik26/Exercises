<?php

require_once 'Area.php';
require_once 'Input.php';
require_once 'ConsoleTable.php';
require_once 'Table.php';



$input = new Input('db.csv');
$console = new \LucidFrame\Console\ConsoleTable();
$table = new Table($input->getAreas(),$console);

$table->printTable();

$choose = readline('Enter your Country: ');

$table->ResetTable($input->SearchByCountry($choose));

$table->PrintByCountry($input->SearchByCountry($choose));


