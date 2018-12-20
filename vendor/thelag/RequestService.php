<?php

abstract class RequestService
{
    public function hydrate()
    {
        if (empty($this->{$this->pk_field_name})) {
            die('try to hydrate without PK');
        }

        $query = "SELECT * FROM ".$this->table_name." WHERE ".$this->pk_field_name."=".$this->{$this->pk_field_name};

        $result = myFetchAssoc($query);

        if (!empty($result))
        {
            foreach ($result as $key => $value){
                $this->$key = $result[$key];
            }
        }
        else
        {
            http_response_code(404);
            die();
        }
    }

    public function save()
    {
        $emptyRemoved = array_filter((array)$this);
        end($emptyRemoved);
        $last_key = key($emptyRemoved);

        if (empty($this->{$this->pk_field_name}))
        {
            $values = '';
            $fields = '';

            foreach ($this as $key => $value)
            {
                if (!is_null($value) && !in_array($key, ['pk_field_name', 'table_name', $this->pk_field_name]))
                {
                    if ($last_key == $key)
                    {
                        $values .= $value;
                        $fields .= $key;
                    }
                    else
                    {
                        $values .= $value.",";
                        $fields .= $key.",";
                    }
                }
            }

            $query = "INSERT INTO ".$this->table_name." (".$fields.") VALUES (".$values.")";
        }
        else
        {
            $query = "UPDATE ".$this->table_name." SET ";

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

    public static function getAll()
    {
        $query ="SELECT * FROM ".static::$table_name;
		$items = myFetchAllAssoc($query);
		return $items;
	}
}