<?php 
include ('../connect.php');
@session_start();
@$uname=$_SESSION['uname'];

if($uname==""){
		session_write_close();
		header("location: ../index.php");
		exit();
}

require("../opener_db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documentation System - Admin</title>
<script type="text/javascript" src="../jquery-1.8.2.js"></script>
<script type="text/javascript" src="../bootstrap.js"></script>
<script type="text/javascript" src="../bootstrap-button.js"></script>
<script type="text/javascript" src="../page.js"></script>        
<script type="text/javascript" src="../menu.js"></script>
<link href="../bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../style.css" rel="stylesheet" type="text/css" />
		<script>
			function myfx(){
				var r = confirm('Are you sure you want to delete this file?');
				if (r == true) {
					window.open('index.php','_blank');    				
				} else {
    				alert('Delete Action Cancelled');	
				} 
			}	
		</script>

</head>

<body style="background-color: #D0D0D0;">


<div style="position:relative; width:1000px; margin:1em auto; padding:5px; background-color: #ffffff;" class="table-bordered">
 <div class="banner" style="width:100%;" >
 	<div style="width:100%;	height:100px; margin:1px auto; background-color:rgb(80, 100, 220);	background-image:url('../banner.jpg');	background-repeat: no-repeat;"></div>	
 </div> 
 
<hr style="border-color: #d8d8d8;" />

<div align="center"><span class='table_headers'><h2 style="color: #f8f8f8;">Available Documents</h2></span></div>

<form action="" method="post">
<div id="container">
	<table border='2'>
      <div class="data"></div>
    </table>
      <div class="pagination"></div>
</div>  


<hr style="border-color: #d8d8d8;" />

<?php
@$id=$_POST['id']; 
@$btndel=$_POST['btndel'];
if (isset($btndel)){
	if (isset($id)){
			$qry2 = "DELETE FROM up_files WHERE id=".$id;
			$result2 = $connector->query($qry2);		
			if (!isset($result2)){
				echo "<span class='label label-danger'>Error occured. Please try again</span><br /><br />";
			}
			else {
				echo "<span class='label label-success'>File Deleted</span><br /><br />";
				
			}
	}
	else {
		echo "<span class='label label-warning'>Please select a document to delete before click delete button</span><br /><br />";
	}
}

else {
	echo "<span class='label label-info'>Please select a document to delete before click delete button</span><br /><br />";
}
/*
*/

?>
<div>
<input type='submit' value='Delete' name='btndel' class='btn btn-danger' onclick='myfx()1;' />&nbsp;
<input type="button" value="Upload" class="btn btn-primary" onclick="window.open('upl.php','_self');" />&nbsp;
<input type="button" value="Logout" class="btn btn-warning" onclick="window.open('../index.php','_self');" /><br /><br />
<label style="color: #0000ff;">Copyright &copy; HBT - Developers <?php echo date("Y"); ?> - All rights reserved.</label>
</div>
</div>



</form>
</body>
</html>