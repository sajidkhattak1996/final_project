<?php
session_start();

echo "session are started .... <br>";

echo "session variable is : fn and  ln";

$_SESSION['fn']  = "Sajid";
$_SESSION['ln']  = "khattak";
session_destroy();
?>                                                                                                                                                                                                                                               
