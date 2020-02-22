<?php
if (isset($_POST['attendence_date']) && isset($_POST['cid'])) {
  $cid=$_POST['cid'];
  $attendance_date=$_POST['attendence_date'];
  $data="";
  include('../db_connection.php');
  if (mysqli_query($con ,"DELETE FROM `attendence_record` WHERE AT_date='$attendance_date' AND Class_id='$cid'"))
  {
    $data="yes";
  }else {  $data="no";  }
  echo $data;
}
?>
