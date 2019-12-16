<?php
include "connection.php";

$id = $_GET['id'];

mysqli_query($con,"DELETE FROM slide where id = '$id'");
// $path = $_SERVER['DOCUMENT_ROOT'].'items/item2.txt';

// $r=mysqli_fetch_array(mysqli_query($con,"SELECT file FROM presentation WHERE id='$id'"));

// $file_name=$r['file'];
//  $folder="download/";
//  $file_name=$folder.$file_name;
//  unlink($file_name);

header("Location: slide_display.php");
?>
