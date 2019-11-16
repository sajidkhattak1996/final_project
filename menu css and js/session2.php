<?php
session_start();
if (isset($_SESSION['fn']) && isset($_SESSION['ln'])) {
echo "session variable are already created ... ";
echo "<br>first name: ".$_SESSION['fn'];
echo "<br> last Name: ".$_SESSION['ln'];
}
else {
  echo "no session are created ";
}
?>
