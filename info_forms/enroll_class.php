<!DOCTYPE html>
<?php session_start();  ?>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>welcome to login </title>
	<link href="sajid_tcss.css" rel="stylesheet" type="text/css">

  </head>
<body>
  <?php   // <!--===============below loader are include =================-->
     include('../plugins/loader/loader1.html');
    // <!--=================ended==================================--> ?>
<!--=============top menus=========================================================================-->
<?php include('std_top_menu.php'); ?>
<style media="screen">  #b22{ background: #fff; color: #000 ;font-weight: bold;}</style>
<?php include('std_2nd_top_menu.php'); ?>
<!--===========ended================================================================================-->


<div class="about_area">
    <div class="viewing_area">
      <h5>

        NOW VIEWING :>
        <a href="main_table.php" style="color: black"> All Classes</a>   :>
        <a href="" style="color: blue" > Enroll in Class</a>


      </h5>
    </div>

    <div class="about">
        <h2>About this page </h2>
        <p class="text">
          To Enroll in Class , enter the Class Id and Enrollment Key and Click Submit , If you do not have the Class ID and
          Enrollment key , Contact with your Teacher for this Information.

        </p>

    </div>

</div>

<!-- below where student are enroll in class means form for enroll in class -->
<div class="enrolldiv">
      <div class="enroll_in_Class">
          <h2>Enroll in a Class</h2>
      </div>
      <form action="" method="post" id="enroll_form">
          <div class="inputdiv">
            <span style="color: blue;letter-spacing: 1px;font-weight: bolder" id="msg1"></span>
            <span style="color: deeppink;letter-spacing: 1px;font-weight: bolder" id="msg2"></span>
            <h5 id="cid">Enter Class ID:</h5>
            <input type="text" name="class_id" value="<?php if(isset($_POST['enroll_to_class'])){ echo $_POST['class_id'];} ?>" title="enter class id" required>

            <h5 id="ekey">Enrollment key:</h5>
            <input type="text" name="enrollment_key" value="<?php if(isset($_POST['enroll_to_class'])){ echo $_POST['enrollment_key'];} ?>" title="Enter the Enrollment key " required>

            <h5 id="ekey">Enter Your Class NO:</h5>
            <input type="text" name="class_no"  value="<?php if(isset($_POST['enroll_to_class'])){ echo $_POST['class_no'];} ?>" title="enter your  class no" min="0" maxlength="4" >
          </div>

          <div class="submit_btn">
              <button type="submit" name="enroll_to_class"> Submit</button>
          </div>

      </form>
</div>
<!--enrolldiv are ended -->
<?php

include('db_connection.php');
      if (isset($_POST['enroll_to_class'])) {
        //variables
        $cid=$_POST['class_id'];
        $enroll_key=$_POST['enrollment_key'];
        $class_no=$_POST['class_no'];

        $S_id=$_SESSION['S_id'];



          $stmt1="SELECT Class_id FROM class WHERE Class_id='$cid'";
          $exe1=mysqli_query($con ,$stmt1);
          $n=mysqli_num_rows($exe1);
          $row=mysqli_fetch_array($exe1);
          if($cid==$row['Class_id']) {
                // echo "matchhhhhhhhhhhhhhhhhhhhhhh";
                $stmt2="SELECT Enrollment_key FROM class WHERE Class_id='$cid'";
                $exe2=mysqli_query($con,$stmt2);
                $e2=mysqli_fetch_array($exe2);
                if ($enroll_key==$e2['Enrollment_key']) {
                  // echo "<h1>enrollment key matcheddddddddddd!</h1>";
                  $reg_state=mysqli_query($con ,"SELECT reg_status FROM class WHERE Class_id='' AND reg_status='1'");
                  if (mysqli_num_rows($reg_state)==1) {


                    $stmt_subid="SELECT Subject_id FROM have WHERE Class_id='$cid'";
                    $exe_subid=mysqli_query($con,$stmt_subid);
                    $es=mysqli_fetch_array($exe_subid);



                    // if ($subid==$es['Subject_id']) {


                    $subid=$es['Subject_id'];
                    //okkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk
                    $stmt_check="SELECT Subject_id,Class_id,S_id FROM have WHERE Subject_id='$subid' AND Class_id='$cid'";
                    $exe_check=mysqli_query($con ,$stmt_check);
                    $rr=mysqli_fetch_array($exe_check);
                    if ($rr['S_id']==0) {
                      // echo "oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo00000000000".$S_id;
                      $stmt_update="UPDATE have SET S_id='$S_id' WHERE Subject_id='$subid' AND Class_id='$cid'";
                      $exe_update=mysqli_query($con, $stmt_update);

                      $stmt_reg_check="SELECT Class_id,S_id,Enrollment_key FROM register WHERE Class_id='$cid'  AND S_id='$S_id'  AND Enrollment_key='$enroll_key'";
                      $exe_reg1=mysqli_query($con ,$stmt_reg_check);
                      $e_row=mysqli_fetch_array($exe_reg1);
                      if ($cid==$e_row['Class_id']  && $enroll_key==$e_row['Enrollment_key'] && $S_id=$e_row['S_id']) {  ?>
                        <script type="text/javascript">
                        document.getElementById("msg1").innerHTML='Your are Successfully Enroll to the Class.';
                        setTimeout(fn ,5000);
                        function fn(){
                          document.getElementById("msg1").innerHTML='';
                        }
                        </script>
                        <?php      /* echo "updated and inserted data in hava table only "; */
                      }else {
                        $stmt_register="INSERT INTO register(Class_id, S_id,Reg_no, Enrollment_key) VALUES ('$cid','$S_id','$class_no','$enroll_key')";
                        $exe_r=mysqli_query($con,$stmt_register);
                        // echo "updated and inserted data  in both  ";
                        ?>
                        <script type="text/javascript">
                        document.getElementById("msg1").innerHTML='Your are Successfully Enroll to the Class.';
                        setTimeout(fn ,5000);
                        function fn(){
                          document.getElementById("msg1").innerHTML='';
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
                          document.getElementById("msg2").innerHTML='Your are allready registed with this class ! please try another...';
                          setTimeout(fn ,5000);
                          function fn(){
                            document.getElementById("msg2").innerHTML='';
                          }
                        </script>
                      <?php }
                      else {
                        //this mean the the student are not register with the this class
                        $stmt_reg_check="SELECT Class_id,S_id,Enrollment_key FROM register WHERE Class_id='$cid'  AND S_id='$S_id'  AND Enrollment_key='$enroll_key'";
                        $exe_reg1=mysqli_query($con ,$stmt_reg_check);
                        $e_row=mysqli_fetch_array($exe_reg1);
                        if ($cid==$e_row['Class_id']  && $enroll_key==$e_row['Enrollment_key'] && $S_id=$e_row['S_id']) {
                          $q="INSERT INTO have(Subject_id, Class_id, S_id) VALUES ('$subid','$cid','$S_id')";
                          mysqli_query($con ,$q);
                          echo "inserted data in hava table only ";
                          ?>
                          <script type="text/javascript">
                            document.getElementById("msg1").innerHTML='Your are Successfully Enroll to the Class.';
                            setTimeout(fn ,5000);
                            function fn(){
                              document.getElementById("msg1").innerHTML='';
                            }
                          </script>

                          <?php
                        }
                        else {
                          $q="INSERT INTO have(Subject_id, Class_id, S_id) VALUES ('$subid','$cid','$S_id')";
                          $e=mysqli_query($con ,$q);
                          $stmt_register="INSERT INTO register(Class_id,S_id, Reg_no,Enrollment_key) VALUES ('$cid','$S_id','$class_no','$enroll_key')";
                          $exe_r=mysqli_query($con,$stmt_register);
                          if ($e && $exe_r) {
                            ?>
                            <script type="text/javascript">
                              document.getElementById("msg1").innerHTML='Your are Successfully Enroll to the Class.';
                              setTimeout(fn ,5000);
                              function fn(){
                                document.getElementById("msg1").innerHTML='';
                              }
                            </script>

                            <?php
                          }
                        }

                      }

                      // echo "not zerooooooooooooooooooooooooooooooooooooo";

                    }


                  }else {  ?>
                    <script type="text/javascript">
                        document.getElementById("msg2").innerHTML='Registration Status is Off';
                        setTimeout(fn ,5000);
                        function fn(){
                          document.getElementById("msg2").innerHTML='';
                        }
                    </script>
                    <?php
                  }


                }
                if ($enroll_key != $e2['Enrollment_key']) { ?>
                    <!-- echo "<h1>enrollment key is worng!</h1>"; -->
                    <script type="text/javascript">
                        document.getElementById("msg2").innerHTML='Enrollment Key is Wrong!';
                        setTimeout(fn ,5000);
                        function fn(){
                          document.getElementById("msg2").innerHTML='';
                        }
                    </script>
                    <?php
                }

          }
          if($cid!=$row['Class_id'] ) { ?>
            <!-- echo "<script> alert('Class id is  wrong!'); </script>"; -->
            <script type="text/javascript">
                document.getElementById("msg2").innerHTML='Class ID is Wrong!.';
                setTimeout(fn ,5000);
                function fn(){
                  document.getElementById("msg2").innerHTML='';
                }
            </script>
            <?php
          }

// echo "exe ended";



      }



 ?>



  </body>
</html>
