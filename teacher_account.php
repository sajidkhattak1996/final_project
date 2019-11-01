<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <title>create teacher profile</title>
  </head>
  <body>
<!-- below php code include the main page here -->
        <?php include("index.html");  ?>

<!-- teacher account creation div class and it also tranparent -->
  <!-- below are the form div is transparent  -->
    <div id="t_Ac" class="Tb" >

    <div class="form-area">

       <div class="container" id="foutdiv">
          <div class="row">
            <div class="col-md-10" id="form">
              <center><b id="top">Create Account</b></center><br>
               <form action="#" onsubmit="return fun()">
                 <div class="form-group">
                   <label><b>Teacher ID :</b></label>
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
<script>
     function fun(){
       var Cid=document.getElementById('std').value;
       var Enkey=document.getElementById('enroll').value;
       var Fname=document.getElementById('fname').value;
       var Lname=document.getElementById('lname').value;
       var email=document.getElementById('EM').value;
       var conemail=document.getElementById('CEM').value;
       var pwd=document.getElementById('pass').value;
       var conpwd=document.getElementById('conpass').value;
       if(Cid==""){
         document.getElementById('sttd').innerHTML="** Please enter class ID";
         return false;
       }
       if(Enkey==""){
         document.getElementById('enr').innerHTML="** Please enter Enrollment key";
         return false;
       }
       if(Fname==""){
         document.getElementById('fnme').innerHTML="** Please fill the First name field";
         return false;
       }
       if((Fname.length<=2)|| (Fname.length>20)){
         document.getElementById('fnme').innerHTML="** Must be greater than 2 and less than 20";
         return false;
       }
       if(!isNaN(Fname)){
         document.getElementById('fnme').innerHTML="** Only characters are allowed";
         return false;
       }
       if(Lname==""){
         document.getElementById('lnme').innerHTML="** Please fill the Last name field";
         return false;
       }
       if((Lname.length<=2)|| (Lname.length>20)){
         document.getElementById('lnme').innerHTML="** Must be greater than 2 and less than 20";
         return false;
       }
       if(!isNaN(Lname)){
         document.getElementById('lnme').innerHTML="** Only characters are allowed";
         return false;
       }
       if(email==""){
         document.getElementById('Email').innerHTML="** Please fill the email field";
         return false;
       }
       if(email!=conemail){
         document.getElementById('conEmail').innerHTML="** Email dose not matching..!";
         return false;
       }
       if(pwd==""){
         document.getElementById('paswd').innerHTML ="** Please fill the password field";
         return false;
       }
       if((pwd.length<=8) || (pwd.length>20)){
         document.getElementById('paswd').innerHTML="** password must be greater than 8 character";
         return false;
       }
       if(pwd!=conpwd){
         document.getElementById('conpaswd').innerHTML ="** Password does not matching..!";
         return false;
       }
		 return false;
     }

  </script>
