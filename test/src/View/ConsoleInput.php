<?php

require_once '/var/www/test/src/Model/Domain/User.php';

class ConsoleInput
{


    public function getUsername(): string
    {
        $db  = new DatabaseConnection();
        $pdo = $db->getPDOConnection();
        echo "Welcome to the cinema admin section, please enter your admin username:" . PHP_EOL;
        $username = fgets(STDIN);
//        while(!validateUsername($username,$pdo)) {
//            echo 'Username not found! Enter it again:' . PHP_EOL;
//            $username = fgets(STDIN);
//        }
        return $username;
    }


    public function getPassword(): string
    {
        echo 'Password: ';
        $pwd = fgets(STDIN);
        while(strlen($pwd) < 6) {
            echo 'Wrong password Password must contain at least 6 characters:' . PHP_EOL;
            $pwd = fgets(STDIN);
        }
        return md5($pwd);
    }


    public function displayOperations()
    {
        echo 'Your options are:' . PHP_EOL;
        $operations = array("import Movies", 'import Genre', 'import Halls', 'schedule movies', 'none');
        foreach ($operations as $operation) {
            echo $operation . PHP_EOL;

        }
    }

    public function getQuery(): string
    {
        echo 'Your query: ';
        return fgets(STDIN);
    }

    public function warnIncorrectQuery(): void
    {
        echo "Your query is incorrect!" . PHP_EOL;
    }


}

