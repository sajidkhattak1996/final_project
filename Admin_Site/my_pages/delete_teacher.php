<?php
if (isset($_POST['id'])) {
  $id=$_POST['id'];
  $data="";
  include('../../db_connection.php');
  $q1="DELETE FROM `teacher` WHERE T_id='$id'";
  $q2="DELETE FROM `class` WHERE T_id='$id'";
  $q3="DELETE FROM `have` WHERE T_id='$id'";
  $q4="DELETE FROM `attendence_record` WHERE S_id='$id'";
  $q5="DELETE FROM `assignment_record` WHERE S_id='$id'";
  $q6="DELETE FROM `presentation_record` WHERE S_id='$id'";
  $q7="DELETE FROM `quiz_record` WHERE S_id='$id'";
  $q8="DELETE FROM `exam_record` WHERE S_id='$id'";

  if (mysqli_query($con ,$q1) && mysqli_query($con ,$q2) && mysqli_query($con ,$q3) && mysqli_query($con ,$q4) && mysqli_query($con ,$q5) && mysqli_query($con ,$q6) && mysqli_query($con ,$q7) && mysqli_query($con ,$q7))
  {
    $data="yes";
  }else {  $data="no";  }
  echo $data;
}
?>


function Fn_Delete_teacher(id,name){
  $.confirm({
      title: 'Be CareFul While Deleting!',
      content: "All Records for the Teacher are also delete <h5>Are You Sure You want to Delete this Teacher? </h5><h6>"+name+" </h6> ",
      type: 'yellow',
      typeAnimated: true,
      buttons: {
          tryAgain: {
              text: 'Continue',
              btnClass: 'btn-red',
              action: function(){
                $.ajax({
                  url:'my_pages/delete_teacher.php',
                  type:'POST',
                  data:{id},
                  success: function(data){
                    if (data=="yes") {
                      alert("Successfully Deleted.");
                      var a=0;
                      if (a==0) {
                         a++;   window.location.reload();  }
                    }else if (data=="no") {
                      alert("Deletion Failed! Try again.");
                    }

                  }
                });
              }
          },
          close: function () {
          }
      }
  });
}
