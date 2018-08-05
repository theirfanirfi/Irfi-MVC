<?php 

class Authentication extends controller 
{
    private $SESSION_INDEX = "";
    function __construct($REDIRECT_URL,$INDEX)
    {
        session_start();
        $this->SESSION_INDEX = $INDEX;
        $URL = rbaseUrl($REDIRECT_URL);
        if(!($this->check_session()))
        {
            header("Location: {$URL}");
        }

    }

   

    public function get_session_data()
    {
        $data = array();
        if(isset($_SESSION[$this->SESSION_INDEX]))
        {
            $data = $_SESSION[$this->SESSION_INDEX];
            return $data;
        }
        else
        {
            return false;
        }
    }

    public function check_session()
    {
        if(isset($_SESSION[$this->SESSION_INDEX]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}


?>