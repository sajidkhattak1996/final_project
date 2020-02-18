<?php  session_start();
  if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {

      ?>
      <!DOCTYPE html>
          <html lang="en" dir="ltr">
            <head>
              <meta charset="utf-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <meta name="description" content="">
              <title>welcome to exam results </title>
            <link href="sajid_tcss.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="../menu css and js/bootstrap 4/css/glyphicon.css">
            <link rel="stylesheet" href="../datatables-bs4/css/dataTables.bootstrap4.css">
<style media="screen">
.blinking{
  animation:blinkingText 1.2s infinite;


}

@keyframes blinkingText{
  0%{     color: deeppink;    }
  49%{    color: red; }
  60%{    color: transparent; }
  99%{    color:transparent;  }
  100%{   color: red;    }
}
</style>
            </head>
          <body>
<?php   // <!--===============below loader are include =================-->
   include('../plugins/loader/loader1.html');
  // <!--=================ended==================================--> ?>
      <!--=================== the top nevagation menu=======================================----------->
            <?php  include('std_top_menu.php');  ?>
      <!--============ ended==================================================================== -->
<style media="screen">
    #b11{ background: #fff; color: #000 ;font-weight: bold;}
</style>
      <!--=================== the top menu just menu and side of the nevagation menu ====================-->
            <?php include('std_2nd_top_menu.php'); ?>
      <!--============ ended==================================================================== -->
      <?php
      $cid=0;
      if (isset($_GET['cid'])) {
        $cid=$_GET['cid'];
      }elseif (isset($_SESSION['Class_id'])) {
        $cid=$_SESSION['Class_id'];
      }

      $sql_class_subject=mysqli_query($con ,"
      SELECT class.Name,subject.subject_name,teacher.Name FROM have
      INNER JOIN subject ON have.Subject_id=subject.Subject_id
      INNER JOIN class ON class.Class_id=have.Class_id
      INNER JOIN teacher ON class.T_id=teacher.T_id
      WHERE have.Class_id='$cid'
      GROUP BY have.Class_id"
    );
      $name=mysqli_fetch_array($sql_class_subject);

       ?>
        <div class="about_area">
              <div class="viewing_area">
                <h5>NOW VIEWING :> <a href="main_table.php" style="color: #000;font-weight: bolder;letter-spacing: 0.5px"> All Classes  </a> :>
                  <a href="" style="color: blue;font-weight: bolder;letter-spacing: 0.5px"><?php echo $name[0] ?></a>
                  <br><br>
                  Subject :
                  <span style="color: deeppink;font-weight: bolder;letter-spacing: 0.5px"><?php echo $name[1]; ?></span>
                </h5>
              </div>

              <div class="about">
                  <h2>About this page </h2>
                  <p class="text">
                    This is your Exam Result Homepage. The page show the Exam Result of Particular Class , which are clicked by you. You can also click for the result of other classes moving horizantal.

                  </p>
              </div>
              <!--===========marquee ============================================= -->
              <?php
              $sid=$result1['S_id'];
              $sql_exam="
              SELECT exam_record.Class_id,exam.exam_term,exam.exam_date FROM exam
              INNER JOIN exam_record ON exam_record.E_id=exam.E_id
              INNER JOIN class ON exam_record.Class_id=class.Class_id
              WHERE class.Expire_date>CURRENT_DATE
              AND exam_record.S_id='$sid'
              ";
              $exe_exam=mysqli_query($con ,$sql_exam);
              if (mysqli_num_rows($exe_exam)>0) {
                    ?>
                    <div class="container-fluid">
                      <marquee id="marquee">
                        <p>
                      <span class="blinking font-weight-bold">New!  &nbsp;&nbsp;&nbsp; </span>
                      <?php
                        while ($row=mysqli_fetch_assoc($exe_exam)) {
                          ?>
                          <span><?php echo $row['Class_id'].":  ".$row['exam_term']."    Exam Result are Uploaded."; ?>
                            <a href="result_display.php?cid=<?php echo $row['Class_id']; ?>">click</a>
                            &nbsp;&nbsp;&nbsp;
                           </span>
                          <?php
                        }
                       ?>
                       </p>
                      </marquee>
                    </div>

                    <?php
              }
              ?>

              <!-- ================ended ==================================================-->
        </div>

<div class="">
  <div class="tstart" style="padding-top:5px;">
    <h2 class="text-left" style="height: 20px;text-transform: capitalize">Student Name: <?php echo $result1['student_name'];  ?> </h2>
    <div class="row container-fluid mt-5">
      <div class="col-lg-3 col-md-6 col-sm  font-weight-bold">Class ID: <span style="color: blue"><?php echo $cid; ?>        </span> </div>
      <div class="col-lg-3 col-md-6 col-sm  font-weight-bold">Class Name: <span style="color: blue"> <?php echo $name[0]; ?> </span> </div>
      <div class="col-lg-3 col-md-6 col-sm  font-weight-bold">Subject:   <span style="color: deeppink;letter-spacing: 1px">  <?php  echo $name[1];  ?> </span>  </div>
      <div class="col-lg-3 col-md-6 col-sm  font-weight-bold">Teacher:   <?php  echo $name[2]; ?></div>
    </div>

  </div>
  <table class="table table-striped table-hover table-responsive-sm">
    <thead>
      <tr>
        <th>Class NO</th>
        <th>Student Name</th>
        <th>Email</th>
        <th>Exam Term</th>
        <th>Exam Date</th>
        <th>Obtained Marks</th>
        <th>Total Marks</th>
      </tr>
    </thead>
    <tbody>
      <?php
          $sql_exam_result=mysqli_query($con ,"
          SELECT register.Reg_no,student.student_name,student.Email,exam.exam_term,exam.exam_date,exam_record.obtained_marks,exam.total_marks FROM exam
          INNER JOIN exam_record ON exam_record.E_id=exam.E_id
          INNER JOIN register ON exam_record.Class_id=register.Class_id AND exam_record.S_id=register.S_id
          INNER JOIN student ON exam_record.S_id=student.S_id
          WHERE exam_record.Class_id='$cid' AND exam_record.S_id='$sid'
          ");
          if (mysqli_num_rows($sql_exam_result)>0) {
            while ($row=mysqli_fetch_array($sql_exam_result)) {
              ?>
              <tr>
                <td><?php  echo $row[0]; ?></td>
                <td><?php  echo $row[1]; ?></td>
                <td><?php  echo $row[2]; ?></td>
                <td><?php  echo $row[3]; ?></td>
                <td><?php  echo $row[4]; ?></td>
                <td><?php  echo $row[5]; ?></td>
                <td><?php  echo $row[6]; ?></td>
              </tr>

              <?php
            }

          }else {
            ?>
            <tr>
              <td colspan="7" class="alert alert-warning text-center">No Record Found!</td>
            </tr>
            <?php
          }

       ?>
    </tbody>
  </table>
  <div class="tend" id="eee">    </div>

</div>



      <?php include('../footer.php'); ?>
  </body>
</html
<script type="text/javascript" src="../plugins/js/jquery.js"></script>

<script type="text/javascript">
  $("#marquee").hover(function () {
    this.stop();
  }, function () {
    this.start();
  });
</script>


      <?php
  }else {
    echo "<script> alert('Please Login First!....'); </script>";
  }

?>
