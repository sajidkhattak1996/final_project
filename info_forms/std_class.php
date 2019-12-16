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
                    This is your Student Homepage. The Homepage show the classes you are enrolled in. To enroll in a new class,
                    click the enroll in a class button. Click a class name to open your class homepage for the class.from the Class Homepage you can see
                    you'r Class records.

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
                    // i extract first subject
                    $q2="SELECT Subject_id FROM have WHERE Class_id='$cid'";
                    $row=mysqli_fetch_assoc(mysqli_query($con,$q2));
                    $sid=$row['Subject_id'];
                    $_SESSION['subject_id']=$row['Subject_id'];
                    $S_id=$_SESSION['S_id'];
                    $q3="SELECT S_id FROM attendence_record WHERE Subject_id='$sid' AND Class_id ='$cid' AND S_id='$S_id'";
                    $e3=mysqli_query($con,$q3);

                    $sid_array=[];
                    $i=0;
                    while ($r=mysqli_fetch_assoc($e3)) {
                          // echo "<h5> present person==</h5>";
                        $sid_array[$i]=$r['S_id'];
                        $i++;
                    }
                    echo "<h6>".count($sid_array)."</h6>"; //msggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg

                    $S_id_array=array_unique($sid_array);   //it well remove the debulacate value form the array
                    //$S_id_length=count($S_id_array);       //the count function are use to finde the length of the array


                    /*==============creating array to store the value ========================*/
                    //here creating the array to store the table values
                    $reg_array =[];
                    $sid_array =[];
                    $sname_array=[];
                    $att_array=[];                 //store the attendence of Student

                    $ass_array_tmarks=[];       //store the assignment total marks
                    $ass_array_omarks=[];       //store the assignment otained marks of students

                    $quize_array_tmarks=[];    //store the quize total marks
                    $quize_array_omarks=[];     //store the student quize obtained marks

                    $pre_array_tmarks=[];    //store the presentation total marks
                    $pre_array_omarks=[];     //store the student presentation obtained marks

                    $leave_array=[];

                    /*===================student records=============================================================================================================*/
                    $cid=$_SESSION['Class_id'];
                    //this query extract student records which are enroll to that class from from database
                    $st1 ="SELECT register.Reg_no, student.student_name ,register.S_id FROM register INNER JOIN student ON register.S_id = student.S_id WHERE register.Class_id='$cid' AND register.S_id='$S_id'  ORDER BY register.Reg_no ";
                    $exe1=mysqli_query($con,$st1);
                    $c=0;
                    while ($row=mysqli_fetch_assoc($exe1)) {
                            $reg_array[$c]=$row['Reg_no'];
                            $sname_array[$c]=$row['student_name'];
                            $sid_array[$c]=$row['S_id'];
                            $c++;
                    }  /*============================ended========================================================================================================================*/

                    /*========================for assignment records=========================================================================================*/

                    for ($i=0; $i <count($S_id_array) ; $i++) {
                      $sbid=$S_id_array[$i];
                      $st2="SELECT assignment.a_date,assignment.at_marks,assignment.A_id,assignment_record.ao_marks,assignment_record.S_id FROM assignment INNER JOIN assignment_record ON assignment_record.A_id=assignment.A_id WHERE assignment_record.Class_id='$cid' AND assignment_record.Subject_id='$sid' AND assignment_record.S_id='$sbid' ORDER BY assignment.a_date DESC";
                      $exe2=mysqli_query($con,$st2);
                      $temp=0;
                      while ($r=mysqli_fetch_assoc($exe2) AND $temp<1) {
                          $ass_array_tmarks[$i]=$r['at_marks'];
                          $ass_array_omarks[$i]=$r['ao_marks'];
                        $temp++;
                      }
                      /*======ended==and below are quize last time record of ================================================================================================*/
                      $st3="SELECT quize.q_date,quize.qt_marks,quize.Q_id,quiz_record.qo_marks,quiz_record.S_id FROM quize INNER JOIN quiz_record ON quize.Q_id=quiz_record.Q_id WHERE quiz_record.Class_id='$cid' AND quiz_record.Subject_id='$sid' AND quiz_record.S_id='$sbid' ORDER BY quize.q_date DESC";
                      $exe_st3=mysqli_query($con ,$st3);
                      $y=0;
                      while ($row=mysqli_fetch_assoc($exe_st3) AND $y<1) {
                          $quize_array_tmarks[$i]=$row['qt_marks'];
                          $quize_array_omarks[$i]=$row['qo_marks'];
                          $y++;
                      } /*==================ended =and below are the presentation last records==============================================================================================================================================================================*/
                      $st4="SELECT presentation.p_date,presentation.pt_marks,presentation.P_id,presentation_record.po_marks,presentation_record.S_id FROM presentation INNER JOIN presentation_record ON presentation_record.P_id=presentation.P_id WHERE presentation_record.Class_id='$cid' AND presentation_record.Subject_id='$sid' AND presentation_record.S_id='$sbid' ORDER BY presentation.p_date DESC";
                      $exe4=mysqli_query($con ,$st4);
                      $tm=0;
                      while ($row=mysqli_fetch_assoc($exe4) AND $tm<1) {
                              $pre_array_tmarks[$i]=$row['pt_marks'];
                              $pre_array_omarks[$i]=$row['po_marks'];
                              $tm++;
                      }

                    }
                    /*============== get the attendence of student upto 30 days =================================================================================*/
                    for ($i=0; $i <count($S_id_array) ; $i++) {

                          $std_id=$S_id_array[$i];
                          $at="SELECT AT_id, AT_date FROM attendence_record WHERE Subject_id='$sid' AND Class_id='$cid' AND S_id='$std_id' ORDER BY AT_date DESC";
                          $exe_at=mysqli_query($con,$at);
                          $p=0;
                          $a=0;
                          $l=0;
                          $temp=0;
                          while ($r=mysqli_fetch_assoc($exe_at) AND $temp<30) {
                              if ($r['AT_id']==1) {
                                $p++;
                              }
                              if ($r['AT_id']==2) {
                                $a++;
                              }
                              if ($r['AT_id']==3) {
                                $l++;
                              }
                              $temp++;
                              // echo "<h1>".$std_id."date==".$r['AT_date']."</h1>";
                          }
                          $total=$p+$a+$l;
                          $ap=(($p/$total)*100);
                          $n=number_format($ap,2);           //the number_format are use to display the digit after decimal point
                          // echo  "<h3>".$std_id."present==".$p."<br>absent==".$a." <br>leave==".$l."<br>attendence==".$n."%</h3>temp==".$temp;
                            $att_array[$i]=$n;
                            $leave_array[$i]=$l;

                    }
/*=========================ended===============================================================================================================*/

/*==================display all the array data ================================================================================================*/
                    for ($j=0; $j <count($reg_array); $j++) {
                      ?>
                        <tr>
                            <td><?php  echo $reg_array[$j];  ?> </td>
                            <td><?php  echo $sname_array[$j];  ?></td>
                            <?php
/*================================Attendence========================================================================================================================================================================================================================================*/
                            ?><td>  <?php
                            if (!empty($att_array)) {   ?>
                              <?php  echo $att_array[$j];  ?>&nbsp;%  And <?php echo $leave_array[$j]; ?> L &nbsp;&nbsp; <button type="submit" name="att_view" value="<?php echo $sid_array[$j]; ?>" class="btn btn-outline-primary" > <span class="glyphicon glyphicon-eye-open" style="color: black;"></span></button>

                            <?php
                            }
                            if (empty($att_array)) {  }
                            ?>    </td>  <?php
/*================================Assignment========================================================================================================================================================================================================================================*/
                            ?><td>  <?php
                            if (!empty($ass_array_omarks)) {   ?>

                                <?php  echo $ass_array_omarks[$j];  ?> out of <?php  echo $ass_array_tmarks[$j];  ?>
                                <button type="submit" name="ass_view" value="<?php echo $sid_array[$j]; ?>" class="btn btn-outline-primary" style="margin-right:50%;float:right"><span class="glyphicon glyphicon-eye-open" style="color: black;float:right;"></span></button>


                            <?php
                            }
                            if (empty($ass_array_omarks)) {  }
                            ?>    </td>  <?php
/*================================Quize========================================================================================================================================================================================================================================*/
                            ?> <td>  <?php
                            if (!empty($quize_array_omarks)) {   ?>
                              <?php  echo $quize_array_omarks[$j];  ?> out of <?php  echo $quize_array_tmarks[$j];  ?>  <button type="submit" name="quize_view" value="<?php echo $sid_array[$j]; ?>" class="btn btn-outline-primary" style="margin-right:50%;float:right"><span class="glyphicon glyphicon-eye-open" style="color: black;float:right;"></span></button>
                            <?php
                            }
                            if (empty($quize_array_omarks)) {  }
                            ?>    </td>  <?php
/*================================presentation========================================================================================================================================================================================================================================*/
                            ?> <td>  <?php
                            if (!empty($pre_array_omarks)) {   ?>
                              <?php  echo $pre_array_omarks[$j];  ?> out of <?php  echo $pre_array_tmarks[$j];  ?>  <button type="submit" name="pre_view" value="<?php echo $sid_array[$j]; ?>" class="btn btn-outline-primary" style="margin-right:50%;float:right"><span class="glyphicon glyphicon-eye-open" style="color: black;float:right;"></span></button>

                            <?php
                            }
                            if (empty($pre_array_omarks)) {  }
                            ?> </td>  <?php
/*====================================ended===========================================================================================================================================================================================================================================*/
                              ?>
                        </tr>

                      <?php
                    }
                    /*=========================ended===================================================================================================*/


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



          echo "<pre>".print_r($_SESSION, TRUE)."</pre>";

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
