<?php include "nav_menu.php";  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    .form-a{
      position: absolute;
      width: 100%;
      height: auto;
      box-sizing: border-box;
      background: rgba(0,166,138,0.9);
      padding: 10px;
      border-radius: 20px;
    }
    /* css for create profile button */
    #create_profile_btn{
      width: 30%;
      background-color: #fff;
      color: #008c7e;
      font-size: 11px;
      border: solid 1px #008c7e;
      border-radius: 8px;
    }
    #create_profile_btn:hover{
      color: #fff;
      background-color: #008c7e;
      border-color: #FFF;
    }
    @media (min-width: 960px) {    #md{  transform: translate(0%,-77%); }   }
    @media (min-width:576px) and (max-width: 959px) {    #md{  transform: translate(0%,-53%); }  }
    @media (min-width:405px) and (max-width: 575px) {    #md{  transform: translate(0%,-34%); } #create_profile_btn{ width: 35% }  }
    @media (min-width: 325px) and (max-width: 405px) {    #md{  transform: translate(0%,-33%); } #create_profile_btn{ width: 45% }  }
    @media (min-width: 258px) and (max-width: 325px) {    #md{  transform: translate(0%,-30%); }  #create_profile_btn{ width: 55% }  }
    @media (max-width: 258px) {    #md{  transform: translate(0%,-30%); } #create_profile_btn{ width: 100%}  }
  </style>

  </head>
  <body>
<div class="form-a teacher_account"   id="md" >
  <!--========= php code ============================================================================================================================================================================================================================================== -->

  <?php

    if (isset($_POST['cp'])) {
        include('db_connection.php');
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


                        <?php    }


                    }
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

    <form   onsubmit="fn()" action="" method="post">
      <div class="container-fluid">
            <div class="col-lg">
              <div class="text-center ">
                <h1>Create Teacher Account</h1>
                <span id="msg1" class="font-weight-bold" style="color:greenyellow;"></span>
              </div>
            </div>
                <div class="row "  style="margin-left: 10%" >
                  <div class="col-sm  pb-3 ">
                    <div class="">
                      <label id="input_labal"><b>Teacher Name:</b></label>
                      <input type="text" id="tname" name="tname" placeholder="Enter Teacher Name:" class="form-control py-4 w-75 text" autocomplete="off" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{1,40}$" title="Name must be start with Alphabit " minlength="3" maxlength="40">
                      <span id="sttd" class="font-weight-bold" style="color:greenyellow"></span>
                    </div>
                  </div>
                  <div class="col-sm  pb-3">
                    <label id="input_labal"><b>Contact NO:</b></label>
                    <input type="text" id="thr" name="contact" placeholder="Enter contact no" class="form-control py-4 w-75 text" autocomplete="off" required pattern="\d+" title="Please enter valid contact number" minlength="7" maxlength="20">
                    <span id="sttd" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>
                </div>

                <div class="row"  style="margin-left: 10%" >
                  <div class="col-sm  pb-3">
                    <label id="input_labal"><b>CNIC NO:</b></label>
                    <input type="text" id="tname" name="cnic" placeholder="Enter Cnic no " class="form-control py-4 w-75 text" autocomplete="off" required pattern="\d+" title="Please enter valid cnin no " minlength="13" maxlength="15">
                    <span id="fnme" class="font-weight-bold" style="color:greenyellow" ></span>
                  </div>
                  <div class="col-sm  pb-3">
                    <label id="input_labal"><b>Institute Name:</b></label>
                    <input type="text" id="lname" name="institutename" placeholder="Enter educational Institute name" class="form-control py-4 w-75 text" autocomplete="off" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{5,80}$" title="must be greater then 5 charseter.">
                    <span id="lnme" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>
                </div>
                <!-- ended row -->
                <!-- ended user row -->
                <div class="row mt-4 " style="margin-left: 10%">
                  <div class="col-sm pb-3">
                    <label id="input_labal"><b>Country Name:</b></label>
                    <input type="text" id="lname" name="countryname" placeholder="Enter Country name" class="form-control py-4 w-75 text" autocomplete="off" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{5,40}$" title="country name must be start from Alphabit">
                    <span id="lnme" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>
                  <div class="col-sm ">
                    <label id="input_labal"><b>City Name:</b></label>
                    <input type="text" id="lname" name="city" placeholder="Enter educational city name" class="form-control py-4 w-75 text" autocomplete="off" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{2,30}$">
                    <span id="lnme" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>
                </div>
                <!-- ended -->
                <div class="row mt-4"  style="margin-left: 10%">
                  <div class="col-sm pb-3 ">
                    <label id="input_labal"><b>Email address :</b></label>
                    <input type="email"   placeholder="Email" class="form-control py-4 w-75 text" autocomplete="off" required  id="e1">
                    <span id="Email" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>
                  <div class="col-sm ">
                    <label id="input_labal"><b>Confirm Email :</b></label>
                    <input type="text" name="email" placeholder="Confirm Email" name="cem" class="form-control py-4 w-75 text" autocomplete="off" required id="e2">
                    <span id="emsg" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>

                </div>

                <div class="row mt-4 pb-1" style="margin-left: 10%">
                  <div class="col-sm pb-3">
                    <label id="input_labal"><b>Password :</b></label>
                    <input type="password"  placeholder="Password" class="form-control py-4 w-75 text " autocomplete="off" required minlength="8"  id="p1">
                    <span id="paswd" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>
                  <div class="col-sm ">
                    <label id="input_labal"><b>Confirm Password :</b></label>
                    <input type="password" name="pass"  placeholder="Confirm Password" class="form-control py-4 w-75 text " autocomplete="off" required minlength="8"  id="p2" >
                    <span id="pmsg" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>
                </div>
<!--=========================================== Security question ==============================================================-->
                <div class="row mt-4 pb-3" style="margin-left: 10%">
                  <div class="col-sm form-group pb-3 ">
                    <label  for="sel1"><b>Enter  Security  Qustion </b></label>
                    <select class="form-control-lg w-75"   id="sel1">
                        <option value="">What is Your Childhood School name?</option>
                        <option value="">What Is your favorite book?</option>
                        <option value="">What is the name of the road you grew up on?</option>
                        <option value="">What is your mother's maiden name?</option>
                        <option value="">What was the first company that you worked for?</option>
                        <option value="">Where did you go to high school/college?</option>
                        <option value="">What is your favorite food?</option>
                        <option value="">What city were you born in?</option>
                        <option value="">Where is your favorite place to vacation?</option>

                    </select>
                    <br>
                    <span id="" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>
                  <div class="col-sm ">
                    <label id=""><b>Enter Answer</b></label>
                    <input type="text" name=""  placeholder=" " class="form-control py-4 w-75 text " autocomplete="off"  >
                    <span id="" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>
                </div>
  <!--=========================================== Security question ended ==============================================================-->


                <div class="col-lg pb-5" style="margin-left: 10%">
                  <input type="submit"  value="Create Profile" class="btn btn-lg py-3" id="create_profile_btn" name="cp"  onclick="return fn();">
                  <label id="exuser"><b>All ready have an Account:</b>
                    <a href="login.php" class="text-light small">  Click Here </a>
                  </label>
                </div>
      </div>
    </form>
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
