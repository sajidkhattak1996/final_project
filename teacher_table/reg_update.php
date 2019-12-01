<?php
  session_start();
  $data="";
	include('db_connection.php');
	if (isset($_POST['reg_no']) AND isset($_POST['student_id'])) {
		$reg_no=$_POST['reg_no'];
		$student_id=$_POST['student_id'];
    $cid=$_SESSION['class_id'];

	$query =mysqli_query($con,"UPDATE `register` SET Reg_no='$reg_no' WHERE Class_id='$cid' AND S_id='$student_id'");


	if ($query) {
		$data="yes";
	}
		else{
		$data="no";
		}
	echo $data;
}
?>
