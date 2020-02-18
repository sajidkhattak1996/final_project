<?php
  $data="";
	include('../db_connection.php');
	if (isset($_POST['E_id']) AND isset($_POST['exam_term']) AND isset($_POST['total_marks']) ) {
    $E_id=$_POST['E_id'];
    $exam_term=$_POST['exam_term'];
		$total=$_POST['total_marks'];
    $exam_date=$_POST['exam_date'];

	$query =mysqli_query($con,"UPDATE exam SET exam_term='$exam_term',exam_date='$exam_date',total_marks='$total' WHERE E_id='$E_id' ");


	if ($query) {
		$data="yes";
	}
		else{
		$data="no";
		}
	echo $data;
}
?>
