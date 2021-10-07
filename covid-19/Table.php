<?php

class Table
{
    private array $areas;
    private \LucidFrame\Console\ConsoleTable $table;

    public function __construct(array $areas,\LucidFrame\Console\ConsoleTable $table)
    {
        $this->areas = $areas;
        $this->table = $table;
    }

    public function printTable()
    {
        foreach ($this->areas as $key => $area)
        {
            if($key === 0)
            {
                $this->table
                    ->addHeader($area->getDate())
                    ->addHeader($area->getCountry())
                    ->addHeader($area->getWeek2())
                    ->addHeader($area->getTravel())
                    ->addHeader($area->getIsolation())
                    ->addHeader($area->getPersVakc1())
                    ->addHeader($area->getPersVakc2())
                    ->addHeader($area->getPersVakc3())
                    ->addHeader($area->getCitas1())
                    ->addHeader($area->getCitas2())
                    ->addHeader($area->getCitas3());
            }
            else
            {
                $this->table
                    ->addRow()
                    ->addColumn($area->getDate())
                    ->addColumn($area->getCountry())
                    ->addColumn($area->getWeek2())
                    ->addColumn($area->getTravel())
                    ->addColumn($area->getIsolation())
                    ->addColumn($area->getPersVakc1())
                    ->addColumn($area->getPersVakc2())
                    ->addColumn($area->getPersVakc3())
                    ->addColumn($area->getCitas1())
                    ->addColumn($area->getCitas2())
                    ->addColumn($area->getCitas3());
            }
        }
        $this->table->display();
    }
    public function ResetTable(array $a)
    {
        $this->areas = $a;
        $this->table = new \LucidFrame\Console\ConsoleTable();
    }

    public function PrintByCountry(array $input){
        $this->table
            ->addHeader('Date')
            ->addHeader('Country')
            ->addHeader('2 weeks')
            ->addHeader('Travel')
            ->addHeader('Isolation')
            ->addHeader('PersonVac')
            ->addHeader('PersonTest')
            ->addHeader('PersonTestAfter')
            ->addHeader('Other')
            ->addHeader('Other')
            ->addHeader('Other');
        $this->table
            ->addRow()
            ->addColumn($input[0]->getDate())
            ->addColumn($input[0]->getCountry())
            ->addColumn($input[0]->getWeek2())
            ->addColumn($input[0]->getTravel())
            ->addColumn($input[0]->getIsolation())
            ->addColumn($input[0]->getPersVakc1())
            ->addColumn($input[0]->getPersVakc2())
            ->addColumn($input[0]->getPersVakc3())
            ->addColumn($input[0]->getCitas1())
            ->addColumn($input[0]->getCitas2())
            ->addColumn($input[0]->getCitas3());

        $this->table->display();
    }

    /**
     * @return array
     */
    public function getAreas(): array
    {
        return $this->areas;
    }
}