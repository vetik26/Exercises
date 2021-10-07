<?php

class Sportist{
public $symbol;
public $location = 0;
public function __construct(string $symbol)
{
$this->symbol = $symbol;
}

private function getSportist()
    {
        return $this->symbol;
    }

private function move()
    {
        $this->location+=rand(1,2);
    }


}


class Game {

public $lanes;
public $sportists;
public $places = [];
public $laneLength = 10;
public $time = 0;

public function __construct($sportists, int $laneLength)
    {
        $this->laneLength = $laneLength;
        $this->sportists = $sportists;
    }

public function GameStart()
{
        if($this->isFinished())
         {
        $this->listPlaces();
        exit;
         }

$this->setLines();
$this->printLines();
$this->sportistsMove();
$this->time++;

}

private function setLines()
{
    foreach ($this->sportists as $key => $sportist)
        {
            $this->lanes[$key] = str_repeat('_', $this->laneLength - ($this->laneLength - $sportist->location))
            . $sportist->symbol . str_repeat('_', $this->laneLength - $sportist->location);
        }
}


private function printLines()
{
    foreach ($this->lanes as $lane)
    {
        echo $lane . PHP_EOL;
    }
}


private function sportistsMove()
{
    foreach ($this->sportists as $sportist)
    {
        if(!in_array($sportist, $this->places))
        {
            $sportist->move();
            if($sportist->location >= $this->laneLength)
            {
                    $sportist->location = $this->laneLength;
                array_push($this->places, $sportist);
                    $sportist->timeFinished = $this->time;
            }
        }
    }
}


private function isFinished(): bool
{
    foreach($this->sportists as $key => $sportist)
    {
        if(!in_array($sportist ,$this->places))
        {
            return false;
        }
    }
    return true;
}

private function listPlaces()
{
    $n = 1;
    foreach ($this->places as $key => $place)
    {
        if($place->timeFinished < @$this->places[$key +1 ]->timeFinished)
        {
            echo $n . " place: Sportsman NO." . $place->symbol . " ($place->timeFinished sec.)" . PHP_EOL;
            $n++;
        }
        else
        {
            echo $n . " place: Sportsman NO." . $place->symbol . " ($place->timeFinished sec.)" . PHP_EOL;
        }
    }
}
}


$sportists = [
new Sportist('!'),
new Sportist('@'),
new Sportist('#'),
new Sportist('$'),
new Sportist('%'),
new Sportist('/'),
new Sportist('&'),
new Sportist('?'),
new Sportist('0'),

];

$game = new Game($sportists, 20);
while(true){
system('clear');
$game->GameStart();
usleep(300000);
}