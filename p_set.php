<?php
if (isset($_GET['i']) && isset($_GET['q']) && isset($_GET['ac']) ) {

  ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>About website</title>
 <link rel="stylesheet" href="css_login.css">
<script type="text/javascript">
  function Check_password(){
    var P1=document.getElementById('p1').value;
    var P2=document.getElementById('p2').value;
    var m=document.getElementById('msg');
    if (P1!=P2  ||  P2!=P1) {
      m.innerHTML='New Password and Confrom Password are Not Match!.';
      return false;
    }else {
      m.innerHTML='';
    }
  }
</script>
   </head>
   <body>
     <?php  include "nav_menu.php";  ?>
 <style>

 </style>
       <div id="md">
         <div class="ab" id="abdiv">
               <!--transparent form for the login of the Account -->
           <div class="col-xl " id="outdiv_login" >
                   <form class="login_inputdiv" action="" method="post" onsubmit="return Check_password()">
                     <h2 class="text-center" id="login_heading"><b>Reset Your Password</b></h2>
                     <?php
                        include('db_connection.php');
                        $id=$_GET['i'];  $q=$_GET['q'];  $account=$_GET['ac']; $email='';
                        if ($account=="student") {
                          $sql=mysqli_query($con ,"SELECT Email FROM student WHERE S_id='$id' AND security_question='$q'");
                          if (mysqli_num_rows($sql)==1) {
                              $r=mysqli_fetch_array($sql);
                              $email=$r[0];
                          }else {
                            echo "record problem try again";
                          }
                        }else {
                          $exe_sql=mysqli_query($con ,"SELECT Email FROM teacher WHERE T_id='$id' AND security_question='$q'");
                          if (mysqli_num_rows($exe_sql)==1) {
                              $row=mysqli_fetch_array($exe_sql);
                              $email=$row['Email'];
                          }else {
                            echo "record problem try again";
                          }
                        }
                     ?>
                     <!--==== display ===============================================================================-->
                     <div class=" col-sm " style="padding-left: 23%;border-left:solid 2px #fff;border-right:solid 2px #fff;border-bottom:solid 2px #fff;border-radius: 8px">
                       <label><b>Email Address</b></label>
                         <div class="alert alert-primary w-75 py-2 justify-content-center font-weight-bold">
                            <?php echo $email; ?>
                         </div>

                         <label class="mt-3"><b>Enter New Password</b></label>
                         <input type="password" name="password" id="p1"  placeholder="Enter the new password" class="form-control w-75 py-4 font-weight-bold" autocomplete="off"  minlength="8" required>

                       <label class="mt-4"><b>Conform Password</b></label>
                       <input type="password" name="confromp" id="p2" placeholder="Conform your new password" class="form-control w-75 py-4 font-weight-bold" autocomplete="off"  minlength="8" required>
                       <label class="font-weight-bold text-warning pb-3" id="msg"> </label><br>

                       <style media="screen">
                         @media (max-width: 257px) {   #recover_pass{ width: 80%;height: 20px;font-size: 10px}  }
                       </style>
                       <input type="submit" class="btn btn-lg xl-w-25 mt-4" value="Reset Password" name="reset_pass" id="recover_pass">
                     <!-- ended ======================================================================================-->
                       <div class="pp pt-4" >
                           <p>Click for Log in ?    <a href="login.php"> Click here</a></p>
                           <p  style="font-size: 1.0em">
                             <b> Note: </b>
                             Please Select & Enter Your New Password and reset your new password.
                          </p>
                       </div>
                     </div>
                   </form>
                   <?php
                   if (isset($_POST['reset_pass'])) {
                     $p1= $_POST['password'];
                     $p2= $_POST['confromp'];
                     echo "botton mama are presss";
                     if ($p1!=$p2 ||  $p2!=$p1) {
                       echo "<script>  document.getElementById('msg').innerHTML='New Password and Confrom Password are Not Match!.';  </script>";
                     }else {
                       if ($account=="student") {
                         $st="UPDATE `student` SET `password`='$p2' WHERE S_id='$id' AND Email='$email'";
                         if (mysqli_query($con ,$st)) {  ?>
                           <script type="text/javascript">
                           alert('Your Account password are Successfully changed');
                           var a=confirm('Do you want to Login to your Account.');
                           if (a==true) {  window.location.href='login.php';}
                           else {window.location.href='index.php';}
                           </script>
                           <?php
                         }else {
                           echo "<script> alert('Problem Occur While Changing your password!. Try Again'); </script>";
                         }
                       }else {//teacher side
                         $t="UPDATE `teacher` SET `Password`='$p2' WHERE T_id='$id' AND Email='$email'";
                         if (mysqli_query($con ,$t)) {  ?>
                           <script type="text/javascript">
                           alert('Your Account password are Successfully changed');
                           var a=confirm('Do you want to Login to your Account.');
                           if (a==true) {  window.location.href='login.php';}
                           else {window.location.href='index.php';}
                           </script>
                           <?php
                         }else {
                           echo "<script> alert('Problem Occur While Changing your password!. Try Again'); </script>";
                         }
                       }
                       //ended
                     }
                   }
                    ?>
           </div>
           <?php  include('footer.php');  ?>
           </div>
         </div>

   </body>
 </html>
 <?php
}else {
  echo "<script> window.location.href='login.php'; </script>";
}
?>
