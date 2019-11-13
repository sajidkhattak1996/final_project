<!DOCTYPE html>
<html lang="en" >
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login for account </title>
    <link   rel="stylesheet"   href="css_create_account.css" >
  <link rel="stylesheet" href="forms/css/bootstrap.css">
  <link rel="stylesheet" href="menu css and js/bootstrap 4/css/glyphicon.css">
  </head>
  <body>
    <?php  include("index.html");  ?>

    <!--below are remove from this -->



    <!--transparent form for the login of the Account -->
    <div id="log_in" class="Tb">
      <div class="login_form">
        <form class="" >

          <h1 id="login_heading"><b>Login to Class Room Management</b></h1>

          <div class="login_inputdiv">
            <h4>Email Address:</h4>
            <input type="email" name="" value="" placeholder="Email:" required>
            <br><br>
            <h4>Password:</h4>
            <input type="text" name="" value="" placeholder="Password:" required>
            <br>
            <input type="button" name="" value="Log in" id="login_btn">
            <br><br>
            <div class="pp" >
                <p>Forgot your password?  <a href=""> Click here</a></p>
                <p><b>New User ?  </b>  <a href=""> <button type="button" name="new_user_btn" onclick="return hide()" style="background:none;border:none">Click here</button> </a>  </p
                <p> <b> Pivacy Policy </b>
                  <p style="font-size: 1.0em">
                  We take your privacy very seriously.
                  We do not share your detail for marketing
                   purposes with the external companies.
                 </p>
               </p>
            </div>
          </div>


        </form>


      </div>
    </div>
    <!-- Transparent form for login are ended -->
<style>
            /* css for new user div class */
            	#new_user{
            background: rgba(0,166,138,0.7);
            		width: 40%;
                margin:0 auto;
                margin-top: -450px;
            		height: auto;
                border-radius: 12px;
            	}
              #new_user_form{
                padding-left: 20px;
              }
              #cl1{ background: none;border: none;float: right; font-size: 25px;}
              #cl1:hover{color: red;transition: 0.7s}
              #new_user_body {border: solid 1px yellow;border-radius: 12px;padding-left: 20px;width:90%;margin: 20px  25px;}
              #new_user_body ul li{ color: #fff;padding-top: 5px;padding-bottom: 5px;}
              #new_user_body ul li:hover{ color: blue;font-size: 25px}
              #cl2{background: none; border:solid 1px red;border-radius: 25px;color:yellow}
              #cl2:hover{background: red;color: #fff;transition: 0.8s}
            @media (max-width:960px){
              #new_user{
                background: rgba(0,166,138,0.7);
                width: 40%;
                margin:0 auto;
                margin-top: -300px;
                height: auto;
                border-radius: 12px;
              }
              #new_user_body {border: solid 1px yellow;border-radius: 12px;padding-left: 20px;width:80%;margin: 20px  25px;}

              #new_user_form h2,#new_user_body h2{font-size: 18px}

            }
            @media (max-width:600px){
              #new_user{
                background: rgba(0,166,138,0.7);
                width: 60%;
                margin:0 auto;
                margin-top: -300px;
                height: auto;
                border-radius: 12px;
              }
              #new_user_form h2,#new_user_body h2{font-size: 14px}

            }

            @media (max-width:300px){
              #new_user{
                background: rgba(0,166,138,0.7);
                width: 90%;
                margin:0 auto;
                margin-top: -300px;
                height: auto;
                border-radius: 12px;
              }
              #new_user_form h2,#new_user_body h2{font-size: 14px}

            }
            /* ended */
</style>
<!-- If click on  New use button then this below form are open -->
<div id="new_user" style="display:none">
    <div class="new_user_divin">
        <form class="" action="" method="post" id="new_user_form">
            <button type="submit" name="close_btn1" id="cl1" onclick="return show()">
            <span class="glyphicon glyphicon-remove"></span></button>
            <h2>Select Your Account Creation Type</h2>
        </form>
        <div id="new_user_body">
            <p> <h2>Please Select one Account Type</h2>
              <h4>
                    <ul>
                      <a href="teacher_profile.php"><li>Teacher</li></a>
                      <a href="std_acc.php"><li>Student</li></a>
                    </ul>
              </h4>
            </p>
        </div>
        <form class="" action="" method="post">
          <button type="submit" name="close_btn2" id="cl2"><b>Colse </b><span class="glyphicon glyphicon-remove" onclick="return show()"></span></button>
        </form>
    </div>
</div>
<!--ended-->
<!--java script for above div -->
<script>
  function hide(){

    document.getElementById('log_in').style.display='none';
    document.getElementById('new_user').style.display='block';
    return false;
  }
  function show(){
    document.getElementById('new_user').style.display='none';
    document.getElementById('log_in').style.display='block';
    return false;
  }

</script>

  </body>
</html>
