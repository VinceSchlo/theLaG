<?php

require_once('vendor/thelag/AppController.php');
require_once('app/models/User.php');
require_once('app/models/Availability.php');
require_once('app/models/Session.php');

class BookingController extends AppController
{

    public function index()
    {
        $this->loadTwig();

        switch ($this->action) {
            // Ajout d'un nouvel utlisateur
            case 'booking': 


                $availability = new Availability();
                $availability->getAvailability($_GET['id']);

                var_dump($availability);

                echo $this->twig->render('booking/booking.html.twig', [
                    
                ]);

                break;

            case 'availabilities': 


                if (isset($_GET['year']) && isset($_GET['month']) && isset($_GET['day'])) {

                    $date = $_GET['year'] . '-' . $_GET['month'] . '-' . $_GET['day'];

                    $availabilitie = new Availability();
                    $allAvailabilities = $availabilitie->getAvailabilitiesByDate($date);

                    var_dump($allAvailabilities);

                    echo $this->twig->render('availabilities/availabilities.html.twig', [
                        'nowDate' => getdate(),
                        'days' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31],
                        'months' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                        'years' => [2018, 2019, 2020],
                        'allAvailabilities' => $allAvailabilities,
                    ]);
                    break;

                }


                echo $this->twig->render('availabilities/availabilities.html.twig', [
                    'nowDate' => getdate(),
                    'days' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31],
                    'months' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                    'years' => [2018, 2019, 2020],
                ]);

                break;
        }

    }
}
