<?php

require_once('vendor/thelag/AppController.php');
require_once('app/models/User.php');
require_once('app/models/Session.php');

class RegisterController extends AppController
{

    public function index()
    {
        $this->loadTwig();

        switch ($this->action) {
            // Ajout d'un nouvel utlisateur
            case 'register':

                echo $this->twig->render('register/register.html.twig', [

                ]);

                break;

        }

    }
}
