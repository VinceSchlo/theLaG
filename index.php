<?php
// Definition des routes
$routes = [
    'home' => 'HomeController',

    'availabilities' => 'BookingController',
    'booking'        => 'BookingController',
    'payment'        => 'BookingController',

    'login' => 'LoginController',
    'register' => 'RegisterController',

    'availability'       => 'AvailabilityController',
    'addAvailability'    => 'AvailabilityController',
    'updateAvailability' => 'AvailabilityController',

    'login'        => 'UserController',
    'disconnect'   => 'UserController',
    'registration' => 'UserController',
    'updateUser'   => 'UserController',

    // 'list_coaching' => 'CoachingController'
    // 'order_coaching' => 'CoachingController',
];

// Initialisation home
$action = 'home';

// Detection d'un changement dans l'url
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// Si cette "url" existe on execute le controlleur associe
if (array_key_exists($action, $routes))
    include('app/controllers/' . $routes[$action] . ".php");

// var_dump($routes[$action]($action));
$controller = new $routes[$action]($action);
$controller->index();
