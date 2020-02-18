<?php
include('../db_connection.php');
if (isset($_GET['E_id'])  && isset($_GET['cid'])) {
/*============declarating the csv =======================================*/
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Exam_Record.csv');
$output = fopen("php://output", "w");

$store[]=null;
$cid=$_GET['cid'];
$E_id=$_GET['E_id'];
if (isset($con)) {
  /*================class name and subject==========================================================*/
  $class_name=mysqli_fetch_array(mysqli_query($con ,"SELECT Name FROM class WHERE Class_id='$cid'"));
  $subject_name=mysqli_fetch_array(mysqli_query($con ,"SELECT subject.subject_name FROM subject INNER JOIN have ON have.Subject_id=subject.Subject_id WHERE have.Class_id='$cid' GROUP BY subject.subject_name"));
  /*===============ended==============================================================================*/
/*---------csv file code --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
fputcsv($output ,array("          ","Class Name:   ".$class_name['Name'],"","","","",  "      "  , "subject Name:   ".$subject_name['subject_name'],"","",""," "));
fputcsv($output, array("---------------------------------------------------------------------------------------------------------------------------------------------------------------------------"));
/*---------csv file code ended--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

$sql_exam=mysqli_query($con ,"SELECT * FROM exam WHERE E_id='$E_id'");
if (mysqli_num_rows($sql_exam)>0) {
  while ($row=mysqli_fetch_assoc($sql_exam)) {
    fputcsv($output ,array("Exam Term:".$row['exam_term'],"","","  ","Exam Date:  ".$row['exam_date'],"","","","  ","Total Marks:  ".$row['total_marks'],"","","","  "));
    fputcsv($output ,array("   "));
    fputcsv($output ,array("","Class  NO","","","Student Name","","","","Obtained Marks","","",""));
    fputcsv($output ,array("    "));

     $query2="
     SELECT register.Reg_no,student.student_name,student.S_id,exam_record.obtained_marks FROM exam_record
     INNER JOIN register ON exam_record.S_id=register.S_id
     INNER JOIN student ON exam_record.S_id=student.S_id
     AND exam_record.Class_id='$cid' AND exam_record.E_id='$E_id'
     AND register.Class_id='$cid'
    ";
    $exe=mysqli_query($con , $query2);
    if (mysqli_num_rows($exe)>0){
      while ($r=mysqli_fetch_array($exe)) {
        fputcsv($output ,array("","".$r['Reg_no'],"","","".$r['student_name'],"","","","".$r['obtained_marks'],"","",""));
      }
    }else {
      fputcsv($output ,array(" Yet No Exam Result are Uploaded..."));
    }
  }//while are ended...

}else {
  fputcsv($output ,array(" Yet No Exam Result are Uploaded..."));
}
}else {
  fputcsv($output ,array("Problem Occurs while Connecting to the Database!..."));
}
fclose($output);
}

 ?>
