<?php
if (isset($_POST['save']) && isset($_GET['aid']) && isset($_GET['loop']) ) {
$aid=$_GET['aid'];
$i=$_GET['loop'];

$a_topic=$_POST["an".$i.""];
$a_date=$_POST["ad".$i.""];
$total=$_POST["at".$i.""];


$query1="UPDATE `assignment` SET `a_name`='$a_topic',`a_date`='$a_date',`at_marks`='$total' WHERE A_id='$aid'";

include('../db_connection.php');
if ( mysqli_query($con ,$query1)) {
  ?>
  <script>
  alert('Record Update Successfully');
  window.location.assign("edit_assignment_topic.php");
   </script>
<?php
}else {
  ?>
  <script>
  alert('Update falied try again!');
  window.location.assign("edit_assignment_topic.php");
   </script>
   <?php
}


}
 ?>
