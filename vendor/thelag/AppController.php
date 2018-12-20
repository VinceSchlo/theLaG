<?php
require_once('vendor/autoload.php');

Class AppController
{
    function __construct($action)
    {
        session_start();
        $this->action = $action;
        $this->currentUrl = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        $this->baseUrl = 'http://' . $_SERVER['SERVER_NAME'];
    }

    protected function loadTwig()
    {
        $loader = new Twig_Loader_Filesystem('app/views/');
        $params = [
            'cache'       => 'cache',
            'auto_reload' => true,
        ];

        $this->twig = new Twig_Environment($loader, $params);

        // Add global parameters to all twig views
        $this->twig->addGlobal('current_url', $this->currentUrl);
        $this->twig->addGlobal('current_action', $this->action);
        $this->twig->addGlobal('base_url', $this->baseUrl);

        if (isset($_SESSION['idusers']))
        {
            $this->twig->addGlobal('current_session', $_SESSION);
        }
    }
}