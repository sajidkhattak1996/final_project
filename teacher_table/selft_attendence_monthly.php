<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>attendance of the Student are  </title>
	<link href="teacher_css.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="bootstrap 4/css/glyphicon.css">




  </head>
<body>
  <!--===============below loader are include =================-->
  <?php include('../plugins/loader/loader1.html'); ?>
  <!--=================ended==================================-->
<!--=========top nvagation menu ==========-->
<?php  include('top_info.php');  ?>
<!--=========top nvagation menu endeddd ==========-->

<!-- the below css link have high periority then above top_info.php file  -->
<link rel="stylesheet" href="../datatables-bs4/css/dataTables.bootstrap4.css">

<!--=========including the top classes button below the top navagation menu ================-->
<?php  include('display table/display_classes_top_menu.php');  ?>
<!--=========ended ================-->
<?php
  $cid=$_SESSION['class_id'];
  $tid=$_SESSION['t_id'];
  $iname=$_SESSION['institute'];
  $query1 ="SELECT Name FROM class WHERE Class_id='$cid' AND T_id='$tid'";
  $e=mysqli_query($con,$query1);
  $r=mysqli_fetch_array($e);
  //class subject name
  $q2="SELECT Subject_id FROM have WHERE Class_id='$cid'";
  $roww=mysqli_fetch_array(mysqli_query($con, $q2));
  $subid=$roww['Subject_id'];
  $q3="SELECT subject_name FROM subject WHERE Subject_id='$subid'";
  $rr=mysqli_fetch_array(mysqli_query($con,$q3));

  $student_id=$_SESSION['S_id'];
  $st_rr="SELECT register.Reg_no,student.student_name FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' AND register.S_id='$student_id'";
  $exe_st_rr=mysqli_query($con,$st_rr);
  $exe_rr=mysqli_fetch_array($exe_st_rr);

  $reg_no=$exe_rr['Reg_no'];
  $name=$exe_rr['student_name'];


 ?>

<div class="about_area">
    <div class="viewing_area">
      <h5>CLASS NOW VIEWING :> <a href="" style="color: blue"> <?php  echo $r['Name']; ?></a></h5>
      <h5>SUBJECT :> <a href="subject.php" style="color: deeppink"><strong> <?php  echo $rr['subject_name']; ?> </strong> </a></h5>
    </div>

    <div class="about">
        <h2>About this page </h2>
        <p class="text">
          This is your Teacher Class Attendance Records Homepage. The page show the attendance of the particular student which are register with this class.
          this page default display the  attendance monthly wise .You can also click on All Attendance to view the details attendance of the student.
          The Teacher can also search for student and also Export the Records as CSV File.


        </p>

    </div>

</div>

<!--=========including the top classes button below the top navagation menu ================-->
<?php  include('display_classes_table_top_menu.php');  ?>
<!--=========ended =====================================================================-->

<style media="screen">
#b2{
  background-image: -webkit-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
  background-image: -moz-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
  background-image: -o-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
  background-image: linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
  color: blue;
  border-left: solid 1px rgba(172,239,224,0.66);
  border-top: solid 1px rgba(172,239,224,0.66);
  border-right: solid 1px rgba(172,239,224,0.66);

  border-radius: 7px 7px 0px 0px;
}
#b1{
  background-image: -webkit-linear-gradient(270deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
  background-image: -moz-linear-gradient(270deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
  background-image: -o-linear-gradient(270deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
  background-image: linear-gradient(180deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
  color: #6f9de8;
  border:solid 1px rgba(127,243,228,0.52);
  border-radius: 7px 7px 0px 0px;
}
#b2 {
  pointer-events: none;
}
</style>


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
      <h2 class="text-left">Institute Name:  <?php  echo $_SESSION['institute']; ?> </h2>
      <a href=""><button type="button" name="button" class="btn btn-light">Attendance Monthly Wise</button>  </a>
      <a href="selft_attendence_all.php"><button type="button" name="button" class="btn btn-outline-light" style="margin-left: 10px;margin-right: 5px">All Attendance </button>  </a>
      <div style="padding-left: 30%;color: #fff" >
        <span><strong>  Student Class No: <?php   echo $reg_no; ?>  </strong> </span>
        <span style="padding-left: 10%"> <strong>  Student Name: <?php   echo $name; ?>  </strong> </span>
      </div>
      <form method="post"  action="self_export_file.php">
        <button type="submit" class="btn btn-outline-light" name="export" value="<?php echo $cid; ?>" style="float: right;margin-right: 2%;">Export as CSV File</button>
        <input type="text" name="sid" value="<?php echo $student_id; ?>" style="display:none">
      </form>

<form method="post">
    <table id="example1" class="table table-striped  table-bordered table-hover table-sm">
        <thead class="bg-info">
                <tr>

                  <th scope="col">Attendance Date</th>
                  <th scope="col">Attendance Persentage</th>


                </tr>
          </thead>
            <tbody class="bg-light">
              <?php

                  if (isset($con)) {
                    /*============================get the only year of particular class and students=============================================================================================================================================*/
                                              $sql_year="SELECT year(attendence_record.AT_date) FROM attendence_record WHERE attendence_record.Class_id='$cid' AND attendence_record.S_id='".$student_id."' GROUP BY year(attendence_record.AT_date)";
                                              if (mysqli_num_rows(mysqli_query($con ,$sql_year))>0) {
                                                $e=mysqli_query($con ,$sql_year);
                                                while ($y=mysqli_fetch_array($e)) {
                    /*=============================get the all months record of students========================================================================================================================================================================================================*/
                                                  $stmt3="SELECT month(attendence_record.AT_date) FROM attendence_record WHERE attendence_record.Class_id='$cid' AND attendence_record.S_id='".$student_id."' AND year(attendence_record.AT_date)='".$y[0]."' GROUP BY month(attendence_record.AT_date)";
                                                  $exe3=mysqli_query($con , $stmt3);
                                                  $nr=mysqli_num_rows($exe3);
                                                  $padding=($nr*10);
                                                  if ($nr>0) {
                                                    echo "<tr>";

                                                    $count=0;
                                                    while ($m=mysqli_fetch_array($exe3)) {  $count++;
                                                      echo "<td>";
                                                      echo $y[0]."   -  ";
                                                      if($m[0]==1){ echo "January"; }
                                                      if($m[0]==2){ echo "Februray"; }
                                                      if($m[0]==3){ echo "March"; }
                                                      if($m[0]==4){ echo "April"; }
                                                      if($m[0]==5){ echo "May"; }
                                                      if($m[0]==6){ echo "June"; }
                                                      if($m[0]==7){ echo "July"; }
                                                      if($m[0]==8){ echo "August"; }
                                                      if($m[0]==9){ echo "September"; }
                                                      if($m[0]==10){ echo "October"; }
                                                      if($m[0]==11){ echo "November"; }
                                                      if($m[0]==12){ echo "December"; }

                                                      echo "</td>";
                                                      $record="SELECT attendence_record.AT_id FROM attendence_record INNER JOIN attendence ON attendence_record.AT_id=attendence.AT_id WHERE attendence_record.Class_id='$cid' AND attendence_record.S_id='".$student_id."' AND month(attendence_record.AT_date)='".$m[0]."'";
                                                      //the above query gives us the attendence records of month
                                                      $exe_record=mysqli_query($con,$record);
                                                      if (mysqli_num_rows($exe_record)>0) {
                                                        $p=0;
                                                        $a=0;
                                                        $l=0;
                                                        while ($atd_row=mysqli_fetch_assoc($exe_record)) {
                                                          if ($atd_row['AT_id']==1) {   $p++;  }
                                                          if ($atd_row['AT_id']==2) {   $a++;  }
                                                          if ($atd_row['AT_id']==3) {   $l++;  }

                                                        }//end while of attendence recrds
                                                        if ($p==0) {
                                                          echo "<td>";
                                                          echo $p." %  &nbsp;&nbsp; & L= ".$l."</td>";  //display percentage
                                                        }else {
                                                          $total=($p+$a+$l);
                                                          $per=(($p/$total)*100);
                                                          $per_formate=number_format($per ,1);
                                                          echo "<td>";
                                                          echo $per_formate." %  &nbsp;&nbsp; & L= ".$l."</td>";  //display percentage
                                                        }

                                                        echo "</tr>";
                                                      }else {
                                                        echo "no attendance for that months ";
                                                      }
                                                    }//end while month
                                                  }else {
                                                    echo "no attendance for that year";
                                                  }
                /*====================================================================================================================================================================================================================================================================================*/


                                  } //end while year
                                }else {
                                  echo "<tr>";
                                    echo "<td colspan='2' class='alert-warning text-center'>No Attendance</td>";
                                  echo "</tr>";
                                }
                    /*===========================================================================================================================================================================================================================*/
                  }else {
                    echo "<script>  alert('Error Occur while connecting to the Database!');   </script>".mysqli_error($con);
                  }
               ?>

              </tbody>


      </table>
      </form>
</div>
        <div class="tend"></div>  <!--it cover and highliting buttom area of the table -->


    </div>

  </body>
</html>

<script src="../datatables/jquery.dataTables.js"></script>
<script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
  //  $("#example1").DataTable();
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
