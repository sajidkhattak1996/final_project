<!--===============below loader are include =================-->
<?php include('plugins/loader/loader1.html'); ?>
<!--=================ended==================================-->
<?php include "nav_menu.php";  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    .form-a{
      position: absolute;
      width: 100%;
      height: auto;
      box-sizing: border-box;
      background: rgba(0,166,138,0.9);
      padding: 10px;
      border-radius: 20px;
    }
    /* css for create profile button */
    #create_profile_btn{
      width: 30%;
      height: 35px;
      background-color: #fff;
      color: #008c7e;
      font-size: 11px;
      border: solid 1px #008c7e;
      border-radius: 8px;
    }
    #create_profile_btn:hover{
      color: #fff;
      background-color: #008c7e;
      border-color: #FFF;
    }
    .row{ margin-left: 10% }
    .col-lg{ margin-left: 10% }
    @media (min-width: 960px) {    #md{  transform: translate(0%,-82%); }   }
    @media (min-width: 576px) and (max-width: 959px) {    #md{  transform: translate(0%,-57%); }  }
    @media (min-width: 405px) and (max-width: 575px) {    #md{  transform: translate(0%,-36%); } #create_profile_btn{ width: 35% }  }
    @media (min-width: 325px) and (max-width: 405px) {    #md{  transform: translate(0%,-34%); } #create_profile_btn{ width: 45% }  }
    @media (min-width: 258px) and (max-width: 325px) {    #md{  transform: translate(0%,-34%); }  #create_profile_btn{ width: 55% }  }
    @media (max-width: 258px) {    #md{  transform: translate(0%,-32%); } #create_profile_btn{ width: 100%}  }
  </style>
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
  </head>
  <body>
<div class="form-a"  id="md" >
    <form  onsubmit="fn()" method="post">
      <div class="container-fluid">
            <div class="col-lg">
              <div class="text-center ">
                <h1>Create Account</h1>
                <span id="msg1" class="font-weight-bold" style="color:greenyellow;"></span>
              </div>
            </div>
                <div class="row">
                  <div class="col-sm  pb-3">
                    <label id="input_labal"><b>Class ID </b></label>
                    <input type="text" id="std" name="class_id" value="<?php if(isset($_POST['class_id'])){ echo $_POST['class_id']; }; ?>"  placeholder="Enter Class ID" class="form-control py-4 w-75 text" autocomplete="off" required pattern="\d+" title="Please enter only pasitive numbers" minlength="1">
                    <span id="sttd" class="font-weight-bold " style="color: greenyellow"></span>
                  </div>
                  <div class="col-sm  pb-3">
                    <label id="input_labal"><b>Enrollment Key </b></label>
                    <input type="text" id="enroll" name="enroll_key" value="<?php if(isset($_POST['enroll_key'])){ echo $_POST['enroll_key']; }; ?>"  placeholder="Enter Enrollment Key" class="form-control py-4 w-75 text" autocomplete="off" required minlength="2" title="Enter Enrollment key which given to you by your teacher">
                    <span id="enr" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>
                  <div class="col-sm">
                    <label id="input_labal"><b>Class NO </b></label>
                    <input type="text" id="std" name="class_no" value="<?php if(isset($_POST['class_no'])){ echo $_POST['class_no']; }; ?>"  placeholder="Enter Your Class No " class="form-control py-4 w-75 text" autocomplete="off" required pattern="\d+" title="Please enter only pasitive numbers" minlength="1">
                    <span id="cno" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>
                </div>
                <!-- ended row -->
                <div class="col-lg  mt-3">
                    <div class="text-left">
                      <b id="userinfo" style="word-spacing: 5px;letter-spacing:2px;">User Information</b>
                    </div>
                </div>
                <!-- ended -->
                <div class="row mt-4">
                  <div class="col-sm pb-3 ">
                    <label id="input_labal"><b>First Name </b></label>
                    <input type="text" id="fname" name="fname" value="<?php if(isset($_POST['fname'])){ echo $_POST['fname']; }; ?>" placeholder="First name" class="form-control py-4 w-75 text" autocomplete="off" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{2,20}$" title="First Name must be start with Alphabit & between 3 to 20 character long" minlength="3" maxlength="20">
                    <span id="fnme" class="font-weight-bold" style="color:greenyellow" ></span>
                  </div>
                  <div class="col-sm ">
                    <label id="input_labal"><b>Last Name </b></label>
                    <input type="text" id="lname" name="lname" value="<?php if(isset($_POST['lname'])){ echo $_POST['lname']; }; ?>" placeholder="Last name" class="form-control py-4 w-75 text" autocomplete="off" required>
                    <span id="lnme" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>

                </div>
                <!-- ended user row -->
                <div class="row mt-4">
                  <div class="col-sm pb-3">
                    <label id="input_labal"><b>Email address :</b></label>
                    <input type="email" name="email1" value="<?php if(isset($_POST['email1'])){ echo $_POST['email1']; }; ?>" placeholder="Email" class="form-control py-4 w-75 text" autocomplete="off" required  id="e1">
                    <span id="Email" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>
                  <div class="col-sm ">
                    <label id="input_labal"><b>Confirm Email :</b></label>
                    <input type="text" name="email2" value="<?php if(isset($_POST['email2'])){ echo $_POST['email2']; }; ?>" placeholder="Confirm Email" class="form-control py-4 w-75 text" autocomplete="off" required id="e2">
                    <span id="emsg" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>
                </div>

                <div class="row mt-4 pb-3">
                  <div class="col-sm pb-3">
                    <label id="input_labal"><b>Password </b></label>
                    <input type="password" name="password1" value="<?php if(isset($_POST['password1'])){ echo $_POST['password1']; }; ?>" placeholder="Password" class="form-control py-4 w-75 text" autocomplete="off" required minlength="8"  id="p1" title="At least Eight character are required!.">
                    <span id="paswd" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>
                  <div class="col-sm ">
                    <label id="input_labal"><b>Confirm Password </b></label>
                    <input type="password"  name="password2" value="<?php if(isset($_POST['password2'])){ echo $_POST['password2']; }; ?>" placeholder="Confirm Password" class="form-control py-4 w-75 text" autocomplete="off" required minlength="8"  id="p2" >
                    <span id="pmsg" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>
                </div>

                <!--=========================================== Security question ==============================================================-->
                                <div class="row mt-0 pb-3" style="margin-left: 10%">
                                  <div class="col-sm form-group pb-3 ">
                                    <label  for="sel1"><b>Enter  Security  Qustion </b></label>
                                    <select class="form-control-lg w-75" name="security_question"  id="sel1" required title="Please select one of the security question.">
                                      <option value="">Select Your Security Question</option>
                                      <option value="What is Your Childhood School name?">What is Your Childhood School name?</option>
                                      <option value="What Is your favorite book?">What Is your favorite book?</option>
                                      <option value="What is the name of the road you grew up on?">What is the name of the road you grew up on?</option>
                                      <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                                      <option value="What was the first company that you worked for?">What was the first company that you worked for?</option>
                                      <option value="Where did you go to high school/college?">Where did you go to high school/college?</option>
                                      <option value="What is your favorite food?">What is your favorite food?</option>
                                      <option value="What city were you born in?">What city were you born in?</option>
                                      <option value="Where is your favorite place to vacation?">Where is your favorite place to vacation?</option>
                                      <option value="What is your Childhood friend name?">What is your Childhood friend name?</option>
                                      <option value="What is your bestfriend name?">What is your bestfriend name?</option>

                                    </select>
                                  </div>
                                  <div class="col-sm ">
                                    <label id=""><b>Enter Answer</b></label>
                                    <input type="text" name="q_answer"  placeholder="Enter the Answer for Security Question." class="form-control py-4 w-75 text " autocomplete="off" maxlength="30" required>
                                  </div>
                                </div>
                  <!--=========================================== Security question ended ==============================================================-->

                <div class="col-lg pb-5">
                  <input type="submit" name="create_profile"  value="Create Profile" class="btn btn-lg " id="create_profile_btn"  onclick="return fn();">
                  <label id="exuser"><b>All ready have an Account:</b>
                    <a href="login.php" class="text-light small">  Click Here </a>
                  </label>
                </div>
      </div>
    </form>
</div>
<!---=============================================================== php ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<?php
    if (isset($_POST['create_profile'])) {
      $fname       =   $_POST['fname'];
      $lname       =   $_POST['lname'];
      $nnn        =   ($fname." ".$lname);
      $name=ucwords($nnn);
      $email1      =   $_POST['email1'];
      $email2      =   $_POST['email2'];
      $password1   =   $_POST['password1'];
      $password2   =   $_POST['password2'];
      $class_id    =   $_POST['class_id'];
      $cid=$class_id;
      $class_no    =   $_POST['class_no'];          // it is the student class number
      $enroll_key  =   $_POST['enroll_key'];
      $security_question=$_POST['security_question'];
      $answer=$_POST['q_answer'];

      include('db_connection.php');

      if ($con) {

        $statement1 ="SELECT Class_id,Enrollment_key FROM class WHERE Class_id ='$class_id' AND Enrollment_key='$enroll_key'";
        $q1=mysqli_query($con ,$statement1);


        if ($q1) {
          $r =mysqli_num_rows($q1);
          if ($r==1) {
            // echo "class id and rnrollment key is okkkkkkkk<br>";
                $reg_state_check=mysqli_query($con ,"SELECT Class_id,Enrollment_key FROM class WHERE Class_id ='$class_id' AND Enrollment_key='$enroll_key' AND reg_status='1'");
                if (mysqli_num_rows($reg_state_check)==1) {

                  $temp="SELECT Email FROM student WHERE Email='$email2'";
                  $result=mysqli_query($con, $temp );
                  if ($result) {
                    $status=mysqli_num_rows($result);
                    if ($status==0) {

                      $std_insert="INSERT INTO student (student_name, Email, password , security_question, question_answer) VALUES ('$name', '$email2', '$password2','$security_question','$answer')";
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

                }else {
                  // echo "registration status is offf";
                  ?>  <script> document.getElementById('enr').innerHTML='Registration Status is Off';    setTimeout(fn ,5000);   function fn(){   document.getElementById("enr").innerHTML='';   }  </script>  <?php

                }

          }
          if ($r==0) {
            $statement2 ="SELECT Class_id FROM class WHERE Class_id='$class_id'";
            $statement3 ="SELECT Enrollment_key FROM class WHERE Enrollment_key='$enroll_key' AND reg_status='1'";

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
                  ?>  <script> document.getElementById('enr').innerHTML='Enrollment Key is Wrong! or Registration Status is Off';    setTimeout(fn ,5000);   function fn(){   document.getElementById("enr").innerHTML='';   }  </script>  <?php

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
<!--================================================================== ended =======================================================================================================================================-->
  </body>
</html>
