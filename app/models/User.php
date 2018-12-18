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

    public function getUser($user)
    {
        $user = new User();

        $user->idusers = $id;

        $user->hydrate();
    }

    public function loginUser()
    {
        $query = "SELECT * FROM users WHERE login = '" . $this->login . "' AND password = '" . $this->password . "'";

        $result = myFetchAssoc($query);

        $user = new User();

        $user->idusers = $result['idusers'];
        $user->firstname = $result['firstname'];
        $user->lastname = $result['lastname'];

        return $user;
    }

    public function addUser(){
        $query = "INSERT INTO users (login, password, email, firstname, lastname ) VALUES ( $this->login, $this->password,  $this->email, $this->firstname, $this->lastname,)";

        myQuery($query);
    }
}