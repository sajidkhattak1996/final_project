<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!--===============below loader are include =================-->
    <?php include('../plugins/loader/loader1.html'); ?>
    <!--=================ended==================================-->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>welcome to login </title>
	<link href="teacher_css.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="bootstrap 4/css/glyphicon.css">


<style media="screen">


</style>
  </head>
<body>


<!--=========top nvagation menu ==========-->

<?php  include('top_info.php');  ?>
<!--=========top nvagation menu endeddd ==========-->

<!-- the below css link have high periority then above top_info.php file  -->

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
          This is your Teacher Class Attendance Records Homepage. The page show the attendance of all the student which are register with this class.
          This Page Display the Full details of Attendance of the Students & you can click on Attendance Monthly Wise  to view the attendance of student Monthly Wise,
           You can also Calculate the Persentage Upto your selected date by click on Calculate Persentage. The Teacher can also search for student and also Export the Records
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
      #search_text:hover{
        box-shadow: 1px 1px 10px 1px blue;
      }
</style>

<div id="active_class">
    <div class="tstart" >
      <h2 class="text-left">Institute Name:  <?php  echo $_SESSION['institute']; ?> </h2>
      <a href="attendence_display_monthly.php"><button type="button" name="button" class="btn btn-outline-light">Attendance Monthly Wise</button>  </a>
      <a href=""><button type="button" name="button" class="btn btn-light" style="margin-left: 10px;margin-right: 5px">Attendance All</button>  </a>
      <a href="calculate_percentage.php"><button type="button" class="btn btn-outline-light" name="button">Calculate Persentage</button>  </a>


<div class="row mt-5  col-12">
  <div class="col-lg-6">
    <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon">Search</span>
        <input type="text" name="search_text" id="search_text" placeholder="Search by Student name or class no" class="form-control "   />
        <input type="text" name=""  id="cid" value="<?php echo $cid; ?>" style="display:none">
      </div>
    </div>
  </div>
    <div class="col-lg-6">
    <a href="export_attendence_all.php?cid=<?php echo $cid; ?>" style="float: right;"><button type="button" class="btn btn-outline-light" name="export_file">Export as CSV File</button>  </a>
    </div>
</div>
<div class="">
  <div class="">

    <div id="result">   </div>
  </div>
  <div style="clear:both"></div>
</div>

  </div>
        <div class="tend"></div>  <!--it cover and highliting buttom area of the table -->
    </div>

  </body>
</html>

<script>
$(document).ready(function(){
	var i =$('#cid').val();
	load_data('',i);
	function load_data(query,id)
	{
		$.ajax({
			url:"fetch_attendance_all.php",
			method:"post",
			data:{query:query,id:id},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}

	$('#search_text').keyup(function(){
		var search = $(this).val();
		var i =$('#cid').val();

		if(search != '')
		{
			load_data(search,i);
		}
		else
		{
			load_data('',i);
		}
	});
});
</script>
