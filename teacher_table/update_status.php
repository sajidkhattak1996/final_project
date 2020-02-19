<?php
if (isset($_POST['cid']) && isset($_POST['st'])) {
  $cid=$_POST['cid'];
  $st=$_POST['st'];
  $data="";
  include('../db_connection.php');
  if (mysqli_query($con ,"UPDATE `class` SET `reg_status`='$st' WHERE Class_id='$cid'"))
  {
    $data="yes";
  }else {  $data="no";  }
  echo $data;
}
?>
