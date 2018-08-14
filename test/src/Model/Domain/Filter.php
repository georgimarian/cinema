<?php

class Filter
{
    public function filterOnGenre(string $genre, array $movies)
    {

    }

    public function filterOnYear($year, array $movies)
    {

    }

    public function filterOnDate($date, array $movies)
    {

    }

    /**
     * Takes movies from database and selects only the ones having the corresponding year
     * @param $pdo
     * @param $year
     * @param array $movies
     * @return array
     */
    public function sortOnYear($pdo, string $direction): array
    {
        $movies    = array();
        $direction = $this->sortDirection($direction);
        $sql       = "SELECT `name`, `year`, `picture` FROM `film` ORDER BY `year` $direction";
        foreach ($pdo->query($sql) as $key => $row) {
            $movies[$key]['name']    = $row['name'];
            $movies[$key]['year']    = $row['year'];
            $movies[$key]['picture'] = $row['picture'];
        }
        return $movies;
    }

    public function sortDirection($direction): string
    {
        if ($direction === 'asc')
            return 'ASC';
        return 'DESC';
    }

}