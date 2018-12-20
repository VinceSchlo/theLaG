<?php

require_once('vendor/thelag/QueryService.php');
require_once('vendor/thelag/RequestService.php');
require_once('app/models/User.php');

class Availability extends RequestService
{
    protected $table_name = "availabilities";
    protected $pk_field_name = "idavailabilities";
    public $idavailabilities;
    public $start;
    public $end;
    public $users_idusers;

    public function getAvailability($id)
    {
        $this->idavailabilities = $id;
        $this->hydrate();

        $this->user = new User();
        $this->user->idusers = $this->users_idusers;
        $this->user->hydrate();
    }

    public function getAvailabilitiesByDate($date)
    {
        $query = "SELECT * FROM availabilities WHERE start LIKE '" . $date . "%'";

        $result = myFetchAllAssoc($query);

        if (!empty($result)) {

            foreach ($result as $key => $value){
                $idUser = $value["users_idusers"];

                $query = "SELECT firstname, lastname FROM users WHERE idusers = '" . $idUser . "'";

                $user = myFetchAssoc($query);

                $result[$key]['user'] = $user;
            }

            return $result;
        } else {
            return "Aucun résultat";
        }
    }

}