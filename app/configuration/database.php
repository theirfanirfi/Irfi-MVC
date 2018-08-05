<?php

class MySQLDatabase {
    private $HOST = "localhost";
    private $USER = "root";
    private $PASSWORD = "";
    private $DATABASE = "flightmates_db";
    private $connection;

    function __construct()
    {
        $this->open_connection();
    }

    private function open_connection()
    {
        if(!(empty($this->HOST) || empty($this->USER) ||  empty($this->DATABASE))){
        $this->connection = mysqli_connect($this->HOST,$this->USER,$this->PASSWORD,$this->DATABASE);
        if(!$this->connection)
        {
            die("Connection error. Please Re-check the database credentials");
        }
    }
    }

    public function get_connection()
    {
        return $this->connection;
    }

    public function query($sql)
    {
        return mysqli_query($this->connection,$sql);
    }

    public function escape_value($value)
    {
        return mysqli_real_escape_string($this->connection,$value);
    }

    public function fetch_array($row)
    {
        return mysqli_fetch_array($row);
    }



}

$db = new MySQLDatabase;

?>