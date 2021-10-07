<?php

class Area
{

    private string $date;
    private string $country;
    private string $week2;
    private string $travel;
    private string $isolation;
    private string $persVakc1;
    private string $persVakc2;
    private string $persVakc3;
    private string $citas1;
    private string $citas2;
    private string $citas3;

    public function __construct(string $date, string $country, string $week2, string $travel,
                                string $isolation, string $persVakc1,string $persVakc2,
                                string $persVakc3, string $citas1, string $citas2, string $citas3)
    {
        $this->date = $date;
        $this->country = $country;
        $this->week2 = $week2;
        $this->travel = $travel;
        $this->isolation = $isolation;
        $this->persVakc1 = $persVakc1;
        $this->persVakc2 = $persVakc2;
        $this->persVakc3 = $persVakc3;
        $this->citas1 = $citas1;
        $this->citas2 = $citas2;
        $this->citas3 = $citas3;
    }


    public function getDate(): string
    {
       return strlen($this->date) > 10? substr($this->date,0,10).'...':$this->date;
    }
    public function getCountry(): string
    {
        return strlen($this->country) > 10? substr($this->country,0,10).'...':$this->country;
    }
    public function getWeek2(): string
    {
        return strlen($this->week2) > 10? substr($this->week2,0,10).'...':$this->week2;
    }
    public function getTravel(): string
    {
        return strlen($this->travel) > 10? substr($this->travel,0,10).'...':$this->travel;
    }
    public function getIsolation(): string
    {
        return strlen($this->isolation) > 10? substr($this->isolation,0,10).'...':$this->isolation;
    }
    public function getPersVakc1(): string
    {
        return strlen($this->persVakc1) > 10? substr($this->persVakc1,0,10).'...':$this->persVakc1;
    }
    public function getPersVakc2(): string
    {
        return strlen($this->persVakc2) > 10? substr($this->persVakc2,0,10).'...':$this->persVakc2;
    }
    public function getPersVakc3(): string
    {
        return strlen($this->persVakc3) > 10? substr($this->persVakc3,0,10).'...':$this->persVakc3;
    }
    public function getCitas1(): string
    {
        return strlen($this->citas1) > 10? substr($this->citas1,0,10).'...':$this->citas1;
    }
    public function getCitas2(): string
    {
        return strlen($this->citas2) > 5? substr($this->citas2,0,5).'...':$this->citas2;
    }
    public function getCitas3(): string
    {
        return strlen($this->citas3) > 5? substr($this->citas3,0,5).'...':$this->citas3;
    }
}