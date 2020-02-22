<?php
if (isset($_POST['new_date']) && isset($_POST['old_date'])  && isset($_POST['cid']) ) {
  $old_date=$_POST['new_date'];
  $new_date=$_POST['old_date'];
  $cid=$_POST['cid'];
  include('../db_connection.php');
  $data="";
  $date_check_sql=mysqli_query($con ,"SELECT `AT_date`FROM `attendence_record` WHERE Class_id='$cid' AND AT_date='$new_date'");
  if (mysqli_num_rows($date_check_sql)>0) {
    $data="pp";
  }else {
    $sql_update=mysqli_query($con ,"UPDATE `attendence_record` SET `AT_date`='$new_date'  WHERE Class_id='$cid' AND AT_date='$old_date'");
    if ($sql_update) {
      $data="yes";
    }else {
      $data="no";
    }
  }
  echo $data;
}
?>
