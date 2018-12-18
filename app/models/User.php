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

        if ($user != null){
            $_SESSION['idUser'] = $user['idusers'];
            $_SESSION['login'] = $user['login'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];

            return "sucess";
        } else {
            return "Mauvais login ou mot de passe";
        }

        // var_dump($_SESSION);
    }

    public function updateUser($id){
        $query = "SELECT * FROM users WHERE login = '" . $this->login . "' AND password = '" . $this->password . "'";
    }
}