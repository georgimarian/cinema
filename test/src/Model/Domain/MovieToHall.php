<?php

class MovieToHall
{
    protected $movie;
    protected $hall;

    public function __construct(int $movie, int $hall)
    {
        $this->movie = $movie;
        $this->hall  = $hall;
    }

    public function getMovie(): int
    {
        return $this->movie;
    }

    /**
     * @param int $movie
     */
    public function setMovie(int $movie): void
    {
        $this->movie = $movie;
    }

    /**
     * @return int
     */
    public function getHall(): int
    {
        return $this->hall;
    }

    /**
     * @param int $hall
     */
    public function setHall(int $hall): void
    {
        $this->hall = $hall;
    }
}