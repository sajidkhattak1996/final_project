<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>calculate or add ratio to the exam records </title>
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

<div class="about_area" >
    <div class="viewing_area">
      <h5>CLASS NOW VIEWING :> <a href="" style="color: blue"> <?php  echo $r['Name']; ?></a></h5>
      <h5>SUBJECT :> <a href="subject.php" style="color: deeppink"><strong> <?php  echo $rr['subject_name']; ?> </strong> </a></h5>
    </div>

    <div class="about"  id="focus">
        <h2>About this page </h2>
        <p class="text">
          This is your Exam Ratio  Display Homepage. In this page exam records of all students of a class are Display and also ratio are calculated and add to the exam marks of students.
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

      /* //buttons */
      #btn3 {
        background: #008c7e;
        color: #fff;
        border:solid 2px #008c7e;
        font-size: 14px;

      }
      #btn1:hover{
        background: #008c7e;
        color: #fff;
        border:solid 2px #008c7e;
        font-size: 14px;
      }
      #btn2:hover{
        background: #008c7e;
        color: #fff;
        border:solid 2px #008c7e;
        font-size: 14px;
      }

      #btn_3 {
        width: auto;
        height: auto;
        background: #13bca4;
        border:solid 1px #008c7e;
        border-radius: 6px;
        width:100%;
      }
      #btn_3:hover{
        background: #008c7e;
        color: #fff;
        border:solid 2px #008c7e;
      }
    @media (max-width: 576px) {
        .me{ margin-top: 10px;margin-bottom: 10px }
        .auto_btn{margin-top: 10px}
        .me_py{
          padding-top:10px;
          padding-bottom:10px
        }
        .me_py1{
          padding-bottom:10px
        }
    }
</style>

<div id="active_class" class="container-fluid">
    <div class="tstart">
      <h2 class="text-left">Institute Name:  <?php  echo $_SESSION['institute']; ?> </h2>
      <div class="pb-5">
        <a href="add_exam_marks.php?cid=<?php echo $cid; ?>"><button type="button" class="btn btn-md btn-outline-light float-right mr-3 font-weight-bold" name="button"><i class="fas fa-plus"></i> &nbsp; Exam Marks  </button></a>
        <a href="exam_ratio_find.php"><button type="button" class="btn btn-md btn-outline-light float-right mr-3 font-weight-bold active" name="button"><i class="fas fa-plus"></i> &nbsp; Ratio Marks To Exam  </button></a>
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

      <div  class="row container-fluid  ml-0  py-3 border-bottom border-left border-right border-success" style="border-radius: 0px 0px 15px 15px;">
        <?php
        $E_id=0;
        if (isset($_GET['eid'])) {
          $E_id=$_GET['eid'];
        }
         ?>
        <div class="row container-fluid ml-0 pb-5">
          <div class="col-lg-4">   <a href="exam_ratio_find.php?eid=<?php echo $E_id; ?>" style="color: #122"> <button type="button" class=" w-75 py-2 font-weight-bold" onclick="fn_manual()" name="button" id="btn1" style="background: #13bca4"> <i class="fas fa-pen-fancy"></i> &nbsp;&nbsp;  Manually ADD  Ratio</button> </a> </div>
          <div class="col-lg-4 my-lg-0 my-sm-3 me"> <a href="ratio_calculate_automatic.php?eid=<?php echo $E_id; ?>" style="color: #122">  <button type="button" class=" w-75 py-2 font-weight-bold" onclick="fn_auto()" name="button" id="btn2" style="background: #13bca4"> <i class="fas fa-cogs"></i> &nbsp; Automatic Divide Ratio</button> </a> </div>
          <div class="col-lg-4">   <button type="button" class=" w-75 py-2 font-weight-bold" name="button" onclick="fn_select()" id="btn3" style="background: #13bca4"> <i class="fas fa-tasks"></i>&nbsp; Select Ratio For Divide</button>  </div>
        </div>

<!--=================================  select ration for divide started ===========================================================================================================================================================-->
        <div class="row container-fluid ml-0" id="select_ratio_for_divide" style="border:solid 1px #13bca4 ;border-radius: 20px/80px;">
          <form class="container-fluid" action="#cd" method="post">
           <div class="row container-fluid ml-0">
              <div class="col-lg-4">
                <label class="h5 font-weight-bold">Enter the Total Ratio Value</label>
                <input type="number" name="r" value="<?php if(isset($_POST['r'])){ echo $_POST['r']; } ?>" class="form-control" min="0" required>
              </div>
              <div class="col-lg-8">

              </div>
           </div>
           <div class="row container-fluid ml-0 mt-4 ">
             <div class="row container-fluid ml-0">
               <p class="font-weight-bold h3">Select to Divide the Ratio Value for Them.</p>
             </div>
             <div class="row container-fluid ml-0 mt-3">
               <div class="col-lg-2 col-md-6">
                 <label for="att" class="h3">Attendance</label>
                 <input type="checkbox" id="att" name="ch[]" value="Attendance" class="form-control-md ml-2">
                </div>
               <div class="col-lg-2 col-md-6">
                 <label for="assi" class="h3">Assignment</label>
                 <input type="checkbox" id="assi" name="ch[]" value="Assignment" class="form-control-md ml-2">
               </div>
               <div class="col-lg-2 col-md-6">
                 <label for="pre" class="h3">Presentation</label>
                 <input type="checkbox" id="pre" name="ch[]" value="Presentation" class="form-control-md ml-2">
               </div>
               <div class="col-lg-2 col-md-6">
                 <label for="quize" class="h3">Quize</label>
                 <input type="checkbox" id="quize" name="ch[]" value="Quize" class="form-control-md ml-2">
               </div>
               <div class="col-lg-4 col-md-12">
                 <button type="submit" name="btn-submit" value="<?php if(isset($_GET['eid'])){ echo $_GET['eid']; }  ?>" class="btn btn-outline-primary btn-block font-weight-bold">Submit</button>
               </div>

             </div>
           </div>
         </form>
            <?php
              if (isset($_POST['btn-submit'])) {
                $ratio_value=$_POST['r'];
                $at=0;
                $as=0;
                $p=0;
                $q=0;
                if (isset($_POST['ch'])) {
                  foreach ($_POST['ch'] as $selected) {
                    if ($selected=="Attendance") { $at=1; echo "<script>    document.getElementById('att').checked= true;    </script>";  }
                    else if ($selected=="Assignment") { $as=1;  echo "<script>    document.getElementById('assi').checked= true;    </script>"; }
                    else if ($selected=="Presentation") {  $p=1; echo "<script>    document.getElementById('pre').checked= true;    </script>"; }
                    else if ($selected=="Quize") {  $q=1; echo "<script>    document.getElementById('quize').checked= true;    </script>";  }
                  }
                }
                $r_v=0;
                $total=($at+$as+$p+$q);
                if ($total==0) {  $r_v=0;  }
                else {
                  $r_v=number_format(($ratio_value/$total) ,2);
                }

             ?>
             <form class="container-fluid" action="#display_ratio_record" method="post">
              <div id="cd" class="row container-fluid ml-0 mt-4 pb-3">
                  <div class="row container-fluid ml-0">
                    <div class="col-lg-2"> <i>Attendance:
                      <?php
                      if($at==0){
                        echo "<b>".$at."</b>";
                      }else { echo "<b class='alert alert-primary'>".$r_v."</b>";  ?> <input type="number" name="attendance_ratio" value="<?php echo $r_v;  ?>" style="display:none"> <?php }
                      ?>
                    </i>  </div>
                    <div class="col-lg-2"> <i>Assignment:
                        <?php
                        if($as==0){
                          echo "<b>".$as."</b>";
                        }else { echo "<b class='alert alert-primary'>".$r_v."</b>"; ?> <input type="number" name="assignment_ratio" value="<?php echo $r_v;  ?>" style="display:none"> <?php }
                        ?>
                       </i>  </div>
                    <div class="col-lg-2"> <i>Presentation:
                        <?php
                        if($p==0){
                          echo "<b>".$p."</b>";
                        }else { echo "<b class='alert alert-primary'>".$r_v."</b>"; ?> <input type="number" name="presentatio_ratio" value="<?php echo $r_v;  ?>" style="display:none"> <?php }
                        ?>
                      </i>  </div>
                    <div class="col-lg-2"> <i>Quize:
                        <?php
                        if($q==0){
                          echo "<b>".$q."</b>";
                        }else { echo "<b class='alert alert-primary'>".$r_v."</b>"; ?> <input type="number" name="quize_ratio" value="<?php echo $r_v;  ?>" style="display:none"> <?php }
                        ?>
                      </i>  </div>
                    <div class="col-lg-4 ">
                      <button type="submit" class="btn btn-outline-primary btn-block font-weight-bold" value="<?php if(isset($_GET['eid'])){ echo $_GET['eid']; }  ?>" name="continue_processing">Continue Processing</button>
                    </div>
                  </div>
              </div>
            </form>
        </div>
        <?php
      }
      ?>
<!--================================= select ration for divide ended ===========================================================================================================================================================-->
    </div>

      <?php
        if (isset($_POST['continue_processing'])) {
          $att=0;
          $assi=0;
          $pre=0;
          $quize=0;

          $E_id=$_POST['continue_processing'];
          if (isset($_POST['attendance_ratio'])) {           $att=$_POST['attendance_ratio'];}
          if (isset($_POST['assignment_ratio'])){      $assi=$_POST['assignment_ratio'];}
          if (isset($_POST['presentatio_ratio'])){  $pre=$_POST['presentatio_ratio'];  }
          if (isset($_POST['quize_ratio'])){  $quize=$_POST['quize_ratio'];  }

          include('exam_ratio_processing.php');


        }
      ?>


    </div>
</div>
        <!-- <div class="tend" style="margin-top: 0px"></div>  it cover and highliting buttom area of the table --> 


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
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
