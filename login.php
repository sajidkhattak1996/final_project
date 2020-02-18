<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>About website</title>
<link rel="stylesheet" href="css_login.css">
  </head>
  <body>
    <!--===============below loader are include =================-->
    <?php include('plugins/loader/loader1.html'); ?>
    <!--=================ended==================================-->
    <?php  include "nav_menu.php";  ?>
<style>


</style>
      <div id="md">
        <div class="ab" id="abdiv">

              <!--transparent form for the login of the Account -->
          <div class="col-xl " id="outdiv_login" >
              <!-- <div id="log_in" class="Tb bg-danger col-lg-6 col-md-8 col-sm-12" style="margin:0 auto"> -->
                <!-- <div class="login_form  bg-warning col-lg-6 col-md-8 col-sm-12 col-12" style="margin:0 auto;"> -->
                  <form class="login_inputdiv" action="" method="post">

                    <h2 class="text-center" id="login_heading"><b>Login to Class Room Management</b></h2>

                    <div class=" col-sm " style="padding-left: 23%;border-left:solid 2px #fff;border-right:solid 2px #fff;border-bottom:solid 2px #fff;border-radius: 8px">
                      <label style="color: yellow" id="emsg"></label><br>
                      <label><b>Email Address</b></label>
                      <input type="email" class="form-control w-75 py-4 justify-content-center" name="lgemail" value="<?php if(isset($_POST['btn_login'])){ echo $_POST['lgemail']; } ?>" placeholder="Email:" required>
                      <br><br>
                      <label style="color: yellow" id="pmsg"></label><br>
                      <label><b>Password</b></label>
                      <input type="password" class="form-control w-75 py-4 " name="lgpassword" value="<?php if(isset($_POST['btn_login'])){ echo $_POST['lgpassword']; } ?>" placeholder="Password:" required>

                      <input type="submit" class="btn btn-lg  xl-w-25 mt-5" value="Log in" name="btn_login" id="login_btn">
                      <div class="pp pt-5" >
                          <p>Forgot your password?  <a href="forgot_password.php"> Click here</a></p>
                          <!-- <p><b>New User ?  </b>  <a href=""> <button type="button" name="new_user_btn" onclick="return hide()" style="background:none;border:none">Click here</button> </a>  </p -->
                          <p> <b> Pivacy Policy </b>
                            <p style="font-size: 1.0em">
                            We take your privacy very seriously.
                            We do not share your detail for marketing
                             purposes with the external companies.
                           </p>
                         </p>
                      </div>
                    </div>


                  </form>
                          <?php
                              if (isset($_POST['btn_login'])) {

                                include('db_connection.php');


                                if ($con) {
                                  $em=$_POST['lgemail'];
                                  $password =$_POST['lgpassword'];
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
                                          <style>
                                          #log_in{ display: none; }
                                          #new_user{ display: block; }
                                           </style>

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
                                                echo "<script> document.getElementById('pmsg').innerHTML ='Password is Wrong!'; </script>";

                                              }else {echo "<script> document.getElementById('pmsg').innerHTML =''; </script>";}
                                              if (($te >0 &&  $se==0 && $tp==0) || ($se>0  && $te==0 && $sp==0) ) {
                                                // echo "<h2>teacher email password are wrong!!!... </h2>";
                                                  echo "<script> document.getElementById('pmsg').innerHTML ='Password is Wrong!'; </script>";
                                              }else {echo "<script> document.getElementById('pmsg').innerHTML =''; </script>";}
                                              /*condition for email wrong */
                                              if ($te==0 && $se==0 && $tp==0 && $sp==0) {  /* use if both fields are wrong */
                                                echo "<script> document.getElementById('emsg').innerHTML ='Email and Password doesnot exist!'; </script>";
                                              }else {echo "<script> document.getElementById('emsg').innerHTML =''; </script>";}
                                              if (($te==0  && $se==0 &&  $tp>0  && $sp>0 ) || ($te==0 && $se==0  && $tp>0 && $sp==0) || ($te==0  && $se==0 && $sp>0  && $tp==0) ) {
                                                  echo "<script> document.getElementById('emsg').innerHTML ='Email is Wrong!'; </script>";
                                              }else {echo "<script> document.getElementById('emsg').innerHTML =''; </script>";}


                                          }
                                          else {
                                            echo "<script> alert('Problem occur please try again !....') </script>".mysqli_error($con);
                                          }


                                        }
                                  }

                                }
                                else {
                                  echo "<script> alert('Something Problem While Connecting with Database !... '); </script>";
                                }
                              }



                          ?>

                <!-- </div> -->
              <!-- </div> -->
              <!-- Transparent form for login are ended -->
          </div>
          <?php  include('footer.php');  ?>
          </div>
        </div>
  </body>
</html>
