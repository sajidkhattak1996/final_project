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

            </head>
          <body>

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
                <h5>NOW VIEWING :> <a href="" style="color: blue"> All Classes  </a></h5>
              </div>

              <div class="about">
                  <h2>About this page </h2>
                  <p class="text">
                    This is your Student Homepage. The Homepage show the classes you are enrolled in. To enroll in a new class,
                    click the Enroll in Class Button. To View your Class Record Click the Name of Class.To View the Notificaion and Slides/Notes Related to the Class
                    Click the Eye Icon to View them.

                  </p>
              </div>
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
                                                  <th scope="col">Slide</th>
                                                  <th scope="col">Drop</th>
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
                                                                    <td><style> #classbtn{background:none;border:none;color: blue} #classbtn:hover{border-bottom: solid 2px blue;} </style>
                                                                        <form action="#name<?php echo $row['Class_id']; ?>" method="post" id="name<?php echo $row['Class_id'];  ?>">
                                                                          <button type="submit" name="class_name" id="classbtn" value="<?php echo $row['Class_id']; ?>">
                                                                            <?php echo $row['Name'];  ?>
                                                                          </button>
                                                                        </form>
                                                                    </td>
                                                                    <td>  <?php echo $tn['Name'];  ?></td>
                                                                    <td>  <?php echo $sb['subject_name'];  ?></td>
                                                                    <td>  <?php echo $row['Start_date'];  ?></td>
                                                                    <td>  <?php echo $row['Expire_date'];  ?></td>
                                                                    <td>
                                                                              <button type="submit" name="btn_slide" value="<?php  echo $row['Class_id']; ?>" class="btn btn-outline-info btn-sm">Slides</button>


                                                                    </td>
                                                                    <style> #cd<?php echo $row['Class_id']; ?>{display: none} </style>
                                                                    <td>

                                                                        <input type="text" name="cn" id="gg" value="<?php echo $row['Name']; ?>" style="display:none">
                                                                        <button id="dd<?php echo $row['Class_id'];?>" type="submit" class="btn btn-outline-danger" name="btn_delete" value="<?php echo $row['Class_id']; ?>" style="border:none"> <span class="glyphicon glyphicon-trash" style="font-size: 14px"></span></button>
                                                                        <button id="cd<?php echo $row['Class_id']; ?>" type="submit" class="btn btn-danger btn-sm" name="c_delete"  value="<?php echo $row['Class_id']; ?>">conform</button>

                                                                    </td>

                                                                </tr>
                                                                <?php

                                                              }
                                                            }else {
                                                              echo "0 records founds";
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
  </body>
</html

        <script type="text/javascript" src="js/jquery.js"></script>
        <script src="../datatables/jquery.dataTables.js"></script>
        <script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>

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

      // slides button
          if (isset($_POST['btn_slide'])) {
            $cid= $_POST['btn_slide'];
            $sid= $_POST['s'];

            echo "<h1>".$cid."</h1>";
            echo "<h1>".$sid."</h1>";
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
