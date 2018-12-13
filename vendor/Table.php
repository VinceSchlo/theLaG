<?php

abstract class Table
{
    public function hydrate()
    {
        if (empty($this->{$this->pk_field_name})) {
            die('try to hydrate without PK');
        }

        $query = "SELECT * FROM ".$this->table_name." WHERE ".$this->pk_field_name."=".$this->{$this->pk_field_name};

        $result = myFetchAssoc(($query));

        foreach ($result as $key => $value){
            $this->$key = $result[$key];
        }
    }

    public function save()
    {
        if (empty($this->{$this->pk_field_name}))
        {
            // $query = "INSERT INTO ".$this->table_name." SET ";
            // $values = '';
            // $fields = '';

            // foreach ($this as $key => $value) {
            //     $values .= $value.",";
            //     $fields .= $key.",";
            // }

            // $this->{$this->pk_field_name};
        }
        else
        {
            $query = "UPDATE ".$this->table_name." SET ";

            $emptyRemoved = array_filter((array)$this);
            end($emptyRemoved);
            $last_key = key($emptyRemoved);

            foreach ($this as $key => $value)
            {
                if (!is_null($value) && !in_array($key, ['pk_field_name', 'table_name', $this->pk_field_name]))
                {
                    if ($last_key == $key)
                    {
                        $query .= $key."="."'".$value."' ";
                    }
                    else
                    {
                        $query .= $key."="."'".$value."', ";
                    }
                }
            }

            $query .= "WHERE ".$this->pk_field_name."=".$this->{$this->pk_field_name};
        }
        myQuery(($query));
    }
}