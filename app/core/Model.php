<?php 
class Model {
    protected function attributes()
    {
        return get_object_vars($this);
    }
    public function create($TABLE)
    {
        global $db;
        $attributes = $this->attributes();
        $SQL = "INSERT INTO {$TABLE}(";
        $SQL .= join(",",array_keys($attributes));
        $SQL .= ") VALUES ('";
        $SQL .=  join("', '",array_values($attributes));
        $SQL .= "')";
        if($db->query($SQL))
        {
           
            return true;
        }
        else 
        {
            //echo mysqli_error($db->get_connection()); 
            return false;
        }
    }

    public function update($TABLE,$COLUMN,$ID)
    {
        global $db;

        $attributes = $this->attributes();
        $attribute_pairs = array();
        foreach($attributes as $key => $values)
        {
            $attribute_pairs[] = "{$key} = '{$values}'";
        }

        $SQL = "UPDATE ".$TABLE." SET ";
        $SQL .= join(", ",$attribute_pairs);
        $SQL .= " WHERE ".$COLUMN." = '{$ID}' Limit 1";
        if($db->query($SQL))
        {
            return true;
        }
        else
        {
            //echo mysqli_error($db->get_connection()); 
            return false;
        }
    }

    public function delete($TABLE,$COLUMN,$ID)
    {
        global $db;
        $SQL = "DELETE FROM {$TABLE} WHERE {$COLUMN} = '{$ID}' Limit 1";
        if($db->query($SQL))
        {
            return true;
        }
        else
        {
            echo mysqli_error($db->get_connection()); 
            //return false;
        }
    }

    public function find($TABLE,$COLUMN,$ID)
    {
        global $db;
    $SQL = "SELECT * FROM {$TABLE} WHERE {$COLUMN} = '{$ID}' Limit 1";
    $query = $db->query($SQL);
    $obj = mysqli_fetch_object($query);
    return !empty($obj) ? $obj : false;
    }

    public function num_table_rows($TABLE)
    {
        global $db;
        $SQL = "SELECT * FROM {$TABLE}";
        $query = $db->query($SQL);

        return mysqli_num_rows($query);
    }

    public function num_rowsByColumn($TABLE,$COLUMN,$VALUE)
    {
        global $db;
        $SQL = "SELECT * FROM {$TABLE} WHERE {$COLUMN} = '{$VALUE}'";
        $query = $db->query($SQL);

        return mysqli_num_rows($query);
    }

    public function deleteAll($TABLE)
    {
        global $db;
        $SQL = "DELETE FROM {$TABLE}";
        if($db->query($SQL))
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    private function instantiate($record)
    {
        $object = new self;
        foreach($record as $attribute => $value)
        {
            $object->$attribute = $value;
        }

        return $object;
    }

    public function fetchTable($TABLE)
    {
    global $db;
    $SQL = "SELECT * FROM {$TABLE}";
    $q = $db->query($SQL);
    $object_array = array();
    while($row = mysqli_fetch_array($q))
    {
        $object_array[] = $this->instantiate($row);
    }
    return $object_array;
    }


    public function fetchbysql($SQL)
    {
    global $db;
    $q = $db->query($SQL);
    $object_array = array();
    while($row = mysqli_fetch_array($q))
    {
        $object_array[] = $this->instantiate($row);
    }
    return $object_array;
    }

    public function fetchtablebycolumn($TABLE,$COLUMN,$VALUE)
    {
    global $db;
    $SQL = "SELECT * FROM {$TABLE} WHERE {$COLUMN} = '{$VALUE}'";
    $q = $db->query($SQL);
    $object_array = array();
    while($row = mysqli_fetch_array($q))
    {
        $object_array[] = $this->instantiate($row);
    }
    return $object_array;
    }

    


}


?>