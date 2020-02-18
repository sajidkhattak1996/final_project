<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>About website</title>
<link rel="stylesheet" href="css_login.css">
  </head>
  <body>
    <?php  include "nav_menu.php";  ?>
<style>


</style>
      <div id="md">
        <div class="ab" id="abdiv">

              <!--transparent form for the login of the Account -->
          <div class="col-xl " id="outdiv_login" >
                  <form class="login_inputdiv" action="" method="post">
                    <h2 class="text-center" id="login_heading"><b>Recover Your Account Password</b></h2>

                    <div class=" col-sm " style="padding-left: 23%;border-left:solid 2px #fff;border-right:solid 2px #fff;border-bottom:solid 2px #fff;border-radius: 8px">
                      <label><b>Email Address</b></label>
                      <input type="email" class="form-control w-75 py-4 justify-content-center font-weight-bold" name="lgemail" value="<?php if(isset($_POST['recover_pass'])){ echo $_POST['lgemail']; } ?>" placeholder="Email:" required>
                        <label  class="font-weight-bold text-warning" id="emsg"> </label><br>

                        <div class="row ml-2">
                          <label class="radio-inline">
                             <input type="radio" name="ac" class="pl-2 " value="student" required title="Please Select One of the Account Type"> Student
                           </label>
                           <label class="radio-inline ml-5" >
                             <input type="radio" name="ac" class="" value="teacher" required title="Please Select One of the Account Type">Teacher
                           </label>
                        </div>

                      <label class="pt-3" for="sel1"><b>Select  Security  Qustion </b></label><br>
                      <select name="select_question" class="form-control-lg w-75 text font-weight-normal"   id="sel1" required >
                        <option value="">Select Your Security Question</option>
                          <option value="What is Your Childhood School name?">What is Your Childhood School name?</option>
                          <option value="What Is your favorite book?">What Is your favorite book?</option>
                          <option value="What is the name of the road you grew up on?">What is the name of the road you grew up on?</option>
                          <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                          <option value="What was the first company that you worked for?">What was the first company that you worked for?</option>
                          <option value="Where did you go to high school/college?">Where did you go to high school/college?</option>
                          <option value="What is your favorite food?">What is your favorite food?</option>
                          <option value="What city were you born in?">What city were you born in?</option>
                          <option value="Where is your favorite place to vacation?">Where is your favorite place to vacation?</option>
                          <option value="What is your Childhood friend name?">What is your Childhood friend name?</option>
                          <option value="What is your bestfriend name?">What is your bestfriend name?</option>
                      </select>
                      <br>
                      <label class="text-warning font-weight-bold" id="qmsg"></label>

                      <br>
                      <label><b>Enter Your Answer</b></label>
                      <input type="text" name="q_answer"  placeholder="Enter the Answer of Your Security Question" class="form-control w-75 py-4 font-weight-bold" autocomplete="off"  maxlength="30" required>
                      <label class="font-weight-bold text-warning" id="amsg"> </label><br>

                      <style media="screen">
                        @media (max-width: 257px) {   #recover_pass{ width: 80%;height: 20px;font-size: 10px}  }
                      </style>
                      <input type="submit" class="btn btn-lg xl-w-25 mt-4" value="Recover Password" name="recover_pass" id="recover_pass">

                      <div class="pp pt-4" >
                          <p>Click for Log in ?    <a href="login.php"> Click here</a></p>
                          <p  style="font-size: 1.0em">
                            <b> Note: </b>
                            Please Select & Enter Your Right Question and Answer to Recover the Password.
                         </p>
                      </div>
                    </div>
                  </form>
          </div>
          <?php  include('footer.php');  ?>
          </div>
        </div>
        <?php
          include('db_connection.php');
          if (isset($_POST['recover_pass'])) {
            // echo "<script> alert('recover_pass are press '); </script>";
            if ($con) {
              $email=$_POST['lgemail'];
              $question=$_POST['select_question'];
              $answer=$_POST['q_answer'];
              $account=$_POST['ac'];

              if ($account=="student") {
                $e=mysqli_query($con ,"SELECT S_id,Email , security_question,question_answer FROM student WHERE Email='$email' AND security_question='$question' AND question_answer='$answer'");
                $status=mysqli_num_rows($e);
                if ($status==1) {
                  $r=mysqli_fetch_array($e);
                  /// href
                  ?><script> window.location.href="p_set.php?i=<?php echo $r[0]; ?>&q=<?php echo $question; ?>&ac=<?php echo $account; ?>" </script> <?php
                }else {
                  $status_email=mysqli_num_rows(mysqli_query($con ,"SELECT Email FROM student WHERE Email='$email'"));
                  if ($status_email==1) {
                    $sql=mysqli_query($con ,"SELECT Email , security_question,question_answer FROM student WHERE Email='$email' AND security_question='$question' AND question_answer='$answer'");
                    $status=mysqli_num_rows($sql);
                    if ($status==1) {  /// href
                      $r=mysqli_fetch_array($status);
                        ?><script> window.location.href="p_set.php?i=<?php echo $r[0]; ?>&q=<?php echo $question; ?>&ac=<?php echo $account; ?>" </script> <?php
                    }else {
                        // echo "Wrong Security question is selected or Wrong Answer.";
                        ?><script type="text/javascript">
                              var m=document.getElementById('amsg'); m.innerHTML='Wrong Security Question is selected? or Wrong Answer!.';
                              function c(){ m.innerHTML=''; }  setTimeout(c ,8000);
                        </script>
                        <?php
                    }
                  }else {
                    // echo "Email is Wrong!...";
                    ?><script type="text/javascript">
                          var m=document.getElementById('emsg'); m.innerHTML='Email is Wrong!...';
                          function c(){ m.innerHTML=''; }  setTimeout(c ,8000);
                    </script>
                    <?php
                  }
                }
            }else {   //teacher account checking
                      $q=mysqli_query($con ,"SELECT T_id,Email FROM teacher WHERE Email='$email' AND security_question='$question' AND question_answer='$answer'");
                    if (mysqli_num_rows($q)==1)
                    {/// href
                      $r=mysqli_fetch_array($q);
                      ?><script> window.location.href="p_set.php?i=<?php echo $r[0]; ?>&q=<?php echo $question; ?>&ac=<?php echo $account; ?>" </script> <?php
                    }else {
                      if (mysqli_num_rows(mysqli_query($con ,"SELECT Email FROM teacher WHERE Email='$email'"))==1)
                      {
                        $q2=mysqli_query($con ,"SELECT T_id,Email FROM teacher WHERE Email='$email' AND security_question='$question' AND question_answer='$answer'");
                        if (mysqli_num_rows($q2)==1)
                        {/// href
                          $r=mysqli_fetch_array($q2);
                          ?><script> window.location.href="p_set.php?i=<?php echo $r[0]; ?>&q=<?php echo $question; ?>&ac=<?php echo $account; ?>" </script> <?php
                        }else {
                          // echo "Wrong Security question is selected or Wrong Answer.";
                          ?><script type="text/javascript">
                                var m=document.getElementById('amsg'); m.innerHTML='Wrong Security Question is selected? or Wrong Answer!.';
                                function c(){ m.innerHTML=''; }  setTimeout(c ,8000);
                          </script>
                          <?php
                        }
                      }else {
                        // echo "Email is Wrong! ";
                        ?><script type="text/javascript">
                              var m=document.getElementById('emsg'); m.innerHTML='Email is Wrong!...';
                              function c(){ m.innerHTML=''; }  setTimeout(c ,8000);
                        </script>
                        <?php
                      }
                    }
            }


            }else {
              echo "<script> alert('Problem In the Database Connection Please try Again!.'); </script>";

            }
          }

         ?>
  </body>
</html>
