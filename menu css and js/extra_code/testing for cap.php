<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="#" method="post" >
    <label>enter word</label>
    <input type="text" name="n" value="<?php if(isset($_POST['n'])){ echo $_POST['n']; } ?>" style="text-transform: capitalize">
    <button type="submit" name="button">Check</button>
  </form>

  <form class="" action="" method="post">
    <button type="submit" name="b">checkk in db</button>
  </form>
  </body>
</html>
<?php
$con=mysqli_connect("localhost","root","","test");
if (isset($_POST['button'])) {
  echo "<h1>".$_POST['n']."</h1>";
if ($con) {
$v=ucwords($_POST['n']);
if (mysqli_query($con ,"INSERT INTO `t`( `n`) VALUES ('$v')")) {
  echo "successfullll";
}

}else {
  echo "not okkk";
}
}

if (isset($_POST['b'])) {
  $r=mysqli_query($con ,"select * from t");
  while ($row=mysqli_fetch_assoc($r)) {
    echo "<h3 style='color: red'> ".$row['n']." </h3>";
  }
}
 ?>
