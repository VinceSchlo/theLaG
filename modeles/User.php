<?php

require_once('../db.php');

class User
{
    protected $id;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $pass;
    protected $login;

    public function addUser($firstName, $lastName, $email, $pass, $login)
    {
        $query = "";
    }
}