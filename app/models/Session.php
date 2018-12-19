<?php

require_once('vendor/thelag/QueryService.php');
require_once('vendor/thelag/RequestService.php');

class Session extends RequestService
{
    public static $table_name = "sessions";
    public $pk_field_name = "idsession";
    public $idsession;
    public $start;
    public $end;
    public $participant_id;
    public $coach_id;
    public $games_idgames;
    public $availabilities_idavailabilities;

    public function getSession($id)
    {
        $session = new Session();

        $session->idsession = $id;

        $session->hydrate();
    }

}