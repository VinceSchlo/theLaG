<?php

require_once('vendor/thelag/QueryService.php');
require_once('vendor/thelag/RequestService.php');

class Game extends RequestService
{
    public static $table_name = "games";
    public $pk_field_name = "idgames";
    public $idgames;
    public $name;
    public $idType;

    public function getGame($id)
    {
        $this->idType = $id;

        $this->hydrate();
    }

}