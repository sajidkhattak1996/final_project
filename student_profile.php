<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="refresh" content="1">
    <meta charset="utf-8">
    <title></title>

    <!-- <link rel="stylesheet" href="forms/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css_create_account.css" -->
  <?php  include "index.html" ?>
  </head>
  <body>


    <!-- below are the form div is transparent  -->
     <div id="std_Acc" class="Tb" >

     <div class="form-areaa">

        <div class="container" id="foutdiv">
          <div class="row">
            <div class="col-md-10" id="form">
              <center><b id="top">Create Account</b></center><br>
               <form action="#" onsubmit="return fun()">
                 <div class="form-group">
                   <label><b>Class ID :</b></label>
                   <input type="number" id="std" placeholder="Enter Class ID" class="form-control text" autocomplete="off">
                   <span id="sttd" class="font-weight-bold" style="color:greenyellow"></span>
                   </div>
                   <div class="form-group">
                     <label><b>Enrollment Key :</b></label>
                     <input type="text" id="enroll" placeholder="Enter Enrollment Key" class="form-control text" autocomplete="off">
                     <span id="enr" class="font-weight-bold" style="color:greenyellow"></span>
                     </div>
                     <div class="form-group">
                       <b id="ftn">User Information</b><br>
                       <label><b>First Name :</b></label>
                       <input type="text" id="fname" placeholder="First name" class="form-control text" autocomplete="off" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="First Name must be start with Alphabit ">
                       <span id="fnme" class="font-weight-bold" style="color:greenyellow" ></span>
                       </div>
                     <div class="form-group">
                       <label><b>Last Name :</b></label>
                       <input type="text" id="lname" placeholder="Last name" class="form-control text" autocomplete="off">
                       <span id="lnme" class="font-weight-bold" style="color:greenyellow"></span>
                       </div>
                     <div class="form-group">
                       <label><b>Email address :</b></label>
                       <input type="email" id="EM" placeholder="Email" class="form-control text" autocomplete="off">
                       <span id="Email" class="font-weight-bold" style="color:greenyellow"></span>
                     </div>
                     <div class="form-group">
                       <label><b>Confirm Email :</b></label>
                       <input type="text" id="CEM" placeholder="Confirm Email" class="form-control text" autocomplete="off">
                       <span id="conEmail" class="font-weight-bold" style="color:greenyellow"></span>
                     </div>
                     <div class="form-group">
                       <label><b>Password :</b></label>
                       <input type="password" id="pass" placeholder="Password" class="form-control text" autocomplete="off">
                       <span id="paswd" class="font-weight-bold" style="color:greenyellow"></span>
                     </div>
                     <div class="form-group">
                       <label><b>Confirm Password :</b></label>
                       <input type="password" id="conpass" placeholder="Confirm Password" class="form-control text" autocomplete="off">
                       <span id="conpaswd" class="font-weight-bold" style="color:greenyellow"></span>
                     </div>
                     <div class="form-group ">
                       <input type="submit"  value="Create Profile" class="btn" id="create_profile_B">

                     </div>
               </form>
            </div>
          </div>
       </div>
    </div>
    </div>



  </body>
</html>