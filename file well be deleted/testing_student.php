<?php

$class_id    =   $_POST['class_id'];
$enroll_key  =   $_POST['enroll_key'];
$fname       =   $_POST['fname'];
$lname       =   $_POST['lname'];
$email1      =   $_POST['email1'];
$email2      =   $_POST['email2'];
$password1   =   $_POST['password1'];
$password2   =   $_POST['password2'];

echo "<h1>your form value is  </h1>";
echo "<h3>class id = ".$class_id ."</h3>";
echo "<h3>enroll_key = ".$enroll_key ."</h3>";
echo "<h3>first name = ".$fname ."</h3>";
echo "<h3>last name = ".$lname ."</h3>";
echo "<h3>email = ".$email1 ."</h3>";
echo "<h3>conform email = ".$email2 ."</h3>";
echo "<h3>password = ".$password1 ."</h3>";
echo "<h3>conform password = ".$password2 ."</h3>";

$con =mysqli_connect("localhost","root","","project_db");
if ($con) {
  echo "<h2> connection created succssfully...</h2>";
  $statement1 ="SELECT Class_id,Enrollment_key FROM class WHERE Class_id ='1' AND Enrollment_key='205142'";
  $q1=mysqli_query($con ,$statement1);
  if ($q1) {
    $r =mysqli_num_rows($q1);
    if ($r==1) {
      echo "class id and rnrollment key is okkkkkkkk<br>";
      echo "<script> document.getElementById('sttd').innerHTML='Hi this is sajid khattak '; </script>";
    }


    if ($r==0) {

      echo "problem in the class id or enrollment key <br>";
      $statement2 ="SELECT Class_id FROM class WHERE Class_id='1'";
      $statement3 ="SELECT Enrollment_key FROM class WHERE Enrollment_key='205142'";

      $q2=mysqli_query($con ,$statement2);
      $q3=mysqli_query($con ,$statement3);
      if ($q2  && $q3) {
          $s1=mysqli_num_rows($q2);
          $s2=mysqli_num_rows($q3);

          if ($s1==0  && $s2==0) {
          echo '<h6> classs id andd enrollemnt key rocord not found ! </h6>';
          echo '<h6> classs id andd enrollemnt key both are wrong ! </h6>';
          }

          if ($s1==0  && $s2>0) {
            echo '<h6> Classs id is wrong ! </h6>';
          }
          if ($s1==1 && $s2==0) {
            echo '<h6> Enrollment key  is wrong ! </h6>';
          }
      }else {
        echo '<h6>problem occur while executing the query </h6>';
      }
    }


  }
  else {
    echo '<h6>problem occur while executing the query </h6>';
  }


}
else {
  echo 'problem while connecting to the database ';
}

?>
