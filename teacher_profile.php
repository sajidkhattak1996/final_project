<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>teacher create account</title>
    <?php include('index.html'); ?>
    <link rel="stylesheet" href="teacher_create_ac.css" type="text/css">
  </head>
  <body>

    <div class="teacher_account">
        <div class="form-a"  >
            <form class="col-12"  onsubmit="fn()" action="">
                <div id="top_head" ><center><b>Create Teacher Account</b></center><br></div>
                <div class="row" id="insidediv">

                <div class="col-5" style="margin: 0 auto">
                      <div class="form-group input-group-lg">
                        <label id="input_labal"><b>Teacher Name:</b></label>
                        <input type="text" id="tname" placeholder="Enter Teacher Name:" class="form-control text" autocomplete="off" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{1,40}$" title="Name must be start with Alphabit " minlength="3" maxlength="40">
                        <span id="sttd" class="font-weight-bold" style="color:greenyellow"></span>
                        </div>
                </div>

                <div class="col-5" style="margin: 0 auto">
                      <div class="form-group input-group-lg">
                        <label id="input_labal"><b>Contact NO:</b></label>
                        <input type="text" id="thr" placeholder="Enter contact no" class="form-control text" autocomplete="off" required pattern="\d+" title="Please enter valid contact number" minlength="7" maxlength="20">
                        <span id="sttd" class="font-weight-bold" style="color:greenyellow"></span>
                        </div>
                </div>



                <div class="col-5" style="margin: 0 auto;">
                  <div class="form-group input-group-lg" style="padding-top: 10px;">
                    <label id="input_labal"><b>CNIC NO:</b></label>
                    <input type="text" id="tname" placeholder="Enter Cnic no " class="form-control text" autocomplete="off" required pattern="\d+" title="Please enter valid cnin no " minlength="13" maxlength="15">
                    <span id="fnme" class="font-weight-bold" style="color:greenyellow" ></span>
                    </div>

                    <div class="form-group input-group-lg" style="padding-top: 10px;">
                      <label id="input_labal"><b>Country Name:</b></label>
                      <input type="text" id="lname" placeholder="Enter Country name" class="form-control text" autocomplete="off" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{5,40}$" title="country name must be start from Alphabit">
                      <span id="lnme" class="font-weight-bold" style="color:greenyellow"></span>
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
                    <label id="input_labal"><b>Institute Name:</b></label>
                    <input type="text" id="lname" placeholder="Enter educational Institute name" class="form-control text" autocomplete="off" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{5,80}$">
                    <span id="lnme" class="font-weight-bold" style="color:greenyellow"></span>
                    </div>

                    <div class="form-group input-group-lg" style="padding-top: 10px;">
                      <label id="input_labal"><b>City Name:</b></label>
                      <input type="text" id="lname" placeholder="Enter educational city name" class="form-control text" autocomplete="off" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{5,30}$">
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
