<?php
require_once('vendor/autoload.php');

Class AppController
{
    function __construct($action)
    {
        $this->action = $action;
    }

    protected function loadTwig()
    {
        $loader = new Twig_Loader_Filesystem('app/views');
        $params = [
            // 'cache' => "../cache",
            'auto_reload' => true,
            'autoescape' => true
        ];

        $this->twig = new Twig_Environment($loader, $params);
    }
}