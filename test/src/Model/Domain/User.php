<?php


require_once 'UserInterface.php';

class User implements UserInterface
{
    protected $username;
    protected $emailAddress;
    protected $password;

    public function __construct(string $username, string $emailAddress, $password)
    {
        $this->username = $username;
        $this->password = $password;

        $this->emailAddress = $emailAddress;
    }

    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    public function getUsername(): string
    {
        return $this->username;
    }


    public static function validateEmail(string $emailAddress)
    {
        return preg_match("/[a-zA-Z0-9_.]+@[a-zA-Z0-9]+.[a-zA-Z]+/", $emailAddress);
    }
}



