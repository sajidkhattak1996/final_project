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

          </head>
            <body>
              <!--============includeing the top navagation menu  ================-->
                    <?php  include('subject_top_menu.php');  ?>
              <!--============ended===============================================-->


<!-- started -->
              <form class="" action="" method="post" >


              <!-- below table which display the student record which are enroll in the this class which are clicked    -->
              <div class="container-fluid" style="padding-bottom: 10px">
                <div class="tend"  style="border-radius: 10px 10px 0px 0px;margin-bottom: 8px;height: auto;padding-bottom:3px;padding-top: 0px">
                    <table class="table table-straped">
                          <thead>
                            <tr>
                                <td>
                                      Assignment Name/title:<br>
                                      <input type="text" name="a_name" title="Enter Assignment Name OR title " placeholder="Assignment name" required  pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{1,80}$"  style="background: lightblue;border: solid 1px #008c7e;border-radius:5px">
                                </td>
                                <td>
                                      Date:<br>
                                      <input type="date" name="adate" title="Enter the Assignment Date" required style="background: lightblue;border: solid 1px #008c7e;border-radius:5px">
                                </td>
                                <form method="post">
                                  <td>
                                      Total Marks:<br> <input type="number" name="at_marks" value="" title="Enter Assignment Total Marks" min="1" max="5000" placeholder="marks" required style="background: lightblue;border: solid 1px #008c7e;border-radius:5px">
                                  </td>
                                </form>
                            </tr>

                          </thead>
                    </table>
                </div>

               <span id="spn" style="margin-left: 35%;color: blue"></span>
                <table id="example1" class="table table-striped table-bordered table-hover table-xl table-light" >

                          <thead class="bg-info">
                              <tr>
                                    <!-- <th scope="col" scope="row">Student ID</th> -->
                                    <th scope="col">Reg No</th>
                                    <th scope="col">Name</th>
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
                                    <td>
                                      <input type="text" name="student_id<?php echo $a; ?>" value="<?php echo $row['S_id']; ?>" style="display:none">

                                      <input type="number" name="ob_marks<?php echo $a; ?>" value="" title="please Enter the Student Obtained Marks" min="0" max="5000" required style="background: lightblue;border: solid 1px #008c7e;border-radius:5px">
                                    </td>
                              </tr>
                               <?php }
                                $_SESSION['a']=$a;
                                ?>
                              </tbody>
                          </table>

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


/* this query are use for the if multiple assignement are not submited on the same data */
                          // $query_check_date="SELECT assignment.a_date FROM assignment INNER JOIN assignment_record on assignment.A_id=assignment_record.A_id AND assignment.a_date='$as_date'";


                          if (isset($con)) {
                                      $a_name=$_POST['a_name'];
                                      $a_date=$_POST['adate'];
                                      $at_marks=$_POST['at_marks'];
                                      date_default_timezone_set("Asia/Karachi");
                                      $ctime  =date("h:i:sa");

                                      $assi_insert="INSERT INTO assignment (a_name ,a_date,a_time ,at_marks) VALUES ('$a_name', '$a_date','$ctime','$at_marks')";
                                      $exe_assi_insert=mysqli_query($con ,$assi_insert);

                                      $assi_id_stmt="SELECT A_id FROM assignment WHERE a_name='$a_name' AND a_date='$a_date' AND a_time='$ctime' AND at_marks='$at_marks'";
                                      $exe_assi_id=mysqli_query($con, $assi_id_stmt);
                                      $row=mysqli_fetch_array($exe_assi_id);
                                      $a_id=$row['A_id'];   // assignment id are extreted



                                      $temp=1;
                                      $t=1;
                                      $cid=$_SESSION['class_id'];
                                      $sub_id=$_SESSION['subject_id'];
                                      while ($t <= $a)
                                        {
                                          $student_id=$_POST['student_id'.$t];
                                          $obtained_marks=$_POST['ob_marks'.$t];
                                          $query_insert="INSERT INTO assignment_record (A_id, Subject_id, Class_id, S_id, ao_marks) VALUES ('$a_id','$sub_id','$cid','$student_id','$obtained_marks')";
                                          $exe_insert=mysqli_query($con ,$query_insert);

                                        $t++; $temp++;
                                        }
                                        if ($temp==$t) {
                                          echo "<script> document.getElementById('spn').innerHTML='Assignment are Successfully Inserted...';  </script>";
                                                      ?>
                                                          <script>
                                                          function myFn(){  document.getElementById('spn').innerHTML='';}  //use th empty the msg field
                                                          setTimeout(myFn ,5000);
                                                          </script>

                                                      <?php

                                        }else {
                                          echo "<script> document.getElementById('spn').innerHTML='Problem Occur while Inserted Some records!';</script>";

                                        }
                             }

                          }




               ?>

               <script>
                function myFn(){  document.getElementById('spn').innerHTML='';}  //use th empty the msg field
                function f(){  setTimeout(myFn, 5000); alert('called the function'); }
              </script>
              <!-- ended -->
              <script type="text/javascript" src="js/jquery.js"></script>
              <script src="../datatables/jquery.dataTables.js"></script>
              <script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>



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
              </script>




            </body>
      </html>


  <?php
          }
        else {
          echo "<script> alert('Please Login first!.... '); </script>";
        }

  ?>
