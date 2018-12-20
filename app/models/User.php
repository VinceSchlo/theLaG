<?php

require_once('vendor/thelag/QueryService.php');
require_once('vendor/thelag/RequestService.php');

class User extends RequestService
{
    protected $table_name = "users";
    protected $pk_field_name = "idusers";
    public $idusers;
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;

    public function getUser($id)
    {
        $this->idusers = $id;

        $this->hydrate();
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
}