<?php
session_start();
if (isset($_SESSION['email']) &&  isset($_SESSION['pass']) )
  {
  $em  =$_SESSION['email'];
  $pass=$_SESSION['pass'];
  $con =mysqli_connect("localhost","root","","project_db");
    if ($con) {
        $query1 ="SELECT * FROM teacher WHERE Email ='$em' AND Password ='$pass'";

        $executeq1 =mysqli_query($con, $query1);
        if ($executeq1) {
          //it extract the record inthe form of associative array or key index array
            $row =mysqli_fetch_array($executeq1);
              //the above record are use inthe below html code
              $_SESSION['t_id']= $row['T_id'];
              $_SESSION['institute'] = $row['Institute_name'];

        }
        else {
          echo "<script> alert('Problem Occur while Extreting record from databse '); </script>";
        }

    }
    else {
      echo "<script> alert('Problem Occur while Connecting to the Database!... '); </script>";
    }

  ?>
  <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">

        <title>welcome to webside as a teacher  </title>
    	<link href="teacher_css.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap 4/css/glyphicon.css">

    <script src="js/jquery.js"></script>

    	<link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/defaults.css">
        <link rel="stylesheet" href="css/nav1-core.css">
        <link rel="stylesheet" href="css/nav1-layout.css">
    <script src="js/rem.min.js"></script>

        <style type="text/css">

    .tabletabs{

    width:98.5%;
    margin: 0 auto;
    border-radius: 30px 30px 0px 0px;

    /* border-bottom:solid 1px rgba(172,239,206,0.66); */
    height:30px;
    margin-bottom: -20px;

    }


        #table_maindiv {

          	border-radius: 10px;
          	padding-top:10px;
          	padding-bottom: 10px;
          	width: 100%;
    }
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
    #b2,#b3{
      background-image: -webkit-linear-gradient(270deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
        background-image: -moz-linear-gradient(270deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
        background-image: -o-linear-gradient(270deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
        background-image: linear-gradient(180deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
    color: #6f9de8;
      border:solid 1px rgba(127,243,228,0.52);
      border-radius: 7px 7px 0px 0px;

    }



        </style>

        <!--[if lt IE 9]>
        <link rel="stylesheet" href="css/ie8-core.min.css">
        <link rel="stylesheet" href="css/ie8-layout.min.css">
        <script src="js/html5shiv.min.js"></script>
        <![endif]-->

<style>
      @media (max-width: 410px) AND (min-width: 360px){ body{width:110%;} }
      @media (max-width: 360px) AND (min-width: 330px) { body{width:118%;} }
      @media (max-width: 330px) AND (min-width: 300px) { body{width:130%;} }
      @media (max-width: 300px) AND (min-width: 270px) { body{width:140%;} }
      @media (max-width: 270px) AND (min-width: 240px) { body{width:157%;} }
      @media (max-width: 250px) AND (min-width: 240px) { body{width:168%;} }
      @media (max-width: 240px) AND (min-width: 220px) { body{width:175%;} }
      @media (max-width: 220px) AND (min-width: 200px) { body{width:180%;} }
      @media (max-width: 200px) AND (min-width: 190px) { body{width:197%;} }
      @media (max-width: 190px) AND (min-width: 180px) { body{width:225%;} }
      @media (max-width: 180px) AND (min-width: 150px) { body{width:240%;} }
      @media (max-width: 150px) AND (min-width: 140px) { body{width:280%;} }
      @media (max-width: 140px) AND (min-width: 120px) { body{width:310%;} }
      @media (max-width: 120px) AND (min-width: 10px) { body{width:350%;} }


</style>

      </head>
    <body >

    <!--the top menu and the user information menu are start from here and below wel be the end comment -->
    <!-- div class for the logo on the left most top -->
    <div class="" style="width: 100%; height: 60px;background: #008c7e;">
        <img src="LOGO2.png" style="width: 140px; height: 50px;margin-top:5px;margin-left: 5px;">
        <label id="websitename"> Welcome to the Class Room Management</label>
    </div>
    <!-- logo class ended -->

    <form action="" method="post">
    <!--information menu are start   -->
    <a href="#" class="nav1-button">Menu</a>
    <nav1 class="nav1">
        <ul>
            <li   style="text-transform: capitalize"><a href=""><?php echo $row['Name']; ?></a></li>
            <li><a href=""><?php echo $row['Email']; ?></a></li>
            <li><a href="#"><?php echo $row['Contact_no']; ?></a></li>
            <style >
              #lout:hover{ background: #ca0b00;font-weight: bolder;}
            </style>
      <form action="" method="post"><li><a href="" id="lout"><button name="logout" style="border:none;background:none">log out</button></a></li></form>
<?php
  if (isset($_POST['logout'])) {
    session_destroy();
    echo "<script>   window.location.assign('../index.php');  </script>  ";
  }
?>

        </ul>
    </nav1>
    <a href="#" class="nav1-close">Close Menu</a>
    </form>
    <!--information menu are ended -->
    <!-- the ssdiv cover the empty which are on the left side of the information menu -->
    <div id="ssdiv" style="background: #008c7e; width: 100%; height: 46px;border-top:solid 1px #fff;" >
    </div>
    <!-- no things is written in this div B/c it is hide inthe mobile size -->



    <script src="js/nav1.jquery.min.js"></script>
    <script>
        $('.nav1').nav1();
    </script>
    <!-- from here the nav menu and user informatio menu are ended -->
    <!--top head area ended -->

          </body>
        </html>

    <?php
    }
else {
      echo "<script> alert('Please Login First!'); </script>";
    }


    ?>
