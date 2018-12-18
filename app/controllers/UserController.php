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

                $login = new User;
                $login->login = 'johrt0'; // get login
                $login->password = '1CYM874N'; // get pass

                $currentUser = new User();
                $currentUser = $login->loginUser();

                if ($currentUser->idusers) {
                    $_SESSION['idUser'] = $currentUser->idusers;
                    $_SESSION['firstName'] = $currentUser->firstname;
                    $_SESSION['lastName'] = $currentUser->lastname;
                }

                echo $this->twig->render('index.html.twig', [
                    'session' => $_SESSION,
                    'bar' => 'foo'
                ]);

                break;
        }

        echo $this->twig->render('index.html.twig', [
            'foo' => 'bar',
            'bar' => 'foo'
        ]);
    }
}
