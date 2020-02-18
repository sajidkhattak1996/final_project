<?php
if (isset($_POST['E_id'])) {
  $E_id=$_POST['E_id'];
  $data="";
  include('../db_connection.php');
  if (mysqli_query($con ,"DELETE exam,exam_record FROM exam_record INNER JOIN exam ON exam_record.E_id=exam.E_id WHERE exam_record.E_id='$E_id' AND exam.E_id='$E_id'"))
  {
    $data="yes";
  }else {  $data="no";  }
  echo $data;
}
?>
