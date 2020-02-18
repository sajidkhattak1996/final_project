<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>About website</title>
  </head>
  <body>
    <?php  include "nav_menu.php";  ?>
<style>

  .ab{
    font-family:arial;
    position: absolute;
    left: 50%;
    transform: translate(-50%,-500px);
    width: 100%;
    height: auto;
    box-sizing: border-box;
    background: rgba(0,166,138,1.0);
    padding: 10px;  /*it inside increase the padding */
   border-radius: 20px;
  }
  #c1{
    background: #13bca4;
    border:solid 1px #008c7e;
    border-radius: 6px;
    margin-top: 5px;
    opacity: 0.8
  }
  #r{
    margin: 0 auto;
  }
  #r2{
      margin: 0 auto;
    margin-top: 20px;
    background: #13bca4;
    border:solid 1px #008c7e;
    border-radius: 6px;
    opacity: 0.9
  }
  #abdiv{padding-top: 50px;padding-bottom: 10px}
  @media(max-width: 960px){#abdiv{padding-top: 0px;padding-bottom: 0px} .ab{margin-top: 150px}
   .ab{
      font-family:arial;
      position: absolute;
      left: 50%;
      transform: translate(-50%,-500px);
      width: 100%;
      height: auto;
      box-sizing: border-box;
      background: rgba(0,166,138,1.0);
      padding: 10px;  /*it inside increase the padding */
     border-radius: 20px;
    }}
</style>
      <div id="md">
        <div class="ab" id="abdiv">
            <h2><strong> About  </strong></h2>
            <h4><b>Welcome to the Online Class Room Management System.</b></h4>
            <div class="row" id="r">
                <div class="col-lg-6" id="c1">
                  <p><br>
                  <b>Student:</b><br>
                  Student First Create Account and Register with us.
                  </p>
                  In Class Room Management System we provide the online attendance record ,assignment ,presentation and quize record to student online and also
                  student can download there Course topic online & receive notification from his/her teachers online.

                </div>
                <div class="col-lg-6" id="c1">
                  <p><br>
                  <b>Teachers:</b><br>
                  Teacher First Create Account and Register with us and Create the Class for Students.
                  </p>
                  Teacher Can Create Classes in which students are register with them. Teacher can manage the class activity.
                  He/she perform the Class attendance record , Assignments ,Quizzes and Presentation records online. He may also privide the course online and topic slides to students online .
                  The Teacher also Inform the Students with a notification message.The Teacher also Manage and View the records of his/her Students any time online.
                </div>
            </div>
            <div class="row" id="r2">
              <div class="col-lg-6"><b>Address: University Of Peshawar , Peshawar, Pakistan</b> </div>
                <div class="col-lg-6">
                  <b>Location Map:</b>
                  <a href="https://www.google.com/maps/place/University+of+Peshawar/@34.0090525,71.4867051,17z/data=!4m12!1m6!3m5!1s0x38d92de8c4cd1d21:0x56a608fc5c4c5df6!2sUniversity+of+Peshawar!8m2!3d34.0086745!4d71.4878209!3m4!1s0x38d92de8c4cd1d21:0x56a608fc5c4c5df6!8m2!3d34.0086745!4d71.4878209"><button type="button" name="button" class="btn "><i class="fas fa-map-marker-alt" style="font-size: 16px"></i> </button></a>
                </div>
            </div>
            <div id="11">  <?php include'footer.php'; ?></div>
          </div>
        </div>
  </body>
</html>
