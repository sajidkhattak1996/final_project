<?php
    include('db_connection.php');

  $sql2="UPDATE class SET Name='".$_POST['cname']."', Expire_date='".$_POST['exdate']."' WHERE Class_id='".$_POST['cid']."'";
  if (mysqli_query($con,$sql2)) {
    echo "<script> alert('Problem Occur while Updating the Record111111111111111.'); </script>";
  }
  else {
    echo "<script> alert('Problem Occur while Updating the Record.'); </script>";
  }

header("Location: tmain_table.php");

 ?>
