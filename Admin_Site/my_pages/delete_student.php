<?php
if (isset($_POST['id'])) {
  $id=$_POST['id'];
  $data="";
  include('../../db_connection.php');
  $q1="DELETE FROM `student` WHERE S_id='$id'";
  $q2="DELETE FROM `register` WHERE S_id='$id'";
  $q3="DELETE FROM `have` WHERE S_id='$id'";
  $q4="DELETE FROM `attendence_record` WHERE S_id='$id'";
  $q5="DELETE FROM `assignment_record` WHERE S_id='$id'";
  $q6="DELETE FROM `presentation_record` WHERE S_id='$id'";
  $q7="DELETE FROM `quiz_record` WHERE S_id='$id'";
  $q8="DELETE FROM `exam_record` WHERE S_id='$id'";

  if (mysqli_query($con ,$q1) && mysqli_query($con ,$q2) && mysqli_query($con ,$q3) && mysqli_query($con ,$q4) && mysqli_query($con ,$q5) && mysqli_query($con ,$q6) && mysqli_query($con ,$q7) && mysqli_query($con ,$q7))
  {
    $data="yes";
  }else {  $data="no";  }
  echo $data;
}
?>
