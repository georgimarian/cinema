<?php

namespace Model\Booking;
class Booking
{
    protected $date;
    protected $seat;
    protected $user;
    protected $film;
    protected $hall;

    public function __construct($date, $seat, $user, $film, $hall)
    {
        $this->user = $user;
        $this->film = $film;
        $this->hall = $hall;
        $this->seat = $seat;
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
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
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * @return mixed
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
}