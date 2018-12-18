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
                $newUser = new User();

                if ($_POST['add']) {
                    $newUser->login = $_POST['login'];
                    $newUser->password = $_POST['password'];
                    $newUser->email = $_POST['email'];
                    $newUser->firstname = $_POST['firstname'];
                    $newUser->lastname = $_POST['lastname'];

                    $newUser->addUser();
                }
                break;

            // Changement des informations ( + suppression ? )
            case "updateUser":
                

                break;

            // Connexion d'un utilisateur
            case "login":

                $currentUser = new User;
                $currentUser->login = 'IV'; // get login
                $currentUser->password = 'RP7BLOa'; // get pass

                $currentUser = $login->loginUser();

                if ($currentUser->idusers) {
                    $_SESSION['idUser'] = $currentUser->idusers;
                    $_SESSION['firstName'] = $currentUser->firstname;
                    $_SESSION['lastName'] = $currentUser->lastname;
                }

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
