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

                if (isset($_POST['stripeToken'])){

                    \Stripe\Stripe::setApiKey("sk_test_VLDXc3I136Z4bWuq063V014f");

                    // Token is created using Checkout or Elements!
                    // Get the payment token ID submitted by the form:
                    $token = $_POST['stripeToken'];
                    
                    $charge = \Stripe\Charge::create([
                        'amount' => 999,
                        'currency' => 'usd',
                        'description' => 'Example charge',
                        'source' => $token,
                    ]);

                }


                $availability = new Availability();
                $availability->getAvailability($_GET['id']);

                $tabDateStart = strtotime($availability->start);
                $tabEndStart = strtotime($availability->end);

                $tabDateStart = getdate($tabDateStart);
                $tabEndStart = getdate($tabEndStart);

                $availability->startArray = $tabDateStart;
                $availability->endArray = $tabEndStart;

                // var_dump($availability);

                echo $this->twig->render('booking/booking.html.twig', [
                    'availability' => $availability,
                    'coach' => $availability->user,
                    'days' => [
                        '0' => 'Lundi',
                        '1' => 'Mardi',
                        '2' => 'Mercredi',
                        '3' => 'Jeudi',
                        '4' => 'Vendredi',
                        '5' => 'Samedi',
                        '6' => 'Dimanche'
                    ],
                    'months' => [
                        '1' => 'Janvier',
                        '2' => 'Février',
                        '3' => 'Mars',
                        '4' => 'Avril',
                        '5' => 'Mai',
                        '6' => 'Juin',
                        '7' => 'Juillet',
                        '8' => 'Aout',
                        '9' => 'Septembre',
                        '10' => 'Octobre',
                        '11' => 'Novembre',
                        '12' => 'Décembre'
                    ]
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
                
                case 'payment':

                if ($_POST['idAvailability']) {

                    $allDates = [];

                    foreach ($_POST as $key => $value) {
                        if ($key != 'idAvailability') {
                            $allDates[] = $value;
                        }
                    }

                    $availability = new Availability();
                    $availability->getAvailability($_POST['idAvailability']);

                    $day = substr($availability->start, 0, 10);
                    var_dump($allDates);

                    foreach ($allDates as $hour){

                        
                        $session = new Session();
                        $session->start = $day . " " . $hour . ":00:00";
                        $dateplus = $hour + 1;
                        var_dump($day . " " . $hour . ":00:00");
                        var_dump($day . " " . $dateplus . ":00:00");
                        var_dump($_SESSION['idusers']);
                        $session->end = $day . " " . $dateplus. ":00:00";
                        $session->partcipant_id = $_SESSION['idusers'];
                        $session->coach_id = $availability->users_idusers;
                        // $session->$games_idgames = ;
                        $session->availabilities_idavailabilities = $_POST['idAvailability'];

                        $session->save();
                    }


                    var_dump($allDates);
                }

                break;
        }

    }
}
