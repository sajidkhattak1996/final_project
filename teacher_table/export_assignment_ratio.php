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
  header('Content-Disposition: attachment; filename=Assignment Ratio Records.csv');
  $output=fopen("php://output", "w");
  fputcsv($output ,array("          ","Class Name : ".$class_name['Name']."",  "      "  , "subject Name: ".$subject_name['subject_name']." ","  ","Ratio Value is: ".$ratio_value ));
  fputcsv($output, array("------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------"));
  fputcsv($output, array('Class NO', 'Name', 'Assignment Topic', 'Assignment Date','Obtained Marks','Total Marks','Ratio'));
  fputcsv($output, array("------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------"));
$store[]=null;
  if (isset($con)) {
          $check_register="SELECT S_id FROM register WHERE Class_id='$cid' ORDER BY Reg_no ASC";
          $exe_check=mysqli_query($con ,$check_register);
          if (mysqli_num_rows($exe_check)>0) {
            //this query check if class have no assignment of all student
            $stmt_check_attendence="SELECT * FROM assignment INNER JOIN assignment_record ON assignment_record.A_id=assignment.A_id WHERE assignment_record.Class_id='$cid'";
            $exe_attd=mysqli_query($con ,$stmt_check_attendence);
                if (mysqli_num_rows($exe_attd)>0 ) {
                  while ($std_id=mysqli_fetch_assoc($exe_check)) {
                    $std_name=mysqli_fetch_array(mysqli_query($con ,"SELECT register.Reg_no ,student.student_name FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' AND register.S_id='".$std_id['S_id']."'"));

                    $assignment=mysqli_query($con ,"SELECT assignment.a_name,assignment.a_date,assignment.at_marks,assignment_record.ao_marks FROM assignment INNER JOIN assignment_record ON assignment_record.A_id=assignment.A_id WHERE assignment_record.Class_id='$cid' AND assignment_record.S_id='".$std_id['S_id']."'");
                    $assi_row=mysqli_num_rows($assignment);
                    $assignment_padding=0;
                    if($assi_row==1){$assignment_padding=0;}else {$assignment_padding=(($assi_row)*1.25); }
                    if ($assi_row>0) {
                      $count=0;
                      $temp=0;
                      $total_obtained_marks=0;
                      $total_marks=0;
                      while ($ass_result=mysqli_fetch_assoc($assignment)) {    $count++;
                        $total_obtained_marks=$ass_result['ao_marks']+$total_obtained_marks;
                        $total_marks=$ass_result['at_marks']+$total_marks;

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
                        $store[2]=$ass_result['a_name'];
                        $store[3]= $ass_result['a_date'];
                        $store[4]=$ass_result['ao_marks'];
                        $store[5]=$ass_result['at_marks'];
                        $store[6]="         ";
                        /*____________ended_____________________________________________________*/
                        fputcsv($output, $store);

                        //if we have last row
                        if($count==$assi_row){
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
                    fputcsv($output ,array($std_name['Reg_no'], $std_name['student_name'] , "Sorry No Assignment of the  Students. "  ));

                  }
                }
                }else {  // when no assignment of all the class students  (here student are registered with class but they no assignment )
                  fputcsv($output ,array("Sorry No Assignment found of all the Class Students." ));
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
