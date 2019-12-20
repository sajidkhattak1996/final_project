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
          This is your Teacher Class Record Homepage. The page show the Class records of all Students such is Attendence , Assignment , Presentation and Quizes.
          The Homepage display all the previous records of the Students.Click on Eye Open (view) to display that particular records of
          that Student.The Button Attendence , Assignment , Quizes and Presentation display that Particular Records of Students.


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

<form method="post">
    <table id="example1" class="table table-striped  table-bordered table-hover table-sm">
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
            <tbody class="bg-light">
              <?php
                  if (isset($con)) {
                          $check_register="SELECT S_id FROM register WHERE Class_id='$cid'";
                          $exe_check=mysqli_query($con ,$check_register);
                          if(mysqli_num_rows($exe_check)>0)
                          {
                          $ass_query1="SELECT assignment_record.S_id,assignment.a_name,assignment.a_date,assignment_record.ao_marks,assignment.at_marks FROM assignment INNER JOIN assignment_record ON assignment_record.A_id=assignment.A_id WHERE assignment_record.Class_id='$cid' ORDER BY assignment.a_date DESC";
                          $exe_ass_query1=mysqli_query($con ,$ass_query1);
                          while ($row=mysqli_fetch_assoc($exe_ass_query1)) {
                                $st_id=$row['S_id'];
                                 $st_name_query="SELECT register.Reg_no,student.student_name FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' AND register.S_id='$st_id'";
                                 $exe_st=mysqli_query($con ,$st_name_query);
                                 if (mysqli_num_rows($exe_st)>0) {

                                 $r22=mysqli_fetch_array($exe_st);
                                 ?>
                            <tr>
                                  <td><?php echo $r22['Reg_no'];  ?></td>
                                  <td><?php echo $r22['student_name'];  ?></td>
                                  <td><?php echo $row['a_name']; ?></td>
                                  <td><?php echo $row['a_date']; ?></td>
                                  <td><?php echo $row['ao_marks']; ?></td>
                                  <td><?php echo $row['at_marks']; ?></td>
                            </tr>

                          <?php }else {  ?>
                                            
                          <?php }



                            }
                          }else {
                            ?>
                              <tr>
                                  <td colspan="6" class="alert alert-warning" style="text-align: center; font-weight: bold"> <?php echo "NO Students are Register to the Class.";  ?></td>
                              </tr>
                            <?php
                          }


                    //the below query extract all the student sttndence records of that class and subject
                        // $stmt1="SELECT assignment_record.S_id FROM assignment_record INNER JOIN assignment ON assignment_record.A_id=assignment.A_id WHERE assignment_record.Class_id='1245142' AND assignment_record.Subject_id='29'  ORDER BY assignment.a_date";
                        // $exe_stmt1=mysqli_query($con ,$stmt1);
                        // $r=(mysqli_num_rows($exe_stmt1))/30;
                        // // echo "<h1>Number of Records ===".(mysqli_num_rows($exe_stmt1))."</h1>";
                        // // echo "<h1>after division with 30  ===".$r."</h1>";
                        // // echo "<h2>Now remove the redundent values </h2>";
                        // $sid_array=[];
                        // $a=0;
                        // while ($row=mysqli_fetch_assoc($exe_stmt1)) {
                        //   $sid_array[$a]=$row['S_id'];
                        //   $a++;
                        // }
                        // $z=array_unique($sid_array);
                        // $c=count($sid_array);
                        // $ss=0;
                        // if ($c !=0) {
                        //   $ss=$c/count($z);       //it generate an error of division by zero
                        // }
                        //
                        // // echo "<h1>Number of after the unique funcion apply to them ==".count($z)."</h1>";
                        // // echo "<h1>now 148 divided by 4(total no student) have attende days==".$ss."</h1>";
                        //
                        // for ($i=0; $i <count($z) ; $i++) {
                        // $student_id=$z[$i];               //array which store the unique student of that class and subject
                        //
                        //
                        // }


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
