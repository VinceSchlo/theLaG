<?php

require_once('vendor/thelag/QueryService.php');
require_once('vendor/thelag/RequestService.php');

class User extends RequestService
{
    public static $table_name = "users";
    public $pk_field_name = "idusers";
    public $idusers;
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;

    public function addUser($firstName, $lastName, $email, $pass, $login)
    {
        $query = "";
    }

    public function getUser($user)
    {
        $user = new User();

        $user->idusers = $id;

        $user->hydrate();
    }

    public function loginUser()
    {
        $query = "SELECT * FROM users WHERE login = '" . $this->login . "' AND password = '" . $this->password . "'";

        var_dump($query);

        $user = myFetchAssoc($query);

        // var_dump($user);

        var_dump($user);
    }
}