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
              <title>welcome to login </title>
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

        <div class="about_area">
              <div class="viewing_area">
                <h5>NOW VIEWING :> <a href="main_table.php" style="color: blue;font-weight: bolder;letter-spacing: 0.5px"> All Classes  </a></h5>
              </div>

              <div class="about">
                  <h2>About this page </h2>
                  <p class="text">
                    This is your Student Homepage. The Homepage show the classes you are enrolled in. To enroll in a new class,
                    click the Enroll in Class Button. To View your Class Record Click the Name of Class.To View the Attachment (Slides/Notes) Related to the Class
                    Click the View button  to View them.The Right side Bell icon Display the latest notification/information Related to that class.

                  </p>
              </div>
              <!--===========marquee ============================================= -->
              <?php
              $cid=$result1['S_id'];
              $sql_exam="
              SELECT exam_record.Class_id,exam.exam_term,exam.exam_date FROM exam
              INNER JOIN exam_record ON exam_record.E_id=exam.E_id
              INNER JOIN class ON exam_record.Class_id=class.Class_id
              WHERE class.Expire_date>CURRENT_DATE
              AND exam_record.S_id='$cid'
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
<form action="" method="post" id="ff">
            <div class="container-fluid" id="divtable" >
                  <div class="tstart" style="padding-top:5px;">
                    <h2 class="text-left" style="height: 20px;text-transform: capitalize">Student Name: <?php echo $result1['student_name'];  ?> </h2>
                  </div>

                          <table id="example2" class="table table-striped table-bordered table-hover table-sm table-light" >
                                        <thead class="bg-info">
                                            <tr>
                                                  <th scope="col" scope="row">Class ID</th>
                                                  <th scope="col">Class Name</th>
                                                  <th scope="col">Teacher</th>
                                                  <th scope="col">Subject</th>
                                                  <th scope="col">Start Date</th>
                                                  <th scope="col">Expire Date</th>
                                                  <th scope="col" width="10%">Attachment&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-paperclip"></i></th>
                                              </tr>
                                            </thead>
                                          <tbody>
                                            <?php
                                                    include('db_connection.php');
                                                    if (isset($con)) {
                                                          $em=$_SESSION['email'];
                                                          $ps=$_SESSION['pass'];
                                                          $stmt_sid="SELECT S_id FROM student WHERE Email='$em' AND password='$ps'";
                                                          $exe_stmt_sid=mysqli_query($con ,$stmt_sid);
                                                          $ssid=mysqli_fetch_array($exe_stmt_sid);
                                                          $S_id=$ssid['S_id'];
                                                          $_SESSION['S_id']=$ssid['S_id'];


                                                          $stmt1="SELECT register.Class_id,class.Name,class.Start_date,class.Expire_date,class.T_id FROM class INNER JOIN register ON register.Class_id=class.Class_id WHERE register.S_id='$S_id'";
                                                          $exe1=mysqli_query($con ,$stmt1);

                                                          if ($exe1) {
                                                            $n=mysqli_num_rows($exe1);
                                                            if ($n>0) {
                                                              while ($row=mysqli_fetch_assoc($exe1)) {



                                                                $tid=$row['T_id'];
                                                                $stmt2="SELECT Name FROM teacher WHERE T_id='$tid'";
                                                                $exe2=mysqli_query($con ,$stmt2);
                                                                $tn=mysqli_fetch_array($exe2);

                                                                $cid=$row['Class_id'];
                                                                $stmt3="SELECT subject.subject_name,subject.Subject_id FROM subject INNER JOIN have ON have.Subject_id=subject.Subject_id WHERE have.Class_id='$cid'";
                                                                $exe3=mysqli_query($con,$stmt3);
                                                                $sb=mysqli_fetch_array($exe3);

                                                                ?>
                                                                <tr>
                                                                    <th scope="row"> <?php echo $row['Class_id'];  ?> </th>
                                                                    <td><style> #classbtn{background:none;border:none;color: blue} #classbtn:hover{color: deeppink;} </style>
                                                                        <form action="#name<?php echo $row['Class_id']; ?>" method="post" id="name<?php echo $row['Class_id'];  ?>">
                                                                          <button type="submit" name="class_name" id="classbtn" value="<?php echo $row['Class_id']; ?>">
                                                                          <b>  <?php echo $row['Name'];  ?></b>
                                                                          </button>
                                                                        </form>
                                                                    </td>
                                                                    <td>  <?php echo $tn['Name'];  ?></td>
                                                                    <td>  <?php echo $sb['subject_name'];  ?></td>
                                                                    <td>  <?php echo $row['Start_date'];  ?></td>
                                                                    <td>  <?php echo $row['Expire_date'];  ?></td>
                                                                    <?php
                                                                        $sql_noti="SELECT * FROM notification WHERE Class_id='".$row['Class_id']."' AND expire_date>= CURRENT_DATE";
                                                                        $tnoti=mysqli_num_rows(mysqli_query($con ,$sql_noti));
                                                                    ?>
                                                                    <td>
                                                                          <a href="std_share_main_page.php?cid=<?php  echo $row['Class_id']; ?>&cn=<?php echo $row['Name']; ?>&tn=<?php echo $tn['Name']; ?>&sub=<?php echo $sb['subject_name']; ?>"><button type="button" name="btn_attagement" class="btn btn-outline-primary btn-sm">View &nbsp;&nbsp;<i class="glyphicon glyphicon-eye-open"></i></button></a>

                                                                          <a href="std_view_active_notification.php?cid=<?php  echo $row['Class_id']; ?>&cn=<?php echo $row['Name']; ?>&tn=<?php echo $tn['Name']; ?>&sub=<?php echo $sb['subject_name']; ?>" title="Click to View the Notificaions." style="text-decoration:none;margin-left: 10px">
                                                                              <i class="far fa-bell" style="color: #000"></i>
                                                                              <span class="badge badge-warning navbar-badge"><?php echo $tnoti; ?></span>
                                                                          </a>

                                                                    </td>

                                                                </tr>
                                                                <?php

                                                              }
                                                            }else {  ?>
                                                                <tr>
                                                                    <td colspan="7" class="alert alert-warning text-center">Not register with any Class</td>
                                                                </tr>
                                                              <?php
                                                            }


                                                          }else {
                                                            echo "problem occur while executing the quires";
                                                          }

                                                    }
                                              ?>
                                            </tbody>
                                    </table>
                        <div class="tend" id="eee">    </div>
            </div>
      </form>
      <?php include('../footer.php'); ?>
  </body>
</html

        <script type="text/javascript" src="js/jquery.js"></script>
        <script src="../datatables/jquery.dataTables.js"></script>
        <script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <script type="text/javascript">
        $("#marquee").hover(function () {
          this.stop();
        }, function () {
          this.start();
        });
        </script>
        <script>
          $(function () {

            $('#example2').DataTable({
              "paging": true,
              "lengthChange": true,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": false,
            });
          });
        </script>
        <?php
        //for delete button are press
        if (isset($_POST['btn_delete'])) {  ?>
          <style media="screen">
                #dd<?php echo $_POST['btn_delete']; ?>{ display: none}
                #cd<?php echo $_POST['btn_delete']; ?>{ display: block}
          </style>
          <?php
        }
        //for conform delete button are presss
        if (isset($_POST['c_delete'])) {
          $cid=$_POST['c_delete'];
          echo "<h1>conform delete button are press==".$_POST['c_delete']."</h1>";


      }


//class name click
          if (isset($_POST['class_name'])) {
            $_SESSION['Class_id'] =$_POST['class_name'];
              ?>
              <script type="text/javascript">
                    window.location.href='std_class.php';
              </script>

              <?php
            // echo "<script> window.location.href='class_page.php';  </script>";
          }

        ?>



      <?php
  }else {
    echo "<script> alert('Please Login First!....'); </script>";
  }

?>
