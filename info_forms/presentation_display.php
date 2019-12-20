<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>presentation display of student </title>
	<link href="teacher_css.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="bootstrap 4/css/glyphicon.css">




  </head>
<body>
  <?php session_start(); ?>
  <!--=================== the top nevagation menu=======================================----------->
        <?php  include('std_top_menu.php');  ?>
  <!--============ ended==================================================================== -->

<!-- the below css link have high periority then above top_info.php file  -->
<link rel="stylesheet" href="../datatables-bs4/css/dataTables.bootstrap4.css">


  <style media="screen">
      /* #b11{ background: #fff; color: #000 ;font-weight: bold;} */
  </style>
        <!--=================== the top menu just menu and side of the nevagation menu ====================-->
              <?php include('std_2nd_top_menu.php'); ?>
        <!--============ ended==================================================================== -->
<?php
  $cid=$_SESSION['Class_id'];
  $query1 ="SELECT Name FROM class WHERE Class_id='$cid'";
  $e=mysqli_query($con,$query1);
  $r1=mysqli_fetch_array($e);
  //class subject name
  $S_id=$_SESSION['S_id'];
  $q2="SELECT Subject_id FROM have WHERE Class_id='$cid' AND S_id='$S_id'";
  $roww=mysqli_fetch_array(mysqli_query($con, $q2));
  $subid=$roww['Subject_id'];
  $q3="SELECT subject_name FROM subject WHERE Subject_id='$subid'";
  $rr=mysqli_fetch_array(mysqli_query($con,$q3));

  $st_id=$_SESSION['S_id'];
  $st_name_query="SELECT register.Reg_no,student.student_name FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' AND register.S_id='$st_id'";
  $exe_st=mysqli_query($con ,$st_name_query);
  $r=mysqli_fetch_array($exe_st);
  $reg_no=$r['Reg_no'];
  $name=$r['student_name'];

 ?>

<div class="about_area">
  <div class="viewing_area">
    <h5>CLASS NOW VIEWING :> <a href="" style="color: blue"> <?php  echo $r1['Name']; ?></a></h5>
    <h5>SUBJECT :><strong style="color: deeppink"> <?php  echo $rr['subject_name']; ?> </strong></h5>
  </div>

    <div class="about">
        <h2>About this page </h2>
        <p class="text">
          This is Your Presentation Homepage , Here You Can See Your Presentation Records of Your Class. For more Information Click on Helps Button.

        </p>

    </div>

</div>




<!--=========including the top classes button below the top navagation menu ================-->
<?php  include('std_classes_table_top_menu.php'); ?>
<!--=========ended =====================================================================-->

<style media="screen">
#b5{
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
      <h2 class="text-left" style="padding-top: 5px;padding-left: 5px;padding-bottom: 10px;text-transform: capitalize">Student Name: <?php echo $result1['student_name'];  ?> </h2>
      <div style="padding-left: 30%;color: #fff" >
        <span><strong>  Student Class No: <?php   echo $reg_no; ?>  </strong> </span>
        <span style="padding-left: 10%"> <strong>  Student Name: <?php   echo $name; ?>  </strong> </span>
      </div>

<form method="post">
    <table id="example1" class="table table-striped  table-bordered table-hover table-sm">
        <thead class="bg-info">
                <tr>

                  <th scope="col">Presentation Topic</th>
                  <th scope="col">Presentation Date</th>
                  <th scope="col">Obtained Marks</th>
                  <th scope="col">Total Marks</th>


                </tr>
          </thead>
            <tbody class="bg-light">
              <?php
          if (isset($con)) {
                  $query1="SELECT presentation.p_topic,presentation.p_date,presentation_record.po_marks,presentation.pt_marks FROM presentation INNER JOIN presentation_record ON presentation_record.P_id=presentation.P_id WHERE presentation_record.Class_id='$cid' AND presentation_record.S_id='$st_id' ORDER BY presentation.p_date DESC";
                  $exe_query1=mysqli_query($con ,$query1);
                  if (mysqli_num_rows($exe_query1)>0) {
                              while ($row=mysqli_fetch_assoc($exe_query1)) {
                                     ?>
                                <tr>

                                      <td><?php echo $row['p_topic']; ?></td>
                                      <td><?php echo $row['p_date']; ?></td>
                                      <td><?php echo $row['po_marks']; ?></td>
                                      <td><?php echo $row['pt_marks']; ?></td>
                                </tr>

                              <?php
                                }
                    }else { ?>
                      <tr>
                            <td colspan="4" class="alert alert-warning text-center"><?php echo "NO Presentation"; ?></td>
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
