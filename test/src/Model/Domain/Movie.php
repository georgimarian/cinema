<?php

class Movie
{
    protected $name;
    protected $year;
    protected $picture;

    public function __construct(string $name, $year, string $picture)
    {
        $this->name  = $name;
        $this->year  = $year;
        $this->picture = $picture;
    }

    /**
     * @return array
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }
}
