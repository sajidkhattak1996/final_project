<?php
include('db_connection.php');
$id=$_GET['id'];
$sql="DELETE FROM links WHERE L_id='$id'";
$e=mysqli_query($con, $sql);
if ($e) {
        header("Location: teacher_view.php");
}else {
  echo " Problem Occur while Executing the Queries!. ";
}


 ?>
