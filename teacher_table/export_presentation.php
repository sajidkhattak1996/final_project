<?php
if (isset($_POST['export'])) {
  include('../db_connection.php');
  $cid=$_POST['export'];
  /*================class name and subject==========================================================*/
      $class_name=mysqli_fetch_array(mysqli_query($con ,"SELECT Name FROM class WHERE Class_id='$cid'"));
      $subject_name=mysqli_fetch_array(mysqli_query($con ,"SELECT subject.subject_name FROM subject INNER JOIN have ON have.Subject_id=subject.Subject_id WHERE have.Class_id='$cid' GROUP BY subject.subject_name"));
  /*===============ended==============================================================================*/

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=Presentation_Records.csv');
  $output=fopen("php://output", "w");
  fputcsv($output ,array("          ","Class Name : ".$class_name['Name']."",  "      "  , "subject Name: ".$subject_name['subject_name']." "));
  fputcsv($output, array("------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------"));
  fputcsv($output, array('Class NO', 'Name', 'Presentation Topic', 'Presentation Date','Obtained Marks','Total Marks'));
  fputcsv($output, array("------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------"));

  $store[]=null;
  if (isset($con)) {
          $check_register="SELECT S_id FROM register WHERE Class_id='$cid' ORDER BY Reg_no ASC";
          $exe_check=mysqli_query($con ,$check_register);
          if (mysqli_num_rows($exe_check)>0) {
            //this query check if class have no presentation of all student
            $stmt_check_attendence="SELECT * FROM presentation INNER JOIN presentation_record ON presentation_record.P_id=presentation.P_id WHERE presentation_record.Class_id='$cid'";
            $exe_attd=mysqli_query($con ,$stmt_check_attendence);
                if (mysqli_num_rows($exe_attd)>0 ) {
                  while ($std_id=mysqli_fetch_assoc($exe_check)) {
                    $std_name=mysqli_fetch_array(mysqli_query($con ,"SELECT register.Reg_no ,student.student_name FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' AND register.S_id='".$std_id['S_id']."'"));

                    $presentation=mysqli_query($con ,"SELECT presentation.p_topic,presentation.p_date,presentation_record.po_marks,presentation.pt_marks FROM presentation INNER JOIN presentation_record ON presentation_record.P_id=presentation.P_id WHERE presentation_record.Class_id='$cid' AND presentation_record.S_id='".$std_id['S_id']."' ");
                    $pre_row=mysqli_num_rows($presentation);
                    $presentation_padding=0;
                    if($pre_row==1){$presentation_padding=0;}else {$presentation_padding=(($pre_row)*0.7); }
                    if ($pre_row>0) {
                      $count=0;
                      while ($pre_result=mysqli_fetch_assoc($presentation)) {
                        if ($count<1) { $count++;
                          /*-----display the class no and name of student */
                          $store[0]=$std_name['Reg_no'];
                          $store[1]=$std_name['student_name'];
                          /*----------ended-------------------------------*/
                        }else {
                          $store[0]="  ";
                          $store[1]="  ";
                        }
                          /*_______Display presentation topic and it marks for the student__________*/
                          $store[2]=$pre_result['p_topic'];
                          $store[3]= $pre_result['p_date'];
                          $store[4]=$pre_result['po_marks'];
                          $store[5]=$pre_result['pt_marks'];
                          /*____________ended_____________________________________________________*/
                          fputcsv($output, $store);
                    }
                    fputcsv($output ,array("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~"));
                  }else {
                    /*if student has not presentation */
                    fputcsv($output ,array($std_name['Reg_no'], $std_name['student_name'] , "Sorry No Quize of the  Students. "  ));
                  }
                }
              }else {  // when no presentation of all the class students  (here student are registered with class but they no assignment )
                  fputcsv($output ,array("Sorry No Presentation found of all the Class Students." ));
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

}//end of isset if
 ?>
