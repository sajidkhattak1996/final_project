<?php
$con=new PDO("mysql:host=localhost;dbname=test","root","");
  $id=isset($_GET['id'])? $_GET['id'] : "";
  $stmt= $con->prepare("SELECT * FROM file2 WHERE id=?");
  $stmt->bindParam(1,$id);
  $stmt->execute();
  $row=$stmt->fetch();
  header('Content-Type:'.$row['mime']);
  echo $row['data'];

 ?>
