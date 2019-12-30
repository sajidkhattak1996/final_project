<?php
    include('db_connection.php');
    $data="";
      if (isset($_POST['atd_date']) && isset($_POST['class_id']) && isset($_POST['sid']) ) {
        $sql1="DELETE FROM attendence_record WHERE AT_date='".$_POST['atd_date']."' AND Class_id='".$_POST['class_id']."' AND S_id='".$_POST['sid']."'";
        $query=mysqli_query($con ,$sql1);
    if ($query) {
      $data="yes";
    }
      else{
      $data="no";
      }
    echo $data;

  }
 ?>
