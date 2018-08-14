<?php

class MovieToGenre
{
    protected $movie;
    protected $genre;

    public function __construct(int $movie, int $genre)
    {
        $this->movie = $movie;
        $this->genre = $genre;
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
    public function getGenre(): int
    {
        return $this->genre;
    }

    /**
     * @param int $genre
     */
    public function setGenre(int $genre): void
    {
        $this->genre = $genre;
    }
}