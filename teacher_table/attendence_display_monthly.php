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
      <a href="attendence_display_monthly.php"><button type="button" name="button" class="btn btn-light">Attendence Monthly Wise</button>  </a>
      <a href="attendence_display_all.php"><button type="button" name="button" class="btn btn-outline-light" style="margin-left: 10px;margin-right: 5px">All Attendence </button>  </a>
      <a href=""><button type="button" class="btn btn-outline-light" name="button">Calculate Persentage</button>  </a>
      <form method="post"  action="export_file.php"><button type="submit" class="btn btn-outline-light" name="export" value="<?php echo $cid; ?>" style="float: right;margin-right: 2%;">Export as CSV</button> </form>


<form method="post">
    <table id="example1" class="table table-striped  table-bordered table-hover table-sm">
        <thead class="bg-info">
                <tr>
                  <th scope="col" scope="row">Class No</th>
                  <th scope="col">Name</th>
                  <th scope="col">Attendence Date</th>
                  <th scope="col">Attendence Status</th>


                </tr>
          </thead>
            <tbody class="bg-light">
              <?php
                  if (isset($con)) {
                        $sid_stmt="SELECT S_id,Reg_no FROM register WHERE Class_id='$cid'";
                        $exe_sid=mysqli_query($con ,$sid_stmt);
                        if (mysqli_num_rows($exe_sid)>0) {
                                while ($sid_row=mysqli_fetch_assoc($exe_sid)) {
                                            $sname_sql="SELECT student_name FROM student WHERE S_id='".$sid_row['S_id']."'";
                                            $exe_sn=mysqli_query($con ,$sname_sql);
                                            $sn_row=mysqli_fetch_array($exe_sn);

                                            $stmt3="SELECT attendence.AT_id,attendence_record.AT_date FROM attendence INNER JOIN attendence_record on attendence_record.AT_id=attendence.AT_id WHERE Class_id='$cid' AND S_id='".$sid_row['S_id']."' ORDER BY attendence_record.AT_date DESC";
                                            $exe3=mysqli_query($con , $stmt3);
                                            $nr=mysqli_num_rows($exe3);
                                            if ($nr>0) {
                                                  $t=0;
                                                  $t2=0;
                                                  $Aid_array[]=0;
                                                  $Adate_array[]=0;
                                                  while ($row=mysqli_fetch_assoc($exe3)) {
                                                        $Aid_array[$t]=$row['AT_id'];
                                                        $Adate_array[$t]=$row['AT_date'];
                                                        $t++;
                                                        }
                                                        $temp=($t/30);
                                                        $temp_round=ceil($temp);
                                                        for ($i=0; $i <$temp_round ; $i++) {
                                                                              $p=0;
                                                                              $a=0;
                                                                              $l=0;
                                                                              $lp=0;
                                                                              ?><tr><?php
                                                                              ?><td><?php echo $sid_row['Reg_no'];  ?></td>  <?php
                                                                              ?><td><?php echo $sn_row['student_name'];  ?></td> <?php
                                                                              ?><td><?php  echo $Adate_array[$t2]; ?></td><?php
                                                                              while ($lp<30 && $t>0) {
                                                                                // echo "okkkkkkkkkkkkkkkkkkkkkkk<br>";
                                                                                // echo "t2===".$t2;
                                                                                  if ($Aid_array[$t2]==1) {
                                                                                    $p++;
                                                                                  }
                                                                                  if ($Aid_array[$t2]==2) {
                                                                                    $a++;
                                                                                  }
                                                                                  if ($Aid_array[$t2]==3) {
                                                                                    $l++;
                                                                                  }
                                                                                  $lp++;
                                                                                  $t--;
                                                                                  $t2++;
                                                                                  // echo "<h1>".$std_id."date==".$r['AT_date']."</h1>";
                                                                              }
                                                                              $total=$p+$a+$l;
                                                                              $ap=0;
                                                                              if ($p==0) {  ?>
                                                                                    <td>
                                                                                    <?php  echo $ap;  ?>&nbsp;%  And <?php echo $l; ?> L &nbsp;&nbsp;
                                                                                    </td>
                                                                                    <?php
                                                                              }else {
                                                                                $ap=(($p/$total)*100);
                                                                                $n=number_format($ap,1);           //the number_format are use to display the digit after decimal point
                                                                                  ?>

                                                                                    <td >
                                                                                    <?php  echo $n;  ?>&nbsp;%  And <?php echo $l; ?> L &nbsp;&nbsp;
                                                                                    </td>
                                                                                <?php
                                                                              }
                                                                }



                                            }else {  ?>

                                                  <td colspan="2" class="alert alert-warning text-center"><?php echo "No Attendece ";  ?></td>

                                            <?php  }



                                        ?>
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
