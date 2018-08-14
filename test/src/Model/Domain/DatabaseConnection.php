<?php

require_once  "/var/www/test/src/Model/Domain/ConstantDeclaration.php";


class DatabaseConnection
{
    public function getPDOConnection()
    {

        $pdo = null;
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=cinemacity", DATABASE_USERNAME, DATABASE_PASSWORD);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $pdo;
    }

}




