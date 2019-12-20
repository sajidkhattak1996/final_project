<?php
include('db_connection.php');
session_start();
if ($con) {
          $current_date =date("Y-m-d");
          $stmt="INSERT INTO links (link, description,ldate, Class_id) VALUES ('".$_POST['l']."','".$_POST['des']."','".$current_date."','".$_POST['save']."')";
          $exe=mysqli_query($con ,$stmt);
          if ($exe) {

            header("Location: share_main_page.php");
          }

}else {
  echo "Problem in connection ";
}


 ?>
