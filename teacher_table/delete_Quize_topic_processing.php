<?php
if (isset($_GET['i'])  && isset($_GET['cid'])) {
  $i=$_GET['i'];
  $id=$_GET['id'];
  $cid=$_GET['cid'];
  $q2="DELETE quize,quiz_record FROM quize INNER JOIN quiz_record ON quiz_record.Q_id=quize.Q_id WHERE quiz_record.Class_id='$cid' AND quiz_record.Q_id='$id' ";
  include_once('../db_connection.php');
  if (mysqli_query($con ,$q2)) {
      ?>
      <script>
      // alert('Record Update Successfully');
      window.location.assign("edit_quize_topic.php#dd<?php echo $i; ?>");
       </script>
    <?php

  }else {
    ?>
    <script>
    alert('Delete falied try again!');
    window.location.assign("edit_quize_topic.php#dd<?php echo $i; ?>");
     </script>
     <?php
  }


}else {
  echo "<script> alert('ERROR OCCURRED'); </script>";
}
 ?>
