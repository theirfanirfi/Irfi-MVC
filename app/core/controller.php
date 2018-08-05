<?php 

class controller {
   
    public function view($view,$data = [])
    {
        include_once 'app/views/'.$view.'.php';
    }

    public function model($model)
    {
        include_once 'app/models/'.$model.'.php';
        return new $model;
    }

    public function post($post)
    {
        global $db;
        return mysqli_real_escape_string($db->get_connection(),$_POST[$post]);
    }

    public function get($get)
    {
         global $db;
        return mysqli_real_escape_string($db->get_connection(),$_GET[$get]);
    }

    public function uploadFile($DESTINATION,$SIZE,$EXTENSIONS,$FILE)
    {
        $errors = [];
        $data['isUploaded'] = false;
        $data['filename'] = "";
        $data['filepath'] = "";
        $data['errors'] = "";
        $NAME =  $_FILES[$FILE]['name'];
        $FILE_SIZE = $_FILES[$FILE]['size'];
        $TYPE = $_FILES[$FILE]['type'];
        $TMP_NAME = $_FILES[$FILE]['tmp_name'];
        $file_ext=strtolower(end(explode('.',$NAME)));
         if(in_array($file_ext,$EXTENSIONS)=== false)
         {
             $validExtensions = "";
             foreach($EXTENSIONS as $e)
             {
                 $validExtensions .= $e.", ";
             }
         $errors[]="extension not allowed, please choose a ".$validExtensions." file.";
      }
      if(empty($errors)==true)
      {
         if(move_uploaded_file($TMP_NAME,$DESTINATION."/".$NAME)){
            $data['isUploaded'] = true; 
            $data['filename'] = $NAME;
            $data['filepath'] = $DESTINATION."/".$NAME;
            return $data;
         }
         else
         {
             $errors[] = "Error Occurred. Please Try Again";
         }
         
      }
      else
      {
         $data['errors'] = $errors;
         return $data;
      }

        
    }

     public function set_session($session_data,$Index)
    {
        session_start();
        $_SESSION[$Index] = $session_data;
        return true;
    }

    public function unset_session($Index)
    {
        session_start();
        unset($_SESSION[$Index]);
        return true;
    }
}


?>