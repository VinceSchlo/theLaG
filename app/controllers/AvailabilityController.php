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
                    $contentId    = $_GET['id'];
                    $availability = new Availability();
                    $availability->getAvailability($contentId);

                    echo $this->twig->render('booking.html.twig', [ // ??? is it not booking/booking.html.twig ????
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
                    
                    $newAvailability->users_idusers = $_SESSION['idusers'];
                    $newAvailability->users_idusers = 2; //TODO: delete

                    foreach ($_POST as $key => $value)
                        $newAvailability->$key = $value;

                    $newAvailability->save();
                    header('Location: index.php?action=availabilities');
                }

                echo $this->twig->render('availabilities/addAvailability.html.twig', [
                    'nowDate' => getdate(),
                    'days' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31],
                    'months' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                    'years' => [2018, 2019, 2020],
                    'hours' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23]
                ]);
                break;

            case 'updateAvailability':

                break;
        }
    }
}
