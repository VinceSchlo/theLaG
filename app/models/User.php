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

    public function getUser($id)
    {
        $user = new User();

        $user->idusers = $id;

        $user->hydrate();
    }

    public function loginUser()
    {
        $query = "SELECT * FROM users WHERE login = '" . $this->login . "' AND password = '" . $this->password . "'";

        $result = myFetchAssoc($query);

        if ($result != null)
        {
            foreach ($result as $key => $value)
                $_SESSION[$key] = $value;

            return 'Succès';
        }
        else
            throw new Exception('Mauvais login ou mot de passe');

    }

    public function addUser(){
        $query = "INSERT INTO users (login, password, email, firstname, lastname ) 
                    VALUES ( $this->login, $this->password,  $this->email, $this->firstname, $this->lastname)";

        myQuery($query);
    }

    public function updateUser($id){
        $query = "UPDATE table 
                    SET login = $this->login, 
                        password = $this->password, 
                        email = $this->email, 
                        firstname = $this->firstname, 
                        lastname = $this->lastname
                        WHERE idusers = $this->idusers";
        
        myQuery($query);
    }
}