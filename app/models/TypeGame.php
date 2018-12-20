<?php

require_once('vendor/thelag/QueryService.php');
require_once('vendor/thelag/RequestService.php');

class TypeGame extends RequestService
{
    public static $table_name = "type_game";
    public $pk_field_name = "idType";
    public $idType;
    public $name;

    public function getTypeGame($id)
    {
        $this->idType = $id;
        $this->hydrate();
    }

}