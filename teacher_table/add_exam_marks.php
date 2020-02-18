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
          <script type="text/javascript">
            function FnCheck(){
              var loop_lenght=document.getElementById("temp").value;
              var total_marks=parseInt(document.getElementById("t_marks").value);
              var status=0;
              for (var i = 1; i <=loop_lenght; i++) {
                  var obtanined_marks=parseInt(document.getElementById("ob_marks"+i).value);
                  var row=document.getElementById("r"+i);
                  var msg=document.getElementById("m2");
                  if (obtanined_marks>total_marks) {
                    status=1;
                    document.getElementById("m2").innerHTML='Obtained Marks Of Student Shoud not be Greater then the Total Marks';
                    document.getElementById("m2").style.display='block';
                    row.style.background='#f8d7da';
                    row.style.color='#721c24';
                  }else {
                    row.style.background='#cce5ff';
                    row.style.color='#004085';
                  }
              }
              if (status==1) {return false;}else {
                document.getElementById("m2").innerHTML='';
                document.getElementById("m2").style.display='none';
              }
            }

            function hide(){
              document.getElementById('m3').innerHTML='';
              document.getElementById('m3').style.display='none';
            }
            function hide2(){
              document.getElementById('m2').innerHTML='';
              document.getElementById('m2').style.display='none';
            }

          </script>
          </head>
      <body>
        <style media="screen">
            #exam{
              background-image: -webkit-linear-gradient(180deg,rgba(172,239,224,0.96) 21.76%,rgba(0,140,126,0.50) 98.45%);
              background-image: -moz-linear-gradient(180deg,rgba(172,239,224,0.96) 21.76%,rgba(0,140,126,0.50) 98.45%);
              background-image: -o-linear-gradient(180deg,rgba(172,239,224,0.96) 21.76%,rgba(0,140,126,0.50) 98.45%);
              background-image: linear-gradient(180deg,rgba(172,239,224,0.96) 21.76%,rgba(0,140,126,0.50) 98.45%);
              color: blue;
              font-weight: bolder;
              border-left: solid 1px rgba(172,239,224,0.66);
              border-top: solid 1px rgba(172,239,224,0.66);
              border-right: solid 1px rgba(172,239,224,0.66);
            }
        </style>


<!--==================== we are including the subject top menu here ===========================-->
<?php  include('classes_subject_top_menu.php');  ?>
<!--================================== ended ====================================================-->

<!-- below table which display the student record which are enroll in the this class which are clicked    -->
<div class="container-fluid ">
  <!-- <div class="tend"  style="border-radius: 10px 10px 0px 0px"><it the div give the above beautiful style to the table top ></div> -->
<form class="" action="#" method="post" onsubmit="return FnCheck()">
    <div class="row mb-4">
      <div class="col-lg-3 col-sm">
        <label>Exam Term</label>
        <input type="text" name="exam_term" class="form-control font-weight-bold" value="Final Term"  required>
      </div>
      <div class="col-lg-3 col-sm">
        <label>Your Subject</label>
        <input type="text" name="exam_subject" class="form-control font-weight-bold " style="background: #cce5ff;color: deeppink;border-color: #b8daff;"  value="<?php echo $r2['subject_name'];  ?>" readonly >
      </div>
      <div class="col-lg-3 col-sm">
        <label>Date</label>
        <input type="date" name="exam_date" class="form-control font-weight-bold" value="<?php echo date("Y-m-d");  ?>" required>
      </div>
      <div class="col-lg-3 col-sm">
        <label>Total Marks</label>
        <input type="number" name="total_marks" id="t_marks" class="form-control font-weight-bold" placeholder="Enter Total Marks of Subject" title="Enter Total Marks of You'r Subject." min="1" max="5000" placeholder="marks" required >

      </div>
    </div>


<table id="example1" class="table table-striped table-bordered table-hover table-xl table-light table-responsive-sm" >
  <span id="spn"></span>
  <div id="m2" class="alert alert-danger text-center" style="display:none"></div>
  <div id="m3" class="alert alert-primary text-center" style="display:none"></div>


  <a href="subject.php"><button type="button" name="button" class="btn btn-outline-primary float-right">Edit Class no First</button></a>
          <thead class="bg-info">
              <tr>
                    <th scope="col">Class No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Obtained Marks</th>
              </tr>
          </thead>
            <tbody>
              <?php
                  $cid==0;
                  if (isset($_SESSION['class_id'])) {
                    $cid=$_SESSION['class_id'];
                  }
                  if (isset($_GET['cid'])) {
                    $cid=$_GET['cid'];
                  }

                  $stmt_register="SELECT register.S_id , register.Reg_no , student.student_name ,student.Email FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' ORDER BY register.Reg_no";

                  $a=0;
                  $exe=mysqli_query($con,$stmt_register);
                  $no_row=mysqli_num_rows($exe);
                  if ($no_row>0) {
                    while ($row=mysqli_fetch_assoc($exe)) { $a++;
                     ?>
                <tr id="r<?php echo $a; ?>">
                     <td> <?php echo $row['Reg_no']; ?>  </td>
                      <td scope="col" ><?php  echo $row['student_name']; ?> </td>

                      <td>
                        <input type="text" name="student_id<?php echo $a; ?>" value="<?php echo $row['S_id']; ?>" style="display:none">
                        <input type="number" name="ob_marks<?php echo $a; ?>" id="ob_marks<?php echo $a; ?>"  value=""  title="please Enter the Student Obtained Marks" min="0" max="" required style="background: lightblue;border: solid 1px #008c7e;border-radius:5px">
                      </td>
                </tr>

                 <?php
                }
                  }else {
                    ?>
                    <tr>
                        <td colspan="3" class="alert alert-warning text-center">Sorry No Student are Register with this Class.</td>
                    </tr>
                    <?php
                  }
             ?>

            </tbody>
          </table>
          <div class="row  justify-content-end mb-2">
            <?php
                if ($no_row==0) {
                }else {?>
                  <input type="text" name="temp" id="temp" value="<?php echo $a; ?>" style="display:none">
                  <button type="submit" name="save" class="btn btn-primary btn-lg w-25 mr-4" >Submit</button>
                <?php }
            ?>
          </div>


      <div class="tend">  </div>
    </form>

</div>
<!-- ended -->
<!--================================php code for above exam detail form===========================-->
<?php
include('../db_connection.php');
  if (isset($_POST['save'])) {
    date_default_timezone_set("Asia/Karachi");

    $loop_length=$_POST['temp'];
    $exam_term=$_POST['exam_term'];
    $exam_date=$_POST['exam_date'];
    $total_marks=$_POST['total_marks'];
    $temp=0;

if ($con) {
  $sql_insert_exam="INSERT INTO exam(exam_term, exam_date, total_marks) VALUES ('$exam_term','$exam_date','$total_marks')";
  if (mysqli_query($con  ,$sql_insert_exam)) {
    $sql_exam_id="SELECT E_id FROM exam WHERE exam_term='$exam_term' AND exam_date='$exam_date' AND total_marks='$total_marks'";
    $row=mysqli_fetch_array(mysqli_query($con ,$sql_exam_id));
    $E_id=$row['E_id'];
    for ($i=1; $i <=$loop_length ; $i++) {
      $student_id=$_POST["student_id".$i];
      $obtained_marks=$_POST['ob_marks'.$i];
      if (mysqli_query($con ,"INSERT INTO `exam_record`(`E_id`, `Class_id`, `S_id`, `obtained_marks`) VALUES ('$E_id','$cid','$student_id','$obtained_marks')")) {
        $temp=1;
      }else {
        $temp=0;
      }
    }
  }else {
    ?>
    <script type="text/javascript">
    document.getElementById("m2").innerHTML='Sorry Exam Records Insertion Failed!. Please try Again...';
    document.getElementById("m2").style.display='block';
    setTimeout(hide2 ,5000);
    </script>
    <?php
  }
if ($temp==1) {?>
<script type="text/javascript">
document.getElementById("m3").innerHTML='Exam Records are Successfully Inserted.';
document.getElementById("m3").style.display='block';
setTimeout(hide ,5000);
</script>
<?php
}else {?>
<script type="text/javascript">
document.getElementById("m2").innerHTML='Sorry Exam Records Insertion Failed!. Please try Again...';
document.getElementById("m2").style.display='block';
setTimeout(hide2 ,5000);
</script>
<?php
}
}else {
  echo "<script> alert('Sorry Problem Occur While Inserting the Records to the Database!, Please Try Again.'); </script>";
}


  }

 ?>
<!--========================================ended ==================================================-->
<script type="text/javascript" src="js/jquery.js"></script>
<script src="../datatables/jquery.dataTables.js"></script>
<script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
  $(function () {
    // $("#example1").DataTable();
    $('#example1').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

<?php
    }
  else {
    echo "<script> alert('Please Login first!.... '); </script>";
  }

?>
