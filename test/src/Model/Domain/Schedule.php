<?php
/**
 * Created by PhpStorm.
 * User: georgianamarian
 * Date: 14.08.2018
 * Time: 13:41
 */
class Schedule
{
    public $film;
    public $hall;
    public $date;

    /**
     * Schedule constructor.
     * @param $film
     * @param $hall
     * @param $date
     */
    public function __construct($film, $hall, $date)
    {
        $this->film = $film;
        $this->hall = $hall;
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * @return mixed
     */
    public function getHall()
    {
        return $this->hall;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }



}