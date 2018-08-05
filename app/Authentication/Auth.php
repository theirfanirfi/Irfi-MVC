<?php 
class Auth extends Authentication
{
    public function __construct()
    { 
        $REDIRECT_URL = "/Home/";
        $SESSION_INDEX = "post_session";
        parent::__construct($REDIRECT_URL,$SESSION_INDEX);
    }

    
}

?>