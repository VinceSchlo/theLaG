<?php

require_once('vendor/thelag/AppController.php');
require_once('app/models/User.php');
require_once('app/models/Session.php');

class LoginController extends AppController
{

    public function index()
    {
        $this->loadTwig();

        switch ($this->action) {
            // Ajout d'un nouvel utlisateur
            case 'login':

                echo $this->twig->render('login/login.html.twig', [

                ]);

                break;

        }

    }
}
