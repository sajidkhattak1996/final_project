<?php
$data="";
	$conn=mysqli_connect("localhost","root","","test");
	if (isset($_POST['value']) AND isset($_POST['regid'])) {
		$value=$_POST['value'];
		$regid=$_POST['regid'];

	$query =mysqli_query($conn,"UPDATE `user` SET updated_id='$value' WHERE reg_no='$regid'");

	if ($query) {
		$data="yes";
	}
		else{
		$data="no";

		}
	echo $data;
}
?>
