<?php

require_once "src/Model/Domain/ConstantDeclaration.php";
require_once 'src/Model/Domain/ImportCSV.php';
require_once 'src/Model/Domain/DatabaseConnection.php';
require_once 'src/Model/Domain/Movie.php';
require_once 'src/Model/Domain/Genre.php';
require_once 'src/Model/Domain/MovieToGenre.php';
require_once 'src/Model/Domain/DataHandler.php';
require_once 'src/Model/Domain/Filter.php';
require_once 'src/Model/Domain/Schedule.php';
require_once '/var/www/test/src/View/Login/db.php';
require_once 'src/View/ConsoleInput.php';

ini_set('display_errors', true);
ini_set('error_reporting', E_ALL);


//function build_table($array)
//{
//// start table
//    $html = '<table class="table table-hover" >';
//// header row
//    $html .= '<tr>';
//    $html .= '<th style="text-align: center">' . "film" . '</th>';
//    $html .= '<th style="text-align: center">' . "hall" . '</th>';
//    $html .= '<th style="text-align: center">' . "date and time" . '</th>';
//    $html .= '</tr>';
//
//// data rows
//    foreach ($array as $key => $scheduleObject) {
//        $html .= '<tr>';
//        $html .= '<td>' . htmlspecialchars($scheduleObject->film) . '</td>';
//        $html .= '<td>' . htmlspecialchars($scheduleObject->hall) . '</td>';
//        $html .= '<td>' . htmlspecialchars($scheduleObject->date) . '</td>';
//        $html .= '</tr>';
//    }
//
//// finish table and return it
//
//    $html .= '</table>';
//    return $html;
//}
function validateUsername(string $username, $pdo) ////plm nu mere
{
    $err = '';
    $sql = "SELECT `pk`,`username` FROM `user` WHERE `username` = :username";

    if ($stmt = $pdo->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            print_r($stmt->fetch()); ////Afisez 0 ?????????????????????????????/
            // Check if username exists, if yes then verify password
            if ($stmt->rowCount() == 0) {
                $err = 'No account found with that username.';
                return false;
            }
            if ($row = $stmt->fetch()) {
                echo 'mama';
                $id   = $row['pk'];
                $sqll = "SELECT pk FROM usertype WHERE users_fk = :id";
                if ($stm = $pdo->prepare($sqll)) {

                    $stm->bindParam(':users_fk', $id, PDO::PARAM_INT);
                    if ($stm->execute()) {
                        if ($stm->rowCount() == 1) {
                            if ($r = $stm->fetch()) {
                                if ($row['type'] === 'admin')
                                    echo 'mama';
                                return true;
                            }
                        }

                    }
                }
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    return $err;
}

function adminOperations($pdo)
{
    $d       = new DataHandler();
    $console = new ConsoleInput();
    $import  = new Import();
    //Get admin data
    $email    = $console->getUsername();
    $password = $console->getPassword();
    //!!!!!!!!!!!!!!!!!You should check admin data

    $console->displayOperations();
    $query = $console->getQuery();
    $query = trim(preg_replace('/\s+/', '', $query));


    switch ($query) {
        case 'none':
            break;
        case 'importMovies':
            $csv = $import->importCSV('Movies.csv');
            $d->handleMovies($csv, $pdo);
            break;
        case 'importGenre':
            $csv = $import->importCSV('Genres.csv');
            $d->insertGenres($csv, $pdo);
            break;
        case 'importHalls':
            $csv = $import->importCSV('Halls.csv');
            $d->handleHalls($csv, $pdo);
            break;
        case 'schedulemovies':
            $d->scheduleMovies($pdo);
            break;

    }
//   print_r($d->selectSchedule($pdo));
//    echo build_table($d->selectSchedule($pdo));
}

$sapi = php_sapi_name();
if ($sapi === 'cli') {
    adminOperations($pdo);
}
if ($sapi !== 'cli') {
    require_once 'src/View/Login/homepage.phtml';
}

