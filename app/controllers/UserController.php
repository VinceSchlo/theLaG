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

                if ($_POST['add']) {
                    $newUser = new User();

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

                if ($_POST['update']) {
                    $user = new User();

                    $user->login = $_POST['login'];
                    $user->password = $_POST['password'];
                    $user->email = $_POST['email'];
                    $user->firstname = $_POST['firstname'];
                    $user->lastname = $_POST['lastname'];

                    $user->updateUser();
                }

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
