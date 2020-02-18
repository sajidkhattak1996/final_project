<?php
  $data="";
	include('../db_connection.php');
	if (isset($_POST['sid']) AND isset($_POST['cid']) AND isset($_POST['obtained_marks']) AND isset($_POST['E_id'])) {
    $cid=$_POST['cid'];
    $sid=$_POST['sid'];
		$obtained_marks=$_POST['obtained_marks'];
    $E_id=$_POST['E_id'];

	$query =mysqli_query($con,"UPDATE exam_record SET obtained_marks='$obtained_marks' WHERE Class_id='$cid' AND S_id='$sid' AND E_id='$E_id'  ");


	if ($query) {
		$data="yes";
	}
		else{
		$data="no";
		}
	echo $data;
}
?>
