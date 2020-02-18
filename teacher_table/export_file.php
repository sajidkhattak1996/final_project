<?php
      //export.php
      include('db_connection.php');
      $cid=$_POST['export'];
  /*================class name and subject==========================================================*/
      $class_name=mysqli_fetch_array(mysqli_query($con ,"SELECT Name FROM class WHERE Class_id='$cid'"));
      $subject_name=mysqli_fetch_array(mysqli_query($con ,"SELECT subject.subject_name FROM subject INNER JOIN have ON have.Subject_id=subject.Subject_id WHERE have.Class_id='$cid' GROUP BY subject.subject_name"));
  /*===============ended==============================================================================*/
      header('Content-Type: text/csv; charset=utf-8');
      header('Content-Disposition: attachment; filename=Attendance_Monthly_Records.csv');
      $output = fopen("php://output", "w");
      fputcsv($output ,array("          ","Class Name : ".$class_name['Name']."",  "      "  , "subject Name: ".$subject_name['subject_name']." "));
      fputcsv($output, array("---------------------------------------------------------------------------------------------------------------------------------------------------------------------------"));
      fputcsv($output, array('Class NO', 'Name', 'Addendance Date', 'Addendance Percentage'));
      fputcsv($output, array("---------------------------------------------------------------------------------------------------------------------------------------------------------------------------"));

      $store[]=null;


      if (isset($con)) {
            $sid_stmt="SELECT S_id FROM register WHERE Class_id='$cid' ORDER BY Reg_no ASC";
            $exe_sid=mysqli_query($con ,$sid_stmt);
            if (mysqli_num_rows($exe_sid)>0) {
              //this query check if class have no attendece of all student
              $stmt_check_attendence="SELECT * FROM `attendence_record` WHERE Class_id='$cid'";
              $exe_attd=mysqli_query($con ,$stmt_check_attendence);
                  if (mysqli_num_rows($exe_attd)>0 ) {
                    $s=0;
                    while ($sid_row=mysqli_fetch_assoc($exe_sid)) {
                      /*================get the student name from here============================================================================*/
                      $sname_sql="SELECT register.Reg_no,student.student_name FROM register INNER JOIN student ON student.S_id=register.S_id WHERE register.S_id='".$sid_row['S_id']."' AND register.Class_id='$cid'";
                      $exe_sn=mysqli_query($con ,$sname_sql);
                      $sn_row=mysqli_fetch_array($exe_sn);
                      /*===============================================================================================================================*/
                      $count=0;
                      /*============================get the only year of particular class and students=============================================================================================================================================*/
                      $sql_year="SELECT year(attendence_record.AT_date) FROM attendence_record WHERE attendence_record.Class_id='$cid' AND attendence_record.S_id='".$sid_row['S_id']."' GROUP BY year(attendence_record.AT_date)";
                      if (mysqli_num_rows(mysqli_query($con ,$sql_year))>0) {
                        $e=mysqli_query($con ,$sql_year);
                        while ($y=mysqli_fetch_array($e)) {
                          /*=============================get the all months record of students========================================================================================================================================================================================================*/
                          $stmt3="SELECT month(attendence_record.AT_date) FROM attendence_record WHERE attendence_record.Class_id='$cid' AND attendence_record.S_id='".$sid_row['S_id']."' AND year(attendence_record.AT_date)='".$y[0]."' GROUP BY month(attendence_record.AT_date)";
                          $exe3=mysqli_query($con , $stmt3);
                          $nr=mysqli_num_rows($exe3);
                          if ($nr>0) {
                            while ($m=mysqli_fetch_array($exe3)) {
                              if($count<1){
                                $store[0]=$sn_row[0];
                                $store[1]=$sn_row[1];
                              }else {
                                $store[0]=" ";
                                $store[1]=" ";
                              }
                               $count++;
                              if($m[0]==1){  $store[2]= $y[0]."   -  January"; }
                              if($m[0]==2){  $store[2]= $y[0]."   - Februray"; }
                              if($m[0]==3){  $store[2]= $y[0]."   - March"; }
                              if($m[0]==4){  $store[2]= $y[0]."   - April"; }
                              if($m[0]==5){  $store[2]= $y[0]."   - May"; }
                              if($m[0]==6){  $store[2]= $y[0]."   - June"; }
                              if($m[0]==7){  $store[2]= $y[0]."   - July"; }
                              if($m[0]==8){  $store[2]= $y[0]."   - August"; }
                              if($m[0]==9){  $store[2]= $y[0]."   - September"; }
                              if($m[0]==10){ $store[2]= $y[0]."   - October"; }
                              if($m[0]==11){ $store[2]= $y[0]."   - November"; }
                              if($m[0]==12){ $store[2]= $y[0]."   - December"; }



                              $record="SELECT attendence_record.AT_id FROM attendence_record INNER JOIN attendence ON attendence_record.AT_id=attendence.AT_id WHERE attendence_record.Class_id='$cid' AND attendence_record.S_id='".$sid_row['S_id']."' AND month(attendence_record.AT_date)='".$m[0]."'";
                              //the above query gives us the attendence records of month
                              $exe_record=mysqli_query($con,$record);
                              if (mysqli_num_rows($exe_record)>0) {
                                $p=mysqli_num_rows(mysqli_query($con ,"
                                SELECT attendence_record.AT_id FROM attendence_record
                                INNER JOIN attendence ON attendence_record.AT_id=attendence.AT_id
                                WHERE attendence_record.Class_id='$cid'
                                AND attendence_record.S_id='".$sid_row['S_id']."'
                                AND month(attendence_record.AT_date)='".$m[0]."'
                                AND attendence_record.AT_id='1'
                                "));

                                $a=mysqli_num_rows(mysqli_query($con ,"
                                SELECT attendence_record.AT_id FROM attendence_record
                                INNER JOIN attendence ON attendence_record.AT_id=attendence.AT_id
                                WHERE attendence_record.Class_id='$cid'
                                AND attendence_record.S_id='".$sid_row['S_id']."'
                                AND month(attendence_record.AT_date)='".$m[0]."'
                                AND attendence_record.AT_id='2'
                                "));

                                $l=mysqli_num_rows(mysqli_query($con ,"
                                SELECT attendence_record.AT_id FROM attendence_record
                                INNER JOIN attendence ON attendence_record.AT_id=attendence.AT_id
                                WHERE attendence_record.Class_id='$cid'
                                AND attendence_record.S_id='".$sid_row['S_id']."'
                                AND month(attendence_record.AT_date)='".$m[0]."'
                                AND attendence_record.AT_id='3'
                                "));

                                if ($p==0) {
                                  //display percentage
                                  $store[3]= $p." %  & L = ".$l;
                                }else {
                                  $total=($p+$a+$l);
                                  $per=(($p/$total)*100);
                                  $per_formate=number_format($per ,1);

                                  $store[3]= $per_formate." %  & L = ".$l;

                                }
                              }else {
                                $store[0]= "no attendance for that months ";
                                fputcsv($output ,$store);
                              }
                              fputcsv($output ,$store);
                            }//end while month
                          }else {
                            $store[0]= "no attendance for that year";
                            fputcsv($output ,$store);
                          }
                          /*====================================================================================================================================================================================================================================================================================*/
                          $store[0]="~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~";
                          $store[1]="~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~";
                          $store[2]="~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~";
                          $store[3]="~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~";
                          fputcsv($output ,$store);

                        } //end while year
                        /*===========================================================================================================================================================================================================================*/

                      }else {
                        // fputcsv($output ,array("No Attendece ."));
                        $store[0]=$sn_row[0];
                        $store[1]=$sn_row[1];
                        $store[2]="No Attendance .";
                        fputcsv($output ,$store);
                        $store[0]="~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~";
                        $store[1]="~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~";
                        $store[2]="~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~";
                        fputcsv($output ,$store);
                     }

                    }

                  }else {
                    fputcsv($output ,array("No Attendance for all the Class Students ."));
                    //if no attendence for all the studetent of the class
                  }

            }else {
                fputcsv($output ,array("No student are register with this class"));
            }

      }
      else {
        fputcsv($output ,array("Database Connection  Problem!  "));
      }
      fclose($output);

 ?>
