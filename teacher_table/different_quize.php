<?php
/*======================includeing the navagation menu ===========*/
  include('top_info.php');
  /*===========ended ===========*/
  // <!--===============below loader are include =================-->
   include('../plugins/loader/loader1.html');
  // <!--=================ended==================================-->
  if (isset($_SESSION['email']) && isset($_SESSION['pass'])) { ?>
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
                    #quz{
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
                                      Quize Topic are Same for All:<br>
                                      <span><a href="quize.php"><button type="button" name="btn_yes" class="btn btn-outline-light ">Yes</button> </a> </span> &nbsp;&nbsp;&nbsp;&nbsp;
                                      <span> <button type="button" name="btn_different" class="btn btn-outline-light active">NO</button> </span>

                                </td>
                                <td>
                                      Date:<br>
                                      <input type="date" name="q_date" value="<?php echo date('Y-m-d'); ?>" title="Enter the pregnment Date" required style="background: lightblue;border: solid 1px #008c7e;border-radius:5px">
                                </td>
                                <form method="post">
                                  <td>
                                      Total Marks:<br> <input type="number" name="qt_marks" id="t_marks" title="Enter pregnment Total Marks" min="1" max="5000" placeholder="marks" required style="background: lightblue;border: solid 1px #008c7e;border-radius:5px">
                                  </td>
                                </form>
                            </tr>

                          </thead>
                    </table>
                </div>

               <span id="spn" style="margin-left: 35%;color: blue"></span>
               <div id="m2" class="alert alert-danger text-center" style="display:none"></div>

                 <div id="yes_table">
                   <table id="example1" class="table table-striped table-bordered table-hover table-xl table-light" >

                          <thead class="bg-info">
                              <tr>
                                    <!-- <th scope="col" scope="row">Student ID</th> -->
                                    <th scope="col">Class No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Quize Topic</th>
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
                                        <td><input type="text" name="q_topic<?php echo $a; ?>"required  pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{1,80}$"  style="background: lightblue;border: solid 1px #008c7e;border-radius:5px; color: #000 "></td>
                                        <td>
                                          <input type="text" name="student_id<?php echo $a; ?>" value="<?php echo $row['S_id']; ?>" style="display:none">

                                          <input type="number" name="qo_marks<?php echo $a; ?>" id="ob_marks<?php echo $a; ?>" title="please Enter the Student Obtained Marks" min="0" max="5000" required style="background: lightblue;border: solid 1px #008c7e;border-radius:5px">
                                        </td>
                                      </tr>
                                    <?php }
                                    $_SESSION['a']=$a;
                                  }else {
                                    ?>
                                        <tr>
                                          <td colspan="4" class="alert alert-warning text-center font-weight-bold">No Students are Register with this Class.</td>
                                        </tr>
                                    <?php
                                  }?>
                              </tbody>
                          </table>
                        </div>
                               <?php
                                 if ($no_row==0) {
                                 }else {  ?>
                                   <input type="text" name="temp" id="temp" value="<?php echo $a; ?>" style="display:none">
                                   <button type="submit" name="save" style="margin-left: 35%;width:30%;margin-bottom: 10px;font-weight:bolder" class="btn btn-primary btn-lg">Submit</button>
                                    <?php }
                                  ?>
                       <div class="tend">  </div>
              </form>
              </div>  <!--ended -->

              </body>
              </html>
              <!-- php for above form -->
              <?php

                      if (isset($_POST['save'])) {

                          $a=$_SESSION['a'];
                          unset($_SESSION['a']);


/* this query are use for the if multiple pregnement are not submited on the same data */
                          // $query_check_date="SELECT pregnment.a_date FROM pregnment INNER JOIN pregnment_record on pregnment.A_id=pregnment_record.A_id AND pregnment.a_date='$as_date'";
                          if ($a==0) {
                            echo "<script> document.getElementById('spn').innerHTML='You Cannot Perform this Action! Because No students are founds in the class...'; setTimeout(myFn ,5000); </script>";

                          }
                          if ($a!=0) {
                            if (isset($con)) {

                                        $q_date=$_POST['q_date'];
                                        $qt_marks=$_POST['qt_marks'];






                                        $temp=1;
                                        $t=1;
                                        $cid=$_SESSION['class_id'];
                                        while ($t <= $a)
                                          {
                                            $student_id=$_POST['student_id'.$t];
                                            $q_topic=$_POST['q_topic'.$t];
                                            $obtained_marks=$_POST['qo_marks'.$t];
                                            date_default_timezone_set("Asia/Karachi");

                                            $ctime = (int) (microtime(true) * 1000000000);
                                            // echo 'CUR NANOSECONDS:'.$currentNanoSecond.PHP_EOL;  echo " <br>";    //display time in nano second
                                            // echo 'TIME:'.date('H:i:sa', intval($currentNanoSecond/1000000000)).PHP_EOL;  //this well convert back to the time


                                            $quize_insert="INSERT INTO quize (q_topic, q_date, q_time, qt_marks) VALUES ('$q_topic','$q_date','$ctime','$qt_marks')";
                                            $exe_quize_insert=mysqli_query($con ,$quize_insert);

                                            $quize_id_stmt="SELECT Q_id FROM quize WHERE q_topic='$q_topic' AND q_date='$q_date' AND q_time='$ctime' AND qt_marks='$qt_marks'";
                                            $exe_quize_id=mysqli_query($con, $quize_id_stmt);
                                            $row=mysqli_fetch_array($exe_quize_id);
                                            $q_id=$row['Q_id'];   // presentation id are extreted



                                            $query_insert="INSERT INTO quiz_record (Q_id, Class_id, S_id, qo_marks) VALUES ('$q_id','$cid','$student_id','$obtained_marks');";
                                            $exe_insert=mysqli_query($con ,$query_insert);

                                          $t++; $temp++;
                                          }
                                          if ($temp==$t) {
                                            echo "<script> document.getElementById('spn').innerHTML='Presentation record are Successfully Inserted...'; setTimeout(myFn ,5000); </script>";


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
              $(document).ready(function(){
                  $('input:checkbox').click(function() {
                      $('input:checkbox').not(this).prop('checked', false);
                  });
              });
              </script>
<!--
              <script>
                $(function () {
                  $("#example1").DataTable();
                  // $('#example2').DataTable({
                  //   "paging": true,
                  //   "lengthChange": false,
                  //   "searching": false,
                  //   "ordering": true,
                  //   "info": true,
                  //   "autoWidth": false,
                  // });
                });
              </script> -->




            </body>
      </html>


  <?php
          }
        else {
          echo "<script> alert('Please Login first!.... '); </script>";
        }

  ?>
