<?php
if (isset($_GET['id'])) {

  ?>
  <?php
    include('top_info.php');
    if (isset($_SESSION['email']) && isset($_SESSION['pass'])) { ?>
      <!DOCTYPE html>
        <html lang="en" dir="ltr">
          <head>
            <link rel="stylesheet" href="../datatables-bs4/css/dataTables.bootstrap4.css">
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">

            <title>welcome to webside as a teacher  </title>

            </head>
        <body>
  <style media="screen">
      #att{
        background-image: -webkit-linear-gradient(180deg,rgba(172,239,224,0.96) 21.76%,rgba(0,140,126,0.50) 98.45%);
        background-image: -moz-linear-gradient(180deg,rgba(172,239,224,0.96) 21.76%,rgba(0,140,126,0.50) 98.45%);
        background-image: -o-linear-gradient(180deg,rgba(172,239,224,0.96) 21.76%,rgba(0,140,126,0.50) 98.45%);
        background-image: linear-gradient(180deg,rgba(172,239,224,0.96) 21.76%,rgba(0,140,126,0.50) 98.45%);
        color: blue;
        font-weight: bolder;
        border-left: solid 1px rgba(172,239,224,0.66);
        border-top: solid 1px rgba(172,239,224,0.66);
        border-right: solid 1px rgba(172,239,224,0.66);
      }
  </style>


        <!--========= we are including the subject top menu here ===================-->
        <?php  include('classes_subject_top_menu.php');  ?>
        <!--=================================== ended =======================-->

  <script>
  function empty(){  document.getElementById("spn").innerHTML='';}  //use th empty the msg field

  </script>

  <!-- started -->
  <?php
  $sid=0;
  if (isset($_GET['id'])) {
    $sid=$_GET['id'];
    $sql3="SELECT register.Reg_no,student.S_id,student.student_name FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' AND register.S_id='$sid'";
    $r3=mysqli_fetch_array(mysqli_query($con ,$sql3));
    $sn=$r3['student_name'];
  }
  ?>

  <!-- below table which display the student record which are enroll in the this class which are clicked    -->
  <div class="container-fluid" style="padding-bottom: 10px">
    <div class="tend"  style="border-radius: 0px 0px 15px 15px;margin-bottom: 8px;height: auto;padding-bottom:3px;padding-top: 0px">
      <div class="text-primary">
          <h2>Add Attendece to <?php echo $r3['student_name'];  ?> </h2>
      </div>
        <table class="table table-straped">
              <thead>
                <tr style="border-bottom:solid 2px #fff">
                    <td>Class ID:&nbsp;&nbsp;&nbsp;<span style="color: blue"><?php echo $cid;  ?></span></td>
                    <td>Class Name:&nbsp;&nbsp;&nbsp;<span style="color: blue"><?php echo $r1['Name'];  ?></span></td>
                    <td>Subject Name:&nbsp;&nbsp;&nbsp;<span style="color: deeppink;letter-spacing:1px"><?php echo $r2['subject_name'];  ?></span></td>
                    <td><a href="attendence.php" class="btn btn-primary">  Attendence   </a></td>
                </tr>
                <tr>
                    <td style="color: #fff;">Class No:&nbsp;&nbsp;<?php echo $r3['Reg_no'];  ?></td>
                    <td style="color: #fff;">Student Name :&nbsp;&nbsp;<span style="text-transform: capitalize"><?php echo $r3['student_name'];  ?></span></td>
                    <td><a href="edit_attendence2.php?id=<?php  echo $sid; ?>" class="btn btn-outline-light"> Edit Attendence   </a></td>
                    <td></td>
                </tr>
                <form action="" method="post">
                <tr style="height: 30px;">
                  <td><span  class="text-light">Select Date:</span>&nbsp;<input type="date" name="att_date" title="Enter the Attendence Date" required style="border-radius:5px;font-family: arial;border: solid 1px #fff;" required ></td>
                  <td>
                            <span style="font-size: 16px">Present:</span>     <input type="radio"  name="r" checked value="1" style="width:8%;height:13px;">&nbsp;&nbsp;&nbsp;
                            <span style="font-size: 16px">Absent:</span>      <input type="radio"  name="r" value="2" style="width:8%;height:13px;">&nbsp;&nbsp;&nbsp;
                            <span style="font-size: 16px">Leave:</span>       <input type="radio"  name="r" value="3" style="width:8%;height:13px;">&nbsp;&nbsp;&nbsp;

                  </td>
                  <td width="20%">
                    <button type="submit" name="btn_save" class="btn btn-primary btn-block btn-lg" value="<?php echo $cid; ?>">Submit</button>

                  </td>
                  <td>
                  </td>
                </tr>
              </form>
              </thead>
        </table>
      </div>
        <div id="att_msg"></div>
  <div id="spn" class="text-center"></div>
  <script> function h(){ document.getElementById('att_msg').innerHTML=''; } </script>
  <?php
  if (isset($_POST['btn_save'])) {

    $att_date=$_POST['att_date'];
    $r_value=$_POST['r'];
    $stmt="SELECT AT_date FROM attendence_record WHERE Class_id='$cid'  AND S_id='$sid' AND AT_date='$att_date'";
    include('db_connection.php');
    $exe=mysqli_query($con ,$stmt);
    $r=mysqli_fetch_array($exe);
    if ($r['AT_date']==$att_date) {
      ?>
      <script> document.getElementById('att_msg').innerHTML='<div class="alert alert-danger text-center"> You Cannot Perform this Action Because One  Attendece Record are Present on this Date. </div>'; setTimeout(h ,3000); </script>
      <?php
    }else {
      $sql_att="INSERT INTO `attendence_record`(`AT_id`, `AT_date`, `Class_id`, `S_id`) VALUES ('$r_value','$att_date','$cid','$sid')";
      $e=mysqli_query($con ,$sql_att);
      if ($e) {
        ?>
        <script> document.getElementById('att_msg').innerHTML='<div class="alert alert-primary text-center"> Attendece Record are Successfully Inserted. </div>'; setTimeout(h ,3000); </script>
        <?php
      }else {
        ?>
        <script> document.getElementById('att_msg').innerHTML='<div class="alert alert-danger text-center"> Attendece Record Insertion Failed! Try Again. </div>'; setTimeout(h ,3000); </script>
        <?php
      }
    }


  }
   ?>

        <!-- <div class="tend"></div> -->

  </div>  <!--ended -->

  </body>
  </html>


  <?php
      }
    else {
      echo "<script> alert('Please Login first!.... '); </script>";
    }

  ?>




  <?php
}

 ?>
