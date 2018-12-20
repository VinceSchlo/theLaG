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
            case "user":
                echo $this->twig->render('user/user.html.twig', [

                ]);
                break;
            // Add new user
            case "register":
                if (!isset($_SESSION['idusers']))
                {
                    if (!empty($_POST))
                    {
                        $newUser  = new User();
                        $hasError = false;

                        if ($_POST['password'] != $_POST['password_confirm']) {
                            $hasError = true;
                            $reponse  = 'Les deux mots passes doivent être identiques';
                        }

                        foreach ($_POST as $key => $value)
                        {
                            if (empty($value)) {
                                $hasError = true;
                            } elseif(!in_array($key, ['password_confirm'])) {
                                $newUser->$key = $value;
                            }
                        }

                        if ($hasError === false)
                            $newUser->save();
                        else
                            $response = 'Veuillez remplir tous les champs';

                    }
                }
                echo $this->twig->render('register/register.html.twig', [
                    'response' => isset($response) ? $response : null,
                ]);
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
