<link rel="stylesheet" href="forms/css/bootstrap.min.css">
<link rel="stylesheet" href="menu css and js\bootstrap 4\css\glyphicon.css">
<?php

// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';  //it display all the session variables
date_default_timezone_set("Asia/Karachi");
$current_date =date("Y-m-d");

$teacher_id=$_SESSION['t_id'];

$conn=mysqli_connect("localhost","root","","project_db");
$showRecordPerPage = 4;
if(isset($_GET['page']) && !empty($_GET['page'])){
$currentPage = $_GET['page'];
}else{
$currentPage = 1;
}
$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
$totalEmpSQL = "SELECT Class_id,Name,Start_date,Expire_date from class WHERE T_id='$teacher_id' AND Expire_date < '$current_date' ";
$allEmpResult = mysqli_query($conn, $totalEmpSQL);
$totalEmployee = mysqli_num_rows($allEmpResult);
$lastPage = ceil($totalEmployee/$showRecordPerPage);
$firstPage = 1;
$nextPage = $currentPage + 1;
$previousPage = $currentPage - 1;
$empSQL = "SELECT Class_id,Name,Start_date,Expire_date
FROM `class` WHERE T_id='$teacher_id' AND Expire_date < '$current_date' LIMIT $startFrom, $showRecordPerPage";
$empResult = mysqli_query($conn, $empSQL);
?>
<table class="table table-striped table-bordered table-hover table-sm table-light" >
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
while($emp = mysqli_fetch_assoc($empResult)){
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

Slides($emp['Class_id'],$emp['Name']);
Edit($emp['Name']);
Delete($emp['Class_id'],$emp['Name']);
?>
</tr>
<?php } ?>
</tbody>
</table>


<!-- pagination start form herer -->
<nav aria-label="Page navigation" style="float: right;margin-right: 10px;">
<ul class="pagination">
<?php if($currentPage != $firstPage) { ?>
<li class="page-item">
<a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
<span aria-hidden="true">First</span>
</a>
</li>
<?php } ?>
<?php if($currentPage >= 2) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
<?php } ?>
<li class="page-item active"><a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>
<?php if($currentPage != $lastPage) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>
<li class="page-item">
<a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
<span aria-hidden="true">Last</span>
</a>
</li>
<?php } ?>
</ul>
</nav>
<!-- pagination ended -->
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


          function Slides($i ,$s){ ?>
          <td>    <form class="" action="" method="post">
                    <button type="submit" name="btn_slide" value="<?php  echo $i; ?>" class="btn btn-outline-info btn-sm">Slides</button>
                    <input type="text" name="s" value="<?php echo $s; ?>" style="display:none">
              </form>
            </td>
          <?php  }
// slides function ended

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
      $a=$_POST['c_delete'];
    //  $cn=$_POST['cn'];  //it store the class name
      $connection =mysqli_connect("localhost","root","","project_db");
      if ($connection) {
            $stmt1 ="DELETE FROM `have` WHERE Class_id='$a'";
            $stmt2 ="DELETE FROM `class` WHERE Class_id='$a'";
            //executing the query
            $exe1=mysqli_query($connection,$stmt1);
            $exe2=mysqli_query($connection,$stmt2);
            if ($exe1 && $exe2) {

              echo "<script>  window.location.href='expire_class.php';            </script>";


      }
      if ($connection==false) {
            echo "<script> alert('Problem while connecting to the Database!'); </script>".mysqli_error($connection);
        }

    }
  }
// php code for button slides
    if (isset($_POST['btn_slide'])) {
      $cid= $_POST['btn_slide'];
      $sid= $_POST['s'];

      echo "<h1>".$cid."</h1>";
      echo "<h1>".$sid."</h1>";
    } //ended
// php code for button subject
if (isset($_POST['btn_subject'])) {
  echo "btn_subject are press: and class id==".$_POST['btn_subject'];
  echo "subject id  is :  ".$_POST['subjectid'];
}  //ended

?>
