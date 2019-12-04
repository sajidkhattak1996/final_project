<!--=============== below area and button such classes helps etc ====================-->
<div class="bttn" style="background: #008c7e;">
    <form method="post">
          <ul>
                 <button type="submit" name="all_class" class="btn btn-outline-light btn-lg bg-light text-dark">         All Classes           </button>
                 <button type="submit" name="create_class"  class="btn btn-outline-light btn-lg">    Create New Class     </button>
                <button type="submit" name="help"  class="btn btn-outline-light btn-lg">        Helps               </button>

          </ul>
      </form>         <?php
                            // php code for all_class button
                            if (isset($_POST['all_class'])) {
                              unset($_SESSION['class_id']);
                              unset($_SESSION['subject_id']);
                              echo "<script> window.location.href='tmain_table.php'; </script>";
                            }
                            // php code for create class buttons
                            if (isset($_POST['create_class'])) {
                              unset($_SESSION['class_id']);
                              unset($_SESSION['subject_id']);
                              echo "<script> window.location.href='create_class.php'; </script>";
                            }
                            // php code for help button
                            if (isset($_POST['help'])) {
                              unset($_SESSION['class_id']);
                              unset($_SESSION['subject_id']);
                              echo "<script> window.location.href='helps.php'; </script>";
                            }
                      ?>
  </div>
<!--==========================above button container are ended ===============================================================-->





<!--============================================== now viewing and about div class are started ===============================-->
      <?php
          include('db_connection.php');
          if (isset($con)) {
            $cid=$_SESSION['class_id'];
            $stmt_class_name ="SELECT Name FROM class WHERE Class_id = '$cid'";
            $exe_stmt_class_name=mysqli_query($con ,$stmt_class_name);
            $r1=mysqli_fetch_array($exe_stmt_class_name);

            $sid=$_SESSION['subject_id'];
            $stmt_subject_name="SELECT subject_name FROM subject WHERE Subject_id='$sid'";
            $exe_stmt_subject_name=mysqli_query($con ,$stmt_subject_name);
            $r2=mysqli_fetch_array($exe_stmt_subject_name);

            ?>
      <div class="about_area" >
          <div class="viewing_area">
            <h5>NOW VIEWING :>
              <strong>
              <a href="tmain_table.php" style="color: black"> All  Classes &nbsp; </a>:>  &nbsp;&nbsp;
              <a href="" style="color: blue"> <?php echo $r1['Name'];  ?>  </a>
            </h5>

            <h5 style="padding-top: 10px;">Subject Name :>&nbsp;&nbsp; <span href="" style="color: deeppink;font-weight: bolder;letter-spacing: 0.8px"><?php echo $r2['subject_name'];  ?> </span></h5>
          </div>
      </div>
          <?php
          }else {
            echo "problem in the database connection!.... try againg";
          }
       ?>
<!--============================== ended ===============================================-->

<!--=========================== subject top menu are started  =========================-->
  <div class="container-fluid" id="table_maindiv" >
            <div id="expire_class" style="display: block;">
                <div class="tstart" style="padding-top:5px;margin-top: 20px;padding-bottom: 2px">
                      <h2 class="text-left">&nbsp;Institute Name: <?php echo $_SESSION['institute']; ?> </h2>
                        <div class="">
                                  <form class="" action="" method="post">
                                          <table class="table">
                                                        <tr>
                                                              <th scope="col">Class Student</th>
                                                              <th scope="col">Attendence</th>
                                                              <th scope="col">Assignment</th>
                                                              <th scope="col">Presentation</th>
                                                              <th scope="col">Quizes</th>
                                                        </tr>
                                                  <tbody>
                                                        <tr>
                                                              <td scope="col"><button class="btn btn-primary btn-lg" name="btn_all_std" id="cls">&nbsp;&nbsp;    Click   &nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open"></span> </button>   </td>
                                                              <td scope="col"><button class="btn btn-primary btn-lg" name="btn_attendence" id="att">&nbsp; ADD  &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plus"></span> </button></td>
                                                              <td scope="col"><button class="btn btn-primary btn-lg" name="btn_assignment" id="ass">&nbsp; ADD  &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plus"></span>  </button></td>
                                                              <td scope="col"><button class="btn btn-primary btn-lg" name="btn_presentation" id="pre">&nbsp; ADD  &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plus"></span>  </button></td>
                                                              <td scope="col"><button class="btn btn-primary btn-lg" name="btn_quize"  id="quz"> &nbsp; ADD  &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plus"></span> </button></td>
                                                        </tr>
                                                </tbody>
                                        </table>
                                  </form>
                        </div>
                    </div>
              </div>
  </div>
<!--============================ ended   ======================================-->
<?php
      if (isset($_POST['btn_all_std'])) { echo "<script> window.location.href='subject.php'; </script>"; }
      if (isset($_POST['btn_attendence'])) { echo "<script> window.location.href='attendence.php';  </script>"; }
      if (isset($_POST['btn_assignment'])) { echo "<script> window.location.href='assignment.php'; </script>"; }
      if (isset($_POST['btn_presentation'])) { echo "<script> window.location.href='presentation.php'; </script>"; }
      if (isset($_POST['btn_quize'])) { echo "<script> window.location.href='quize.php'; </script>"; }

 ?>
<!--================= subject tom menu are ended ===========================================================================-->
