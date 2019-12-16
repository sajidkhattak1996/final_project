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

<form method="post">
    <!--information menu are start   -->
    <a href="#" class="nav1-button">Menu</a>
    <nav1 class="nav1">
        <ul>
            <li><a href="#"> <?php echo $result1['student_name'];  ?> </a></li>
            <li><a href="#"> <?php echo $result1['Email'];  ?> </a></li>
            <li><a href=""> <button type="submit" name="log_out" style="background: none;border: none"> Log out </button> </a></li>
        </ul>
    </nav1>
    <a href="#" class="nav1-close">Close Menu</a>
    <!--information menu are ended -->
    <!-- the ssdiv cover the empty which are on the left side of the information menu -->
    <div id="ssdiv" style="background: #008c7e; width: 100%; height: 46px;border-top:solid 1px #fff;" >
    </div>
    <!-- no things is written in this div B/c it is hide inthe mobile size -->
</form>

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
