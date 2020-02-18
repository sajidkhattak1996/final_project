<?php
include('../db_connection.php');
if (isset($_GET['cid']) && isset($_GET['E_id']) && isset($_GET['quize'])) {
  $cid=$_GET['cid'];
  $E_id=$_GET['E_id'];
  $att=$_GET['att'];
  $assi=$_GET['assi'];
  $pre=$_GET['pre'];
  $quize=$_GET['quize'];

  /*================class name and subject==========================================================*/
      $class_name=mysqli_fetch_array(mysqli_query($con ,"SELECT Name FROM class WHERE Class_id='$cid'"));
      $subject_name=mysqli_fetch_array(mysqli_query($con ,"SELECT subject.subject_name FROM subject INNER JOIN have ON have.Subject_id=subject.Subject_id WHERE have.Class_id='$cid' GROUP BY subject.subject_name"));
  /*===============ended==============================================================================*/
  /*=============================exam record data========================================================================*/
  $sql_exam=mysqli_query($con ,"SELECT * FROM exam INNER JOIN exam_record ON exam_record.E_id=exam.E_id WHERE exam_record.Class_id='$cid' AND exam_record.E_id='$E_id' GROUP BY exam_record.E_id");
  $result=mysqli_fetch_assoc($sql_exam);
  /*==========================================================================================================================*/
  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=Exam.csv');
  $output =fopen("php://output" ,"w");

  fputcsv($output ,array("","","","","","","Class Name : ".$class_name['Name'],"","","","","subject Name: ".$subject_name['subject_name'],"","","",""));
  fputcsv($output, array("--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------"));
  fputcsv($output ,array("","Ratios=>"," ","","","Attendance:".$att,"","","","Assignment:".$assi,"","","","Presentation:".$pre,"","","","Quize:".$quize,"","",""));
  fputcsv($output ,array("                          "));
  fputcsv($output ,array("","Exam Term: ".$result['exam_term'],"","","","","","","","Exam Date: ".$result['exam_date'],"","","","","","","","Total Marks: ".$result['total_marks'],"","","","",""));
  fputcsv($output ,array("       "));
  fputcsv($output ,array("Class No","Student Name","","Exam Marks Obtained","","","Attendance Ratio","","Assignment Ratio","","Presentation Ratio","","Quize Ratio","","Total"," ","Total Obtained Marks","",""));
  $store[]=null;


  if (isset($con)) {
  /*=======the below commented varials name are very important to acheive this functionality ========================*/
  /*'''''''*/                     // $att=$_POST['attendance_ratio'];                                       /*'''''''*/
  /*'''''''*/                     // $assi=$_POST['assignment_ratio'];                                      /*'''''''*/
  /*'''''''*/                     // $pre=$_POST['presentatio_ratio'];                                      /*'''''''*/
  /*'''''''*/                     // $quize=$_POST['quize_ratio'];                                          /*'''''''*/
  /*'''''''*/                     // $E_id=$_POST['btn_manual'];                                            /*'''''''*/
  /*=================================================================================================================*/

                $query2="
                SELECT register.Reg_no,student.student_name,student.S_id,exam_record.obtained_marks FROM exam_record
                INNER JOIN register ON exam_record.S_id=register.S_id
                INNER JOIN student ON exam_record.S_id=student.S_id
                AND exam_record.Class_id='$cid' AND exam_record.E_id='".$E_id."'
                AND register.Class_id='$cid'
                ";
                $exe=mysqli_query($con , $query2);
                if (mysqli_num_rows($exe)>0){
                  $attendance_ratio=0;
                  $assignment_ratio=0;
                  $presentation_ratio=0;
                  $quize_ratio=0;

                  while ($r=mysqli_fetch_array($exe)) {
                       // echo $r['Reg_no'];
                         $store[0]=$r['Reg_no'];
                       // echo $r['student_name'];
                           $store[1]=$r['student_name'];
                       // echo $r['obtained_marks'];
                          $store[2]=$r['obtained_marks'];

                          $sql_attendance_obtained=mysqli_query($con ,"
                          SELECT attendence_record.AT_id FROM attendence_record
                          INNER JOIN attendence ON attendence_record.AT_id=attendence.AT_id
                          WHERE attendence_record.Class_id='$cid' AND attendence_record.S_id='".$r['S_id']."'
                          AND attendence_record.AT_id='1'
                          ");

                          $sql_attendance_total=mysqli_query($con ,"
                          SELECT attendence_record.AT_id FROM attendence_record
                          INNER JOIN attendence ON attendence_record.AT_id=attendence.AT_id
                          WHERE attendence_record.Class_id='$cid' AND attendence_record.S_id='".$r['S_id']."'
                          ");
                          $a_obtained=mysqli_num_rows($sql_attendance_obtained);
                          $a_total=mysqli_num_rows($sql_attendance_total);
                          if ($a_total==0) {
                            $store[3]="No Attendance";
                          }else {
                            $attendance_ratio=number_format((($a_obtained/$a_total)*$att),2);
                            $store[3]= $attendance_ratio;
                          }

                        $sql_assignment=mysqli_query($con ,"
                            SELECT sum(assignment_record.ao_marks),SUM(assignment.at_marks) FROM assignment
                            INNER JOIN assignment_record ON assignment_record.A_id=assignment.A_id
                            WHERE assignment_record.Class_id='$cid'
                            AND assignment_record.S_id='".$r['S_id']."'
                          ");
                            if (mysqli_num_rows($sql_assignment)>0) {
                              $record=mysqli_fetch_array($sql_assignment);
                              if ($record[1]==0) {
                                $store[4]="No Assignment";
                              }else {
                                $assignment_ratio= number_format((($record[0]/$record[1])*$assi),2);
                                $store[4]= $assignment_ratio;
                              }
                            }else {
                              $store[4]="No Assignment";
                            }

                            $sql_presentation=mysqli_query($con ,"
                            SELECT sum(presentation_record.po_marks),sum(presentation.pt_marks) FROM presentation
                            INNER JOIN presentation_record ON presentation_record.P_id=presentation.P_id
                            WHERE presentation_record.Class_id='$cid'
                            AND presentation_record.S_id='".$r['S_id']."'
                            ");
                            if (mysqli_num_rows($sql_presentation)>0) {
                              $rp=mysqli_fetch_array($sql_presentation);
                              if ($rp[1]==0) {
                                $store[5]="No Presentation";
                              }else {
                                $presentation_ratio= number_format((($rp[0]/$rp[1])*$pre),2);
                                $store[5]= $presentation_ratio;
                              }
                            }else {
                              $store[5]="No Presentation";
                            }


                            $sql_quize=mysqli_query($con ,"
                            SELECT SUM(quiz_record.qo_marks),SUM(quize.qt_marks) FROM quize
                            INNER JOIN quiz_record ON quiz_record.Q_id=quize.Q_id
                            WHERE quiz_record.Class_id='$cid'
                            AND quiz_record.S_id='".$r['S_id']."'
                              ");
                              if (mysqli_num_rows($sql_quize)>0) {
                                $rq=mysqli_fetch_array($sql_quize);
                                if ($rq[1]==0) {
                                  $store[6]= "No Quize";
                                }else {
                                  $quize_ratio= number_format((($rq[0]/$rq[1])*$quize),2);
                                  $store[6]= $quize_ratio;
                                }
                              }else {
                                $store[6]= "No Quize";
                              }


                       $store[7]= ($attendance_ratio+$assignment_ratio+$presentation_ratio+$quize_ratio);
                       $store[8]= ($r['obtained_marks']+($attendance_ratio+$assignment_ratio+$presentation_ratio+$quize_ratio));

                       fputcsv($output ,array("$store[0]","$store[1]","","$store[2]","","","$store[3]","","$store[4]","","$store[5]","","$store[6]","","$store[7]"," ","$store[8]","",""));
                  }
                }else {
                  fputcsv($output ,array("Yet No Exam Result are Uploaded."));

                }
      }//while are ended...

  else {
    fputcsv($output ,array("problem in the database Connection try again."));
  }

  fclose($output);

}
else {
  echo "<script> alert('Please login first!...');  </script>";
}
 ?>
