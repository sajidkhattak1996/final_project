<?php
if (isset($_POST['export_ratio'])) {
  include('../db_connection.php');
  $cid=$_POST['export_ratio'];
  $ratio_value=$_GET['ratio'];

  /*================class name and subject==========================================================*/
      $class_name=mysqli_fetch_array(mysqli_query($con ,"SELECT Name FROM class WHERE Class_id='$cid'"));
      $subject_name=mysqli_fetch_array(mysqli_query($con ,"SELECT subject.subject_name FROM subject INNER JOIN have ON have.Subject_id=subject.Subject_id WHERE have.Class_id='$cid' GROUP BY subject.subject_name"));
  /*===============ended==============================================================================*/

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=Quize Ratio Records.csv');
  $output=fopen("php://output", "w");
  fputcsv($output ,array("          ","Class Name : ".$class_name['Name']."",  "      "  , "subject Name: ".$subject_name['subject_name']." ","   ","Ratio Value is:".$ratio_value));
  fputcsv($output, array("------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------"));
  fputcsv($output, array('Class NO', 'Name', 'Quize Topic', 'Quize Date','Obtained Marks','Total Marks','Ratio'));
  fputcsv($output, array("------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------"));
$store[]=null;
if (isset($con)) {
        $check_register="SELECT S_id FROM register WHERE Class_id='$cid' ORDER BY Reg_no ASC";
        $exe_check=mysqli_query($con ,$check_register);
        if (mysqli_num_rows($exe_check)>0) {
          //this query check if class have no quize of all student
          $stmt_check_attendence="SELECT * FROM quize INNER JOIN quiz_record ON quiz_record.Q_id=quize.Q_id WHERE quiz_record.Class_id='$cid'";
          $exe_attd=mysqli_query($con ,$stmt_check_attendence);
              if (mysqli_num_rows($exe_attd)>0 ) {
                while ($std_id=mysqli_fetch_assoc($exe_check)) {
                  $std_name=mysqli_fetch_array(mysqli_query($con ,"SELECT register.Reg_no ,student.student_name FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' AND register.S_id='".$std_id['S_id']."'"));

                  $quize=mysqli_query($con ,"SELECT quize.q_topic,quize.q_date,quize.qt_marks,quiz_record.qo_marks FROM quize INNER JOIN quiz_record ON quiz_record.Q_id=quize.Q_id WHERE quiz_record.Class_id='$cid' AND quiz_record.S_id='".$std_id['S_id']."'");
                  $quize_row=mysqli_num_rows($quize);
                  $quize_rowspan=$quize_row+1;
                  $quize_padding=0;
                  if($quize_row==1){$quize_padding=0;}else {$quize_padding=(($quize_row)*1.25); }
                  if ($quize_row>0) {

                    $count=0;
                    $temp=0;
                    $total_obtained_marks=0;
                    $total_marks=0;

                    while ($quize_result=mysqli_fetch_assoc($quize)) {    $count++;
                      $total_obtained_marks=$quize_result['qo_marks']+$total_obtained_marks;
                      $total_marks=$quize_result['qt_marks']+$total_marks;

                      if ($temp<1) { $temp++;
                        /*-----display the class no and name of student */
                        $store[0]=$std_name['Reg_no'];
                        $store[1]=$std_name['student_name'];
                        /*----------ended-------------------------------*/
                      }else {
                        $store[0]="  ";
                        $store[1]="  ";
                      }
                      /*_______Display assignment topic and it marks for the student__________*/
                      $store[2]=$quize_result['q_topic'];
                      $store[3]= $quize_result['q_date'];
                      $store[4]=$quize_result['qo_marks'];
                      $store[5]=$quize_result['qt_marks'];
                      $store[6]="         ";
                      /*____________ended_____________________________________________________*/
                      fputcsv($output, $store);

                      //if we have last row
                      if($count==$quize_row){
                      $r=($total_obtained_marks/$total_marks)*$ratio_value;
                      $ratio1=number_format($r ,2);
                      $store[0]="    ";
                      $store[1]="    ";
                      $store[2]="    ";
                      $store[3]="Total=";
                      $store[4]=$total_obtained_marks;
                      $store[5]=$total_marks;
                      $store[6]=$ratio1;
                      fputcsv($output, $store);
                      }

                  }
                  fputcsv($output ,array("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~"));

                }else {
                  /*if student has not assignment */
                  fputcsv($output ,array($std_name['Reg_no'], $std_name['student_name'] , "Sorry No Quize of the  Students. "  ));

                }
              }
              }else {
                // when no assignment of all the class students  (here student are registered with class but they no assignment )
                fputcsv($output ,array("Sorry No Quize found of all the Class Students." ));
              }
        }else {
          //when no student are register with this class
          fputcsv($output ,array("Sorry No student are register with this class." ));
        }
}
else {
  //when problem in the database connnecton
  fputcsv($output ,array("Sorry Error Occur while connecting to the Database!" ));
}


fclose($output);
}
 ?>
