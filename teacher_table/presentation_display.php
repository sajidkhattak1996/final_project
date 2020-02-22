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
          This is your class record Presentation Display Homepage. This page display the Presentation of the all Class Students which are register with this class.
          You can also Search for the particular student in search box.


        </p>

    </div>

</div>




<!--=========including the top classes button below the top navagation menu ================-->
<?php  include('display_classes_table_top_menu.php');  ?>
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
#b5 {
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
      <div class="pb-5">
        <a href="presentation_ratio.php?cid=<?php echo $cid; ?>"><button type="button" class="btn btn-md btn-outline-light float-right mr-3" name="button">Calculate Ratio</button></a>
        <form method="post"  action="export_presentation.php"><button type="submit" class="btn btn-outline-light" name="export" value="<?php echo $cid; ?>" style="float: right;margin-right: 2%;">Export as CSV File</button> </form>

      </div>
<form method="post" style="padding-top: 20px">
    <table id="example1" class="table table-striped  table-bordered table-hover table-sm table-responsive-sm">
        <thead class="bg-info">
                <tr>
                  <th scope="col" scope="row">Reg.No</th>
                  <th scope="col">Name</th>
                  <th scope="col">Presentation Topic</th>
                  <th scope="col">Presentation Date</th>
                  <th scope="col">Obtained Marks</th>
                  <th scope="col">Total Marks</th>


                </tr>
          </thead>
            <tbody class="bg-light">
              <?php
                  if (isset($con)) {
                          $check_register="SELECT S_id FROM register WHERE Class_id='$cid' ORDER BY Reg_no ASC";
                          $exe_check=mysqli_query($con ,$check_register);
                          if (mysqli_num_rows($exe_check)>0) {
                            //this query check if class have no presentation of all student
                            $stmt_check_attendence="SELECT * FROM presentation INNER JOIN presentation_record ON presentation_record.P_id=presentation.P_id WHERE presentation_record.Class_id='$cid'";
                            $exe_attd=mysqli_query($con ,$stmt_check_attendence);
                                if (mysqli_num_rows($exe_attd)>0 ) {
                                  while ($std_id=mysqli_fetch_assoc($exe_check)) {
                                    $std_name=mysqli_fetch_array(mysqli_query($con ,"SELECT register.Reg_no ,student.student_name FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' AND register.S_id='".$std_id['S_id']."'"));

                                    $presentation=mysqli_query($con ,"SELECT presentation.p_topic,presentation.p_date,presentation_record.po_marks,presentation.pt_marks FROM presentation INNER JOIN presentation_record ON presentation_record.P_id=presentation.P_id WHERE presentation_record.Class_id='$cid' AND presentation_record.S_id='".$std_id['S_id']."' ");
                                    $pre_row=mysqli_num_rows($presentation);
                                    $presentation_padding=0;
                                    if($pre_row==1){$presentation_padding=0;}else {$presentation_padding=(($pre_row)*0.7); }
                                    if ($pre_row>0) {
                                      echo "<tr>";
                                      echo "<td rowspan='".$pre_row."' style='padding-top:".$presentation_padding."%;border-bottom:solid 1px #008c7e;border-left:solid 1px #008c7e'>".$std_name['Reg_no']."</td>";
                                      echo "<td rowspan='".$pre_row."' style='padding-top:".$presentation_padding."%;border-bottom:solid 1px #008c7e;'>".$std_name['student_name']."</td>";
                                      $count=0;
                                      while ($pre_result=mysqli_fetch_assoc($presentation)) {    $count++;
                                        if($count==$pre_row){ ?>
                                          <td style="border-bottom:solid 1px #008c7e"><?php echo $pre_result['p_topic']; ?></td>
                                          <td style="border-bottom:solid 1px #008c7e"><?php echo $pre_result['p_date']; ?></td>
                                          <td style="border-bottom:solid 1px #008c7e"><?php echo $pre_result['po_marks']; ?></td>
                                          <td style="border-bottom:solid 1px #008c7e"><?php echo $pre_result['pt_marks']; ?></td>
                                        <?php  }else {
                                          ?>
                                          <td ><?php echo $pre_result['p_topic']; ?></td>
                                          <td ><?php echo $pre_result['p_date']; ?></td>
                                          <td ><?php echo $pre_result['po_marks']; ?></td>
                                          <td ><?php echo $pre_result['pt_marks']; ?></td>
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
                                    echo "<td colspan='6' class='alert-warning text-center'>NO Presentation</td>";
                                    echo "</tr>";
                                  }
                                }
                                }else {?>
                                <tr>
                                  <td colspan="6" class="text-center alert alert-warning"> <?php echo "No Presentation of the Class Students."; ?>  </td>
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

  </body>
</html>

<script src="../datatables/jquery.dataTables.js"></script>
<script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
  //  $("#example1").DataTable();
    $('#example1').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
    });
  });
</script>
