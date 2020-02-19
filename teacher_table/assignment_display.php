<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>Assignment display of student </title>
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

 ?>

<div class="about_area">
    <div class="viewing_area">
      <h5>CLASS NOW VIEWING :> <a href="" style="color: blue"> <?php  echo $r['Name']; ?></a></h5>
      <h5>SUBJECT :> <a href="subject.php" style="color: deeppink"><strong> <?php  echo $rr['subject_name']; ?> </strong> </a></h5>
    </div>

    <div class="about">
        <h2>About this page </h2>
        <p class="text">
          This is your class record Assignment Display Homepage. This page display the Assignment of the all Class Students which are register with this class.
          You can also Search for the particular student in search box.


        </p>

    </div>

</div>




<!--=========including the top classes button below the top navagation menu ================-->
<?php  include('display_classes_table_top_menu.php');  ?>
<!--=========ended =====================================================================-->

<style media="screen">
#b3{
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
#b3 {
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
<div id="active_class ">
    <div class="tstart" >
      <h2 class="text-left">Institute Name:  <?php  echo $_SESSION['institute']; ?> </h2>
      <div class="pb-5">
        <a href="assignment_ratio.php?cid=<?php echo $cid; ?>"><button type="button" class="btn btn-md btn-outline-light float-right mr-3" name="button">Calculate Ratio</button></a>
        <form method="post"  action="export_assignment.php"><button type="submit" class="btn btn-outline-light" name="export_assignment" value="<?php echo $cid; ?>" style="float: right;margin-right: 2%;">Export as CSV File</button> </form>

      </div>
<!-- <input type="text" id="filter1" name="" placeholder="Search..."> -->
<form method="post" style="padding-top: 20px">
    <table id="example" class="table table-striped  table-bordered table-hover table-sm table-responsive-sm">
        <thead class="bg-info">
                <tr>
                  <th scope="col" scope="row">Class No</th>
                  <th scope="col">Name</th>
                  <th scope="col">Assignment Topic</th>
                  <th scope="col">Assignment Date</th>
                  <th scope="col">Obtained Marks</th>
                  <th scope="col">Total Marks</th>


                </tr>
          </thead>
            <tbody class="bg-light" id="data">
              <?php
                  if (isset($con)) {
                          $check_register="SELECT S_id FROM register WHERE Class_id='$cid' ORDER BY Reg_no ASC";
                          $exe_check=mysqli_query($con ,$check_register);
                          if (mysqli_num_rows($exe_check)>0) {
                            //this query check if class have no assignment of all student
                            $stmt_check_attendence="SELECT * FROM assignment INNER JOIN assignment_record ON assignment_record.A_id=assignment.A_id WHERE assignment_record.Class_id='$cid'";
                            $exe_attd=mysqli_query($con ,$stmt_check_attendence);
                                if (mysqli_num_rows($exe_attd)>0 ) {
                                  while ($std_id=mysqli_fetch_assoc($exe_check)) {
                                    $std_name=mysqli_fetch_array(mysqli_query($con ,"SELECT register.Reg_no ,student.student_name FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' AND register.S_id='".$std_id['S_id']."'"));

                                    $assignment=mysqli_query($con ,"SELECT assignment.a_name,assignment.a_date,assignment.at_marks,assignment_record.ao_marks FROM assignment INNER JOIN assignment_record ON assignment_record.A_id=assignment.A_id WHERE assignment_record.Class_id='$cid' AND assignment_record.S_id='".$std_id['S_id']."'");
                                    $assi_row=mysqli_num_rows($assignment);
                                    $assignment_padding=0;
                                    if($assi_row==1){$assignment_padding=0;}else {$assignment_padding=(($assi_row)*0.7); }
                                    if ($assi_row>0) {
                                      echo "<tr>";
                                      echo "<td rowspan='".$assi_row."' style='padding-top:".$assignment_padding."%;border-bottom:solid 1px #008c7e;border-left:solid 1px #008c7e'>".$std_name['Reg_no']."</td>";
                                      echo "<td rowspan='".$assi_row."' style='padding-top:".$assignment_padding."%;border-bottom:solid 1px #008c7e;'>".$std_name['student_name']."</td>";
                                      $count=0;
                                      while ($ass_result=mysqli_fetch_assoc($assignment)) {    $count++;
                                        if($count==$assi_row){ ?>
                                          <td style="border-bottom:solid 1px #008c7e"><?php echo $ass_result['a_name']; ?></td>
                                          <td style="border-bottom:solid 1px #008c7e"><?php echo $ass_result['a_date']; ?></td>
                                          <td style="border-bottom:solid 1px #008c7e"><?php echo $ass_result['ao_marks']; ?></td>
                                          <td style="border-bottom:solid 1px #008c7e"><?php echo $ass_result['at_marks']; ?></td>
                                        <?php  }else {
                                          ?>
                                          <td ><?php echo $ass_result['a_name']; ?></td>
                                          <td ><?php echo $ass_result['a_date']; ?></td>
                                          <td ><?php echo $ass_result['ao_marks']; ?></td>
                                          <td ><?php echo $ass_result['at_marks']; ?></td>
                                        </tr>
                                        <?php
                                      }

                                    }
                                  }else {
                                    echo "<tr>";
                                    ?>
                                    <td> <?php  echo $std_name['Reg_no'];  ?> </td>
                                    <td> <?php  echo $std_name['student_name'];   ?> </td>
                                    <?php
                                    echo "<td colspan='4' class='alert-warning text-center'>NO Assignment</td>";
                                    echo "</tr>";
                                  }
                                }
                                }else {?>
                                <tr>
                                  <td colspan="6" class="text-center alert alert-warning"> <?php echo "No Assignment of the Class Students."; ?>  </td>
                                </tr>
                                <?php
                                }
                          }else {
                            echo "<tr>";
                            echo "<td colspan='6' class='alert-warning text-center'>No student are register with this class</td>";
                            echo "</tr>";
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
<?php





 ?>
  </body>
</html>
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
<script src="../plugins/dataTables.rowsGroup.js"></script>
<script type="text/javascript">


</script>
