<?php


class Point
{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x=$x;
        $this->y=$y;
    }
    public function getX(): int
    {
        return $this->x;
    }
    public function getY(): int
    {
        return $this->y;
    }

    public static function swapPoints(Point $p1, Point $p2)
    {
        $pointSwap = new Point(0,0);
        $pointSwap->x=$p1->x;
        $pointSwap->y=$p1->y;

        $p1->y=$p2->y;
        $p1->x=$p2->x;
        $p2->y=$pointSwap->y;
        $p2->x=$pointSwap->x;
    }
}


$p1 = new Point(7,5);
$p2 = new Point(-5,1);

Point::swapPoints($p1, $p2);

echo "({$p1->getX()}, {$p1->getY()})" . PHP_EOL;
echo "({$p2->getX()}, {$p2->getY()})" . PHP_EOL;
