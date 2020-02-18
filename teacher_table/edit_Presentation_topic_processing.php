<?php
if (isset($_POST['save']) && isset($_GET['id']) && isset($_GET['loop']) ) {
$id=$_GET['id'];
$i=$_GET['loop'];

$topic=$_POST["topic".$i.""];
$datee=$_POST["datee".$i.""];
$total=$_POST["total_marks".$i.""];


$query1="UPDATE presentation SET p_topic='$topic',`p_date`='$datee',`pt_marks`='$total' WHERE P_id='$id'";

include_once('../db_connection.php');
if ( mysqli_query($con ,$query1)) {
  ?>
  <script>
  alert('Record Update Successfully');
  window.location.assign("edit_presentation_topic.php");
   </script>
<?php
}else {
  ?>
  <script>
  alert('Update falied try again!');
  window.location.assign("edit_presentation_topic.php");
   </script>
   <?php
}


}
 ?>
