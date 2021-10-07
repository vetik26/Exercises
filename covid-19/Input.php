<?php


class Input
{
    private string $file;
    private array $areas = [];

    public function __construct(string $file)
    {
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $this->areas[] = new Area($data[0],$data[1],$data[2],$data[3],
                                            $data[4],$data[5],$data[6],$data[7],
                                                $data[8],$data[9],$data[10]);
            }
            fclose($handle);
        }
    }

    public function getAreas(): array
    {
        return $this->areas;
    }

    public function SearchByCountry(string $choose)
    {
        foreach ($this->getAreas() as $area)
        {
            /**
             * @var Area $area
             */
            if($area->getCountry() === $choose)
            {
                return [$area];
            }
        }
    }
}