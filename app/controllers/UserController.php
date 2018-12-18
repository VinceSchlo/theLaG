<?php

require_once('vendor/thelag/AppController.php');
require_once('app/models/User.php');

class UserController extends AppController
{

    public function index()
    {
        $this->loadTwig();

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
                $currentUser->login = 'IV'; // get login
                $currentUser->password = 'RP7BLOa'; // get pass

                $response = $currentUser->loginUser();

                // Renvoi sur la page d'accueil
                echo $this->twig->render('index.html.twig', [
                    'session' => $_SESSION,
                    'response' => $response,
                ]);

                break;
        }
        
        echo $this->twig->render('index.html.twig', [
            'foo' => 'bar',
            'bar' => 'foo'
        ]);
    }
}
