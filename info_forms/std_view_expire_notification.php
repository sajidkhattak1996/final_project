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
            <title>View only old notificaion</title>
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
                #b3{
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
              #b3 {
                pointer-events: none;
              }
              #bb{
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

      </style>
<div class="tend" style="border-radius: 10px 10px 0px 0px;width:98%;margin:0 auto;height: auto">
  <div class="row" style="font-weight: bold;font-size: 16px;padding-top:8px;padding-bottom:20px;margin:0 auto">
        <div class="col-sm">Class ID :<?php echo $cid; ?></div>
        <div class="col-sm">Class : <?php echo $cn; ?></div>
        <div class="col-sm">Subject :<?php echo $sub; ?></div>
        <div class="col-sm" style="text-transform: capitalize">Teacher : <?php  echo $tn;  ?></div>
  </div>
</div>
<div class="" style="width:98%;margin:0 auto;border:solid 1px #13bca4;border-radius: 0px 0px 10px 10px;height:auto">

  <div style="margin-top:0px;padding-bottom:0px">
    <table class="table table-straped ">
      <thead id="bb">
          <tr>
            <th>Title</th>
            <th>Message</th>
            <th>Upload Date</th>
            <th> Expire Date</th>
          </tr>
      </thead>

    <?php

          if (isset($con)) {
                // $sql="SELECT id,title, msg , cdate , expire_date ,Class_id  FROM notification WHERE Class_id='".$cid."' ORDER BY expire_date DESC"; it display all notificaion of that class
                $sql="SELECT id,title, msg , cdate , expire_date ,Class_id  FROM notification WHERE Class_id='$cid' AND expire_date<CURRENT_DATE ORDER BY expire_date ASC";
                $exe_sql=mysqli_query($con ,$sql);
                if (mysqli_num_rows($exe_sql)>0) {
                  while ($result=mysqli_fetch_assoc($exe_sql)) {
                    ?>
                    <tr>
                          <td width="20%"><?php echo $result['title']; ?></td>
                          <td width="60%"><?php echo $result['msg']; ?></td>
                          <td width="10%"><?php echo $result['cdate']; ?></td>
                          <td width="10%"><?php echo $result['expire_date']; ?></td>
                    </tr>
                    <?php
                  }
                }else { ?>
                  <tr>
                        <td colspan="4" class="alert alert-warning text-center"> <?php  echo "No Expired Notification.";  ?> </td>
                  </tr>

                  <?php
                }

          }else {
            echo "problem occur in database connection ";
          }
     ?>

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
