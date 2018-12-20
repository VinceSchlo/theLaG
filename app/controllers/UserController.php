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
            case "registration":

                if (!empty($_POST))
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
                    if(!empty($_POST))
                    {
                        if (!empty($_POST['login']) && !empty($_POST['password']))
                        {
                            $currentUser           = new User;
                            $currentUser->login    = $_POST['login'];
                            $currentUser->password = $_POST['password'];

                            try {
                                $currentUser->loginUser();
                                header('Location: index.php');
                                exit;
                            } catch (Exception $e) {
                                $response = $e->getMessage();
                            }
                        } else
                            $response = 'Veuillez remplir tous les champs';
                    }

                    echo $this->twig->render('login/login.html.twig', [
                        'response' => isset($response) ? $response : null,
                    ]);
                }
                else
                {
                    header('Location: index.php');
                    exit;
                }

                break;
            case 'disconnect':
                if (isset($_SESSION['idusers']))
                    session_destroy();
                    header('Location: index.php');
                    exit;
                break;
        }
    }
}
