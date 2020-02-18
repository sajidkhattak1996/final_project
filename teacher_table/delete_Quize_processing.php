<?php
if (isset($_GET['i'])  && isset($_GET['sid'])) {
  $i=$_GET['i'];
  $id=$_GET['id'];
  $cid=$_GET['cid'];
  $sid=$_GET['sid'];
  $q2="DELETE FROM quiz_record WHERE Q_id='$id' AND Class_id='$cid' and S_id='$sid'";
  include_once('../db_connection.php');
  if (mysqli_query($con ,$q2)) {
      ?>
      <script>
      // alert('Record Update Successfully');
      window.location.assign("edit_quize2.php?id=<?php echo $sid; ?>#dd<?php echo $i; ?>");
       </script>
    <?php

  }else {
    ?>
    <script>
    alert('Delete falied try again!');
    window.location.assign("edit_quize2.php?id=<?php echo $sid; ?>#dd<?php echo $i; ?>");
     </script>
     <?php
  }


}else {
  echo "<script> alert('ERROR OCCURRED'); </script>";
}
 ?>
