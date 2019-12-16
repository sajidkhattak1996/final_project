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
<script type="text/javascript" src="../jquery.wordcount.js"></script>
<link href="../bootstrap.min.css" rel="stylesheet" type="text/css" />

<script>
      function countChar(val) {
      	var max = 40;
        var len = val.value.length;
        if (len >= max) {
          val.value = val.value.substring(0, 40);
          $('#charNum').text('You have reached the limit');
        } else {
          var char = max - len;
          $('#charNum').text(char + ' characters left');
        }
     };      
</script>

<script>
      function countChar1(val) {
      	var max = 90;
        var len = val.value.length;
        if (len >= max) {
          val.value = val.value.substring(0, 90);
          $('#charNum1').text('You have reached the limit');
        } else {
          var char = max - len;
          $('#charNum1').text(char + ' characters left');
        }
     };      
</script>
</head>

<body style="background-color: #D0D0D0;">

<div style="position:relative; width:1000px; margin:1em auto; padding:5px; background-color: #ffffff;" class="table-bordered">
	
 <div class="banner" style="width:100%;" >
 	<div style="width:100%;	height:100px; margin:1px auto; background-color:rgb(80, 100, 220);	background-image:url('../banner.jpg');	background-repeat: no-repeat;"></div>	
 </div>	

<hr style="border-color: #d8d8d8;" />
 <div class="status" style="width:100%;" align="center">
        <?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo "<ul class='error'> ";
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li> <strong><font color="red">',$msg ,'</font></strong></li>'; 
		}echo "</ul>";
		unset($_SESSION['ERRMSG_ARR']);
	}
?> 
</div> 


<div style="width:100%; margin:5px;" align="center">
<form action="../upload.php" method="post" enctype="multipart/form-data" name="upload" style="margin:5px;">
<label><h3>File Uploader Module</h3> </label>
<label>File Name : </label>
<input type="text" name="fname" class="form-control" placeholder="File Name" onkeyup='countChar(this)' autocomplete="false" required/><label id='charNum' style="color: blue;"></label><br />
<label> Description</label>
<textarea name="desc" cols="" rows="" class="input-xlarge" onkeyup='countChar1(this)' required></textarea><label id='charNum1' style="color: blue;"></label><br />
<label>File Uploader : </label>
<?php 
	echo $_SESSION['uname'];
?>
<br />

<input name="uploaded_file" type="file" class="input-xlarge" required/>
<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
<br /><br />
<input name="Upload" type="submit" value="Upload" class="btn btn-primary" />
</form>
</div>

<hr style="border-color: #d8d8d8;" />

<div>
<input type="button" value="Home" class="btn btn-primary" onclick="window.open('index.php','_self');" />&nbsp;
<input type="button" value="Logout" class="btn btn-warning" onclick="window.open('../index.php','_self');" /><br /><br />
<label style="color: #0000ff;">Copyright &copy; IEMT-OUT <?php echo date("Y"); ?> - All rights reserved.</label>
</div>
</div>



</body>
</html>