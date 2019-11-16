<?php
session_start();
$server ="localhost";
$user   ="root";
$pass   ="";
$db     ="project_db";
//connection with the databse table
$con = mysqli_connect($server,$user,$pass,$db);

?>
<!DOCTYPE html>
<html lang="en" class="nav1-no-js">

<head>
<!-- <meta http-equiv="refresh" content="1"> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>Responsive navigation</title>
	<link rel="stylesheet" href="forms/css/bootstrap.min.css">
  <link rel="stylesheet" href="menu css and js\bootstrap 4\css\glyphicon.css">
	<script src="forms/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="menu css and js/css/normalize.min.css">
    <link rel="stylesheet" href="menu css and js/css/defaults.min.css">
    <link rel="stylesheet" href="menu css and js/css/nav1-core.css">
    <link rel="stylesheet" href="menu css and js/css/nav1-layout.css">
    <style type="text/css">
     #mmm{
       color: yellow;letter-spacing: 0.5px;word-spacing: 3px;
     }
     @media (max-width: 960px){
       #mmm{ display: none;}
     }
    </style>
    <link href="menu css and js/css/sajid.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/ie8-core.min.css">
    <link rel="stylesheet" href="css/ie8-layout.min.css">
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->

    <script src="menu css and js/js/rem.min.js"></script>

</head>

<body>
<!-- nav1agation menu are start from here -->
<div id="idheader" style="padding-top:5px; padding-bottom: 0px;background-color: #008c7e">
<header>
    <h1 style=""><img src="logo\LOGO2.png"    id="logo">  </h1>
    <div style="margin-top:-60px;" id="webhead">Class Room Management</div>
    <div id="mmm" style="margin-right: 100px;">
      <label id="m"></label>
    </div>
</header>
	</div>
<a href="#" class="nav1-button">Menu</a>

<nav1 class="nav1">
    <ul id="menu_ul">
        <li>  <a href="index.php">   Home          </a></li>
		    <li id="lb_for_mobile"><a href="login.php">Log in    </a></li>  <!-- this button are also hide in the desktop view -->
        <li><a href="about.php"  >       About     </a></li>
        <li class="nav1-submenu"><a href="#">Create Account </a>
            <ul>
                <li><a href="std_acc.php">Student      </a></li>
                <li><a href="teacher_profile.php">Teacher      </a></li>
            </ul>
        </li>

        <li><a href="contact.php">Contact             </a></li>

<!--	this below code are hidden in the mobile view size -->
		<li id="log_h">
			<div class="log_in_f">

				<form name="logform" action="" method="post" >
					Email: <input type="email" name="email" placeholder=" Enter email " required onblur="fn()" > &nbsp;
					Password: <input type="password" name="pass" placeholder="Enter Password" required >
<!--					<a href="#" style="margin-top: -60px;">Forgot password</a>-->
					<input type="submit" name="lg" value="Log in" id="log_in_button" >
            <div id="FPdiv" style="border-radius: 0px 0px 20px 20px;display:none;">
                  <h5 id="FPmsg">Forgot Password:<a href="login.php" >Click here</a></h5>
            </div>
				</form>
			</div>
		</li>
    <script>

    function fn(){
      document.getElementById('FPdiv').style.display='block';
      setTimeout(f2, 60000)
    };
    function f2(){ document.getElementById('FPdiv').style.display='none';};


    </script>
<!--	ended of mobile size cose -->
    </ul>
	</nav1>
<a href="#" class="nav1-close">Close Menu</a>
<!-- nav1agation menu are ended here -->



 <!-- background image are present below in the div class by the css property -->
<div class="bgdiv" id="bgdiv">	<br>		<div class="headbox"></div>   </div>
<!--ended  -->

<style>
       /* css for new user div class */
        #new_user{
          display: none;
            background: rgba(0,166,138,0.7);
            width: 40%;
             margin:0 auto;
             margin-top: -450px;
            height: auto;
             border-radius: 12px;
        }
         #new_user_form{
             padding-left: 20px;
         }
         #cl1{ background: none;border: none;float: right; font-size: 25px;}
         #cl1:hover{color: red;transition: 0.7s}
         #new_user_body {border: solid 1px yellow;border-radius: 12px;padding-left: 20px;width:90%;margin: 20px  25px;}
         #new_user_body ul li{ color: #fff;padding-top: 5px;padding-bottom: 5px;}
         #new_user_body ul li:hover{ color: blue;font-size: 25px}
         #cl2{background: none; border:solid 1px red;border-radius: 25px;color:yellow}
         #cl2:hover{background: red;color: #fff;transition: 0.8s}
       @media (max-width:960px){
         #new_user{
           background: rgba(0,166,138,0.7);
           width: 40%;
           margin:0 auto;
           margin-top: -300px;
           height: auto;
           border-radius: 12px;
         }
         #new_user_body {border: solid 1px yellow;border-radius: 12px;padding-left: 20px;width:80%;margin: 20px  25px;}

         #new_user_form h2,#new_user_body h2{font-size: 18px}

       }
       @media (max-width:600px){
         #new_user{
           background: rgba(0,166,138,0.7);
           width: 60%;
           margin:0 auto;
           margin-top: -300px;
           height: auto;
           border-radius: 12px;
         }
         #new_user_form h2,#new_user_body h2{font-size: 14px}

       }

       @media (max-width:300px){
         #new_user{
           background: rgba(0,166,138,0.7);
           width: 90%;
           margin:0 auto;
           margin-top: -300px;
           height: auto;
           border-radius: 12px;
         }
         #new_user_form h2,#new_user_body h2{font-size: 14px}

       }
       /* ended */
 </style>
<!-- If click on  New use button then this below form are open -->
<div id="new_user" >
  <div class="new_user_divin">
     <form class="" action="" method="post" id="new_user_form">
         <button type="submit" name="close_btn1" id="cl1" >
         <span class="glyphicon glyphicon-remove"></span></button>
         <h2>Select Your Account Login Type</h2>
     </form>
     <form action="" method="post">
         <div id="new_user_body">
             <p> <h2>Select One of Your Log in Account Type</h2>
               <h4>
                     <ul>
                      <button type="submit" name="btn_t" style="background:none;border:none;"><li>Teacher</li></button><br>
                      <button type="submit" name="btn_s" style="background:none;border:none;"> <li>Student</li> </button>
                     </ul>
               </h4>
             </p>
         </div>
   </form>
              <?php
                  if (isset($_POST['btn_t'])) {
                    if (isset($_SESSION['email']) && isset($_SESSION['pass']) ) {
                          if ($con) {
                            $em=$_SESSION['email'];
                            $password =$_SESSION['pass'];
                            $q1 ="select Email, Password from teacher WHERE Email ='$em' AND Password='$password'";
                            $r1 =mysqli_query( $con  ,$q1 );
                            $status =mysqli_num_rows($r1);
                            if ($status==1) {
                              echo "<script> window.location.href='teacher_table/tmain_table.php';  </script>";
                            }
                            else {
                              echo "<script> alert('Problem Occur while Login to account! try again '); </script>";

                            }

                          }
                          else {
                            echo "<script> alert('try again while problem in connection '); </script>".mysqli_error($con);
                          }

                      }
                    else {
                      echo "<script> alert('Please Enter Again Email and Password '); </script>";
                        }

                  }
                  if (isset($_POST['btn_s'])) {
                    if (isset($_SESSION['email']) && isset($_SESSION['pass']) ) {
                          if ($con) {
                            $em=$_SESSION['email'];
                            $password =$_SESSION['pass'];
                            $q2 ="select Email , Password from Student WHERE Email='$em' AND Password='$password'";
                            $r2 =mysqli_query( $con  ,$q2 );
                            $status =mysqli_num_rows($r2);
                            if ($status==1) {
                              echo "<script> window.location.href='info_forms/main_table.php';  </script>";
                            }
                            else {
                              echo "<script> alert('Problem Occur while Login to account! try again '); </script>";

                            }

                          }
                          else {
                            echo "<script> alert('try again while problem in connection '); </script>".mysqli_error($con);
                          }

                      }
                    else {
                      echo "<script> alert('Please Enter Again Email and Password '); </script>";
                        }
                  }
              ?>
     <form class="" action="" method="post">
       <button type="submit" name="close_btn2" id="cl2"><b>Colse </b><span class="glyphicon glyphicon-remove"></span></button>
     </form>
  </div>
</div>
<!--ended-->
<!-- php code for the above notificaiton box to close them  -->
<?php
if (isset($_POST['close_btn1'])  ||  isset($_POST['close_btn2'])) {  ?>
  <style>   #new_user{ display: none;}  </style>
<?php }   ?>
<!-- ended -->






</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="menu css and js/js/nav1.jquery.min.js"></script>
<script>
    $('.nav1').nav1();
</script>


<?php
if (isset($_POST['lg'])) {
      if ($con) {
              $em=$_POST['email'];
              $password =$_POST['pass'];
            /* first condition for the login of email are checked and started   */
              $q1 ="select Email, Password from teacher WHERE Email ='$em' AND Password='$password'";
              $q2 ="select Email , Password from Student WHERE Email='$em' AND Password='$password'";

              // executing the query
              $r1 =mysqli_query( $con  ,$q1 );
              $r2 =mysqli_query( $con  ,$q2 );

              // check for the number of row contain
              $t1 =mysqli_num_rows($r1);
              $t2 =mysqli_num_rows($r2);

              if ( $r1  AND $r2 ) {
                /* this condition check and use if email are found in the  both table and also there Password are also same for them */
                    if ( $t1>0  AND $t2>0) { /* Email and password for the both table are same .... */
                        $_SESSION['email'] = $em;
                        $_SESSION['pass'] = $password;
                    ?>
                      <style> #new_user{ display: block; } </style>

                    <?php  }
                    if ($t1==1 AND $t2==0 ) {
                      // echo "<h1>email and password are only matched with the teacher table </h1>";
                      $_SESSION['email'] = $em;
                      $_SESSION['pass'] = $password;
                      echo "<script> window.location.href='teacher_table/tmain_table.php';  </script>";
                    }
                    if ($t2==1 AND $t1==0) {
                      // echo "<h1>email and password are only matched with the student table  </h1>";
                      $_SESSION['email'] = $em;
                      $_SESSION['pass'] = $password;
                      echo "<script> window.location.href='info_forms/main_table.php';  </script>";
                    }
                    if($t1 <1 && $t2<1) {
                      /*  Something problem in email or password !.... */

                      /* here we check for wrong email or password */
                      $temail ="select Email FROM teacher WHERE Email ='$em'";
                      $tpass ="select Password from teacher WHERE Password='$password'";

                      $tr1=mysqli_query($con ,$temail);
                      $tr2=mysqli_query($con ,$tpass);

                      $te=mysqli_num_rows($tr1);
                      $tp=mysqli_num_rows($tr2);


                      /* student */
                      $semail ="select Email FROM student WHERE Email ='$em'";
                      $spass ="select Password from student WHERE Password='$password'";

                      $sr1=mysqli_query($con ,$semail);
                      $sr2=mysqli_query($con ,$spass);

                      $se=mysqli_num_rows($sr1);
                      $sp=mysqli_num_rows($sr2);

                      if ($tr1 && $tr2 && $sr1 && $sr2) {
                          /*  all are executed ... */
                          if ($te>0  &&  $se >0  && $tp==0 && $sp==0 )
                          {
                            // echo "<h2> password are wrong!!!... </h2>";
                            echo "<script> document.getElementById('m').innerHTML ='Password is Wrong!'; </script>";
                          }
                          if (($te >0 &&  $se==0 && $tp==0) || ($se>0  && $te==0 && $sp==0) ) {
                            // echo "<h2>teacher email password are wrong!!!... </h2>";
                              echo "<script> document.getElementById('m').innerHTML ='Password is Wrong!'; </script>";
                          }
                          /*condition for email wrong */
                          if ($te==0 && $se==0 && $tp==0 && $sp==0) {  /* use if both fields are wrong */
                            echo "<script> document.getElementById('m').innerHTML ='Email and Password doesnot exist!'; </script>";
                          }
                          if (($te==0  && $se==0 &&  $tp>0  && $sp>0 ) || ($te==0 && $se==0  && $tp>0 && $sp==0) || ($te==0  && $se==0 && $sp>0  && $tp==0) ) {
                              echo "<script> document.getElementById('m').innerHTML ='Email is Wrong!'; </script>";

                          }




                      }
                      else {
                        echo "<script> alert('Problem occur please try again !....') </script>".mysqli_error($con);
                      }


                    }
              }
              else {
                echo "<script> alert('Something Problem in Database Connection Please Try Again ! '); </script>".mysqli_error($r1).mysqli_error($r2);
              }


      }
      else {
        echo "<script> alert('Something Problem in Database Connection Please Try Again ! '); </script>".mysqli_error($con);
      }
}
mysqli_close($con);
?>
