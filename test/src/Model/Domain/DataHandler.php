<?php

require_once 'Schedule.php';

class DataHandler
{
    public function insertGenres(array $dataArray, $pdo): void
    {
        foreach ($dataArray as $key => $value) {
            $pdo->exec("INSERT INTO genre(`name`) VALUES ({$pdo->quote($value['genre'])})");
        }
    }

    public function handleHalls(array $dataArray, $pdo): void
    {
        foreach ($dataArray as $key => $value) {
            $pdo->exec("INSERT INTO hall(`name`,`numberofseats`) VALUES ({$pdo->quote($value['name'])} ,{$pdo->quote($value['numberofseats'])})");
        }
    }

    public function handleMovies(array $dataArray, $pdo): void
    {
        foreach ($dataArray as $key => $value) {
            $pdo->exec("INSERT INTO film(`name`,`year`,`picture`) VALUES ({$pdo->quote($value['name'])} ,{$pdo->quote($value['year'])},{$pdo->quote($value['picture'])})");
            $genreArray = explode("|", $value['genre']);
            $hallArray  = explode('|', $value['halls']);
            foreach ($genreArray as $genre) {
                $pdo->exec("INSERT INTO movietogenre(`film_fk`,`genre_fk`) VALUES ({$pdo->quote($value['name'])},{$pdo->quote($genre)})");
            }
            foreach ($hallArray as $hall) {
                $pdo->exec("INSERT INTO movietohall(`film_fk`,`hall_fk`) VALUES ({$pdo->quote($value['name'])},{$pdo->quote($hall)})");
            }

        }
    }

    public function handleUser(string $name, string $email, $password, $pdo): void
    {
        $pdo->exec("INSERT INTO user(`username`,`email`,`password`) VALUES ({$pdo->quote($name)} ,{$pdo->quote($email)},{$pdo->quote($password)})");
    }

    public function scheduleMovies($pdo): void
    {
        $sql = "SELECT * FROM movietohall";
        foreach ($pdo->query($sql) as $key => $row) {
            print $row['film_fk'] . "\t";
            print $row['hall_fk'] . "\n";
            echo "date (dd/mm/yy hh:mm:ss) :";
            $date = fgets(STDIN);
            $pdo->exec("INSERT INTO schedule(`film_fk`,`hall_fk`,`date`) VALUES ({$pdo->quote($row['film_fk'])} ,{$pdo->quote($row['hall_fk'])},{$pdo->quote($date)})");
        }
    }

    public function paginateMovies($pdo)
    {
        $movies       = array();
        $perPage      = 5;
        $numberOfRows = $pdo->query('select count(*) from `schedule`')->fetchColumn();
        $pages        = ceil($numberOfRows / $perPage);
        $offset = 0;
        $sql          = "SELECT `name`, `year`, `picture` FROM `film` LIMIT 5 offset $offset";
        for ($i = 1; $i <= $pages; $i++) {
            foreach ($pdo->query($sql) as $key => $row) {
                $movies[$key]['name']    = $row['name'];
                $movies[$key]['year']    = $row['year'];
                $movies[$key]['picture'] = $row['picture'];
            }
            $offset += $perPage;
            echo $this->build_table($movies);
        }
    }

    public function build_table($array)
    {
// start table
        $html = '<table class="table table-hover" >';
// header row
        $html .= '<tr>';
        foreach ($array[0] as $key => $value) {
            $html .= '<th style="text-align: center">' . htmlspecialchars($key) . '</th>';
        }
        $html .= '</tr>';

// data rows

        foreach ($array as $key => $value) {
            $html .= '<tr>';
            foreach ($value as $key2 => $value2) {
                if ($key2 === 'picture') {
                    $html .= '<td>' . "<a href=\"booking.php\"> <img src= $value2 height=\"70\" width=\"52\" > </a>" . '</td>';
                } else
                    $html .= '<td>' . htmlspecialchars($value2) . '</td>';
            }
            $html .= '</tr>';
        }

// finish table and return it

        $html .= '</table>';
        return $html;
    }

    public function selectSchedule($pdo): array
    {
        $scheduled    = array();
        $perPage      = 5;
        $numberOfRows = $pdo->query('select count(*) from `schedule`')->fetchColumn();
        $pages        = ceil($numberOfRows / $perPage);
        $sql          = "SELECT `film_fk`, `hall_fk`, `date` FROM `schedule`";

        foreach ($pdo->query($sql) as $key => $row) {
            $schedule    = new Schedule($row['film_fk'], $row['hall_fk'], $row['date']);
            $scheduled[] = $schedule;
        }
        return $scheduled;

    }

}