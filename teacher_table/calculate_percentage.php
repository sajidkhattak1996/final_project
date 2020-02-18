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
          This Page You can Calculate the percentage of Attendance upto your selected date.You can also click on All Attendance to view the details attendance of student,
          You can also view the attendance monthly wise By click on Attendance Monthly Wise. The Teacher can also search for student and also Export the Records
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
        background-image: linear-gradient(0deg,rgba(172,239,224,0.96) 1.76%,rgba(0,140,126,0.90) 98.45%);
      }
</style>

<div id="active_class">
    <div class="tstart" >
      <h2 class="text-left">Institute Name:  <?php  echo $_SESSION['institute']; ?> </h2>
      <a href="attendence_display_monthly.php"><button type="button" name="button" class="btn btn-outline-light">Attendance Monthly Wise</button>  </a>
      <a href="attendence_display_all.php"><button type="button" name="button" class="btn btn-outline-light" style="margin-left: 10px;margin-right: 5px">All Attendance </button>  </a>
      <a href="calculate_percentage.php"><button type="button" class="btn btn-light" name="button">Calculate Persentage</button>  </a>
      <br><br>
      <form name="form_per"  action="calculate_percentage_processing.php" method="post" onsubmit="return msg()">
      <div class="row" style="margin-left:10px; margin-right:10px">
        <div class="col-sm"> <span><b>Enter Start Date</b></span><input  class="form-control" type="Date" id="start_date" name="start_date" value="<?php if(isset($_POST['find'])){ echo $_POST['start_date']; } ?>" required> </div>
        <div class="col-sm"> <span><b>Enter End Date</b></span> <input class="form-control"  type="Date" id="end_date" name="end_date" value="<?php if(isset($_POST['find'])){ echo $_POST['end_date']; } ?>" required> </div>
        <div class="col-sm"> <br><button class="form-control btn btn-primary" type="submit" name="find" ><b>Calculate Persentage</b> </button> </div>
      </div>
    </form>
      <br>
</div>
        <div class="tend"></div>  <!--it cover and highliting buttom area of the table -->
    </div>
    <div class="row  alert alert-warning" id="dmsg" style="padding-left: 35%;display:none"></div>

  </body>
<script>
function fn(){
  var k=document.getElementById('dmsg');
  k.innerHTML='';
  k.style.display='none';

}
      function msg(){
        var m=document.getElementById('dmsg');

        var start_date=new Date(document.getElementById('start_date').value);
        var end_date =new Date(document.getElementById('end_date').value);

        var s_date=start_date.getFullYear()+"-"+(start_date.getMonth()+1)+"-"+start_date.getDate();
        var e_date=end_date.getFullYear()+"-"+(end_date.getMonth()+1)+"-"+end_date.getDate();
        // var s_date=start_date.getTime("h:i:s:A");
        // var e_date=end_date.getTime("h:i:s:A");   //it give date in second

        var b=new Date();
        // var current_date=b.getTime("h:i:s:A");  //the 1 are added b/c month range is 0-11 and 0 for jan
        var current_date=b.getFullYear()+"-"+(b.getMonth()+1)+"-"+b.getDate()

        if (e_date>current_date) {
          m.style.display='block';
          m.innerHTML='End Date Must not be Greater then the Current Date.';
          setTimeout(fn,5000);
          return false;

        }
        if (s_date==current_date || s_date>current_date) {
          m.style.display='block';
          m.innerHTML='Start Date Must be Less then the Current Date.';
          setTimeout(fn,5000);
          return false;

        }
        if (s_date >= e_date) {
          m.style.display='block';
          m.innerHTML='Start Date Must be Less then the End Date.';
          setTimeout(fn,5000);
            return false;
        }

      }
</script>
</html>

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
