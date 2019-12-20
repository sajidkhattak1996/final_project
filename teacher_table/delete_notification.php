<?php
  include('db_connection.php');
  session_start();
  echo $_GET['id'];
  echo $_GET['cid'];
  $q="DELETE FROM notification WHERE id='".$_GET['id']."' AND Class_id='".$_GET['cid']."'";
  if (mysqli_query($con ,$q)) {
        header('location: view_notification.php');
  }
  else {
      header('location: view_notification.php');
  }

 ?>
