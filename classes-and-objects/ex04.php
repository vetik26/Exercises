<?php


class Movie
{
    public $title;
    public $studio;
    public $rating;

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title=$title;
        $this->rating=$rating;
        $this->studio=$studio;
    }

    public static function GetPG(array $movies): array
    {
        $returnArray = [];

        foreach ($movies as $movie)
        {
            if($movie->rating === 'PG')
            {
                array_push($returnArray, $movie);
            }
        }
        return $returnArray;
    }
}

$movies = [ new Movie('Spider Man', 'Columbia Pictures', 'PG'),
            new Movie('Bobby Man', 'Universal Pictures', 'PG13'),
            new Movie('Batman', 'DC', 'PG'),
            new Movie('Super Man', 'DC', 'PG13'),
            new Movie('Iron Man', 'Marvel', 'PG'),
            new Movie('Hulk', 'Marvel', 'PG'),

];

$pgMovies = Movie::GetPG($movies);

foreach($pgMovies as $pgMovie){
    echo $pgMovie->title . PHP_EOL;
}