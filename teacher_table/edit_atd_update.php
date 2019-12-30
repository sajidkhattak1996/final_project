<?php
  $data="";
  include('db_connection.php');
  if (isset($_POST['att_id']) && isset($_POST['atd_date']) && isset($_POST['class_id']) && isset($_POST['sid'])) {


  $stmt1="UPDATE attendence_record SET AT_id='".$_POST['att_id']."' WHERE AT_date='".$_POST['atd_date']."' AND Class_id='".$_POST['class_id']."' AND S_id='".$_POST['sid']."'";
  $query1=mysqli_query($con ,$stmt1);
  if ($query1) {
    $data="yes";
  }else {
    $data="no";
  }
  echo $data;
  }

 ?>
