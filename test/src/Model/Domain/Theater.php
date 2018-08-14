<?php

namespace Model\Cinema;
class Theater
{
    protected $name;
    protected $numberOfSeats;

    public function __construct(string $name, int $numberOfSeats)
    {
        $this->name          = $name;
        $this->numberOfSeats = $numberOfSeats;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getNumberOfSeats()
    {
        return $this->numberOfSeats;
    }
}