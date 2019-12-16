<?php

include "config.php";

$field = $_POST['field'];
$value = $_POST['value'];
$editid = $_POST['id'];

$query = "UPDATE users SET ".$field."='".$value."' WHERE id=".$editid;
mysqli_query($con,$query);

echo 1;
