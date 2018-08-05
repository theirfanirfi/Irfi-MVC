<?php 
class Post extends Auth {
function index()
{
   $photo = $this->model('Photo');
   $photo->p_fullname = "Irfan Irfi";
   $photo->p_email = "email.com";
   $photo->p_mob = "1234455";
   $photo->p_country = "Pakistan";
   $photo->p_password = "1234455";
  //$isInserted = $photo->create("passengers_tbl");
  //$isUpdated = $photo->update("passengers_tbl","p_id","21");
  //echo $isUpdated ? "updated" : "Not";
  //$isDeleted = $photo->delete("passengers_tbl","p_id","0");
  //echo $isDeleted ? "deleted" : "Not";
  //$obj = $photo->find("passengers_tbl","p_id","21");
  //echo $obj->p_fullname;
  //echo $photo->num_table_rows('passengers_tbl');
  //echo $photo->num_rowsByColumn('passengers_tbl','p_id','21');
//  $r =  $photo->fetchTable("'passengers_tbl'");
// foreach($r as $s)
// {
//   echo $s->p_fullname;
// }


//  $r =  $photo->fetchbysql("SELECT * FROM passengers_tbl");
// foreach($r as $s)
// {
//   echo $s->p_fullname;
// }

//  $r =  $photo->fetchtablebycolumn("passengers_tbl","p_id",21);
// foreach($r as $s)
// {
//   echo $s->p_fullname;
// }

$data = $this->get_session_data();
echo $data['username'];

}



}

?>