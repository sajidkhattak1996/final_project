<?php
include('db_connection.php');
if (isset($_GET['cid'])) {
  /*---------csv file declartion code -------------------------------------------*/
  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=Attendace_All_Records.csv');
  $output = fopen("php://output", "w");
  /*---------csv file declartion code ended ----------------------------------------*/
  $store[]=null;
  $cid=$_GET['cid'];
  if (isset($con)) {
    /*================class name and subject==========================================================*/
    $class_name=mysqli_fetch_array(mysqli_query($con ,"SELECT Name FROM class WHERE Class_id='$cid'"));
    $subject_name=mysqli_fetch_array(mysqli_query($con ,"SELECT subject.subject_name FROM subject INNER JOIN have ON have.Subject_id=subject.Subject_id WHERE have.Class_id='$cid' GROUP BY subject.subject_name"));
    /*===============ended==============================================================================*/
/*---------csv file code --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
  fputcsv($output ,array("          ","Class Name : ".$class_name['Name']."",  "      "  , "subject Name: ".$subject_name['subject_name']." "));
  fputcsv($output, array("---------------------------------------------------------------------------------------------------------------------------------------------------------------------------"));
/*---------csv file code ended--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

    $sid_stmt="SELECT S_id,Reg_no FROM register WHERE Class_id='$cid' ORDER BY Reg_no ASC";
    $exe_sid=mysqli_query($con ,$sid_stmt);
      if (mysqli_num_rows($exe_sid)>0) {
        //this query check if class have no attendece of all student
          $stmt_check_attendence="SELECT * FROM `attendence_record` WHERE Class_id='$cid'";
            $exe_attd=mysqli_query($con ,$stmt_check_attendence);
            if (mysqli_num_rows($exe_attd)>0 ) {
              while ($sid_row=mysqli_fetch_assoc($exe_sid)) {
                /*================get the student name from here============================================================================================================================================================================*/
                $sname_sql="SELECT register.Reg_no,student.student_name FROM register INNER JOIN student ON student.S_id=register.S_id WHERE register.S_id='".$sid_row['S_id']."' AND register.Class_id='$cid'";
                $exe_sn=mysqli_query($con ,$sname_sql);
                $sn_row=mysqli_fetch_array($exe_sn);
                fputcsv($output, array("Class NO:".$sn_row['Reg_no']." ","   ","Name: ".$sn_row['student_name'].""));
                fputcsv($output, array('Addendence Date', 'Addendence Percentage'));
                $store[0];
                /*===============================================================================================================================================================================================================================*/
                //get the attendence Records
                $att_sql=mysqli_query($con ,"SELECT attendence_record.AT_date,attendence.status FROM attendence INNER JOIN attendence_record ON attendence_record.AT_id=attendence.AT_id WHERE attendence_record.Class_id='$cid' AND attendence_record.S_id='".$sid_row['S_id']."'");
                if (mysqli_num_rows($att_sql)>0)
                {
                  while ($att_row=mysqli_fetch_assoc($att_sql))
                  {
                    $store[0]=$att_row['AT_date'];
                    $store[1]=$att_row['status'];
                    fputcsv($output ,$store);
                  }
                }else {
                  $store[0]= "no attandance ";
                  fputcsv($output ,$store);
                }
                fputcsv($output, array("---------------------------------------------------------------------------------------------------------------------------------------------------------------------"));
              }
            }else {
              // when no attendence for all the student of class
              $store[0]= "No Attendance for the Class Students.";
              fputcsv($output ,$store);
            }

      }else {
        $store[0]= "No student are registerd to this class ";
        fputcsv($output ,$store);
      }

}else {
  fputcsv($output ,array("Connection Problem! "));
}
fclose($output);
}

 ?>
