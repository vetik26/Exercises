<?php

namespace App;


use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\TabularDataReader;

class Info
{
    private string $url;
    private Reader $csvReader;

    public function __construct(string $url)
    {
        $this->url = $url;
        $this->csvReader = Reader::createFromString(file_get_contents($url), 'r');
        $this->csvReader->setHeaderOffset(0);
        $this->csvReader->setDelimiter(';');
    }
    public function getRecords(): TabularDataReader
    {
        return Statement::create()->process($this->csvReader);
    }
}
