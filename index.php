<!DOCTYPE html>
<html lang="en" class="nav1-no-js">

<head>
  <!-- <meta http-equiv="refresh"  content="1"> -->
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
    #mmm{ color: yellow;}
    #new_user{ display: none}
    @media (max-width: 960px) { #mmm{ display: none} }
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
    <label id="mmm" style="float: right;margin-right: 120px;letter-spacing: 0.4px;word-spacing: 2px;"></label>
</header>
	</div>
<a href="#" class="nav1-button">Menu</a>

<nav1 class="nav1">
    <ul id="menu_ul">
        <li>  <a href="index.html">   Home          </a></li>
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
           <h2>Select Your Log in Account Type</h2>
       </form>
       <div id="new_user_body">
           <p> <h2>Select any One of the Login Account </h2>
             <h4>
                   <ul>
                     <a href=""><li>Teacher</li></a>
                     <a href=""><li>Student</li></a>
                   </ul>
             </h4>
           </p>
       </div>
       <form class="" action="" method="post">
         <button type="submit" name="close_btn2" id="cl2" ><b>Colse </b><span class="glyphicon glyphicon-remove" ></span></button>
       </form>
    </div>
</div>
<?php
  if (isset($_POST['close_btn1'])  ||  isset($_POST['close_btn2']) ) { ?>
    <style> #new_user{ display: none} </style>
  <?php  }  ?>
<!--ended-->
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>



<?php
$server ="localhost";
$user   ="root";
$pass   ="";
$db     ="project_db";

$con = mysqli_connect($server,$user,$pass,$db);
if (isset($_POST['lg'])) {
      if ($con) {
              // echo "connection are created successfully <br>";
              $em=$_POST['email'];
              $password =$_POST['pass'];

              // echo "email =".$em."<br>pass=".$password;
              // echo "<br>";
            /* first condition for the login of email are checked and started   */
              $q1 ="select Email, Password from teacher WHERE Email ='$em' AND Password='$password'";
              $q2 ="select Email , Password from Student WHERE Email='$em' AND Password='$password'";

              $r1 =mysqli_query( $con  ,$q1 );
              $r2 =mysqli_query( $con  ,$q2 );

              $t1 =mysqli_num_rows($r1);
              $t2 =mysqli_num_rows($r2);

              if ( $r1  AND $r2 ) {
                    // echo "query1 are successfully executed .... ";
                    // echo "query2 are successfully executed .... ";
                    // echo "<br>";
                    // echo "query 1 have no of rows == ".$t1."<br> and query 2 have no of nows == ".$t2;

                /* this condition check and use if email are found in the  both table and also there Password are also same for them */
                    if ( $t1>0  AND $t2>0) {    /* Email and password for the both table are same ....and it display dialog box for conformation   */
                      ?>
                      <style>  #new_user{ display: block;}  </style>
                    <?php  }
                    if ($t1 >0 AND $t2 <1 ) {   /* if email and password are only matched with the teacher table */
                      echo "<h1>email and password are only matched with the teacher table </h1>";
                    }
                    if ($t2 >0 AND $t1 <1)  {   /* if email and password are only matched with student table  */
                      echo "<h1>email and password are only matched with the student table  </h1>";
                    }
                    /* the below if condition are executed when somthing problem in the email and password... */
                    if($t1 <1 && $t2<1) {
                            // echo "<br><h1>Something problem in email or password !.... </h1>";

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
                                      echo "all are executed ....";
                                      if ($te>0  &&  $se >0  && $tp==0 && $sp==0 )
                                      {  // password are wrong!!!...  ?>
                                          <script>
                                              var x = document.getElementById('mmm');
                                              x.innerHTML ='Password is Wrong!';
                                          </script>
                                      <?php  }
                                      if ($te >0 &&  $se==0 && $tp==0  || ($se>0  && $te==0 && $sp==0) ) {
                                        // teacher email password are wrong!!!...
                                        ?>
                                            <script>
                                                var x = document.getElementById('mmm');
                                                x.innerHTML ='Password is Wrong!';
                                            </script>
                                        <?php  }
                                      /*condition for email wrong */
                                      if ($te==0 && $se==0 && $tp==0 && $sp==0) {  /* use if both fields are wrong */
                                        // ' Email and Password is wrong !....
                                        ?>
                                            <script>
                                                var x = document.getElementById('mmm');
                                                x.innerHTML ='Email and Password is Wrong!';
                                            </script>
                                        <?php  }
                                      if (($te==0  && $se==0 &&  $tp>0  && $sp>0 ) || ($te==0 && $se==0  && $tp>0 && $sp==0) || ($te==0  && $se==0 && $sp>0  && $tp==0) ){
                                      // email is wrong for both table and for teacher table and for student table
                                      ?>
                                          <script>
                                              var x = document.getElementById('mmm');
                                              x.innerHTML ='Email  is Wrong!';
                                          </script>
                                      <?php  }

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




</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="menu css and js/js/nav1.jquery.min.js"></script>
<script>
    $('.nav1').nav1();
</script>
