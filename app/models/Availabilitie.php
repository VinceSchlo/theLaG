<?php

require_once('vendor/thelag/QueryService.php');
require_once('vendor/thelag/RequestService.php');

class Availabilitie extends RequestService
{
    public static $table_name = "availabilities";
    public $pk_field_name = "idavailabilities";
    public $idavailabilities;
    public $start;
    public $end;
    public $users_idusers;

    public function getAvailabilitie($id)
    {
        $availabilitie = new Availabilitie();

        $availabilitie->idavailabilities = $id;

        $availabilitie->hydrate();
    }

}