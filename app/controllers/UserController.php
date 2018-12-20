<?php

require_once('vendor/thelag/AppController.php');
require_once('app/models/User.php');

class UserController extends AppController
{

    public function index()
    {
        $this->loadTwig();

        switch ($this->action)
        {
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
                if (isset($_SESSION['idusers']))
                {
                    $user = new User();

                    foreach ($_POST as $key => $value)
                        $user->$key = $value;

                    $user->save();
                }

                break;

            // Connexion d'un utilisateur
            case "login":
                if (!isset($_SESSION['idusers']))
                {
                    if(isset($_POST))
                    {
                        $currentUser           = new User;
                        $currentUser->login    = 'IVE';
                        $currentUser->password = 'RP7BLOa';

                        try {
                            $currentUser->loginUser();
                        } catch (Exception $e) {
                            $response = 'Exception reçue : ' .  $e->getMessage() . "\n";
                        }
                    }
                    else
                        $response = 'Veuillez completer les champs';

                    echo $this->twig->render('login.html.twig', [
                        'response' => isset($response) ? $response : null,
                    ]);
                }

                break;
            case 'disconnect':
                if (isset($_SESSION['idusers']))
                    session_destroy();
                break;
        }

        echo $this->twig->render('home/home.html.twig', [
            'foo' => 'bar',
            'bar' => 'foo'
        ]);
    }
}
