<?php 

class Home extends controller {
    function index() {
        //echo $data[0]." ".$data[1]." ".$data[2];
        $this->view('firstview'); 
        $data['name'] = "irfan";
        $this->view('secondview',$data); 
    }

    function form() {
        echo $this->post('name'); 
        $extension = array('txt','jpg','png');
        $DESTINATION = "./uploads";
        $data = $this->uploadFile($DESTINATION,200,$extension,'myfile');
        $isUploaded = $data['isUploaded'];
        if($isUploaded)
        {
            echo $data['filename'];
            echo "<br>".$data['filepath'];
        }
        else
        {
            $e =  $data['errors'];
            echo $e[0];
        }
    }

    public function Link($link) {

        echo "this is link ".$link[0]." ".$link[1]; 
    }

public function login()
{
  $data['username'] = "Irfan";
  $data['user_id'] = "21";
  $index = "post_session";
  $this->set_session($data,$index);
}
public function logout()
{
    $index = "post_session";
    $this->unset_session($index);
}
} 
?>