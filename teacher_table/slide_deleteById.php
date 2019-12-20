<?php
include('db_connection.php');

$id = $_GET['id'];

$url = $_GET['imageurl'];
unlink('download/'.$url);
mysqli_query($con,"DELETE FROM slide where id = '$id'");


header("Location: share_main_page.php");
?>
