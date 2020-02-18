<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>self all attendance of student </title>
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
  $query1 ="SELECT Name FROM class WHERE Class_id='$cid'";
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
          This Page Display the Full details of Attendance of the Students & you can click on Attendance Monthly Wise  to view the attendance of student Monthly Wise.
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
      <a href="selft_attendence_monthly.php"><button type="button" name="button" class="btn btn-outline-light">Attendance Monthly Wise</button>  </a>
      <a href=""><button type="button" name="button" class="btn btn-light" style="margin-left: 10px;margin-right: 5px">Attendance All</button>  </a>
      <div style="padding-left: 30%;color: #fff" >
        <span><strong>  Student Class No: <?php   echo $reg_no; ?>  </strong> </span>
        <span style="padding-left: 10%"> <strong>  Student Name: <?php   echo $name; ?>  </strong> </span>
      </div>
<form method="post">
    <table id="example1" class="table table-striped  table-bordered table-hover table-sm">
        <thead class="bg-info">
                <tr>

                  <th scope="col">Attendance Date</th>
                  <th scope="col">Attendance Status</th>


                </tr>
          </thead>
            <tbody class="bg-light">
              <?php
                  if (isset($con)) {
                    //the below query extract all the student sttndence records of that class and subject
                        $stmt1="SELECT attendence_record.AT_date,attendence.status FROM attendence INNER JOIN attendence_record ON attendence.AT_id=attendence_record.AT_id WHERE attendence_record.Class_id='$cid'  AND attendence_record.S_id='$student_id' ORDER BY attendence_record.AT_date DESC";
                        $exe_stmt1=mysqli_query($con ,$stmt1);
                        // echo "okkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk<br>";
                        // echo "<h5>".$cid."</h5>";
                        // echo "<h5>".$subid."</h5>";
                        // echo "<h5>".$student_id."</h5>";
                        if (mysqli_num_rows($exe_stmt1)>0) {

                        while($result1=mysqli_fetch_assoc($exe_stmt1)) {
                              ?>

                              <tr>

                                  <td> <?php  echo $result1['AT_date']; ?></td>
                                  <td> <?php  echo $result1['status']; ?></td>
                              </tr>


                            <?php  }

                          }else {  ?>
                            <tr>
                                <td colspan="2" class="alert alert-warning text-center"><?php  echo "No Attendence"; ?></td>
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
