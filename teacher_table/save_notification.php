<?php
    session_start();
    include('db_connection.php');
    if (isset($_POST['btn_share']) &&  isset($_POST['t'])) {
      date_default_timezone_set("Asia/Karachi");
      $current_date=date('Y-m-d');
        $q1="INSERT INTO notification(title, msg, cdate ,expire_date, Class_id) VALUES ('".$_POST['t']."','".$_POST['msg']."','".$current_date."','".$_POST['edate']."','".$_POST['btn_share']."')";
        if (mysqli_query($con ,$q1)) {
          $_SESSION['s']='ss';
          header("location:share_information.php");
        }else {
          $_SESSION['s']='no';
          header("location:share_information.php");
        }
    }



 ?>
