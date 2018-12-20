<?php

require_once('vendor/thelag/AppController.php');
require_once('app/models/Availability.php');

class AvailabilityController extends AppController
{
    public function index()
    {
        $this->loadTwig();

        switch ($this->action)
        {
            case 'availability':
                if (!empty($_GET['id']))
                {
                    $contentId = $_GET['id'];
                    $availability   = new Availability();
                    $availability->getAvailability($contentId);

                    echo $this->twig->render('index.html.twig', [
                        'availability'  => $availability,
                    ]);
                } else {
                    http_response_code(404);
                }
                break;

            case 'addAvailability':
                if (!empty($_POST['add']))
                {
                    $newAvailability = new Availability();
                    $newAvailability->users_idusers = 2;

                    foreach ($_POST as $key => $value)
                        $newAvailability->$key = $value;

                    $newAvailability->save();
                }
                break;

            case 'updateAvailability':
                
                break;
        }
    }
}