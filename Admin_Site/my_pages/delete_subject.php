<?php
if (isset($_POST['subject_id'])) {
  $id=$_POST['subject_id'];
  $data="";
  include('../../db_connection.php');
  if (mysqli_query($con ,"DELETE FROM `subject` WHERE Subject_id='$id'"))
  {
    $data="yes";
  }else {  $data="no";  }
  echo $data;
}
?>
