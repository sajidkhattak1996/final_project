<?php
      // session_start();
      include('db_connection.php');
      $em=$_SESSION['email'];
      $ps=$_SESSION['pass'];
      $query="SELECT S_id,student_name,Email FROM student WHERE Email='$em' AND password='$ps'";
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

        <!--[if lt IE 9]>
        <link rel="stylesheet" href="css/ie8-core.min.css">
        <link rel="stylesheet" href="css/ie8-layout.min.css">
        <script src="js/html5shiv.min.js"></script>
        <![endif]-->

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
        </style>
            <li><a href="#" onclick="show_hide()"> <?php echo $result1['student_name'];  ?>&nbsp; <span class="glyphicon glyphicon-info-sign"></span></a></li>
            <li> <?php echo $result1['Email'];  ?></li>
            <li><a href="" id="lout"> <button type="submit" name="log_out" style="background: none;border: none;" > Log out &nbsp;&nbsp;<span class="glyphicon glyphicon-log-out"></span></button> </a></li>
        </ul>
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
                              <div class="col-sm"><b>Name</b><input type="text" id="c3" name="name" value="<?php echo $r['Name']; ?>" onkeyup="f()" class="form-control">  </div>
                              <div class="col-sm"><b>Institute </b><input type="text" id="c3" name="institute" value="<?php echo $r['Institute_name']; ?>" onkeyup="f()" class="form-control">  </div>
                          </div>

                          <div class="row" id="r">
                              <div class="col-sm"><b>Contact NO</b><input type="text" id="c3" name="contact" value="<?php echo $r['Contact_no']; ?>" onkeyup="f()" class="form-control">  </div>
                              <div class="col-sm"><b>CNIC NO</b><input type="text" id="c3" name="cnic" value="<?php echo $r['Cnic']; ?>" onkeyup="f()" class="form-control">  </div>
                          </div>

                          <div class="row" id="r">
                              <div class="col-sm"><b>Country</b><input type="text" id="c3" name="country" value="<?php echo $r['Country']; ?>" onkeyup="f()" class="form-control">  </div>
                              <div class="col-sm"><b>City </b><input type="text" id="c3" name="city" value="<?php echo $r['City']; ?>"  onkeyup="f()" class="form-control">  </div>
                          </div>
                        </div>
                          <div class="row" id="x2" style="display:none">
                              <div class="col-sm alert alert-primary" title="Email are not Editable!"><b>Email </b><span><?php echo $r['Email']; ?></span>  </div>
                              <div class="col-sm" ><b>Password </b><input type="password" name="pass" onkeyup="f()" value="<?php echo $r['Password']; ?>" id="pp" class="form-control "> </div>
                              <input type="checkbox" onclick="myFn()" style="margin-left: 18px">show password
                          </div>

                          <div class="row" id="r">
                            <div class="col-sm" id="r5c1">
                              <!-- <button type="button" name="button" id="edit_btn" onclick="fn3()" class="btn btn-primary btn-lg">Click To Edit</button> -->
                              <button type="button" name="b2" id="email_edit" onclick="fn2()" value="<?php echo $tid; ?>" class="btn btn-primary btn-lg " style="margin-left: 10px">Change Password</button>
                            </div>

                            <div class="col-sm" id="bbb" style="display:none"><button type="submit" name="bsave" value="<?php echo $r['Email']; ?>" class="btn btn-primary btn-lg">Save Change</button></div>
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

              $sql="UPDATE teacher SET Name='".$_POST['name']."' ,Contact_no='".$_POST['contact']."',Cnic='".$_POST['cnic']."',Institute_name='".$_POST['institute']."',Country='".$_POST['country']."',City='".$_POST['city']."',Password='".$_POST['pass']."' WHERE T_id='".$_SESSION['t_id']."' AND Email='".$_POST['bsave']."'";
              if (mysqli_query($con ,$sql)) {
                  echo "<script> alert('Record are success Successfully Updated.'); </script>";
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
