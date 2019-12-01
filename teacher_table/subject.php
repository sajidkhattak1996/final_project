<?php
  include('top_info.php');
  if (isset($_SESSION['email']) && isset($_SESSION['pass'])) { ?>
    <!DOCTYPE html>
      <html lang="en" dir="ltr">
        <head>
<link rel="stylesheet" href="../datatables-bs4/css/dataTables.bootstrap4.css">
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="description" content="">

          <title>welcome to webside as a teacher  </title>

          </head>
      <body>

      <!-- below area and button such classes helps etc -->
      <div class="bttn" style="background: #008c7e;">
          <form method="post">
                <ul>
                       <button type="submit" name="all_class" class="btn btn-outline-light btn-lg bg-light text-dark">         All Classes           </button>
                       <button type="submit" name="create_class"  class="btn btn-outline-light btn-lg">    Create New Class     </button>
                      <button type="submit" name="help"  class="btn btn-outline-light btn-lg">        Helps               </button>

                </ul>
            </form>         <?php
                                  // php code for all_class button
                                  if (isset($_POST['all_class'])) {
                                    unset($_SESSION['class_id']);
                                    unset($_SESSION['subject_id']);
                                    echo "<script> window.location.href='tmain_table.php'; </script>";
                                  }
                                  // php code for create class buttons
                                  if (isset($_POST['create_class'])) {
                                    unset($_SESSION['class_id']);
                                    unset($_SESSION['subject_id']);
                                    echo "<script> window.location.href='create_class.php'; </script>";
                                  }
                                  // php code for help button
                                  if (isset($_POST['help'])) {
                                    unset($_SESSION['class_id']);
                                    unset($_SESSION['subject_id']);
                                    echo "<script> window.location.href='helps.php'; </script>";
                                  }
                            ?>
        </div>
      <!--above button container are ended -->
      <?php
          include('db_connection.php');
          if (isset($con)) {
            $cid=$_SESSION['class_id'];
            $stmt_class_name ="SELECT Name FROM class WHERE Class_id = '$cid'";
            $exe_stmt_class_name=mysqli_query($con ,$stmt_class_name);
            $r1=mysqli_fetch_array($exe_stmt_class_name);

            $sid=$_SESSION['subject_id'];
            $stmt_subject_name="SELECT subject_name FROM subject WHERE Subject_id='$sid'";
            $exe_stmt_subject_name=mysqli_query($con ,$stmt_subject_name);
            $r2=mysqli_fetch_array($exe_stmt_subject_name);

            ?>
      <div class="about_area" >
          <div class="viewing_area">
            <h5>NOW VIEWING :>
              <strong>
              <a href="tmain_table.php" style="color: black"> All  Classes &nbsp; </a>:>  &nbsp;&nbsp;
              <a href="" style="color: blue"> <?php echo $r1['Name'];  ?>  </a>
            </h5>

            <h5 style="padding-top: 10px;">Subject Name :>&nbsp;&nbsp; <span href="" style="color: deeppink;font-weight: bolder;letter-spacing: 0.8px"><?php echo $r2['subject_name'];  ?> </span></h5>
          </div>
      </div>
          <?php
          }else {
            echo "problem in the database connection!.... try againg";
          }
       ?>


  <div class="container-fluid" id="table_maindiv" >
            <div id="expire_class" style="display: block;">
                <div class="tstart" style="padding-top:5px;margin-top: 20px;padding-bottom: 2px">
                      <h2 class="text-left">&nbsp;Institute Name: <?php echo $_SESSION['institute']; ?> </h2>
                        <div class="">
                                  <form class="" action="" method="post">
                                          <table class="table">
                                                        <tr>
                                                              <th scope="col">Class Student</th>
                                                              <th scope="col">Attendence</th>
                                                              <th scope="col">Assignment</th>
                                                              <th scope="col">Presentation</th>
                                                              <th scope="col">Quizes</th>
                                                        </tr>
                                                  <tbody>
                                                        <tr>
                                                              <td scope="col"><button class="btn btn-primary btn-lg" name="btn_all_std">&nbsp;&nbsp;    Click   &nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open"></span> </button>   </td>
                                                              <td scope="col"><button class="btn btn-success btn-lg" name="btn_attendence">&nbsp; ADD  &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plus"></span> </button></td>
                                                              <td scope="col"><button class="btn btn-success btn-lg" name="btn_assignment">&nbsp; ADD  &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plus"></span>  </button></td>
                                                              <td scope="col"><button class="btn btn-success btn-lg" name="btn_presentation">&nbsp; ADD  &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plus"></span>  </button></td>
                                                              <td scope="col"><button class="btn btn-success btn-lg" name="btn_quize"> &nbsp; ADD  &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plus"></span> </button></td>
                                                        </tr>
                                                </tbody>
                                        </table>
                                  </form>
                        </div>
                    </div>
              </div>
  </div>
<!-- ended   -->
<?php
      if (isset($_POST['btn_all_std'])) { echo "<script> window.location.href='subject.php'; </script>"; }
      if (isset($_POST['btn_attendence'])) { echo "<script> window.location.href='attendence.php'; </script>"; }
      if (isset($_POST['btn_assignment'])) { echo "<script> window.location.href=''; </script>"; }
      if (isset($_POST['btn_presentation'])) { echo "<script> window.location.href=''; </script>"; }
      if (isset($_POST['btn_quize'])) { echo "<script> window.location.href=''; </script>"; }

 ?>


<!-- started -->
<span id="spn"></span>
<!-- below table which display the student record which are enroll in the this class which are clicked    -->
<div class="container-fluid">
  <!-- <div class="tend"  style="border-radius: 10px 10px 0px 0px"><it the div give the above beautiful style to the table top ></div> -->


  <table id="example1" class="table table-striped table-bordered table-hover table-xl table-light" >

            <thead class="bg-info">
                <tr>
                      <!-- <th scope="col" scope="row">Student ID</th> -->
                      <th scope="col">Reg No</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                </tr>
            </thead>
              <tbody>
                <?php
                    $cid=$_SESSION['class_id'];
                    $stmt_register="SELECT register.S_id , register.Reg_no , student.student_name ,student.Email FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' ORDER BY register.Reg_no";

                    $exe=mysqli_query($con,$stmt_register);
                    $a=0;
                    while ($row=mysqli_fetch_assoc($exe)) { $a++;
                     ?>
                <tr>
<!-- <td > <input style="background: none;border: none;" readonly type="text"  id="sid<?php echo $a;?>" value="">  </td> -->
<td><input style="background: none;border: none" type="text" onkeyup="update('<?php echo $a;?>','<?php echo $row['S_id']; ?>');" id="xyz<?php echo $a;?>" value="<?php echo $row['Reg_no']; ?>">     </td>

                      <td scope="col" ><?php  echo $row['student_name']; ?> </td>
                      <td scope="col"><?php  echo $row['Email']; ?> </td>
                </tr>


                 <?php
                }
               ?>

              </tbody>
            </table>
      <div class="tend">  </div>

</div>
<!-- ended -->


<script type="text/javascript" src="js/jquery.js"></script>
<script src="../datatables/jquery.dataTables.js"></script>
<script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript">
  function update(id,id2) {

           var reg_no =$('#xyz'+id).val();
           var student_id =id2;
           // console.log(value);
           // console.log(student_id); it display the vlaue on console screen

      $.ajax({
      url:'reg_update.php',
      type:'POST',
      data:{reg_no,student_id},
      success:function(data){
      if(data=="yes"){
        // alert('Update Sucessfully');
      $('#spn').html('<small id="smid" style="color:green;margin-left:450px"><b>Update Sucessfully<b></small>');
      // setTimeout(myFn,2000);
      }
      else if(data=="no"){
      $('#spn').html('<small id="smid" style="color:red;margin-left:450px"><b>Update Failed</b></small>');
      // alert('Update Failed');
      // setTimeout(myFn,2000);
      }
      else {
      $('#spn').html('');
      }

      }
      });
      setTimeout(myFn ,2000);
  }

 function myFn(){  document.getElementById("spn").innerHTML='';}  //use th empty the msg field
</script>


<script>
  $(function () {
    $("#example1").DataTable();
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // });
  });
</script>

<?php
    }
  else {
    echo "<script> alert('Please Login first!.... '); </script>";
  }

?>
