<?php

require_once('vendor/thelag/AppController.php');
require_once('app/models/User.php');

class UserController extends AppController
{

    public function index()
    {
        switch ($this->action) {
            // Ajout d'un nouvel utlisateur
            case "addUser":
                break;
            // Changement des informations ( + suppression ? )
            case "updateUser":
                break;
            // Connexion d'un utilisateur
            case "login":

                $currentUser = new User;
                $currentUser->login = 'johrt0'; // get login
                $currentUser->password = '1CYM874N'; // get pass

                $currentUser->loginUser();

                break;
        }
        $this->loadTwig();
        echo $this->twig->render('index.html.twig', [
            'foo' => 'bar',
            'bar' => 'foo'
        ]);
    }
}
