<?php
require_once('vendor/autoload.php');

Class AppController
{
    function __construct($action)
    {
        $this->action = $action;
        $this->current_url = basename($_SERVER['REQUEST_URI']);
    }

    protected function loadTwig()
    {
        $loader = new Twig_Loader_Filesystem('app/views/');
        $params = [
            'cache'       => 'cache',
            'auto_reload' => true,
        ];

        $this->twig = new Twig_Environment($loader, $params);
    }
}