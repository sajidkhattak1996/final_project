<?php
if (isset($_GET['id'])) {
  $id=$_GET['id'];
  include('../../db_connection.php');
  $r=mysqli_fetch_assoc(mysqli_query($con ,"SELECT `T_id`, `Name`, `Contact_no`, `Cnic`, `Institute_name`, `Country`, `City`, `Email`, `Password`, `security_question`, `question_answer` FROM `teacher` WHERE T_id='".$_GET['id']."'"));

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

function fn_show(){
  var p=document.getElementById("pass");
  if (p.type=='password') {
    p.type='text';
  }else {
    p.type='password';
  }
}
</script>

<div class="container" id="c">
  <button type="button" onclick="goBack()" class="mt-2 ml-lg-4 btn btn-warning " name="button"><i class="fas fa-arrow-left"></i>  Back</button>
  <form action="" method="post">
  <div class="row container-fluid justify-content-center mt-2  py-5 " style="border:solid 2px #13bca4;border-radius: 80px/440px">
    <div class="row container-fluid">
      <div class="col-lg-3"> <label class="font-weight-bold text-danger">T_ID</label>  <input type="number" class="form-control font-weight-bold" name="id" value="<?php echo $r['T_id']; ?>" readonly>  </div>
      <div class="col-lg-3"> <label class="font-weight-bold">Teacher Name</label> <input type="text" onchange="show()" class="form-control font-weight-bold" name="name" value="<?php echo $r['Name']; ?>" required>  </div>
      <div class="col-lg-3"> <label class="font-weight-bold">Email</label> <input type="email" onchange="show()" class="form-control font-weight-bold" name="email" value="<?php echo $r['Email']; ?>" required>  </div>
      <div class="col-lg-3"> <label class="font-weight-bold">Password</label> <input type="password" onchange="show()" id="pass" class="form-control font-weight-bold" name="password" value="<?php echo $r['Password']; ?>" required>  <i class="fas fa-eye-slash float-right btn btm-sm" onclick="fn_show()"></i> </div>
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
      <div class="row container-fluid mt-4 ml-0">
          <div class="col-lg-6"> <label class="font-weight-bold">Contact NO</label>   <input type="number" class="form-control font-weight-bold" onchange="show()" name="contact_no" value="<?php echo $r['Contact_no']; ?>" required>  </div>
          <div class="col-lg-6"> <label class="font-weight-bold">CNIC NO</label>   <input type="number" class="form-control font-weight-bold" onchange="show()" name="cnic_no" value="<?php echo $r['Cnic']; ?>" required>  </div>
      </div>

      <div class="row container-fluid mt-4 ml-0">
        <div class="col-lg-4"> <label class="font-weight-bold">Institute Name</label>   <input type="text" class="form-control font-weight-bold" onchange="show()" name="institute_name" value="<?php echo $r['Institute_name']; ?>" required>  </div>
        <div class="col-lg-4"> <label class="font-weight-bold">Country</label>   <input type="text" class="form-control font-weight-bold" onchange="show()" name="Country" value="<?php echo $r['Country']; ?>" required>  </div>
          <div class="col-lg-4"> <label class="font-weight-bold">City</label>   <input type="text" class="form-control font-weight-bold" onchange="show()" name="City" value="<?php echo $r['City']; ?>" required>  </div>
      </div>




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
  $e=mysqli_query($con ,"UPDATE `teacher` SET `Name`='".$_POST['name']."',`Contact_no`='".$_POST['contact_no']."',`Cnic`='".$_POST['cnic_no']."',`Institute_name`='".$_POST['institute_name']."',`Country`='".$_POST['Country']."',`City`='".$_POST['City']."',`Email`='".$_POST['email']."',`Password`='".$_POST['password']."',`security_question`='".$_POST['security_question']."',`question_answer`='".$_POST['answer']."' WHERE T_id='".$_POST['id']."'");
if ($e) {
  ?><script> alert('Record Successfully Updated.'); location.assign('teacher_view.php?id=<?php echo $_POST['id']; ?>'); </script><?php
}else {
  echo "<script>   alert('Record  Update Failed! try again.'); </script>";

}

}

?>
<div class="container-fluid alert-info pb-3">
  <div class="alert alert-primary text-center font-weight-bold">
    Classes Created By Teacher
  </div>
  <table class="table table-sm table-straped table-bordered table-hover">
    <thead class="bg-primary">
      <tr>
        <th>Class ID</th>
        <th>Name</th>
        <th>Enrollment Key</th>
        <th>Class Session</th>
        <th>Start Date</th>
        <th>Expire Date</th>
        <th>T_ID</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $q=mysqli_query($con ,"SELECT `Class_id`, `Name`, `Enrollment_key`, `Class_session`, `Start_date`, `currenttime`, `Expire_date`, `T_id` FROM `class` WHERE T_id='$id'");
        if (mysqli_num_rows($q)>0) {
          while ($r=mysqli_fetch_assoc($q)) {
            ?>
            <tr>
              <td><?php echo $r['Class_id'];  ?></td>
              <td><?php echo $r['Name'];  ?></td>
              <td><?php echo $r['Enrollment_key'];  ?></td>
              <td><?php echo $r['Class_session'];  ?></td>
              <td><?php echo $r['Start_date'];  ?></td>
              <td><?php echo $r['Expire_date'];  ?></td>
              <td><?php echo $r['T_id'];  ?></td>
            </tr>
            <?php
          }

        }else {
          ?><tr>
            <td colspan="7">No Class are Created</td>
          </tr> <?php
        }
      ?>

    </tbody>
  </table>
</div>

<div class="container-fluid alert-info pb-3">
  <div class="alert alert-primary text-center font-weight-bold">
    Slides Uploaded  By Teacher
  </div>
  <style media="screen">
    /* table top head css */
          #bb{
            background-image: -webkit-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
            background-image: -moz-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
            background-image: -o-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
            background-image: linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
            color: blue;
            border-left: solid 1px rgba(172,239,224,0.66);
            border-top: solid 1px rgba(172,239,224,0.66);
            border-right: solid 1px rgba(172,239,224,0.66);

            border-radius: 7px 7px 0px 0px;
          }
  </style>

            <div style="margin-top:10px;">
                  <table id="example6" class="table table-straped table-hover table-bordered table-sm">
                        <thead id="bb">
                            <tr>
                              <!-- <th>ID</th> -->
                              <th>Description</th>
                              <th>Date</th>
                              <th>Download File</th>
                              <!-- <th>Class ID</th> -->
                              <!-- <th>Delete</th> -->
                            </tr>
                        </thead>
                        <tbody style="background: #ECF4F6">
                          <?php
                                      $q="SELECT * FROM `slide` INNER JOIN class ON class.Class_id=slide.Class_id WHERE class.T_id='$id'";
                                      $ros=mysqli_query($con,$q);
                                      if (mysqli_num_rows($ros)>0) {
                                        while($row=mysqli_fetch_array($ros))
                                        {
                                          echo '<tr>';
                                          // echo '<td>' . $row['id'].'</td>';
                                          echo '<td>' . $row['topic'].'</td>';
                                          echo '<td>' .$row['c_date'].'</td>';
                                          echo "<td><a title='Click here to download in file.' href='../../teacher_table/slide_download.php?id={$row['file']}'>{$row['file']} </a></td>";
                                          // echo '<td>' . $row['Class_id'].'</td>';
                                         ?>
                                         <!-- <td> -->
                                        <!-- <a href="slide_deleteById.php?id=<?php //echo $row['id'] ?>&imageurl=<?php //echo $row['file'] ?>&tid=<?php// echo $id; ?>" id="dd">
                                        <button class="btn btn-danger" title="Click here to erase file."> Delete </button>
                                        </a> -->
                                        <!-- </td> -->
                                        <?php
                                        echo '</tr>';

                                        }
                                      }else { ?>
                                          <tr>
                                              <td colspan="4" class="text-center alert alert-warning">No Slides or Cource Topics are Uploaded.</td>
                                          </tr>
                                      <?php  }


                                ?>
                                <tr>
                                    <td colspan="4" class="alert alert-warning text-center"> <b>Below are Links to download notes or cource Data. </b> </td>
                                </tr>
                                <!-- the below are written for the links   -->
                                <?php

                                        $query_link="SELECT * FROM `links` INNER JOIN class ON class.Class_id=links.Class_id WHERE class.T_id='$id'";
                                        $exe_link=mysqli_query($con,$query_link);
                                        if (mysqli_num_rows($exe_link)>0) {

                                          while ($row_link=mysqli_fetch_assoc($exe_link)) {
                                            echo "<tr>";
                                            echo "<td>".$row_link['description']."</td>";
                                            echo "<td>".$row_link['ldate']."</td>";
                                            echo "<td><a href='".$row_link['link']."'> click me to view  </a></td>";
                                            ?>
                                            <!-- <td>
                                              <a href="delete_link_code.php?id=<?php// echo $row_link['L_id']; ?>" id="dd">
                                                <button class="btn btn-danger" title="Click here to erase file."> Delete </button> </a>
                                              </td> -->
                                              <?php
                                              echo "</tr>";
                                            }
                                        }else { ?>
                                            <tr>
                                                <td colspan="3" class="text-center alert alert-warning">No Links are Uploaded for Class Slides or Cource topic.</td>
                                            </tr>
                                        <?php   }
                                        mysqli_close($con);
                                 ?>


                        </tbody>
                  </table>
            </div>
</div>


  <?php



}else {
  echo "<script> window.location.href='index.php'; </script>";
}
 ?>
