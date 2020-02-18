<?php
include('db_connection.php');

$slid_id = $_GET['id'];
$tid=$_GET['tid'];

$url = $_GET['imageurl'];
unlink('../../teacher_table/download/'.$url);
mysqli_query($con,"DELETE FROM slide where id = '$slid_id'");


header("Location: teacher_view.php?id='$tid'");
?>
