<?php
if (isset($_GET['sid'])) {
  include('../../db_connection.php');
  $r=mysqli_fetch_assoc(mysqli_query($con ,"SELECT `S_id`, `student_name`, `Email`, `password`, `security_question`, `question_answer` FROM `student` WHERE S_id='".$_GET['sid']."'"));

  ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<script type="text/javascript">
  function show(){
    document.getElementById("b").style.display='block';
  }
  function goBack() {
  window.history.back();
}
</script>

<div class="container" id="c">
  <button type="button" onclick="goBack()" class="mt-5 btn btn-warning " name="button"><i class="fas fa-arrow-left"></i>  Back</button>
  <form action="" method="post">
  <div class="row container-fluid justify-content-center mt-5  py-5 " style="border:solid 2px #13bca4;border-radius: 80px/440px">
    <div class="row container-fluid">
      <div class="col-lg-3"> <label class="font-weight-bold text-danger">S_ID</label>  <input type="number" class="form-control font-weight-bold" name="sid" value="<?php echo $r['S_id']; ?>" readonly>  </div>
      <div class="col-lg-3"> <label class="font-weight-bold">Student Name</label> <input type="text" onchange="show()" class="form-control font-weight-bold" name="name" value="<?php echo $r['student_name']; ?>" required>  </div>
      <div class="col-lg-3"> <label class="font-weight-bold">Email</label> <input type="email" onchange="show()" class="form-control font-weight-bold" name="email" value="<?php echo $r['Email']; ?>" required>  </div>
      <div class="col-lg-3"> <label class="font-weight-bold">Password</label> <input type="text" onchange="show()" class="form-control font-weight-bold" name="password" value="<?php echo $r['password']; ?>" required>  </div>
    </div>

    <div class="row container-fluid mt-lg-5">
      <div class="col-lg-6">
        <!--=========================================== Security question ==============================================================-->
                            <label  for="sel1" class="font-weight-bold">Security Question</label>
                            <select class="form-control " onchange="show()" name="security_question" value="me testing"  id="sel1" required title="Please select one of the security question." required>
                              <option value="<?php echo $r['security_question']; ?>"><?php echo $r['security_question']; ?></option>
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
          <!--=========================================== Security question ended ==============================================================-->
        </div>
      <div class="col-lg-6"> <label class="font-weight-bold">Answare</label> <input type="text" class="form-control font-weight-bold" onchange="show()" name="answer" value="<?php echo $r['question_answer']; ?>" required>  </div>
      <br>
      <div class="row container-fluid mt-4 ml-0" id="b" style="display:none">
          <div class="col-lg-12">
            <button type="submit" class="btn btn-outline-primary btn-responsive btn-block font-weight-bold" name="save">Submit</button>
          </div>
      </div>

  </div>
</div>
</form>
</div>

  <?php
if (isset($_POST['save'])) {
  $e=mysqli_query($con ,"UPDATE `student` SET `student_name`='".$_POST['name']."',`Email`='".$_POST['email']."',`password`='".$_POST['password']."',`security_question`='".$_POST['security_question']."',`question_answer`='".$_POST['answer']."' WHERE S_id='".$_POST['sid']."'");
if ($e) {
  ?><script> alert('Record Successfully Updated.'); location.assign('student_edit.php?sid=<?php echo $_POST['sid']; ?>'); </script><?php
}else {
  echo "<script>   alert('Record  Update Failed! try again.'); </script>";

}

}


}else {
  echo "<script> window.location.href='index.php'; </script>";
}
 ?>
