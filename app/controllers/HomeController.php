<?php

require_once('vendor/thelag/AppController.php');

class HomeController extends AppController
{

    public function index()
    {
        $this->loadTwig();
        echo $this->twig->render('home/home.html.twig', [
            'foo' => 'bar',
            'bar' => 'foo'
        ]);
    }
}
