<?php
/*======================includeing the navagation menu ===========*/
  include('top_info.php');
  /*===========ended ===========*/
  // <!--===============below loader are include =================-->
   include('../plugins/loader/loader1.html');
  // <!--=================ended==================================-->
  if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {
    ?>
    <!DOCTYPE html>
      <html lang="en" dir="ltr">
        <head>
                <link rel="stylesheet" href="../datatables-bs4/css/dataTables.bootstrap4.css">
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="description" content="">

                <title>welcome to webside as a teacher  </title>

                <style media="screen">
                    #ass{
                      background-image: -webkit-linear-gradient(180deg,rgba(172,239,224,0.96) 21.76%,rgba(0,140,126,0.50) 98.45%);
                      background-image: -moz-linear-gradient(180deg,rgba(172,239,224,0.96) 21.76%,rgba(0,140,126,0.50) 98.45%);
                      background-image: -o-linear-gradient(180deg,rgba(172,239,224,0.96) 21.76%,rgba(0,140,126,0.50) 98.45%);
                      background-image: linear-gradient(180deg,rgba(172,239,224,0.96) 21.76%,rgba(0,140,126,0.50) 98.45%);
                      color: blue;
                      font-weight: bolder;
                      border-left: solid 1px rgba(172,239,224,0.66);
                      border-top: solid 1px rgba(172,239,224,0.66);
                      border-right: solid 1px rgba(172,239,224,0.66);
                    }
                </style>
              <script type="text/javascript">
                function FnCheck(){
                  var loop_lenght=document.getElementById("temp").value;
                  var total_marks=parseInt(document.getElementById("t_marks").value);
                  var status=0;
                  for (var i = 1; i <=loop_lenght; i++) {
                      var obtanined_marks=parseInt(document.getElementById("ob_marks"+i).value);
                      var row=document.getElementById("r"+i);
                      var msg=document.getElementById("m2");
                      if (obtanined_marks>total_marks) {
                        status=1;
                        document.getElementById("m2").innerHTML='Obtained Marks Of Student Shoud not be Greater then the Total Marks';
                        document.getElementById("m2").style.display='block';
                        row.style.background='#f8d7da';
                        row.style.color='#721c24';
                      }else {
                        row.style.background='#cce5ff';
                        row.style.color='#004085';
                      }
                  }
                  if (status==1) {return false;}else {
                    document.getElementById("m2").innerHTML='';
                    document.getElementById("m2").style.display='none';
                  }
                }

              </script>
          </head>
            <body>
              <!--============includeing the top navagation menu  ================-->
                    <?php  include('classes_subject_top_menu.php');  ?>
              <!--============ended===============================================-->

              <script>
               function myFn(){  document.getElementById('spn').innerHTML='';}  //use th empty the msg field
               function f(){  setTimeout(myFn, 5000); alert('called the function'); }
             </script>

<!-- started -->
              <form class="" action="" method="post" onsubmit="return FnCheck()">


              <!-- below table which display the student record which are enroll in the this class which are clicked    -->
              <div class="container-fluid" style="padding-bottom: 10px">
                <div class="tend"  style="border-radius: 10px 10px 0px 0px;margin-bottom: 8px;height: auto;padding-bottom:3px;padding-top: 0px">
                    <table class="table table-straped">
                          <thead>
                            <tr>
                                <td>
                                      Assignment Topic are Same for All:<br>
                                      <span><button type="button" name="btn_yes" class="btn btn-outline-light active">Yes</button> </span> &nbsp;&nbsp;&nbsp;&nbsp;
                                      <span><a href="diffenert_assignment.php"> <button type="button" name="btn_different" class="btn btn-outline-light ">NO</button> </a></span>

                                      <br>
                                    <span id="pt" style="color: #fff;">  Assignment Topic: <br><input type="text"  name="a_name" title="Enter Assignment Name OR title " required  pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{1,80}$"  style="background: lightblue;border: solid 1px #008c7e;border-radius:5px; color: #000 "></span>

                                </td>

                                <td>
                                      Date:<br>
                                      <input type="date" name="adate" value="<?php echo date('Y-m-d'); ?>" title="Enter the Assignment Date" required style="background: lightblue;border: solid 1px #008c7e;border-radius:5px">
                                </td>
                                  <td>
                                      Total Marks:<br> <input type="number" name="at_marks" id="t_marks"  title="Enter Assignment Total Marks" min="1" max="5000" placeholder="marks" required style="background: lightblue;border: solid 1px #008c7e;border-radius:5px">
                                  </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                  <a href="edit_assignment1.php" style="float:right"> <button type="button" name="edit_assignment" class="btn btn-outline-light"> Edit Assignment </button> </a>
                                </td>
                            </tr>
                          </thead>
                    </table>
                </div>

                    <div>
                      <span id="spn" style="margin-left: 35%;color: blue"></span>
                      <div id="m2" class="alert alert-danger text-center" style="display:none"></div>
                      <table id="example1" class="table table-striped table-bordered table-hover table-xl table-light" >
                        <thead class="bg-info">
                          <tr>
                            <th scope="col">Class No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Obtained Marks</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $cid=$_SESSION['class_id'];
                          $stmt_register="SELECT register.S_id , register.Reg_no , student.student_name ,student.Email FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' ORDER BY register.Reg_no";
                          $exe=mysqli_query($con,$stmt_register);
                          $no_row=mysqli_num_rows($exe);
                          if ($no_row>0) {
                            $a=0;
                            while ($row=mysqli_fetch_assoc($exe)) { $a++;
                              ?>
                              <tr id="r<?php echo $a; ?>">
                                <td><?php echo $row['Reg_no']; ?>  </td>
                                <td scope="col" ><?php  echo $row['student_name']; ?> </td>
                                <td>
                                  <input type="text" name="student_id<?php echo $a; ?>" value="<?php echo $row['S_id']; ?>" style="display:none">
                                  <input type="number" name="ob_marks<?php echo $a; ?>" id="ob_marks<?php echo $a; ?>"  value=""  title="please Enter the Student Obtained Marks" min="0" max="" required style="background: lightblue;border: solid 1px #008c7e;border-radius:5px">
                                </td>
                              </tr>
                            <?php }
                            $_SESSION['a']=$a;
                          }else { ?>
                            <tr>
                              <td colspan="3" class="alert alert-warning font-weight-bold text-center">Sorry No Student are Register with this Class.</td>
                            </tr>
                            <?php
                          }
                          ?>
                          </tbody>
                        </table>
                          <?php
                              if ($no_row==0) {
                              }else {?>
                                <input type="text" name="temp" id="temp" value="<?php echo $a; ?>" style="display:none">
                                <button type="submit"  name="save" style="margin-left: 35%;width:30%;margin-bottom: 10px;font-weight:bolder" class="btn btn-primary btn-lg">Submit</button>
                              <?php }
                          ?>
                        <div class="tend">  </div>
                      </div>

              </form>
              </div>  <!--ended -->

              </body>
              </html>
              <!-- php for above form -->
              <?php

                      if (isset($_POST['save'])) {

                          $a=$_SESSION['a'];
                          unset($_SESSION['a']);


/* this query are use for the if multiple assignement are not submited on the same data */
                          // $query_check_date="SELECT assignment.a_date FROM assignment INNER JOIN assignment_record on assignment.A_id=assignment_record.A_id AND assignment.a_date='$as_date'";
                          if ($a==0) {
                            echo "<script> document.getElementById('spn').innerHTML='You Cannot Inserted the Assignment Record! Because No students are fount in the class...'; setTimeout(myFn ,5000); </script>";
                          }
                          if ($a!=0) {
                            if (isset($con)) {
                                        $a_name=$_POST['a_name'];
                                        $a_date=$_POST['adate'];
                                        $at_marks=$_POST['at_marks'];
                                        date_default_timezone_set("Asia/Karachi");
                                        $ctime  =(int) (microtime(true) * 1000000000);   //current time in nano second

                                        $assi_insert="INSERT INTO assignment (a_name ,a_date,a_time ,at_marks) VALUES ('$a_name', '$a_date','$ctime','$at_marks')";
                                        $exe_assi_insert=mysqli_query($con ,$assi_insert);

                                        $assi_id_stmt="SELECT A_id FROM assignment WHERE a_name='$a_name' AND a_date='$a_date' AND a_time='$ctime' AND at_marks='$at_marks'";
                                        $exe_assi_id=mysqli_query($con, $assi_id_stmt);
                                        $row=mysqli_fetch_array($exe_assi_id);
                                        $a_id=$row['A_id'];   // assignment id are extreted

                                        $temp=1;
                                        $t=1;
                                        while ($t <= $a)
                                          {
                                            $student_id=$_POST['student_id'.$t];
                                            $obtained_marks=$_POST['ob_marks'.$t];
                                            $query_insert="INSERT INTO assignment_record (A_id, Class_id, S_id, ao_marks) VALUES ('$a_id','$cid','$student_id','$obtained_marks')";
                                            $exe_insert=mysqli_query($con ,$query_insert);

                                          $t++; $temp++;
                                          }
                                          if ($temp==$t) {
                                            echo "<script> document.getElementById('spn').innerHTML='Assignment are Successfully Inserted.'; setTimeout(myFn ,5000); </script>";

                                          }else {
                                            echo "<script> document.getElementById('spn').innerHTML='Problem Occur while Inserted Some records!'; setTimeout(myFn ,5000);  </script>";

                                          }
                               }
                          }

                          }
               ?>

              <!-- ended -->
              <script type="text/javascript" src="js/jquery.js"></script>
              <script src="../datatables/jquery.dataTables.js"></script>
              <script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>

              <script>
                $(function () {
                  // $("#example1").DataTable();
                  $('#example1').DataTable({
                    "paging": false,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                  });
                });
              </script>




            </body>
      </html>


  <?php
          }
        else {
          echo "<script> alert('Please Login first!.... '); </script>";
        }

  ?>
