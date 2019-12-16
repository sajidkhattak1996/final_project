<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>student create profile </title>
    <link   rel="stylesheet"   href="css_create_account.css" >
	<link rel="stylesheet" href="forms/css/bootstrap.css">


 </head>
  <body>
<?php include "index.php";  ?>
  <div class="student_account">
    	<div class="form-a"  >
          <form class="col-12"  onsubmit="fn()" action="" method="post">
              <div id="top_head" ><center><b>Create Account</b></center><br> </div>
              <span id="msg1" class="font-weight-bold" style="color:greenyellow;margin-left: 40%"> </span>
              <div class="row" id="insidediv">

              <div class="col-2" style="margin: 0 auto">
                    <div class="form-group input-group-lg">
                      <label id="input_labal"><b>Class ID :</b></label>
                      <input type="text" id="std" name="class_id" value="<?php if(isset($_POST['btn_sp'])){ echo $_POST['class_id']; }; ?>"  placeholder="Enter Class ID" class="form-control text" autocomplete="off" required pattern="\d+" title="Please enter only pasitive numbers" minlength="1">
                      <span id="sttd" class="font-weight-bold" style="color:greenyellow"></span>
                      </div>
              </div>

              <div class="col-2" style="margin: 0 auto">
                    <div class="form-group input-group-lg">
                    <label id="input_labal"><b>Enrollment Key :</b></label>
                    <input type="text" id="enroll" name="enroll_key" value="<?php if(isset($_POST['btn_sp'])){ echo $_POST['enroll_key']; }; ?>"  placeholder="Enter Enrollment Key" class="form-control text " autocomplete="off" required minlength="2" title="Enter Enrollment key which given to you by your teacher">
                    <span id="enr" class="font-weight-bold" style="color:greenyellow"></span>
                    </div>
              </div>

              <div class="col-2" style="margin: 0 auto">
                    <div class="form-group input-group-lg">
                      <label id="input_labal"><b>Class NO :</b></label>
                      <input type="text" id="std" name="class_no" value="<?php if(isset($_POST['btn_sp'])){ echo $_POST['class_no']; }; ?>"  placeholder="Enter Your Class No " class="form-control text" autocomplete="off" required pattern="\d+" title="Please enter only pasitive numbers" minlength="1">
                      <span id="cno" class="font-weight-bold" style="color:greenyellow"></span>
                      </div>
              </div>


              <div class="col-10 text-light" style="margin-left: 50px; word-spacing: 5px;letter-spacing:2px;">
                       <b id="userinfo">User Information</b><br>
              </div>


              <div class="col-5" style="margin: 0 auto;">
                <div class="form-group input-group-lg" style="padding-top: 10px;">
                  <label id="input_labal"><b>First Name :</b></label>
                  <input type="text" id="fname" name="fname" value="<?php if(isset($_POST['btn_sp'])){ echo $_POST['fname']; }; ?>" placeholder="First name" class="form-control text" autocomplete="off" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{2,20}$" title="First Name must be start with Alphabit & between 3 to 20 character long" minlength="3" maxlength="20">
                  <span id="fnme" class="font-weight-bold" style="color:greenyellow" ></span>
                  </div>

                  <div class="form-group input-group-lg"  style="padding-top: 10px;">
                    <label id="input_labal"><b>Email address :</b></label>
                    <input type="email" name="email1" value="<?php if(isset($_POST['btn_sp'])){ echo $_POST['email1']; }; ?>" placeholder="Email" class="form-control text" autocomplete="off" required  id="e1">
                    <span id="Email" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>

                  <div class="form-group input-group-lg"  style="padding-top: 10px;">
                    <label id="input_labal"><b>Password :</b></label>
                    <input type="password" name="password1" value="<?php if(isset($_POST['btn_sp'])){ echo $_POST['password1']; }; ?>" placeholder="Password" class="form-control text" autocomplete="off" required minlength="8"  id="p1" title="At least Eight character are required!.">
                    <span id="paswd" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>


              </div>

              <div class="col-5" style="margin: 0 auto">
                <div class="form-group input-group-lg" style="padding-top: 10px;">
                  <label id="input_labal"><b>Last Name :</b></label>
                  <input type="text" id="lname" name="lname" value="<?php if(isset($_POST['btn_sp'])){ echo $_POST['lname']; }; ?>" placeholder="Last name" class="form-control text" autocomplete="off" required>
                  <span id="lnme" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>

                  <div class="form-group input-group-lg" style="padding-top: 10px;">
                    <label id="input_labal"><b>Confirm Email :</b></label>
                    <input type="text" name="email2" value="<?php if(isset($_POST['btn_sp'])){ echo $_POST['email2']; }; ?>" placeholder="Confirm Email" class="form-control text" autocomplete="off" required id="e2">
                    <span id="emsg" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>

                  <div class="form-group input-group-lg" style="padding-top: 10px;">
                    <label id="input_labal"><b>Confirm Password :</b></label>
                    <input type="password"  name="password2" value="<?php if(isset($_POST['btn_sp'])){ echo $_POST['password2']; }; ?>" placeholder="Confirm Password" class="form-control text" autocomplete="off" required minlength="8"  id="p2" >
                    <span id="pmsg" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>

              </div>
              <div class="form-group" id="cp" >
                <br>
                <input type="submit" name="btn_sp"  value="Create Profile" class="" id="create_profile_btn"  onclick="return fn();">


                    <label id="exuser"><b>All ready have an Account:</b>
                      <a href="login.php" class="text-light small">  Click Here </a>

                    </label>


              </div>



            </div>
             <br>

          </form>
       </div>
          <?php
              if (isset($_POST['btn_sp'])) {
                $fname       =   $_POST['fname'];
                $lname       =   $_POST['lname'];
                $name        =   ($fname." ".$lname);

                $email1      =   $_POST['email1'];
                $email2      =   $_POST['email2'];
                $password1   =   $_POST['password1'];
                $password2   =   $_POST['password2'];
                $class_id    =   $_POST['class_id'];
                $cid=$class_id;
                $class_no    =   $_POST['class_no'];          // it is the student class number
                $enroll_key  =   $_POST['enroll_key'];
                // $subject_id  =   $_POST['subject_id'];
                include('db_connection.php');

                if ($con) {

                  $statement1 ="SELECT Class_id,Enrollment_key FROM class WHERE Class_id ='$class_id' AND Enrollment_key='$enroll_key'";
                  $q1=mysqli_query($con ,$statement1);


                  if ($q1) {
                    $r =mysqli_num_rows($q1);
                    if ($r==1) {
                      // echo "class id and rnrollment key is okkkkkkkk<br>";

                                  $temp="SELECT Email FROM student WHERE Email='$email2'";
                                  $result=mysqli_query($con, $temp );
                                  if ($result) {
                                      $status=mysqli_num_rows($result);
                                      if ($status==0) {

                                        $std_insert="INSERT INTO student (student_name, Email, password) VALUES ('$name', '$email2', '$password2');";
                                        $e1=mysqli_query($con, $std_insert);
                                            if ($e1) {
                                                $query_for_id ="SELECT S_id FROM student WHERE Email='$email2' AND password='$password2'";
                                                $res=mysqli_query($con ,$query_for_id);
                                                $row=mysqli_fetch_array($res);
                                                $s_id=$row['S_id'];
                                                $S_id=$row['S_id'];                  //student id
                                                // echo "<h1>".$s_id."</h1";
                                                      $stmt_subid="SELECT Subject_id FROM have WHERE Class_id='$cid'";
                                                      $exe_subid=mysqli_query($con,$stmt_subid);
                                                      $es=mysqli_fetch_array($exe_subid);


                                                      $subid=$es['Subject_id'];   //subject id
                                                      //okkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk
                                                      $stmt_check="SELECT Subject_id,Class_id,S_id FROM have WHERE Subject_id='$subid' AND Class_id='$cid'";
                                                      $exe_check=mysqli_query($con ,$stmt_check);
                                                      $rr=mysqli_fetch_array($exe_check);

                                                      if ($rr['S_id']==0)
                                                      {
                                                            // echo "oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo00000000000".$S_id;
                                                            $stmt_update="UPDATE have SET S_id='$S_id' WHERE Subject_id='$subid' AND Class_id='$cid'";
                                                            $exe_update=mysqli_query($con, $stmt_update);

                                                            $stmt_reg_check="SELECT Class_id,S_id,Enrollment_key FROM register WHERE Class_id='$cid'  AND S_id='$S_id'  AND Enrollment_key='$enroll_key'";
                                                            $exe_reg1=mysqli_query($con ,$stmt_reg_check);
                                                            $e_row=mysqli_fetch_array($exe_reg1);
                                                            if ($cid==$e_row['Class_id']  && $enroll_key==$e_row['Enrollment_key'] && $S_id=$e_row['S_id'])
                                                                    {  ?>
                                                                            <script type="text/javascript">
                                                                                            alert('Your Account are Successfully Created and Enrolled to the Class.');
                                                                                            var a=confirm('Do you want to Login to your Account.');
                                                                                            if (a==true) {
                                                                                              // console.log('ok are pess');
                                                                                              window.location.href='login.php';
                                                                                            }
                                                                                            else {
                                                                                              // console.log('canncel are press');
                                                                                              window.location.href='index.php';
                                                                                            }
                                                                            </script>
                                                                    <?php      /* echo "updated and inserted data in hava table only "; */
                                                                    }
                                                            else {
                                                                    $stmt_register="INSERT INTO register(Class_id, S_id,Reg_no, Enrollment_key) VALUES ('$cid','$S_id','$class_no','$enroll_key')";
                                                                    $exe_r=mysqli_query($con,$stmt_register);
                                                                      // echo "updated and inserted data  in both  ";
                                                                      ?>
                                                                      <script type="text/javascript">
                                                                                        alert('Your Account are Successfully Created and Enrolled to the Class.');
                                                                                        var a=confirm('Do you want to Login to your Account.');
                                                                                        if (a==true) {
                                                                                          // console.log('ok are pess');
                                                                                          window.location.href='login.php';
                                                                                        }
                                                                                        else {
                                                                                          // console.log('canncel are press');
                                                                                          window.location.href='index.php';
                                                                                        }
                                                                      </script>
                                                                      <?php
                                                                   }


                                                          }
                                                          else {
                                                                $q1="SELECT Subject_id,Class_id,S_id FROM have WHERE Subject_id='$subid'  AND Class_id='$cid' AND S_id='$S_id'";
                                                                $q2="SELECT Class_id,S_id,Enrollment_key FROM register WHERE Class_id='$cid' AND S_id='$S_id' AND Enrollment_key='$enroll_key'";
                                                                $eq1=mysqli_query($con,$q1);
                                                                $eq2=mysqli_query($con,$q2);

                                                                $r1=mysqli_num_rows($eq1);
                                                                $r2=mysqli_num_rows($eq2);

                                                                if ($r1>0 && $r2>0 ) { ?>
                                                                          <!-- echo "<h1>you are allready resgister with this class </h1>"; -->
                                                                          <script type="text/javascript">
                                                                              document.getElementById("msg1").innerHTML='Your are allready registed with this class ! please try another...';
                                                                              setTimeout(fn ,5000);
                                                                              function fn(){
                                                                                document.getElementById("msg1").innerHTML='';
                                                                              }
                                                                          </script>
                                                                        <?php }
                                                                else {
                                                                  //this mean the the student are not register with the this class
                                                                  $stmt_reg_check="SELECT Class_id,S_id,Enrollment_key FROM register WHERE Class_id='$cid'  AND S_id='$S_id'  AND Enrollment_key='$enroll_key'";
                                                                  $exe_reg1=mysqli_query($con ,$stmt_reg_check);
                                                                  $e_row=mysqli_fetch_array($exe_reg1);
                                                                              if ($cid==$e_row['Class_id']  && $enroll_key==$e_row['Enrollment_key'] && $S_id=$e_row['S_id'])
                                                                              {
                                                                                     $q="INSERT INTO have(Subject_id, Class_id, S_id) VALUES ('$subid','$cid','$S_id')";
                                                                                     mysqli_query($con ,$q);
                                                                                  //   echo "inserted data in hava table only ";
                                                                                     ?>
                                                                                     <script type="text/javascript">
                                                                                               alert('Your Account are Successfully Created and Enrolled to the Class.');
                                                                                               var a=confirm('Do you want to Login to your Account.');
                                                                                               if (a==true) {
                                                                                                 // console.log('ok are pess');
                                                                                                 window.location.href='login.php';
                                                                                               }
                                                                                               else {
                                                                                                 // console.log('canncel are press');
                                                                                                 window.location.href='index.php';
                                                                                               }
                                                                                     </script>

                                                                                     <?php
                                                                               }
                                                                               else {
                                                                                 $q="INSERT INTO have(Subject_id, Class_id, S_id) VALUES ('$subid','$cid','$S_id')";
                                                                                 $e=mysqli_query($con ,$q);
                                                                                 $stmt_register="INSERT INTO register(Class_id,S_id,Reg_no, Enrollment_key) VALUES ('$cid','$S_id','$class_no','$enroll_key')";
                                                                                 $exe_r=mysqli_query($con,$stmt_register);
                                                                                        if ($e && $exe_r) {
                                                                                        //  echo "<h1>you are  resgister with this class deeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeepppppppppppp </h1>";
                                                                                                    ?>
                                                                                                    <script type="text/javascript">
                                                                                                      alert('Your Account are Successfully Created and Enrolled to the Class.');
                                                                                                      var a=confirm('Do you want to Login to your Account.');
                                                                                                      if (a==true) {
                                                                                                        // console.log('ok are pess');
                                                                                                        window.location.href='login.php';
                                                                                                      }
                                                                                                      else {
                                                                                                        // console.log('canncel are press');
                                                                                                        window.location.href='index.php';
                                                                                                      }
                                                                                                    </script>
                                                                                                    <?php

                                                                                        }
                                                                                      }

                                                                }

                                                                  // echo "not zerooooooooooooooooooooooooooooooooooooo";

                                                                }



                                            }else {
                                              echo "<script>  alert('problem while creating an account!'); </script>";

                                            }


                                      }
                                      if ($status>0) { ?>
                                          <script> document.getElementById('Email').innerHTML='Your Email All ready exist! Please try new...';
                                              setTimeout(fn ,5000);
                                                 function fn(){
                                                   document.getElementById("Email").innerHTML='';
                                                 }
                                           </script>
                                           <?php
                                      }
                                  }else {
                                    echo "<script>  alert('problem occur while executing the query'); </script>";
                                  }

                    }
                    if ($r==0) {
                      $statement2 ="SELECT Class_id FROM class WHERE Class_id='$class_id'";
                      $statement3 ="SELECT Enrollment_key FROM class WHERE Enrollment_key='$enroll_key'";

                      $q2=mysqli_query($con ,$statement2);
                      $q3=mysqli_query($con ,$statement3);
                      if ($q2  && $q3) {
                          $s1=mysqli_num_rows($q2);
                          $s2=mysqli_num_rows($q3);

                          if ($s1==0  && $s2==0) {  ?>
                              <style> #sttd{ font-size: 16px;}  </style>

                            <script> document.getElementById('sttd').innerHTML='Class id and Enrollment key Donot matched with any records !';
                            setTimeout(fn ,5000);
                               function fn(){
                                 document.getElementById("sttd").innerHTML='';
                               }
                            </script>
                            <?php
                           }

                          if ($s1==0  && $s2>0) { ?>
                            <script> document.getElementById('sttd').innerHTML='Class ID is Wrong!';
                            setTimeout(fn ,5000);
                               function fn(){
                                 document.getElementById("sttd").innerHTML='';
                               }
                             </script>
                             <?php
                          }
                          if ($s1==1 && $s2==0) {
                            ?>  <script> document.getElementById('enr').innerHTML='Enrollment Key is Wrong!';    setTimeout(fn ,5000);   function fn(){   document.getElementById("enr").innerHTML='';   }  </script>  <?php

                          }
                      }else {
                        echo "<script>  alert('problem occur while executing the query'); </script>";
                      }
                    }
                  }
                  else {
                    echo "<script>  alert('problem occur while executing the query'); </script>";

                  }
                }
                else {
                  echo "<script>  alert('problem occur while connecting to the database!...'); </script>";

                }

              }

           ?>
</div>

  </body>
</html>

<script>
      function fn(){
        var E1 = document.getElementById('e1').value;
        var E2 = document.getElementById('e2').value;

        var P1 = document.getElementById('p1').value;
        var P2 = document.getElementById('p2').value;

        var m1 = document.getElementById('emsg');
        var m2 = document.getElementById('pmsg');

        function fn(){   document.getElementById("emsg").innerHTML='';   }
        function f(){   document.getElementById("pmsg").innerHTML='';   }

        if (E1!=E2) {
          m1.innerHTML ="Email are not matched!... ";
          setTimeout(fn ,8000);
          return false;
        }


        if (P1!=P2) {
        m2.innerHTML = "Password are not matched!...";
        setTimeout(f ,8000);
        return false;
      }


      }

  </script>
