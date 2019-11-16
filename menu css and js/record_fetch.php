<?php
$con =mysqli_connect("localhost","root","","project_db");
if ($con) {
  $result =mysqli_query($con,"select * from teacher ");
    $row =mysqli_fetch_array($result);
    echo "id==".$row['T_id'];
}
else {
  echo "error==".mysqli_error($con);
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <h1><?php  echo $row['Name'];  ?></h1>
  </body>
</html>
