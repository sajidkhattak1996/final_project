<?php
if (isset($_GET['i'])  && isset($_GET['cid'])) {
  $i=$_GET['i'];
  $id=$_GET['id'];
  $cid=$_GET['cid'];
  $q2="DELETE presentation,presentation_record FROM presentation INNER JOIN presentation_record ON presentation_record.P_id=presentation.P_id WHERE presentation_record.Class_id='$cid' AND presentation_record.P_id='$id' ";
  include_once('../db_connection.php');
  if (mysqli_query($con ,$q2)) {
      ?>
      <script>
      // alert('Record Update Successfully');
      window.location.assign("edit_presentation_topic.php#dd<?php echo $i; ?>");
       </script>
    <?php

  }else {
    ?>
    <script>
    alert('Delete falied try again!');
    window.location.assign("edit_presentation_topic.php#dd<?php echo $i; ?>");
     </script>
     <?php
  }


}else {
  echo "<script> alert('ERROR OCCURRED'); </script>";
}
 ?>
