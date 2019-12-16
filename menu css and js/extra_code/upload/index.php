<?php 
@session_start();
session_destroy();
session_write_close();
require("opener_db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documentation System - Home</title>
<script type="text/javascript" src="jquery-1.8.2.js"></script>
<script type="text/javascript" src="bootstrap.js"></script>
<script type="text/javascript" src="bootstrap-button.js"></script>
<script type="text/javascript" src="page.js"></script>        
<script type="text/javascript" src="menu.js"></script>
<link href="bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body style="background-color: #D0D0D0;">


<div style="position:relative; width:1000px; margin:1em auto; padding:5px; background-color: #ffffff;" class="table-bordered">
 <div class="banner" style="width:100%;" >
 	<div style="width:100%;	height:100px; margin:1px auto; background-color:rgb(80, 100, 220);	background-image:url('banner.jpg');	background-repeat: no-repeat;"></div>	
 </div> 
 
 <hr style="border-color: #d8d8d8;" />
 
<div style="width:100%; margin:5px;" align="right">
<form action="login.php" method="post" style="margin:25px;" class="form-inline" role="form">
<input type="text" id="form-elem-3" class="form-control" placeholder="Username" name="uname"/>&nbsp;
<input type="password" id="form-elem-3" class="form-control" placeholder="Password" name="upass"/>
<input type="submit" class="btn btn-success" value="Login" />
</form>
</div>

<hr style="border-color: #d8d8d8;" />

<div align="center"><span class='table_headers'><h2 style="color: #f8f8f8;">Available Documents</h2></span></div>

<div id="container">
	<table border='2'>
      <div class="data"></div>
    </table>
      <div class="pagination"></div>
</div>  

<hr style="border-color: #d8d8d8;" />

<div>
<label style="color: #0000ff;">Copyright &copy; HBT - Developers <?php echo date("Y"); ?> - All rights reserved.</label> 
</div>
</div>



</body>
</html>