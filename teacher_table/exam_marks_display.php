<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>presentation exam display records </title>
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
  $iname=$_SESSION['institute'];
  $query1 ="SELECT Name FROM class WHERE Class_id='$cid'";
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
          This is your Exam Marks Display Homepage. In this page exam records of all students of a class are Display and also you can EDIT ,DELETE Exam & its Records.
          You can also Add the new Exam Marks record, by click on button (+ Exam Marks ).You can also Generate their CSV File also.


        </p>

    </div>

</div>




<!--=========including the top classes button below the top navagation menu ================-->
<?php  include('display_classes_table_top_menu.php');  ?>
<!--=========ended =====================================================================-->

<style media="screen">
#b6{
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
#b6 {
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

<div id="active_class" class="container-fluid">
    <div class="tstart" >
      <h2 class="text-left">Institute Name:  <?php  echo $_SESSION['institute']; ?> </h2>
      <div class="pb-5">
        <a href="edit_exam_marks.php?cid=<?php echo $cid; ?>"><button type="button" class="btn btn-md btn-outline-light float-right mr-3 font-weight-bold" name="button"><i class="fas fa-pen"></i> &nbsp; Edit  </button></a>
        <a href="add_exam_marks.php?cid=<?php echo $cid; ?>"><button type="button" class="btn btn-md btn-outline-light float-right mr-3 font-weight-bold" name="button"><i class="fas fa-plus"></i> &nbsp; Exam Marks  </button></a>

      </div>
      <div class="bg-light">
      <div class="row container-fluid  ml-0 mt-5 py-3 border-bottom border-left border-right border-success" style="border-radius: 0px 0px 15px 15px;">
          <div class="col-lg-4 ">
                <span class="font-weight-bold  pl-lg-5 h3">Class Name: <span class="font-weight-bolder h4" style="color: blue"> &nbsp;<?php  echo $r['Name']; ?></span> </span>
          </div>
          <div class="col-lg-4 ">
            <span  class="font-weight-bold  pl-lg-5 h3">Subject:  <span class="font-weight-bolder h4" style="color: deeppink"> &nbsp; <?php  echo $rr['subject_name']; ?></span></span>
          </div>
          <div class="col-lg-4"></div>
      </div>
      <?php
      $sql_exam=mysqli_query($con ,"SELECT * FROM exam INNER JOIN exam_record ON exam_record.E_id=exam.E_id WHERE exam_record.Class_id='$cid' GROUP BY exam_record.E_id");
      if (mysqli_num_rows($sql_exam)>0) {
        while ($row=mysqli_fetch_assoc($sql_exam)) {
          ?>
          <div class="row container-fluid ml-0 py-3 mb-5  border border-success " style="border-radius: 10px;box-shadow: 1px 1px 8px 1px #13bca4">
            <div class="col-lg-3 pb-4 ">
            <span class="font-weight-bold  pl-lg-5 h3">Exam Term: <span class="font-weight-bolder h4" > &nbsp;<?php  echo $row['exam_term']; ?></span> </span>
            </div>
            <div class="col-lg-3 pb-4 "><span class="font-weight-bold  pl-lg-5 h3">Exam Date: <span class="font-weight-bolder h4" > &nbsp;<?php  echo $row['exam_date']; ?></span> </span></div>
            <div class="col-lg-3 pb-4"> <span class="font-weight-bold  pl-lg-5 h3">Total Marks: <span class="font-weight-bolder h4" > &nbsp;<?php  echo $row['total_marks']; ?></span> </span> </div>

           <div class="col-lg-3 pb-4">

              <a href="export_exam_record.php?E_id=<?php echo $row['E_id']; ?>&cid=<?php echo $cid; ?>" >
                <button type="button" class="btn  btn-outline-primary float-right font-weight-bold"  name="export_exam">Export as CSV File</button>
              </a>
              <a href="exam_ratio_find.php?eid=<?php echo $row['E_id']; ?>&term=<?php echo $row['exam_term']; ?>"><button type="button" class="btn btn-md btn-outline-primary float-right mr-3 font-weight-bold" name="button"><i class="fas fa-plus"></i> &nbsp; Ratio Marks To Exam  </button></a>
          </div>

            <div class="container-fluid">
            <table id="example1"  class="table table-straped table-hover table-bordered" >
                <thead class="bg-info">
                  <tr>
                    <th>Class No</th>
                    <th>Student Name</th>
                    <th>Obtained Marks</th>
                  </tr>
                </thead>
                <tbody>


          <?php
           $query2="
           SELECT register.Reg_no,student.student_name,student.S_id,exam_record.obtained_marks FROM exam_record
           INNER JOIN register ON exam_record.S_id=register.S_id
           INNER JOIN student ON exam_record.S_id=student.S_id
           AND exam_record.Class_id='$cid' AND exam_record.E_id='".$row['E_id']."'
           AND register.Class_id='$cid'
          ";
          $exe=mysqli_query($con , $query2);
          if (mysqli_num_rows($exe)>0){
            while ($r=mysqli_fetch_array($exe)) {
              ?>
              <tr>
                <td><?php echo $r['Reg_no'];  ?></td>
                <td><?php echo $r['student_name'];  ?></td>
                <td><?php echo $r['obtained_marks'];  ?></td>
              </tr>

              <?php
            }
          }else {
            echo "Yet No Exam Result are Uploaded.";
          }?>
          </tbody>
        </table>
      </div>
      </div>
          <?php
        }//while are ended...

      }else {?>
        <div class="alert alert-warning text-center font-weight-bold">
          Yet No Exam Result are Uploaded...
        </div>
        <?php
      }

      ?>


    </div>
</div>
        <div class="tend" style="margin-top:-20px"></div>  <!--it cover and highliting buttom area of the table -->


    </div>

  </body>
</html>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="../datatables/jquery.dataTables.js"></script>
<script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
  //  $("#example1").DataTable();
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
