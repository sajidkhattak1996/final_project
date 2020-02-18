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
              <h5>NOW VIEWING :>
                <a href="main_table.php" style="color: #606060"> All Classes  </a> :>
                <a href="" style="color: blue;font-weight: bolder;letter-spacing: 0.5px">View All Notificaion</a>

              </h5>
            </div>

            <div class="about">
                <h2>About this page </h2>
                <p class="text">
                  This is Attagement Homepage.In this page you can view your Class Attagement which are share by your Teacher or Instructor.

                </p>
            </div>
      </div>
      <style media="screen">
                #b4{
                  background-image: -webkit-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                  background-image: -moz-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                  background-image: -o-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                  background-image: linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                  color: blue;
                  border-left: solid 1px rgba(172,239,224,0.66);
                  border-top: solid 1px rgba(172,239,224,0.66);
                  border-right: solid 1px rgba(172,239,224,0.66);
                  margin-left: 2%;
                  border-radius: 8px 8px 0px 0px;
                  padding: 1px 10px 0px 10px;
                  border-bottom: none;
                }
                @media (max-width: 500px){#b4{  margin-left: 5%; }}
              #b4 {
                pointer-events: none;
              }
              #bb{
                        background-image: -webkit-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                        background-image: -moz-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                        background-image: -o-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                        background-image: linear-gradient(180deg,rgba(172,239,224,0.66) 10.76%,rgba(0,140,126,1.00) 98.45%);
                        color: blue;
                        border-left: solid 1px rgba(172,239,224,0.66);
                        border-top: solid 1px rgba(172,239,224,0.66);
                        border-right: solid 1px rgba(172,239,224,0.66);

                        border-radius: 7px 7px 0px 0px;
                  }

                  #aa{
                            background-image: -webkit-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                            background-image: -moz-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                            background-image: -o-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                            background-image: linear-gradient(0deg,rgba(172,239,224,0.66) 0.1%,rgba(0,140,126,1.00) 98.45%);
                            /* border-top:solid 1px #13bca4; */
                            border-left:solid 1px #13bca4;
                            border-right:solid 1px #13bca4;
                      }
                      #ff{
                        width:98%;
                        margin:0 auto;
                        border:solid 1px #13bca4;
                        border-top: solid 1px rgba(0,140,126,0.1);
                        border-radius: 0px 0px 10px 10px;
                        height:auto;

                      }

      </style>
      <a href=""> <button id="b4" type="submit">  <b>      View All Notification          </b>  </button> </a>
<div id="aa" style="border-radius: 10px 10px 0px 0px;width:98%;margin:0 auto;height: 15px">

</div>

<div id="ff">
  <div style="margin-top:0px;padding-bottom:0px">
    <table class="table table-straped ">
      <thead id="bb">
          <tr>
            <th width="5%">Class ID</th>
            <th width="10%">Title</th>
            <th width="65%">Message</th>
            <th width="7%">Upload Date</th>
            <th width="7%">Expire Date</th>
          </tr>
      </thead>
    <?php

          if (isset($con)) {
                $sql="SELECT have.Class_id ,notification.id,notification.title,notification.msg,notification.cdate,notification.expire_date FROM have INNER JOIN notification on have.Class_id=notification.Class_id WHERE have.S_id='".$result1['S_id']."' AND notification.expire_date>=CURRENT_DATE";
                $exe_sql=mysqli_query($con ,$sql);
                if (mysqli_num_rows($exe_sql)>0) {
                  while ($result=mysqli_fetch_assoc($exe_sql)) {
                    ?>
                    <tr>
                          <td><?php echo $result['Class_id']; ?></td>
                          <td><?php echo $result['title']; ?></td>
                          <td><?php echo $result['msg']; ?></td>
                          <td><?php echo $result['cdate']; ?></td>
                          <td><?php echo $result['expire_date']; ?></td>
                    </tr>
                    <?php
                  }
                }else { ?>
                  <tr>
                        <td colspan="4" class="alert alert-warning text-center"> <?php  echo "No Notification.";  ?> </td>
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
</div>
<br>
</body>
</html>



    <?php   }
    else {
      echo "<script> alert('Please Login first!.... '); </script>";
    }

  ?>
