<?php
if (isset($_POST['save']) && isset($_GET['sid']) && isset($_GET['loop']) ) {
$cid=$_POST['save'];
$sid=$_GET['sid'];
$id=$_GET['id'];
$i=$_GET['loop'];
$obtained=$_POST["obtained_marks".$i.""];

$query2="UPDATE presentation_record SET po_marks='$obtained' WHERE P_id='$id' AND Class_id='$cid' AND S_id='$sid'";

include('../db_connection.php');
if ( mysqli_query($con ,$query2)) {
  ?>
  <script>
  alert('Record Update Successfully');
  window.location.assign("edit_presentation2.php?id=<?php echo $sid; ?>#row<?php echo $i; ?>");
   </script>
<?php
}else {
  ?>
  <script>
  alert('Update falied try again!');
  window.location.assign("edit_presentation2.php?id=<?php echo $sid; ?>#row<?php echo $i; ?>");
   </script>
   <?php
}
}
 ?>
