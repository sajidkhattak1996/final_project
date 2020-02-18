<?php
if (isset($_GET['id'])) {
  include('../../db_connection.php');
  $r=mysqli_fetch_assoc(mysqli_query($con ,"SELECT `id`, `name`, `Email`, `password` FROM `admin` WHERE id='".$_GET['id']."'"));

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
  <button type="button" onclick="goBack()" class="mt-5 btn btn-warning " name="button"><i class="fas fa-arrow-left"></i>  Back</button>
  <form action="" method="post">
  <div class="row container-fluid justify-content-center mt-5  py-5 " style="border:solid 2px #13bca4;border-radius: 80px/440px">
    <div class="row container-fluid">
      <div class="col-lg-3"> <label class="font-weight-bold text-danger">Admin_ID</label>  <input type="number" class="form-control font-weight-bold" name="id" value="<?php echo $r['id']; ?>" readonly>  </div>
      <div class="col-lg-3"> <label class="font-weight-bold">Name</label> <input type="text" onchange="show()" class="form-control font-weight-bold" name="name" value="<?php echo $r['name']; ?>" required>  </div>
      <div class="col-lg-3"> <label class="font-weight-bold">Email</label> <input type="email" onchange="show()" class="form-control font-weight-bold" name="email" value="<?php echo $r['Email']; ?>" required>  </div>
      <div class="col-lg-3"> <label class="font-weight-bold">Password</label> <input type="password" id="pass" onchange="show()" class="form-control font-weight-bold" name="password" value="<?php echo $r['password']; ?>" required><i class="fas fa-eye-slash float-right btn btm-sm" onclick="fn_show()"></i>  </div>
    </div>
    <div class="row container-fluid mt-4 ml-0" id="b" style="display:none">
        <div class="col-lg-12">
          <button type="submit" class="btn btn-outline-primary btn-responsive btn-block font-weight-bold" name="save">Submit</button>
        </div>
    </div>
</div>
</form>
</div>

  <?php
if (isset($_POST['save'])) {
  $e=mysqli_query($con ,"UPDATE `admin` SET `name`='".$_POST['name']."',`Email`='".$_POST['email']."',`password`='".$_POST['password']."' WHERE id='".$_POST['id']."'");
if ($e) {
  ?><script> alert('Record Successfully Updated.'); location.assign('admin_edit.php?id=<?php echo $_POST['id']; ?>'); </script><?php
}else {
  echo "<script>   alert('Record  Update Failed! try again.'); </script>";

}

}


}else {
  echo "<script> window.location.href='index.php'; </script>";
}
 ?>
