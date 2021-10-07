<?php


class Person
{

    private string $name;
    private string $surname;
    private string $id;
    private string $text;

    public function __construct(string $name, string $surname, string $id, string $text)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->id = $id;
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
}