<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>welcome to login </title>
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

 ?>

<div class="about_area">
    <div class="viewing_area">
      <h5>CLASS NOW VIEWING :> <a href="" style="color: blue"> <?php  echo $r['Name']; ?></a></h5>
      <h5>SUBJECT :> <a href="subject.php" style="color: deeppink"><strong> <?php  echo $rr['subject_name']; ?> </strong> </a></h5>
    </div>

    <div class="about">
        <h2>About this page </h2>
        <p class="text">
          This is your Teacher Class Attendance Records Homepage. The page show the attendance of the all the student which are register with this class.
          This Page Display the Attendance of Students Monthly Wise & you can click on All Attendance to view the details attendance of student , You can also
          Calculate the Persentage Upto your selected date by click on Calculate Persentage. The Teacher can also search for student and also Export the Records
          as CSV File.


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
      <a href="attendence_display_monthly.php"><button type="button" name="button" class="btn btn-light">Attendance Monthly Wise</button>  </a>
      <a href="attendence_display_all.php"><button type="button" name="button" class="btn btn-outline-light" style="margin-left: 10px;margin-right: 5px">All Attendance </button>  </a>
      <a href="calculate_percentage.php"><button type="button" class="btn btn-outline-light" name="button">Calculate Persentage</button>  </a>
      <form method="post"  action="export_file.php"><button type="submit" class="btn btn-outline-light" name="export" value="<?php echo $cid; ?>" style="float: right;margin-right: 2%;">Export as CSV File</button> </form>


<form method="post">
    <table id="" class="table table-striped  table-bordered table-hover table-sm table-responsive-sm">
        <thead class="bg-info">
                <tr>
                  <th scope="col" scope="row">Class No</th>
                  <th scope="col">Name</th>
                  <th scope="col">Attendance Month</th>
                  <th scope="col">Attendance percentage</th>


                </tr>
          </thead>
            <tbody class="bg-light">
              <?php
                  if (isset($con)) {
                        $sid_stmt="SELECT S_id FROM register WHERE Class_id='$cid' ORDER BY Reg_no ASC";
                        $exe_sid=mysqli_query($con ,$sid_stmt);
                        if (mysqli_num_rows($exe_sid)>0) {
                          //this query check if class have no attendece of all student
                          $stmt_check_attendence="SELECT * FROM `attendence_record` WHERE Class_id='$cid'";
                          $exe_attd=mysqli_query($con ,$stmt_check_attendence);
                              if (mysqli_num_rows($exe_attd)>0 ) {
                                $s=0;
                                while ($sid_row=mysqli_fetch_assoc($exe_sid)) {
                                  /*================get the student name from here============================================================================*/
                                  $sname_sql="SELECT register.Reg_no,student.student_name FROM register INNER JOIN student ON student.S_id=register.S_id WHERE register.S_id='".$sid_row['S_id']."' AND register.Class_id='$cid'";
                                  $exe_sn=mysqli_query($con ,$sname_sql);
                                  $sn_row=mysqli_fetch_array($exe_sn);
                                  /*===============================================================================================================================*/
                                  /*============================get the only year of particular class and students=============================================================================================================================================*/
                                  $sql_year="SELECT year(attendence_record.AT_date) FROM attendence_record WHERE attendence_record.Class_id='$cid' AND attendence_record.S_id='".$sid_row['S_id']."' GROUP BY year(attendence_record.AT_date)";
                                  if (mysqli_num_rows(mysqli_query($con ,$sql_year))>0) {
                                    $e=mysqli_query($con ,$sql_year);
                                    while ($y=mysqli_fetch_array($e)) {
                                      /*=============================get the all months record of students========================================================================================================================================================================================================*/
                                      $stmt3="SELECT month(attendence_record.AT_date) FROM attendence_record WHERE attendence_record.Class_id='$cid' AND attendence_record.S_id='".$sid_row['S_id']."' AND year(attendence_record.AT_date)='".$y[0]."' GROUP BY month(attendence_record.AT_date)";
                                      $exe3=mysqli_query($con , $stmt3);
                                      $nr=mysqli_num_rows($exe3);
                                      $padding=($nr*10);
                                      if ($nr>0) {
                                        echo "<tr style='border:solid 1px #13bca4'>";
                                        echo "<td rowspan='".$nr."' style='padding-top: ".$padding."px;border-bottom: solid 1px #008c7e'>".$sn_row[0]."</td>";
                                        echo "<td rowspan='".$nr."' style='padding-top: ".$padding."px;border-bottom: solid 1px #008c7e'>".$sn_row[1]."</td>";
                                        $count=0;
                                        while ($m=mysqli_fetch_array($exe3)) {  $count++;
                                          if($count==$nr){ echo "<td style='border-bottom:solid 1px #008c7e'>";  }else { echo "<td>";  }

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
                                          $record="SELECT attendence_record.AT_id FROM attendence_record INNER JOIN attendence ON attendence_record.AT_id=attendence.AT_id WHERE attendence_record.Class_id='$cid' AND attendence_record.S_id='".$sid_row['S_id']."' AND month(attendence_record.AT_date)='".$m[0]."'";
                                          //the above query gives us the attendance records of month
                                          $exe_record=mysqli_query($con,$record);
                                          if (mysqli_num_rows($exe_record)>0) {
                                            $p=mysqli_num_rows(mysqli_query($con ,"
                                            SELECT attendence_record.AT_id FROM attendence_record
                                            INNER JOIN attendence ON attendence_record.AT_id=attendence.AT_id
                                            WHERE attendence_record.Class_id='$cid'
                                            AND attendence_record.S_id='".$sid_row['S_id']."'
                                            AND month(attendence_record.AT_date)='".$m[0]."'
                                            AND attendence_record.AT_id='1'
                                            "));

                                            $a=mysqli_num_rows(mysqli_query($con ,"
                                            SELECT attendence_record.AT_id FROM attendence_record
                                            INNER JOIN attendence ON attendence_record.AT_id=attendence.AT_id
                                            WHERE attendence_record.Class_id='$cid'
                                            AND attendence_record.S_id='".$sid_row['S_id']."'
                                            AND month(attendence_record.AT_date)='".$m[0]."'
                                            AND attendence_record.AT_id='2'
                                            "));

                                            $l=mysqli_num_rows(mysqli_query($con ,"
                                            SELECT attendence_record.AT_id FROM attendence_record
                                            INNER JOIN attendence ON attendence_record.AT_id=attendence.AT_id
                                            WHERE attendence_record.Class_id='$cid'
                                            AND attendence_record.S_id='".$sid_row['S_id']."'
                                            AND month(attendence_record.AT_date)='".$m[0]."'
                                            AND attendence_record.AT_id='3'
                                            "));

                                            if ($p==0) {
                                              if($count==$nr){ echo "<td style='border-bottom:solid 1px #008c7e'>";  }else { echo "<td>";  }
                                                echo $p." %  &nbsp;&nbsp; & L= ".$l."</td>";  //display percentage
                                              }else {
                                                $total=($p+$a+$l);
                                                $per=(($p/$total)*100);
                                                $per_formate=number_format($per ,1);
                                                //the below if condition is just for the border bottom line
                                                if($count==$nr){ echo "<td style='border-bottom:solid 1px #008c7e'>";  }else { echo "<td>";  }
                                                  echo $per_formate." %  &nbsp;&nbsp; & L= ".$l."</td>";  //display percentage
                                                }

                                                echo "</tr>";
                                              }else {
                                                echo "no attendane for that months ";
                                              }
                                            }//end while month
                                          }else {
                                            echo "no attendance for that year";
                                          }
                                          /*====================================================================================================================================================================================================================================================================================*/

                                        } //end while year

                                        /*===========================================================================================================================================================================================================================*/

                                      }else {  ?>
                                        <td style="border-bottom:solid 1px #008c7e"><?php echo $sn_row[0]; ?></td>
                                        <td style="border-bottom:solid 1px #008c7e"><?php echo $sn_row[1]; ?></td>
                                        <td style="border-bottom:solid 1px #008c7e" colspan="2" class="alert alert-warning text-center"><?php echo "No Attendance ";  ?></td>
                                      <?php  }
                                      ?>
                                    </tr>
                                    <?php
                                  }

                              }else {?>
                              <tr>
                                <td colspan="4" class="text-center alert alert-warning"> <?php echo "No Attendace of the Class Students."; ?>  </td>
                              </tr>
                              <?php
                              }



                        }else {?>
                        <tr>
                          <td colspan="4" class="text-center alert alert-warning"> <?php echo "No student are register with this class"; ?>  </td>
                        </tr>
                        <?php
                        }





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
