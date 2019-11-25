<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>teacher create account</title>
    <?php include('index.php'); ?>

<link rel="stylesheet" href="teacher_create_ac.css" type="text/css">
<link rel="stylesheet" href="menu css and js/bootstrap 4/css/glyphicon.css">




  </head>
  <body>

    <div class="teacher_account">


      <?php

  if (isset($_POST['cp'])) {
      $con=mysqli_connect("localhost","root","","project_db");
      if ($con) {
        /* all variable of form  */
        $name =$_POST['tname'];
        $cont =$_POST['contact'];
        $cnic =$_POST['cnic'];
        $intitute =$_POST['institutename'];
        $country =$_POST['countryname'];
        $city =$_POST['city'];

        $email =$_POST['email'];
        $pass =$_POST['pass'];

        $query1 = "SELECT Email FROM teacher WHERE Email = '$email'";
        $result = mysqli_query($con , $query1);
        //now checking the result if it how much row
        $check = mysqli_num_rows($result);
              if ($check >=1) {  ?>
                <!-- // echo "<h1> <script> alert('you all ready have an account please login to your account ') </script> </h1>"; -->

              <style>
                .form-a{display: none;}
               .alert {
                 margin-top: 30px;
               	width: 50%;
               	margin: 0 auto;
               	padding: 20px;
               	color: white;
               	border-radius: 15px;
               	background-image: -webkit-linear-gradient(270deg,rgba(232,25,50,1.00) 0%,rgba(223,66,83,0.69) 13.47%,rgba(214,70,70,0.42) 100%);
               	background-image: -moz-linear-gradient(270deg,rgba(232,25,50,1.00) 0%,rgba(223,66,83,0.69) 13.47%,rgba(214,70,70,0.42) 100%);
               	background-image: -o-linear-gradient(270deg,rgba(232,25,50,1.00) 0%,rgba(223,66,83,0.69) 13.47%,rgba(214,70,70,0.42) 100%);
               	background-image: linear-gradient(180deg,rgba(232,25,50,1.00) 0%,rgba(223,66,83,0.88) 13.47%,rgba(214,70,70,0.6) 100%);
                 }
               .alert_body {
               	border-radius: 15px;
               	border: thin solid #D7094F;
               }

                 .closebtn {
                   margin-left: 15px;
                   color: white;
                   background: none;
                   border: none;
                   float: right;
                   font-size: 25px;
                   line-height: 30px;
                   cursor: pointer;
                   transition: 0.4s;

                 }

                 .closebtn:hover {
                   color: black;
                 }

               		 .alert_footer{
               			 padding-top: 5px;

               		 }

               		 #lgb1{
               			 background: #13bca4;
               			 border:solid 1px #13bca4;
               			 border-radius: 8px;
               			 height: 35px;
               		 }
               		 #lgb1:hover{
               			 background: #008c7e;
               			 border:solid 1px #008c7e;
               			 color: #fff;
               		 }
               		 #clb2{
               			 border:solid 1px #DD3033;
               			 background:#DD3033;
               			 border-radius: 8px;
               			 height: 35px;
               			 color: #fff;
               		 }
               		  #clb2:hover{
               			  border:solid 1px #FF0004;
               			 background:#FF0004;
               			 color: #000;
               			  font-family: bold;
               		 }
                   #alb{
                     font-size: 25px
                   }
                   #st{
                     font-size: 28px
                   }
                   #lb2{
                     font-size: 20px;
                     margin-left: 2%;
                   }
                   @media (max-width: 960px)  {
                     .alert {

                       width: 80%;
                       margin-top:140px;
                       padding: 20px;
                       color: white;
                       border-radius: 15px;
                       background-image: -webkit-linear-gradient(270deg,rgba(232,25,50,1.00) 0%,rgba(223,66,83,0.69) 13.47%,rgba(214,70,70,0.42) 100%);
                       background-image: -moz-linear-gradient(270deg,rgba(232,25,50,1.00) 0%,rgba(223,66,83,0.69) 13.47%,rgba(214,70,70,0.42) 100%);
                       background-image: -o-linear-gradient(270deg,rgba(232,25,50,1.00) 0%,rgba(223,66,83,0.69) 13.47%,rgba(214,70,70,0.42) 100%);
                       background-image: linear-gradient(180deg,rgba(232,25,50,1.00) 0%,rgba(223,66,83,0.88) 13.47%,rgba(214,70,70,0.6) 100%);
                       }

                     #alb{
                       font-size: 18px
                     }
                     #st{
                       font-size: 20px
                     }
                     #lb2{
                       font-size: 14px;
                       margin-left: 2%;
                     }
                   }


                    </style>

               <div class="alert">
              <form action="" method="post"><button type="submit" name="closebtn1" onclick="this.parentElement.style.display='none';" class="closebtn"><span class="glyphicon glyphicon-remove"> </span></button></form>
               <label id="alb">ACCOUNT CREATE WARNING !</label>
               <br>
                 <div class="alert_body" style="padding-top: 15px;padding-left: 20px">

               	<strong id="st">Warning!</strong>
               	  <label id="lb2">   Your Email is All ready exist on our Database...  </label>
               		<h4 style="margin-left: 1%;padding-top: 10px;padding-bottom:10px">Your Account Cannot be Created on this Email please Log in / or try <br>Another Email Account to create account .</h4>
               	  	<h3 style="margin-left: 1%"> If you want to Log in Please Click the below Button .</h3>


               	</div>

                 <div class="alert_footer" >
               	  <a href="login.php" style="float: right;"> <button class="btn " id="lgb1"><span class="glyphicon glyphicon-user"></span> Log in </button>  </a>
               	  <form>
               	  		<button type="submit" name="closebtn" class="btn " id="clb2">Close <span class="glyphicon glyphicon-remove"></span></button>
               	  </form>
                 </div>

               </div>


              <?php
                    if (isset($_POST['closebtn']) || isset($_POST['closebtn1']) ) {   ?>

                      <style>
                        .form-a{display: block;}
                        </style>


                      <?php    }  ?>

            <?php  }
              else {
                    $sql ="INSERT INTO teacher (Name, Contact_no, Cnic, Institute_name, Country, City, Email, Password) VALUES ('$name', '$cont', '$cnic', '$intitute', '$country', '$city', '$email', '$pass');";

                      if(mysqli_query($con, $sql)) {
                        echo "<script> alert('your account are created ....') </script>";
                        $_SESSION['email']= $email;
                        $_SESSION['pass']=$pass;
                        echo "<script> document.location.assign('teacher_table/tmain_table.php'); </script>";
                        mysqli_close($con);
                      }
                      else {
                          echo "<script> alert('Something want problem in the Data insertion. please try again later ...') </script>";
                          mysqli_close($con);
                        }

              }
      }
      else {
        die('connection to database is failed please try again...'.mysqli_error());
      }



      }

      ?>






        <div class="form-a"  >
            <form class="col-12"  onsubmit="fn()" action="" method="post">
                <div id="top_head" ><center><b>Create Teacher Account</b></center><br></div>
                <div class="row" id="insidediv">

                <div class="col-5" style="margin: 0 auto">
                      <div class="form-group input-group-lg">
                        <label id="input_labal"><b>Teacher Name:</b></label>
                        <input type="text" id="tname" name="tname" placeholder="Enter Teacher Name:" class="form-control text" autocomplete="off" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{1,40}$" title="Name must be start with Alphabit " minlength="3" maxlength="40">
                        <span id="sttd" class="font-weight-bold" style="color:greenyellow"></span>
                        </div>
                </div>

                <div class="col-5" style="margin: 0 auto">
                      <div class="form-group input-group-lg">
                        <label id="input_labal"><b>Contact NO:</b></label>
                        <input type="text" id="thr" name="contact" placeholder="Enter contact no" class="form-control text" autocomplete="off" required pattern="\d+" title="Please enter valid contact number" minlength="7" maxlength="20">
                        <span id="sttd" class="font-weight-bold" style="color:greenyellow"></span>
                        </div>
                </div>



                <div class="col-5" style="margin: 0 auto;">
                  <div class="form-group input-group-lg" style="padding-top: 10px;">
                    <label id="input_labal"><b>CNIC NO:</b></label>
                    <input type="text" id="tname" name="cnic" placeholder="Enter Cnic no " class="form-control text" autocomplete="off" required pattern="\d+" title="Please enter valid cnin no " minlength="13" maxlength="15">
                    <span id="fnme" class="font-weight-bold" style="color:greenyellow" ></span>
                    </div>

                    <div class="form-group input-group-lg" style="padding-top: 10px;">
                      <label id="input_labal"><b>Country Name:</b></label>
                      <input type="text" id="lname" name="countryname" placeholder="Enter Country name" class="form-control text" autocomplete="off" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{5,40}$" title="country name must be start from Alphabit">
                      <span id="lnme" class="font-weight-bold" style="color:greenyellow"></span>
                      </div>

                    <div class="form-group input-group-lg"  style="padding-top: 10px;">
                      <label id="input_labal"><b>Email address :</b></label>
                      <input type="email"   placeholder="Email" class="form-control text" autocomplete="off" required  id="e1">
                      <span id="Email" class="font-weight-bold" style="color:greenyellow"></span>
                    </div>

                    <div class="form-group input-group-lg"  style="padding-top: 10px;">
                      <label id="input_labal"><b>Password :</b></label>
                      <input type="password"  placeholder="Password" class="form-control text" autocomplete="off" required minlength="8"  id="p1">
                      <span id="paswd" class="font-weight-bold" style="color:greenyellow"></span>
                    </div>


                </div>

                <div class="col-5" style="margin: 0 auto">
                  <div class="form-group input-group-lg" style="padding-top: 10px;">
                    <label id="input_labal"><b>Institute Name:</b></label>
                    <input type="text" id="lname" name="institutename" placeholder="Enter educational Institute name" class="form-control text" autocomplete="off" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{5,80}$">
                    <span id="lnme" class="font-weight-bold" style="color:greenyellow"></span>
                    </div>

                    <div class="form-group input-group-lg" style="padding-top: 10px;">
                      <label id="input_labal"><b>City Name:</b></label>
                      <input type="text" id="lname" name="city" placeholder="Enter educational city name" class="form-control text" autocomplete="off" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{5,30}$">
                      <span id="lnme" class="font-weight-bold" style="color:greenyellow"></span>
                      </div>

                    <div class="form-group input-group-lg" style="padding-top: 10px;">
                      <label id="input_labal"><b>Confirm Email :</b></label>
                      <input type="text" name="email" placeholder="Confirm Email" name="cem" class="form-control text" autocomplete="off" required id="e2">
                      <span id="emsg" class="font-weight-bold" style="color:greenyellow"></span>
                    </div>

                    <div class="form-group input-group-lg" style="padding-top: 10px;">
                      <label id="input_labal"><b>Confirm Password :</b></label>
                      <input type="password" name="pass"  placeholder="Confirm Password" class="form-control text" autocomplete="off" required minlength="8"  id="p2" >
                      <span id="pmsg" class="font-weight-bold" style="color:greenyellow"></span>
                    </div>

                </div>






                <div class="form-group" id="cp" >
                  <br>
                  <input type="submit"  value="Create Profile" class="" id="create_profile_btn" name="cp"  onclick="return fn();">


                      <label id="exuser"><b>All ready have an Account:</b>
                        <a href="login.php" class="text-light small">  Click Here </a>

                      </label>
                </div>
              </div><br>
            </form>
         </div>
  </div>


  </body>
</html>
<script>
      function fn(){
        var E1 = document.getElementById('e1').value;
        var E2 = document.getElementById('e2').value;

        var P1 = document.getElementById('p1').value;
        var P2 = document.getElementById('p2').value;

        var m1 = document.getElementById('emsg');
        var m2 = document.getElementById('pmsg');



        if (E1!=E2) {
          m1.innerHTML ="Email are not matched!... ";
          return false;
        }

        if (P1!=P2) {
        m2.innerHTML = "Password are not matched!...";
        return false;
      }


      }

  </script>
