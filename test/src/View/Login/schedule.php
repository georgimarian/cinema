<?php
require_once '/var/www/test/src/Model/Domain/DataHandler.php';
require_once 'db.php';

function build_table($array, $pdo)
{
// start table
    $html = '<table class="table table-hover" >';
// header row
    $html .= '<tr>';
    foreach ($array[0] as $key => $value) {
        $html .= '<th style="text-align: center">' . htmlspecialchars($key) . '</th>';
    }
    $html .= '</tr>';

    $perPage      = 5;
    $numberOfRows = $pdo->query('select count(*) from `schedule`')->fetchColumn();
    $pages        = ceil($numberOfRows / $perPage);
// data rows
    for ($i = 1; $i < $pages; $i++) {
        foreach ($array as $key => $value) {
            $html .= '<tr>';
            foreach ($value as $key2 => $value2) {
                if ($key2 === 'picture') {
                    $html .= '<td>' . "<a href=\"booking.php\"> <img src= $value2 height=\"62\" width=\"52\" > </a>" . '</td>';
                } else
                    $html .= '<td>' . htmlspecialchars($value2) . '</td>';
            }
            $html .= '</tr>';
        }
    }
// finish table and return it

    $html .= '</table>';
    return $html;
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cinema</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
            text-align: center;
            background-image: url("https://www.verdict.co.uk/wp-content/uploads/2017/10/shutterstock_384996514.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100%;
            background-size: cover;
            background-position: center;
        }

        table {
            background-color: #ffcccc;
            border: 1px solid black;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            position: fixed;
            top: 0;
            width: 100%;
        }

        li {
            float: left;
            border-right: 1px solid #bbb;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }

        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            color: #ffb3b3;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .pagination {
            display: inline-block;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
            margin: 0 4px;
            background-color: lightpink;
        }

        .pagination a.active {
            background-color: #ffb3b3;
            color: white;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }

        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="page-header">
    <div class="topnav">
        <ul>
            <li><a href="/src/View/Login/homepage.phtml">Homepage</a></li>
            <li><a href="/src/View/Login/schedule.php">Schedule</a></li>
            <li><a href="/src/View/Login/login.php">Log In</a></li>
        </ul>
    </div>
    <h1 style="color:#b30000;"> Welcome to our movie booking site!</h1>
</div>


<p1><?php $d = new DataHandler();
    echo build_table($d->selectSchedule($pdo), $pdo); ?></p1>
</div>
<div class="center">
    <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#">&raquo;</a>
    </div>
</div>
</body>
</html>