<?php
include "connection.php";

$id = $_GET['id'];

mysqli_query($con,"DELETE FROM presentation where id = '$id'");

header("Location: slide_delete.php");
