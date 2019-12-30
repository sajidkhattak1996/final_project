<?php
session_start();
  if (isset($_SESSION['email']) && isset($_SESSION['pass'])) { ?>
    <!DOCTYPE html>
        <html lang="en" dir="ltr">
          <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <title>welcome to login </title>
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
              <h5>NOW VIEWING :>
                <a href="main_table.php" style="color: #606060"> All Classes  </a> :>
                <a href="" style="color: blue;font-weight: bolder;letter-spacing: 0.5px"><?php echo $_GET['cn']; ?></a>
                <br><br>
                Subject :
                <span style="color: deeppink;font-weight: bolder;letter-spacing: 0.5px"><?php echo $_GET['sub']; ?></span>


              </h5>
            </div>

            <div class="about">
                <h2>About this page </h2>
                <p class="text">
                  This is Attagement Homepage.In this page you can view your Class Attagement which are share by your Teacher or Instructor.

                </p>
            </div>
      </div>
      <?php  include('std_share_navagation_menu.php'); ?>
      <style media="screen">
                #b1{
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
              #b1 {
                pointer-events: none;
              }
              #bb{
                        background-image: -webkit-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                        background-image: -moz-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                        background-image: -o-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                        background-image: linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                        color: blue;

                  }

      </style>
<div class="tend" style="border-radius: 10px 10px 0px 0px;width:98%;margin:0 auto;height: auto">
  <div class="row" style="font-weight: bold;font-size: 16px;padding-top:8px;padding-bottom:20px;margin:0 auto">
        <div class="col-sm">Class ID :<?php if (isset($_GET['cid'])) { echo $_GET['cid']; } ?></div>
        <div class="col-sm">Class : <?php if (isset($_GET['cn'])) { echo $_GET['cn']; } ?></div>
        <div class="col-sm">Subject :<?php if (isset($_GET['sub'])) { echo $_GET['sub']; } ?></div>
        <div class="col-sm" style="text-transform: capitalize">Teacher : <?php if (isset($_GET['tn'])) { echo $_GET['tn']; } ?></div>
  </div>
</div>
<div class="" style="width:98%;margin:0 auto;border:solid 1px #13bca4;border-radius: 0px 0px 10px 10px;height:auto">

  <div style="margin-top:0px;padding-bottom:0px">
        <table id="example6" class="table table-straped table-hover table-bordered table-sm">
              <thead id="bb">
                  <tr>
                    <!-- <th>ID</th> -->
                    <th>Description</th>
                    <th>Date</th>
                    <th>Download File</th>
                  </tr>
              </thead>
              <tbody style="background: #ECF4F6">
                <?php
                            include('db_connection.php');
                            $q="SELECT * FROM slide WHERE Class_id='".$_GET['cid']."' ORDER BY c_date DESC";
                            $ros=mysqli_query($con,$q);
                            if (mysqli_num_rows($ros)>0) {
                              while($row=mysqli_fetch_array($ros))
                              {
                                echo '<tr>';
                                // echo '<td>' . $row['id'].'</td>';
                                echo '<td>' . $row['topic'].'</td>';
                                echo '<td>' .$row['c_date'].'</td>';
                                echo "<td><a title='Click here to download in file.' href='../teacher_table/slide_download.php?id={$row['file']}'>{$row['file']} </a></td>";

                              echo '</tr>';

                              }

                            }else { ?>
                                <tr>
                                    <td colspan="4" class="text-center alert alert-warning">No Slides or Cource Topics are Uploaded.</td>
                                </tr>
                            <?php  }

                      ?>
                      <tr>
                          <td colspan="4" class="alert alert-warning text-center"> <b>Below are Links to download notes or cource Data. <i class="fas fa-caret-down"></i></b> </td>
                      </tr>
                      <!-- the below are written for the links   -->
                      <?php

                              $query_link="SELECT * FROM links WHERE Class_id='".$_GET['cid']."'";
                              $exe_link=mysqli_query($con,$query_link);
                              if (mysqli_num_rows($exe_link)>0) {
                                while ($row_link=mysqli_fetch_assoc($exe_link)) {
                                    echo "<tr>";
                                          echo "<td>".$row_link['description']."</td>";
                                          echo "<td>".$row_link['ldate']."</td>";
                                          echo "<td><a href='".$row_link['link']."'> click me to view  </a></td>";

                                    echo "</tr>";
                                }
                              }else { ?>
                                  <tr>
                                      <td colspan="4" class="text-center alert alert-warning">No Links are Uploaded for Class Slides or Cource topic.</td>
                                  </tr>
                              <?php   }



                              mysqli_close($con);
                       ?>


              </tbody>
        </table>
  </div>


</div>
</body>
</html>



    <?php   }
    else {
      echo "<script> alert('Please Login first!.... '); </script>";
    }

  ?>
