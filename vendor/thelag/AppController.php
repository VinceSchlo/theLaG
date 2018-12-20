<?php
require_once('vendor/autoload.php');

Class AppController
{
    function __construct($action)
    {
        $this->action = $action;
        $this->currentUrl = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    }

    protected function loadTwig()
    {
        session_start();

        $loader = new Twig_Loader_Filesystem('app/views/');
        $params = [
            'cache'       => 'cache',
            'auto_reload' => true,
        ];

        $this->twig = new Twig_Environment($loader, $params);

        // Add global parameters to all twig views
        $this->twig->addGlobal('current_url', $this->currentUrl);
        $this->twig->addGlobal('current_action', $this->action);

        if (!isset($_SESSION['idusers']))
        {
            $this->twig->addGlobal('current_session', $_SESSION);
        }
    }
}