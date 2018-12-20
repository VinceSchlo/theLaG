<?php

require_once('vendor/thelag/AppController.php');
require_once('app/models/User.php');

class UserController extends AppController
{

    public function index()
    {
        $this->loadTwig();

        switch ($this->action) {
            // Add new user
            case "addUser":

                if (!empty($_POST['add']))
                {
                    $newUser = new User();

                    foreach ($_POST as $key => $value)
                        $newUser->$key = $value;

                    $newUser->save();
                }
                break;

            // Changement des informations ( + suppression ? )
            case "updateUser":

                if (!empty($_POST['update']))
                {
                    $user = new User();

                    foreach ($_POST as $key => $value)
                        $user->$key = $value;

                    $user->save();
                }

                break;

            // Connexion d'un utilisateur
            case "login":

                $currentUser           = new User;
                $currentUser->login    = 'IVE';
                $currentUser->password = 'RP7BLOa';

                try {
                    $currentUser->loginUser();
                } catch (Exception $e) {
                    $response = 'Exception reçue : ' .  $e->getMessage() . "\n";
                }

                // Renvoi sur la page d'accueil
                echo $this->twig->render('index.html.twig', [
                    'session'  => isset($_SESSION) ? $_SESSION : null,
                    'response' => isset($response) ? $response : null,
                ]);

                break;
        }
    }
}
