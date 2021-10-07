<?php


class Horse
{
    public $number;
    public $location = 0;

    public function __construct(string $number)
    {
        $this->number = $number;
    }

    private function getHorse()
    {
        return $this->number;
    }

    private function move()
    {
        $this->location += rand(1, 2);
    }


}


class Game
{

    public $lanes;
    public $horses;
    public $places = [];
    public $laneLength = 10;
    public $time = 0;

    public function __construct($horses, int $laneLength)
    {
        $this->laneLength = $laneLength;
        $this->horses = $horses;
    }

    public function GameStart()
    {
        if ($this->isFinished()) {
            $this->listPlaces();
            exit;
        }

        $this->setLines();
        $this->printLines();
        $this->horsesMove();
        $this->time++;

    }

    private function setLines()
    {
        foreach ($this->horses as $key => $horse) {
            $this->lanes[$key] = str_repeat('_', $this->laneLength - ($this->laneLength - $horse->location))
                . $horse->number . str_repeat('_', $this->laneLength - $horse->location);
        }
    }


    private function printLines()
    {
        foreach ($this->lanes as $lane) {
            echo $lane . PHP_EOL;
        }
    }


    private function horsesMove()
    {
        foreach ($this->horses as $horse)
        {
            if (!in_array($horse, $this->places))
            {

                $horse->move();
                if ($horse->location >= $this->laneLength)
                {
                    $horse->location = $this->laneLength;
                    array_push($this->places, $horse);
                    $horse->timeFinished = $this->time;
                }
            }
        }
    }


    private function isFinished(): bool
    {
        foreach ($this->horses as $key => $horse)
        {
            if (!in_array($horse, $this->places))
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
            if ($place->timeFinished < @$this->places[$key + 1]->timeFinished)
            {
                echo $n . " place: Horse NO." . $place->number . " ($place->timeFinished sec.)" . PHP_EOL;
                $n++;
            } else
            {
                echo $n . " place: Horse NO." . $place->number . " ($place->timeFinished sec.)" . PHP_EOL;
            }
        }
    }
}


$horses = [
    new Horse('1'),
    new Horse('2'),
    new Horse('3'),
    new Horse('4'),
    new Horse('5'),
    new Horse('6'),
    new Horse('7'),
    new Horse('8'),
    new Horse('9'),

];

$game = new Game($horses, 20);
while (true) {
    system('clear');
    $game->GameStart();
    usleep(300000);
}