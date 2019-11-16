<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>student create profile </title>
    <link   rel="stylesheet"   href="css_create_account.css" >
	<link rel="stylesheet" href="forms/css/bootstrap.css">


 </head>
  <body>
<?php include "index.php";  ?>
  <div class="student_account">
    	<div class="form-a"  >
          <form class="col-12"  onsubmit="fn()" action="www.google.com">
              <div id="top_head" ><center><b>Create Account</b></center><br></div>
              <div class="row" id="insidediv">

              <div class="col-5" style="margin: 0 auto">
                    <div class="form-group input-group-lg">
                      <label id="input_labal"><b>Class ID :</b></label>
                      <input type="text" id="std" placeholder="Enter Class ID" class="form-control text" autocomplete="off" required pattern="\d+" title="Please enter only pasitive numbers" minlength="1">
                      <span id="sttd" class="font-weight-bold" style="color:greenyellow"></span>
                      </div>
              </div>

              <div class="col-5" style="margin: 0 auto">
                    <div class="form-group input-group-lg">
                    <label id="input_labal"><b>Enrollment Key :</b></label>
                    <input type="text" id="enroll" placeholder="Enter Enrollment Key" class="form-control text " autocomplete="off" required minlength="3">
                    <span id="enr" class="font-weight-bold" style="color:greenyellow"></span>
                    </div>
              </div>

              <div class="col-10 text-light" style="margin-left: 50px; word-spacing: 5px;letter-spacing:2px;">
                       <b id="userinfo">User Information</b><br>
              </div>


              <div class="col-5" style="margin: 0 auto;">
                <div class="form-group input-group-lg" style="padding-top: 10px;">
                  <label id="input_labal"><b>First Name :</b></label>
                  <input type="text" id="fname" placeholder="First name" class="form-control text" autocomplete="off" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{1,20}$" title="First Name must be start with Alphabit " minlength="3" maxlength="20">
                  <span id="fnme" class="font-weight-bold" style="color:greenyellow" ></span>
                  </div>

                  <div class="form-group input-group-lg"  style="padding-top: 10px;">
                    <label id="input_labal"><b>Email address :</b></label>
                    <input type="email"  placeholder="Email" class="form-control text" autocomplete="off" required  id="e1">
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
                  <label id="input_labal"><b>Last Name :</b></label>
                  <input type="text" id="lname" placeholder="Last name" class="form-control text" autocomplete="off" required>
                  <span id="lnme" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>

                  <div class="form-group input-group-lg" style="padding-top: 10px;">
                    <label id="input_labal"><b>Confirm Email :</b></label>
                    <input type="text" placeholder="Confirm Email" class="form-control text" autocomplete="off" required id="e2">
                    <span id="emsg" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>

                  <div class="form-group input-group-lg" style="padding-top: 10px;">
                    <label id="input_labal"><b>Confirm Password :</b></label>
                    <input type="password"  placeholder="Confirm Password" class="form-control text" autocomplete="off" required minlength="8"  id="p2" >
                    <span id="pmsg" class="font-weight-bold" style="color:greenyellow"></span>
                  </div>

              </div>
              <div class="form-group" id="cp" >
                <br>
                <input type="submit"  value="Create Profile" class="" id="create_profile_btn"  onclick="return fn();">


                    <label id="exuser"><b>All ready have an Account:</b>
                      <a href="login.php" class="text-light small">  Click Here </a>

                    </label>


              </div>



            </div>
             <br>

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
