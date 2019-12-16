<link rel="stylesheet" href="forms/css/bootstrap.min.css">
<link rel="stylesheet" href="menu css and js\bootstrap 4\css\glyphicon.css">
<link rel="stylesheet" href="../datatables-bs4/css/dataTables.bootstrap4.css">

<?php

// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';  //it display all the session variables
date_default_timezone_set("Asia/Karachi");
$current_date =date("Y-m-d");

$teacher_id=$_SESSION['t_id'];

$conn=mysqli_connect("localhost","root","","project_db");

$totalEmpSQL = "SELECT Class_id,Name,Start_date,Expire_date from class WHERE T_id='$teacher_id' AND Expire_date < '$current_date' ";
$expire_result = mysqli_query($conn, $totalEmpSQL);

?>
<?php
/*===========edit buttons div class ===========================================================================================================================================================================
=========================================================================================================================================================================================================*/
if (isset($_POST['btn_edit'])) {
  echo "<h1>".$_POST['btn_edit']."</h1>";
  $sql1="SELECT Name,Expire_date FROM class WHERE Class_id='".$_POST['btn_edit']."'";
  $r=mysqli_fetch_array(mysqli_query($con, $sql1));
  ?>
  <style>

    #edit{
    background: rgb(172,239,224,1.0);
    height: auto;
    transform: translate(0% , 0%);
    width: auto;
    }
      #bb{
        background-image: -webkit-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
        background-image: -moz-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
        background-image: -o-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
        background-image: linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
        color: #000;
        border:solid 1px rgba(127,243,228,0.52);
        border-radius: 12px;
        font-weight: bolder;
      }
      #b1_close{
        background:none;
        border: none;
        font-size: 30px;
        color: deeppink;
      }
      #b1_close:hover {
        color: red;
      }


  </style>
  <div id="edit" >
  <?php
    if (isset($_POST['btn1_close'])) {
      ?>  <style> #edit{display:none} </style> <?php
    }

     ?>
    <form action="tmain_table.php" method="post">
      <button id="b1_close" type="submit" name="btn1_close" style="float: right;margin-right: 5px"><span class="glyphicon glyphicon-remove" ></span></button>
    </form>
    <!-- below are editable form -->
    <form action="update_class.php" method="post">
      <div id="edit2">
      <table id="bb" class="table table-straped">
        <thead >
          <th>Class ID</th>
          <th>Class Name</th>
          <th>Expire Date</th>
          <th></th>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $_POST['btn_edit']; ?> <input type="text" name="cid" value="<?php echo $_POST['btn_edit']; ?>" style="display:none"/></td>
            <td><input type="text" name="cname" value="<?php echo $r['Name']; ?>" class="form-control" style="font-weight: bolder" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{2,40}$" title="Class Name shoud start from Alphabet and  between three to twenty character long."/> </td>
            <td><input type="date" name="exdate" value="<?php echo $r['Expire_date'];  ?>" class="form-control" required/></td>
            <td><button class="btn btn-primary" type="submit" name="edit_save">Click To Save Change</button></td>
          </tr>
        </tbody>
      </table>

      </div>
    </form>
  </div>
  <?php

}
/*==========ended==============================================================================================================================================================================================*/
?>
<table id="example8" class="table table-striped table-bordered table-hover table-sm table-light" >
          <thead class="bg-info">
              <tr>
                    <th scope="col" scope="row">Class ID</th>
                    <th scope="col">Class Name</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">Expire Date</th>
                    <th scope="col">Share &nbsp;&nbsp;<span class="glyphicon glyphicon-share-alt"></span>  </th>
                    <th scope="col">Edit</th>
                    <th scope="col">Drop</th>
              </tr>
          </thead>
            <tbody>
<?php
while($emp = mysqli_fetch_assoc($expire_result)){
?>
<tr>
<th scope="row"><?php echo $emp['Class_id']; ?></th>
<td><style> #classbtn{background:none;border:none;color: blue} #classbtn:hover{border-bottom: solid 2px blue;} </style>
    <form action="" method="post">
      <button type="submit" name="class_name" id="classbtn">
        <?php echo $emp['Name'];  ?>
      </button>
    </form>
</td>
<?php  mysubject($emp['Class_id']);     ?>
<td><?php echo $emp['Start_date']; ?></td>
<td><?php echo $emp['Expire_date']; ?></td>
<?php
//functions call

Slides($emp['Class_id']);
Edit($emp['Class_id']);
Delete($emp['Class_id'],$emp['Name']);
?>
</tr>
<?php } ?>
</tbody>
</table>

<div class="tend">

</div>
<?php
// function which display the subject button
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
          <form  action="" method="post"> <style> #sbb{background:none;border:none;color: blue;} #sbb:hover{ border-bottom:solid 2px deeppink }  </style>
            <td>
              <input type="text" name="subjectid" value="<?php echo $sid ?>" style="display: none;border:none;background:none">
                <button type="submit" name="btn_subject" id="sbb" value="<?php echo $b ?>"><?php echo $sn;  ?></button>
            </td>
          </form>

        <?php
    }else {
      echo "<script> alert('problem try again!...'); </script>";
    }
  }

/*==================slide function ============================================================================================================================================================================*/
          function Slides($i){ ?>
              <td>
                <form class="" action="" method="post">
                  <button type="submit" name="btn_slide" value="<?php  echo $i; ?>" class="btn  btn-sm" id="sh"><span ><img style="width: 20px; height: 20px;" src="share.png"  /></span></button>

              </form>
            </td>
          <?php  }
// slides function ended ==============================================================================================================================================================*/

// function which display the edit buttons icons
          function Edit($i){ ?>
          <td>    <form class="" action="" method="post">
            <button class="btn btn-outline-primary" name="btn_edit" value="<?php echo $i; ?>" style="border:none"> <span class="glyphicon glyphicon-pencil" style="font-size: 14px"></span></button>

              </form>
            </td>
          <?php  }
    // edit function ended
    // function which display the delete buttons icons
              function Delete($i,$j){ ?>
                <style> #cd<?php echo $i; ?>{display: none} </style>
              <td>
                <form class="" action="" method="post" name="fff" id="f1" >
                <input type="text" name="cn" id="gg" value="<?php echo $j; ?>" style="display:none">
                <button id="dd<?php echo $i;?>" type="submit" class="btn btn-outline-danger" name="btn_delete" value="<?php echo $i; ?>" style="border:none"> <span class="glyphicon glyphicon-trash" style="font-size: 14px"></span></button>
                <button id="cd<?php echo $i; ?>" type="submit" class="btn btn-danger btn-sm" name="c_delete"  value="<?php echo $i; ?>">conform</button>
                  </form>
                </td>
              </tr>
              <?php  }
        //  ended
?>
<?php
/*==============for delete button are press====================================================================================================================================================================================================================================*/
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

              echo "<script>  window.location.href='expire_class.php';            </script>";


      }
      if ($connection==false) {
            echo "<script> alert('Problem while connecting to the Database!'); </script>".mysqli_error($connection);
        }

    }
  }
/*==============ended====================================================================================================================================================================================================================================*/

// slides button===============================================================================================================*/
    if (isset($_POST['btn_slide'])) {
        $_SESSION['class_id']=$_POST['btn_slide'];
        ?>
        <script type="text/javascript">
              window.location.href='share_main_page.php';
        </script>
        <?php
    }
/*==========ended==============================================================================================================*/

/*========================= subject button ===================================================================================*/
if (isset($_POST['btn_subject'])) {
    $_SESSION['class_id'] = $_POST['btn_subject'];
    ?>
      <script> window.location.href='subject.php';  </script>
    <?php
}
/*============== ended  ======================================================================================================*/


/*-----------------class name button code --------------------------------------------------------------------------------------------------------------------------------------------*/
if (isset($_POST['class_name'])) {
  $_SESSION['class_id'] =$_POST['class_name'];
  echo "<script> window.location.href='class_page.php';  </script>";
}
/*-------------------------------ended --------------------------------------------------------------------------------------------------------------------------------------------*/
?>



<script type="text/javascript" src="js/jquery.js"></script>
<script src="../datatables/jquery.dataTables.js"></script>
<script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
  $(function () {

    $('#example8').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
