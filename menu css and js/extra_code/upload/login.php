<?php
include ('connect.php');
@session_start();
@$upass=$_POST['upass'];
@$_SESSION['uname']=mysqli_real_escape_string($_POST['uname']);
@$uname=$_SESSION['uname'];
@$upass=md5($upass);

@$selectqry="SELECT * FROM users WHERE uname='$uname'";
@$results=mysqli_query($con,$selectqry);

if (isset($_POST['uname']) && (isset($_POST['upass']))){
while($details=mysqli_fetch_array($results)) {
	@$dbuname=	$details['uname'];
	@$dbupass=	$details['upass'];
}

// if (@$dbuname==$uname && @$dbupass==$upass ) {

		@mysqli_query($con,$hdslog);
		Header( "Location: admin/" );
		exit();

	// }

// else if(@$dbuname!=$uname || @$dbupass!=$upass){
echo "<script>
alert('Wrong username or password. Please try again');
window.open('index.php','_self');
 </script>";
// }

}
?>
