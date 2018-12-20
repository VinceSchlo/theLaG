<?php

require_once('vendor/thelag/QueryService.php');
require_once('vendor/thelag/RequestService.php');

class Session extends RequestService
{
    protected $table_name = "sessions";
    protected $pk_field_name = "idsession";
    public $idsession;
    public $start;
    public $end;
    public $partcipant_id;
    public $coach_id;
    public $games_idgames;
    public $availabilities_idavailabilities;

    public function getSession($id)
    {
        $this->idsession = $id;

        $this->hydrate();
    }

    public function addSession($start, $end, $participant_id, $coach_id, $games_idgames, $availabilities_idavailabilities)
    {

        $query = "INSERT INTO sessions (start, end, participant_id, coach_id, games_idgames, availabilities_idavailabilities ) 
                    VALUES ($start, $end, $participant_id, $coach_id, $games_idgames, $availabilities_idavailabilities)";

        $query->save();

    }

}