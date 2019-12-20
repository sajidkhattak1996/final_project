<?php  session_start();
  if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {

      ?>
      <!DOCTYPE html>
          <html lang="en" dir="ltr">
            <head>
              <meta charset="utf-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <meta name="description" content="">
              <title>welcome to login </title>
            <link href="sajid_tcss.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="../menu css and js/bootstrap 4/css/glyphicon.css">
            <link rel="stylesheet" href="../datatables-bs4/css/dataTables.bootstrap4.css">

            </head>
          <body>

      <!--=================== the top nevagation menu=======================================----------->
            <?php  include('std_top_menu.php');  ?>
      <!--============ ended==================================================================== -->
<style media="screen">
    #b1{ background: #fff; color: #000 ;font-weight: bold;}
</style>
      <!--=================== the top menu just menu and side of the nevagation menu ====================-->
            <?php include('std_2nd_top_menu.php'); ?>
      <!--============ ended==================================================================== -->
      <?php
        $cid=$_SESSION['Class_id'];
        $query1 ="SELECT Name FROM class WHERE Class_id='$cid'";
        $e=mysqli_query($con,$query1);
        $r=mysqli_fetch_array($e);   //store class name
        //class subject name
        $S_id=$_SESSION['S_id'];
        $q2="SELECT Subject_id FROM have WHERE Class_id='$cid' AND S_id='$S_id'";
        $roww=mysqli_fetch_array(mysqli_query($con, $q2));
        $subid=$roww['Subject_id'];
        $q3="SELECT subject_name FROM subject WHERE Subject_id='$subid'";
        $rr=mysqli_fetch_array(mysqli_query($con,$q3));

       ?>


        <div class="about_area">
          <div class="viewing_area">
            <h5>CLASS NOW VIEWING :> <a href="" style="color: blue"> <?php  echo $r['Name']; ?></a></h5>
            <h5>SUBJECT :> <strong style="color: deeppink"> <?php  echo $rr['subject_name']; ?> </strong> </h5>
          </div>

              <div class="about">
                  <h2>About this page </h2>
                  <p class="text">
                    This is your Class Recod Homepage.To Enroll in a new Class Click the Enroll in Class.Below Table Show the Student Least previous Records.To View the Detail Click on the Eye Icon.
                    To View the Full Records Click for the Following Button.
                    For Help Click the Helps Button.


                  </p>
              </div>
        </div>
<?php  include('std_classes_table_top_menu.php'); ?>
<style media="screen">
      .tstart{

        border-radius: 10px 10px 0px 0px ;
        padding-bottom: 0px;

        background-image: -webkit-linear-gradient(0deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,0.90) 98.45%);
        background-image: -moz-linear-gradient(0deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,0.90) 98.45%);
        background-image: -o-linear-gradient(0deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,0.90) 98.45%);
        background-image: linear-gradient(0deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,0.90) 98.45%);
      }
</style>


<div id="active_class">
    <div class="tstart" >

        <h2 class="text-left" style="height: 20px;padding-top: 10px;text-transform: capitalize">Student Name: <?php echo $result1['student_name'];  ?> </h2>
        <br>
<form method="post">
    <table id="example1" class="table table-striped  table-bordered table-hover table-sm">
        <thead class="bg-info">
                <tr>
                  <th scope="col" scope="row">Class No</th>
                  <th scope="col">Name</th>
                  <th scope="col">Attendence</th>
                  <th scope="col">Assignment</th>
                  <th scope="col">Quiz</th>
                  <th scope="col">Presentation</th>

                </tr>
          </thead>
            <tbody class="bg-light">
              <?php
                  if (isset($con)) {

                    $sql1="SELECT S_id,Reg_no FROM register WHERE Class_id='".$_SESSION['Class_id']."' AND S_id='".$_SESSION['S_id']."'";
                    $row=mysqli_query($con ,$sql1);
                    if (mysqli_num_rows($row)>0) {

                        while ($r=mysqli_fetch_assoc($row)) {
                              echo "<tr>";
                              $sql2="SELECT student_name FROM student WHERE S_id='".$r['S_id']."'";
                              $r2=mysqli_fetch_array(mysqli_query($con ,$sql2));
                              //display class no and name of student
                              echo "<td>".$r['Reg_no']."</td>";
                              echo "<td>".$r2['student_name']."</td>";
                              //okkkkkkk
                              $sql3="SELECT AT_id, AT_date FROM attendence_record WHERE Class_id='".$_SESSION['Class_id']."' AND S_id='".$r['S_id']."' ORDER BY AT_date DESC";
                              $exe_at=mysqli_query($con ,$sql3);
                              if (mysqli_num_rows($exe_at)>0) {
                              /*===============  attendence calculate================*/

                                    $p=0;
                                    $a=0;
                                    $l=0;
                                    $temp=0;
                                    while ($r99=mysqli_fetch_assoc($exe_at) AND $temp<30) {
                                        if ($r99['AT_id']==1) {
                                          $p++;
                                        }
                                        if ($r99['AT_id']==2) {
                                          $a++;
                                        }
                                        if ($r99['AT_id']==3) {
                                          $l++;
                                        }
                                        $temp++;
                                        // echo "<h1>".$std_id."date==".$r['AT_date']."</h1>";
                                    }
                                    $total=$p+$a+$l;
                                    $ap=0;
                                    if ($p==0) {  ?>
                                          <td>
                                          <?php  echo $ap;  ?>&nbsp;%  And <?php echo $l; ?> L &nbsp;&nbsp; <button type="submit" name="att_view" value="<?php echo $r['S_id']; ?>" class="btn btn-outline-primary"  style="float: right;margin-right: 30%" > <span class="glyphicon glyphicon-eye-open" style="color: black;"></span></button>
                                          </td>
                                          <?php
                                    }else {
                                      $ap=(($p/$total)*100);
                                      $n=number_format($ap,1);           //the number_format are use to display the digit after decimal point
                                        ?>
                                          <td >
                                          <?php  echo $n;  ?>&nbsp;%  And <?php echo $l; ?> L &nbsp;&nbsp; <button type="submit" name="att_view" value="<?php echo $r['S_id']; ?>" class="btn btn-outline-primary" style="float: right;margin-right: 30%;"> <span class="glyphicon glyphicon-eye-open" style="color: black;"></span></button>
                                          </td>
                                      <?php
                                    }



                              }else {  ?>
                                <td>
                                No Attendence <button type="submit" name="att_view" value="<?php echo $r['S_id']; ?>" class="btn btn-outline-primary"  style="margin-right: 30%;float: right;"> <span class="glyphicon glyphicon-eye-open" style="color: black;"></span></button>
                                </td>
                                <?php
                              }
          /*===================== here attendece calculation are ended ================================================================================================================================================================================================================================================================================================================*/
                              /*assignment are start below============*/
                              $st2="SELECT assignment.a_date,assignment.at_marks,assignment.A_id,assignment_record.ao_marks,assignment_record.S_id FROM assignment INNER JOIN assignment_record ON assignment_record.A_id=assignment.A_id WHERE assignment_record.Class_id='".$_SESSION['Class_id']."' AND assignment_record.S_id='".$r['S_id']."' ORDER BY assignment.a_date DESC";
                              $exe_st2=mysqli_query($con ,$st2);
                              if ($nrow=mysqli_num_rows($exe_st2)>0) {
                                    $ass_record=mysqli_fetch_array($exe_st2);
                                    ?>
                                    <td>
                                      <?php  echo $ass_record['ao_marks'];  ?> out of <?php  echo $ass_record['at_marks'];  ?>
                                      <button type="submit" name="ass_view" value="<?php echo $r['S_id']; ?>" class="btn btn-outline-primary" style="margin-right:30%;float:right"><span class="glyphicon glyphicon-eye-open" style="color: black;float:right;"></span></button>
                                    </td>

                                <?php
                              }
                              else {  ?>
                                  <td>
                                    <?php  echo "No Assignment";  ?>
                                    <button type="submit" name="ass_view" value="<?php echo $r['S_id']; ?>" class="btn btn-outline-primary" style="margin-right:30%;float:right"><span class="glyphicon glyphicon-eye-open" style="color: black;float:right;"></span></button>
                                  </td>
                              <?php  }
            /*===========================Assignment ended==================================================================================================================================================================================================================================================================================================================================*/
                  /*=============below are Quize start============================================================================================================================================================================================================================================================================================================================================*/
                                  $st33="SELECT quize.q_date,quize.qt_marks,quize.Q_id,quiz_record.qo_marks,quiz_record.S_id FROM quize INNER JOIN quiz_record ON quize.Q_id=quiz_record.Q_id WHERE quiz_record.Class_id='".$_SESSION['Class_id']."' AND quiz_record.S_id='".$r['S_id']."' ORDER BY quize.q_date DESC";
                                  $exe_st33=mysqli_query($con ,$st33);
                                  if (mysqli_num_rows($exe_st33)>0) {
                                        $qr=mysqli_fetch_array($exe_st33);
                                        ?>
                                        <td>
                                        <?php  echo $qr['qo_marks'];  ?> out of <?php  echo $qr['qt_marks'];  ?>
                                        <button type="submit" name="quize_view" value="<?php echo $r['S_id']; ?>" class="btn btn-outline-primary" style="margin-right:30%;float:right"><span class="glyphicon glyphicon-eye-open" style="color: black;float:right;"></span></button>
                                        </td>
                                        <?php
                                  }else {  ?>
                                        <td>
                                        <?php  echo "No Quize";  ?>
                                        <button type="submit" name="quize_view" value="<?php echo $r['S_id']; ?>" class="btn btn-outline-primary" style="margin-right:30%;float:right"><span class="glyphicon glyphicon-eye-open" style="color: black;float:right;"></span></button>
                                       </td>
                                  <?php  }
  /*======================================ended=================================================================================================================================================================================================================================================================================================================================================*/
        /*---------------------------below are presentation last record  start ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
                                        $st4="SELECT presentation.p_date,presentation.pt_marks,presentation.P_id,presentation_record.po_marks,presentation_record.S_id FROM presentation INNER JOIN presentation_record ON presentation_record.P_id=presentation.P_id WHERE presentation_record.Class_id='".$_SESSION['Class_id']."' AND presentation_record.S_id='".$r['S_id']."' ORDER BY presentation.p_date DESC";
                                        $exe4=mysqli_query($con ,$st4);
                                        if (mysqli_num_rows($exe4)>0) {
                                            $pr=mysqli_fetch_array($exe4);
                                            ?>
                                            <td> <?php  echo $pr['po_marks'];  ?> out of <?php  echo $pr['pt_marks'];  ?>
                                            <button type="submit" name="pre_view" value="<?php echo $r['S_id']; ?>" class="btn btn-outline-primary" style="margin-right:30%;float:right"><span class="glyphicon glyphicon-eye-open" style="color: black;float:right;"></span></button>
                                            </td>
                                            <?php
                                        }
                                        else {
                                          ?>
                                          <td> <?php echo "No Presentation";  ?>
                                            <button type="submit" name="pre_view" value="<?php echo $r['S_id']; ?>" class="btn btn-outline-primary" style="margin-right:30%;float:right"><span class="glyphicon glyphicon-eye-open" style="color: black;float:right;"></span></button>
                                          </td>
                                          <?php
                                        }
      /*==================================ended=================================================================================================================================================================================================================================================================================================================================================================================================*/

                         echo "</tr>";
                        }
                  /*====end of while loop=======================================*/
                    }
                    else {  ?>
                          <tr>
                              <td colspan="6"> <?php echo "No student are register with this class "; ?> </td>
                          </tr>
                    <?php };




                  }
                  else {
                    echo "<script>  alert('Error Occur while connecting to the Database!');   </script>".mysqli_error($con);
                  }
               ?>

              </tbody>


      </table>
      </form>
    </div>

            <div class="tend"></div>  <!--it cover and highliting buttom area of the table -->


        </div>


        <?php
        //attendence btn
              if (isset($_POST['att_view'])) {
                    $_SESSION['S_id']=$_POST['att_view'];
                    ?>
                    <script> window.location.href='selft_attendence_monthly.php';  </script>
                    <?php
              }
        //endeddd
        //assignment btnexpire
              if (isset($_POST['ass_view'])) {
                $_SESSION['S_id']=$_POST['ass_view'];
                ?>
                <script> window.location.href='self_assignment.php';  </script>
                <?php

              }
          //quize btn
              if (isset($_POST['quize_view'])) {
                $_SESSION['S_id']=$_POST['quize_view'];

                ?>
                <script> window.location.href='self_quize.php';  </script>
                <?php
              } //ended

              //presentation btn
                  if (isset($_POST['pre_view'])) {
                    $_SESSION['S_id']=$_POST['pre_view'];
                    ?>
                    <script> window.location.href='self_presentation.php';  </script>
                    <?php
                  } //ended

         ?>







          </body>
        </html
        <script type="text/javascript" src="js/jquery.js"></script>
        <script src="../datatables/jquery.dataTables.js"></script>
        <script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>

        <script>
          $(function () {

            $('#example2').DataTable({
              "paging": true,
              "lengthChange": true,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": false,
            });
          });
        </script>




      <?php
  }else {
    echo "<script> alert('Please Login First!....'); </script>";
  }

?>
