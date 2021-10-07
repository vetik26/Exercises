<?php


class Date
{
    public $month;
    public $day;
    public $year;

    public function __construct($month,$day,$year)
    {
        $this -> month = $month;
        $this -> day = $day;
        $this -> year = $year;
    }

    public function DisplayDate()
    {
        if($this->month > 9)
        {
            if($this->day > 9)
            {
                 return "$this->month/$this->day/$this->year ";
            }
            return "$this->month/0$this->day/$this->year ";
        }
        if($this->day > 9)
        {
            return "0$this->month/$this->day/$this->year ";

        }
        return "0$this->month/0$this->day/$this->year ";
    }



}


$date = new Date (5,5,2000);
echo $date->DisplayDate();