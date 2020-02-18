<?php
if (isset($_POST['save']) && isset($_GET['sid']) && isset($_GET['loop']) ) {
$cid=$_POST['save'];
$sid=$_GET['sid'];
$aid=$_GET['aid'];
$i=$_GET['loop'];

// $a_topic=$_POST["an".$i.""];
// $a_date=$_POST["ad".$i.""];
$obtained=$_POST["ao".$i.""];
// $total=$_POST["at".$i.""];

$query2="UPDATE `assignment_record` SET `ao_marks`='$obtained' WHERE A_id='$aid' AND Class_id='$cid' AND S_id='$sid'";

include('../db_connection.php');
if ( mysqli_query($con ,$query2)) {
  ?>
  <script>
  alert('Record Update Successfully');
  window.location.assign("edit_assignment2.php?id=<?php echo $sid; ?>#row<?php echo $i; ?>");
   </script>
<?php
}else {
  ?>
  <script>
  alert('Update falied try again!');
  window.location.assign("edit_assignment2.php?id=<?php echo $sid; ?>#row<?php echo $i; ?>");
   </script>
   <?php
}


}
 ?>
