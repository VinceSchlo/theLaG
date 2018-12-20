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
                break;
            } else {
                http_response_code(404);
            }
        }
    }
}