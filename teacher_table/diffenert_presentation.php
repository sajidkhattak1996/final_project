<?php
/*======================includeing the navagation menu ===========*/
  include('top_info.php');
  /*===========ended ===========*/
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
                    #pre{
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

          </head>
            <body>
              <!--============includeing the top navagation menu  ================-->
                    <?php  include('subject_top_menu.php');  ?>
              <!--============ended===============================================-->


              <script>
               function myFn(){  document.getElementById('spn').innerHTML='';}  //use th empty the msg field
               function f(){  setTimeout(myFn, 5000); alert('called the function'); }
             </script>




<!-- started -->
              <form class="" action="" method="post" >


              <!-- below table which display the student record which are enroll in the this class which are clicked    -->
              <div class="container-fluid" style="padding-bottom: 10px">
                <div class="tend"  style="border-radius: 10px 10px 0px 0px;margin-bottom: 8px;height: auto;padding-bottom:3px;padding-top: 0px">
                    <table class="table table-straped">
                          <thead>
                            <tr>
                                <td>
                                      Presentation Topic are Same for All:<br>
                                      <span><a href="presentation.php"><button type="button" name="btn_yes" class="btn btn-outline-light ">Yes</button> </a> </span> &nbsp;&nbsp;&nbsp;&nbsp;
                                      <span> <button type="button" name="btn_different" class="btn btn-outline-light active">NO</button> </span>

                                </td>
                                <td>
                                      Date:<br>
                                      <input type="date" name="p_date" title="Enter the pregnment Date" required style="background: lightblue;border: solid 1px #008c7e;border-radius:5px">
                                </td>
                                <form method="post">
                                  <td>
                                      Total Marks:<br> <input type="number" name="pt_marks" value="" title="Enter pregnment Total Marks" min="1" max="5000" placeholder="marks" required style="background: lightblue;border: solid 1px #008c7e;border-radius:5px">
                                  </td>
                                </form>
                            </tr>

                          </thead>
                    </table>
                </div>

               <span id="spn" style="margin-left: 35%;color: blue"></span>
                 <div id="yes_table">
                   <table id="example1" class="table table-striped table-bordered table-hover table-xl table-light" >

                          <thead class="bg-info">
                              <tr>
                                    <!-- <th scope="col" scope="row">Student ID</th> -->
                                    <th scope="col">Reg No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Presentation Topic</th>
                                    <th scope="col">Obtained Marks</th>
                              </tr>
                          </thead>
                            <tbody>
                              <?php

                                  $cid=$_SESSION['class_id'];
                                  $stmt_register="SELECT register.S_id , register.Reg_no , student.student_name ,student.Email FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' ORDER BY register.Reg_no";
                                  $exe=mysqli_query($con,$stmt_register);
                                  $a=0;
                                  while ($row=mysqli_fetch_assoc($exe)) { $a++;
                                   ?>
                              <tr>
                                    <td><?php echo $row['Reg_no']; ?>  </td>

                                    <td scope="col" ><?php  echo $row['student_name']; ?> </td>
                                    <td><input type="text" name="p_topic<?php echo $a; ?>"required  pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{1,80}$"  style="background: lightblue;border: solid 1px #008c7e;border-radius:5px; color: #000 "></td>
                                    <td>
                                      <input type="text" name="student_id<?php echo $a; ?>" value="<?php echo $row['S_id']; ?>" style="display:none">

                                      <input type="number" name="po_marks<?php echo $a; ?>" value="" title="please Enter the Student Obtained Marks" min="0" max="5000" required style="background: lightblue;border: solid 1px #008c7e;border-radius:5px">
                                    </td>
                              </tr>
                               <?php }
                                $_SESSION['a']=$a;
                                ?>
                              </tbody>
                          </table>
                        </div>


                               <button type="submit" name="save" style="margin-left: 35%;width:30%;margin-bottom: 10px;font-weight:bolder" class="btn btn-primary btn-lg">Submit</button>

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

                                        $p_date=$_POST['p_date'];
                                        $pt_marks=$_POST['pt_marks'];






                                        $temp=1;
                                        $t=1;
                                        $cid=$_SESSION['class_id'];
                                        $sub_id=$_SESSION['subject_id'];
                                        while ($t <= $a)
                                          {
                                            $student_id=$_POST['student_id'.$t];
                                            $p_topic=$_POST['p_topic'.$t];
                                            $obtained_marks=$_POST['po_marks'.$t];
                                            date_default_timezone_set("Asia/Karachi");

                                            $currentNanoSecond = (int) (microtime(true) * 1000000000);
                                            // echo 'CUR NANOSECONDS:'.$currentNanoSecond.PHP_EOL;  echo " <br>";    //display time in nano second
                                            // echo 'TIME:'.date('H:i:sa', intval($currentNanoSecond/1000000000)).PHP_EOL;  //this well convert back to the time


                                            $pre_insert="INSERT INTO presentation(p_topic, p_date, p_time, pt_marks) VALUES ('$p_topic','$p_date','$currentNanoSecond','$pt_marks')";
                                            $exe_pre_insert=mysqli_query($con ,$pre_insert);

                                            $pre_id_stmt="SELECT P_id FROM presentation WHERE p_topic='$p_topic' AND p_date='$p_date' AND p_time='$currentNanoSecond' AND pt_marks='$pt_marks'";
                                            $exe_pre_id=mysqli_query($con, $pre_id_stmt);
                                            $row=mysqli_fetch_array($exe_pre_id);
                                            $p_id=$row['P_id'];   // presentation id are extreted



                                            $query_insert="INSERT INTO presentation_record (P_id, Subject_id, Class_id, S_id, po_marks) VALUES ('$p_id','$sub_id','$cid','$student_id','$obtained_marks')";
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
