<link rel="stylesheet" href="forms/css/bootstrap.min.css">
<link rel="stylesheet" href="menu css and js\bootstrap 4\css\glyphicon.css">
<?php
$conn=mysqli_connect("localhost","root","","project_db");
$showRecordPerPage = 4;
if(isset($_GET['page']) && !empty($_GET['page'])){
$currentPage = $_GET['page'];
}else{
$currentPage = 1;
}
$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
$totalEmpSQL = "SELECT Class_id,Name,Start_date,Expire_date from class";
$allEmpResult = mysqli_query($conn, $totalEmpSQL);
$totalEmployee = mysqli_num_rows($allEmpResult);
$lastPage = ceil($totalEmployee/$showRecordPerPage);
$firstPage = 1;
$nextPage = $currentPage + 1;
$previousPage = $currentPage - 1;
$empSQL = "SELECT Class_id,Name,Start_date,Expire_date
FROM `class` LIMIT $startFrom, $showRecordPerPage";
$empResult = mysqli_query($conn, $empSQL);
?>
<table class="table table-striped table-bordered table-hover table-sm table-light" >
          <thead class="bg-info">
              <tr>
                    <th scope="col" scope="row">Class ID</th>
                    <th scope="col">Class Name</th>
                    <!-- <th scope="col">Subject</th> -->
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
          function Slides($i ,$s){ ?>
          <td>    <form class="" action="" method="post">
                    <button type="submit" name="button" value="<?php  echo $i; ?>" class="btn btn-outline-info btn-sm">Slides</button>
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
      $cn=$_POST['cn'];
      echo "<h2>".$a."=conform delete are presss</h2>";
      echo "<h2>class name is=".$cn."</h2>";
    }


    if (isset($_POST['button'])) {
      $cid= $_POST['button'];
      $sid= $_POST['s'];

      echo "<h1>".$cid."</h1>";
      echo "<h1>".$sid."</h1>";
    }



?>
