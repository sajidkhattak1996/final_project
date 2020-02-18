<?php
      // session_start();
      include('db_connection.php');
      $em=$_SESSION['email'];
      $ps=$_SESSION['pass'];
      $query="SELECT S_id,student_name,Email,password FROM student WHERE Email='$em' AND password='$ps'";
      $exe_query=mysqli_query($con,$query);
      $result1=mysqli_fetch_array($exe_query);


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
    	<link rel="stylesheet" href="css/bootstrap.css">

    	<link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/defaults.css">
        <link rel="stylesheet" href="css/nav1-core.css">
        <link rel="stylesheet" href="css/nav1-layout.css">

        <link rel="stylesheet" href="../Admin_Site/plugins/fontawesome-free/css/all.min.css">

        <script src="js/rem.min.js"></script>

      </head>
    <body>

    <!--the top menu and the user information menu are start from here and below wel be the end comment -->
    <!-- div class for the logo on the left most top -->
    <div class="" style="width: 100%; height: 60px;background: #008c7e;">
        <img src="LOGO2.png" style="width: 140px; height: 50px;margin-top:5px;margin-left: 5px;">
        <label id="websitename"> Welcome to the Class Room Management</label>
    </div>
    <!-- logo class ended -->
    <script type="text/javascript">

      function hide_fn(){
      var d=document.getElementById("info");
      if (d.style.display=='block') {
        d.style.display='none';
      }
      }

        function show_hide(){
          var d=document.getElementById("info");
          if (d.style.display==="none")
          {  d.style.display="block";
          }else {  d.style.display="none";  }
          }

    /* function second  */
      function fn2(){
          var a=document.getElementById("x1");
          var b=document.getElementById("x2");
          if (a.style.display==="none") {
              b.style.display="none";
              a.style.display="block";
          }
          else {
            a.style.display="none";
            b.style.display="block";
          }
        }
    // password hide and display
    function myFn(){
      var p=document.getElementById("pp");
      if (p.type=="password") {
        p.type="text";
      }else {
        p.type="password";
      }
    }
    function fn3(){
      var w=document.getElementById("edit_btn");
      var q=document.getElementById("email_edit");
      w.style.display="none";
      q.style.display="none"

    }
    function f(){
      document.getElementById("bbb").style.display="block";
    }


    </script>
    <form method="post">
      <!--information menu are start   -->
      <a href="#" class="nav1-button">Menu</a>
      <nav1 class="nav1">
        <ul><style >
        #lout:hover{ background: #ca0b00;font-weight: bolder;}
        #nt a:hover{background: lightblue;color: #000}
        #nt_show:hover{background: #13bca4}
      </style>
<?php
// notification area
//sql query for the total number of  notificaion show
  $stmt_noti="SELECT have.Class_id ,notification.id ,notification.expire_date FROM have INNER JOIN notification on have.Class_id=notification.Class_id WHERE have.S_id='".$result1['S_id']."' AND notification.expire_date>=CURRENT_DATE";
  $exe_noti=mysqli_query($con ,$stmt_noti);
  if (mysqli_num_rows($exe_noti)>0) {
    $total_notification=mysqli_num_rows($exe_noti);

    $all_cid=array();
    $i=0;
    while ($r=mysqli_fetch_assoc($exe_noti)) {
       $all_cid[$i]=$r['Class_id'];  $i++;  }

    //below we remove the dublicate value from the array  so the new array are "allcid"
    $allcid=array_unique($all_cid);
    //the array_values function create the index as numeric value and array_filter are use to remove the index which has 0 or null values
    $allcid=array_values(array_filter($allcid));


 ?>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge"><?php echo $total_notification; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="nt" style="width: 180px;background: #13bca4;border-radius: 0px 0px 10px 10px">
            <span id="nt_show" class="dropdown-item dropdown-header" style="color: yellow"><b><?php echo $total_notification; ?> Notifications</b></span> <!-- display total notification on click the bill -->
            <?php

                for ($j=0; $j<4 && array_key_exists($j,$allcid); $j++) {
                  if ($j==3) { //it display the 3 dots
                    ?>
                    <div class="dropdown-divider"></div>
                    <div class="text-center">  <i class='fas fa-ellipsis-v' style='color: yellow;font-size: 14px'></i>  </div>
                    <?php
                    continue;
                  }
                  $stmt_sep_nofi="SELECT * FROM notification WHERE Class_id='$allcid[$j]' AND expire_date>= CURRENT_DATE";
                  $tnr=mysqli_num_rows(mysqli_query($con ,$stmt_sep_nofi));
                  $rn=mysqli_fetch_array(mysqli_query($con ,"SELECT Name FROM class WHERE Class_id='".$allcid[$j]."'"));
                  $rtn=mysqli_fetch_array(mysqli_query($con ,"SELECT teacher.Name FROM teacher INNER JOIN class ON class.T_id=teacher.T_id WHERE class.Class_id='".$allcid[$j]."'"));
                  $rsub=mysqli_fetch_array(mysqli_query($con ,"SELECT subject.subject_name FROM subject INNER JOIN have ON have.Subject_id=subject.Subject_id WHERE have.Class_id='".$allcid[$j]."'"));
                  ?>
                  <div class="dropdown-divider"></div>
                  <a href="std_view_active_notification.php?cid=<?php  echo $allcid[$j]; ?>&cn=<?php echo $rn['Name']; ?>&tn=<?php echo $rtn['Name']; ?>&sub=<?php echo $rsub['subject_name']; ?>" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i>Class:<?php echo $allcid[$j]; ?>&nbsp; has &nbsp;<?php echo $tnr; ?>  notificaion
                    <!-- <span class="float-right text-dark text-sm">3 mins</span> -->
                  </a>
                  <?php
                }
                ?>
                <div class="dropdown-divider"></div>
                <a href="all_notification.php" class="dropdown-item dropdown-footer">See All Notifications</a>
              </div>
            </li>

                <?php
              }else {
                $total_notification=0;
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge"><?php echo $total_notification; ?></span>
                    </a>
                </li>
                <?php
              }
              ?>
<!-- notificaion ended================================================================================================================================================= -->
            <!-- information  of user ============================================================================================================================================================== -->
            <li><a href="#" onclick="show_hide()" style="text-transform: capitalize"> <?php echo $result1['student_name'];  ?>&nbsp; <span class="glyphicon glyphicon-info-sign"></span></a></li>
            <li onclick="hide_fn()"> <?php echo $result1['Email'];  ?> <i class="fas fa-user"></i> </li>
            <li><a href="" id="lout"> <button type="submit" name="log_out" style="background: none;border: none;" > Log out &nbsp;&nbsp;<span class="glyphicon glyphicon-log-out"></span></button> </a></li>
        </ul>
  <!--==========ended ============================================================================================================================================================== -->
    </nav1>
    <a href="#" class="nav1-close">Close Menu</a>
    <!--information menu are ended -->
    <!-- the ssdiv cover the empty which are on the left side of the information menu -->
    <div id="ssdiv" style="background: #008c7e; width: 100%; height: 46px;border-top:solid 1px #fff;" >
    </div>
    <!-- no things is written in this div B/c it is hide inthe mobile size -->
</form>
<!--=========== below the Top nivagation menu area =========================================================================================================================-->
<link rel="stylesheet" href="../teacher_table/top_menu_info_btn_css.css">
<?php

?>
<!--=========================== start ==========================================================================================================================================-->
      <div class="info_div" id="info" style="display:none">
            <div class="info_div_inside">
              <button type="btn_close" name="button" onclick="show_hide()" class="btn btn-danger" style="float: right"><span class="glyphicon glyphicon-remove" id="icon_remove"></span></button>
                  <h1 id="info_h3">Your Information Details</h1>
                    <div id="h3_below">
                      <form action="" method="post">
                        <div id="x1" >
                          <div class="row" id="r">
                              <div class="col-sm"><b>Name</b><input type="text" id="c3" name="name" value="<?php echo $result1['student_name']; ?>" onkeyup="f()" class="form-control" pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{1,40}$">  </div>
                          </div>


                        </div>
                          <div class="row" id="x2" style="display:none">
                              <div class="col-sm alert alert-primary" title="Email are not Editable!"><b>Email </b><span><?php echo $result1['Email']; ?></span>  </div>
                              <div class="col-sm" ><b>Password </b><input type="password" name="pass" onkeyup="f()" value="<?php echo $result1['password']; ?>" id="pp" class="form-control " minlength="8" title="Minimum length is 8 charseter"> </div>
                              <input type="checkbox" onclick="myFn()" style="margin-left: 18px">show password
                          </div>

                          <div class="row" id="r">
                            <div class="col-sm" id="r5c1">
                              <!-- <button type="button" name="button" id="edit_btn" onclick="fn3()" class="btn btn-primary btn-lg">Click To Edit</button> -->
                              <button type="button" name="b2" id="email_edit" onclick="fn2()" value="<?php echo $result1['S_id']; ?>" class="btn btn-primary btn-lg " style="margin-left: 10px">Change Password</button>
                            </div>

                            <div class="col-sm" id="bbb" style="display:none"><button type="submit" name="bsave" value="<?php echo $result1['S_id']; ?>" class="btn btn-primary btn-lg">Save Change</button></div>
                          </div>


                      </form>
                  </div>
            </div>
      </div>
<!--========== ended =============================================================================================== -->
<?php
      if (isset($_POST['bsave'])) {
        include('db_connection.php');
        if ($con) {

              $sql="UPDATE student SET student_name='".$_POST['name']."',password='".$_POST['pass']."' WHERE S_id='".$_POST['bsave']."'";
              if (mysqli_query($con ,$sql)) {
                  echo "<script> alert('Record are success Successfully Updated.'); </script>";
                  $_SESSION['email']=$result1['Email'];
                  $_SESSION['pass']=$_POST['pass'];
                  echo "<meta http-equiv='refresh' content='0'>";

              }else {
                echo "<script> alert('Record are Not Updated.'); </script>";

              }
        }else {
          echo "connection problem ! ";
        }
      }

 ?>
<!--== php for above form============================================================================================= -->





    <script src="js/jquery.js"></script>
    <script src="js/nav1.jquery.min.js"></script>
    <script>
        $('.nav1').nav1();

  </script>

    <!-- from here the nav menu and user informatio menu are ended -->
    <!--top head area ended -->
      </body>
    </html>
  <?php
      if (isset($_POST['log_out'])) {
        session_destroy();
        echo "<script>   window.location.assign('../index.php');  </script>  ";
      }
   ?>

    <!-- Bootstrap 4 -->
    <script src="../Admin_Site/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
