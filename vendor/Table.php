<?php

abstract class Table
{

    public function hydrate()
    {
        // echo $this->{$this->pk_field_name};
        if (empty($this->{$this->pk_field_name})) {
            die('try to hydrate without PK');
        }

        $query = "SELECT * FROM $this->table_name WHERE $this->pk_field_name  = " . $this->{$this->pk_field_name} . "";

        $result = myFetchAssoc(($query));

        foreach ($this->field_list as $field) {
            $this->{$field} = $result[$field];
        }
    }

    public function save()
    {
        $query = "SELECT * FROM $this->table_name WHERE $this->pk_field_name  = " . $this->{$this->pk_field_name} . "";

        $result = myFetchAssoc(($query));

        if (!empty($result)) {
            // update
            echo 'update';
            $stringSet = "";
            foreach ($this->field_list as $field) {

                if ($this->{$field} != null) {
                    $stringSet .= $field . " = '" . $this->{$field} . "', ";
                }

            }

            $query = "UPDATE $this->table_name SET $stringSet WHERE $this->pk_field_name = " . $this->{$this->pk_field_name} . "";
            echo $query;
        } else {
            // insert
        }

    }

}