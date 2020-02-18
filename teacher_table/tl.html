<link rel="stylesheet" href="forms/css/bootstrap.min.css">
<link rel="stylesheet" href="menu css and js\bootstrap 4\css\glyphicon.css">
<link rel="stylesheet" href="../datatables-bs4/css/dataTables.bootstrap4.css">

<?php

// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';  //it display all the session variables
date_default_timezone_set("Asia/Karachi");
$current_date =date("Y-m-d");

$teacher_id=$_SESSION['t_id'];

$conn=mysqli_connect("localhost","root","","project_db");
$totalClassSQL = "SELECT Class_id,Name,Start_date,Expire_date from class WHERE T_id='$teacher_id' AND Expire_date >= '$current_date' ";
$ClassResult = mysqli_query($conn, $totalClassSQL);
?>
<form method="post">
<table id="example2" class="table table-striped table-bordered table-hover table-sm table-light" >
          <thead class="bg-info">
              <tr>
                    <th scope="col" scope="row">Class ID</th>
                    <th scope="col">Class Name</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">Expire Date</th>
                    <th scope="col">Slides</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Drop</th>
              </tr>
          </thead>
            <tbody>
<?php
while($class = mysqli_fetch_assoc($ClassResult)){
?>
<tr>
<th scope="row"><?php echo $class['Class_id']; ?></th>

<td><style> #classbtn{background:none;border:none;color: blue} #classbtn:hover{border-bottom: solid 2px blue;} </style>

      <button type="submit" name="class_name" id="classbtn" value="<?php echo $class['Class_id']; ?>">
        <?php echo $class['Name'];  ?>
      </button>

</td>

<?php  mysubject($class['Class_id']);     ?>

<td><?php echo $class['Start_date']; ?></td>
<td><?php echo $class['Expire_date']; ?></td>
<?php
//functions call

Slides($class['Class_id'],$class['Name']);
Edit($class['Class_id']);
Delete($class['Class_id'],$class['Name']);
?>
</tr>
<?php } ?>
</tbody>
</table>
</form>
<div class="tend">

</div>
<?php
// function which display the slide button
  function mysubject($b){
    $con =mysqli_connect("localhost","root","","project_db");
    if ($con) {
        $stmt_hh="SELECT Subject_id FROM have WHERE Class_id='$b'";
        $exe_hh=mysqli_query($con ,$stmt_hh);
        $row_hh=mysqli_fetch_array($exe_hh);
        $sid=$row_hh['Subject_id'];

        $stmt_ss="SELECT subject_name FROM subject WHERE Subject_id='$sid'";
        $exe_ss=mysqli_query($con, $stmt_ss);
        $row_ss=mysqli_fetch_array($exe_ss);
        $sn=$row_ss['subject_name'];
        ?>
           <style> #sbb{background:none;border:none;color: blue;} #sbb:hover{ border-bottom:solid 2px deeppink }  </style>
            <td>
              <input type="text" name="subjectid" value="<?php echo $sid ?>" style="display: none;border:none;background:none">
                <button type="submit" name="btn_subject" id="sbb" value="<?php echo $b ?>"><?php echo $sn;  ?></button>
            </td>


        <?php
    }else {
      echo "<script> alert('problem try again!...'); </script>";
    }
  }


          function Slides($i ,$s){ ?>
          <td>
                    <button type="submit" name="btn_slide" value="<?php  echo $i; ?>" class="btn btn-outline-info btn-sm">Slides</button>
                    <input type="text" name="s" value="<?php echo $s; ?>" style="display:none">

            </td>
          <?php  }
// slides function ended

// function which display the edit buttons icons
          function Edit($i){ ?>
          <td>
            <button class="btn btn-outline-primary" name="btn_edit" value="<?php echo $i; ?>" style="border:none"> <span class="glyphicon glyphicon-pencil" style="font-size: 14px"></span></button>


            </td>
          <?php  }
    // edit function ended
    // function which display the delete buttons icons
              function Delete($i,$j){ ?>
                <style> #cd<?php echo $i; ?>{display: none} </style>
              <td>

                <input type="text" name="cn" id="gg" value="<?php echo $j; ?>" style="display:none">
                <button id="dd<?php echo $i;?>" type="submit" class="btn btn-outline-danger" name="btn_delete" value="<?php echo $i; ?>" style="border:none"> <span class="glyphicon glyphicon-trash" style="font-size: 14px"></span></button>
                <button id="cd<?php echo $i; ?>" type="submit" class="btn btn-danger btn-sm" name="c_delete"  value="<?php echo $i; ?>">conform</button>

                </td>
              </tr>
              <?php  }
        // edit function ended
?>
<?php
    //for delete button are press
    if (isset($_POST['btn_delete'])) {  ?>
      <style media="screen">
            #dd<?php echo $_POST['btn_delete']; ?>{ display: none}
            #cd<?php echo $_POST['btn_delete']; ?>{ display: block}
      </style>
      <?php
    }
    //for conform delete button are presss
    if (isset($_POST['c_delete'])) {
      $cid=$_POST['c_delete'];
    //  $cn=$_POST['cn'];  //it store the class name
      $c =mysqli_connect("localhost","root","","project_db");
      if ($c) {
            $stmt1="DELETE class,have FROM class INNER JOIN have ON class.Class_id=have.Class_id WHERE class.Class_id='$cid'";
            $stmt2="DELETE assignment,assignment_record FROM assignment INNER JOIN assignment_record ON assignment_record.A_id=assignment.A_id WHERE assignment_record.Class_id='$cid'";
            $stmt3="DELETE presentation,presentation_record FROM presentation INNER JOIN presentation_record ON presentation_record.P_id=presentation.P_id WHERE presentation_record.Class_id='$cid'";
            $stmt4="DELETE quize,quiz_record FROM quize INNER JOIN quiz_record ON quiz_record.Q_id=quize.Q_id WHERE quiz_record.Class_id='$cid'";
            $stmt5="DELETE FROM `attendence_record` WHERE Class_id='$cid'";
            $stmt6="DELETE FROM register WHERE Class_id='$cid'";

            if (mysqli_query($c,$stmt1) && mysqli_query($c,$stmt2) && mysqli_query($c,$stmt3) && mysqli_query($c,$stmt4) && mysqli_query($c,$stmt5) && mysqli_query($c,$stmt6)) {

              echo "<script>
                      var a=0;
                      if (a==0) {
                        document.getElementById('dmsg').style.display='block';

                         a++;   window.location.assign('tmain_table.php');  }

              </script>";


      }
      if ($c==false) {
            echo "<script> alert('Deletation Failed Due to Problem while connecting to the Database!'); </script>".mysqli_error($c);
        }

    }
  }
// slides button
    if (isset($_POST['btn_slide'])) {
      $cid= $_POST['btn_slide'];
      $sid= $_POST['s'];

      echo "<h1>".$cid."</h1>";
      echo "<h1>".$sid."</h1>";
    }
// subject button
if (isset($_POST['btn_subject'])) {
  $_SESSION['class_id'] = $_POST['btn_subject'];
  $_SESSION['subject_id'] =$_POST['subjectid'];
  ?>
    <script> window.location.href='subject.php';  </script>

  <?php
}
// ended
//edit buttons
if (isset($_POST['btn_edit'])) {
  echo "<h1>".$_POST['btn_edit']."</h1>";
}
//ended

if (isset($_POST['class_name'])) {
  $_SESSION['class_id'] =$_POST['class_name'];
  echo "<script> window.location.href='class_page.php';  </script>";
}
?>


<script type="text/javascript" src="js/jquery.js"></script>
<script src="../datatables/jquery.dataTables.js"></script>
<script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
  $(function () {

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
