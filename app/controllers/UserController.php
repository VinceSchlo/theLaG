<?php

require_once('vendor/thelag/AppController.php');

Class UserController extends AppController {

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
                break;
        }
        $this->loadTwig();
        echo $this->twig->render('index.html.twig', [
            'foo' => 'bar',
            'bar' => 'foo'
        ]);
    }
}
