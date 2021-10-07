<?php

use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\Writer;

class Insert{

    private string $filename;
    private array $persons;

    public function __construct(string $filename)
    {
        $this->persons = [];
        $this->filename = $filename;
        $stream = fopen($filename, 'r');
        $csv = Reader::createFromStream($stream);
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);

        $stmt = Statement::create();

        $records = $stmt->process($csv);



        foreach ($records as $key => $record) {
            $this->persons[$key] = new Person($record['name'], $record['surname'],$record['id'], $record['text']);
        }
        fclose($stream);

    }

    /**
     * @return array
     */
    public function getPersons(): array
    {
        return $this->persons;
    }


    public function Delete(int $key){
        array_splice($this->persons, $key-1, 1);

        $stream = fopen($this->filename, 'w');

        fputcsv($stream, ['name', 'surname', 'id', 'text'], ';');
        foreach ($this->persons as $item){
            fputcsv($stream, [$item->getName(), $item->getSurname(),$item->getId(), $item->getText()], ';');
        }
        fclose($stream);


    }

    public function addPerson(string $name,string $surname,string $id,string $text ){

        $this->persons[] = new Person($name, $surname, $id, $text);
        $stream = fopen($this->filename, 'w');

        fputcsv($stream, ['name', 'surname', 'id', 'text'], ';');
        foreach ($this->persons as $item){
            fputcsv($stream, [$item->getName(), $item->getSurname(),$item->getId(), $item->getText()], ';');
        }
        fclose($stream);
    }

    public function searchById(string $id){
        foreach ($this->persons as $person){
            if($person->getId() === $id){
                return $person;
            }
        }
        return 'Not Found';
    }


}