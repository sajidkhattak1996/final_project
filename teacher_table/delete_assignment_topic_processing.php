<?php
if (isset($_GET['i'])  && isset($_GET['cid'])) {
  $i=$_GET['i'];
  $aid=$_GET['aid'];
  $cid=$_GET['cid'];
  $q2="DELETE assignment,assignment_record FROM assignment INNER JOIN assignment_record ON assignment_record.A_id=assignment.A_id WHERE assignment_record.Class_id='$cid' AND assignment_record.A_id='$aid' ";
  include_once('../db_connection.php');
  if (mysqli_query($con ,$q2)) {
      ?>
      <script>
      // alert('Record Update Successfully');
      window.location.assign("edit_assignment_topic.php#dd<?php echo $i; ?>");
       </script>
    <?php

  }else {
    ?>
    <script>
    alert('Delete falied try again!');
    window.location.assign("edit_assignment_topic.php#dd<?php echo $i; ?>");
     </script>
     <?php
  }


}else {
  echo "<script> alert('ERROR OCCURRED'); </script>";
}
 ?>
