<?php
      //export.php
      include('db_connection.php');
      $cid=$_POST['export'];
      $starting_date=$_POST['d1'];
      $end_date=$_POST['d2'];

      header('Content-Type: text/csv; charset=utf-8');
      header('Content-Disposition: attachment; filename=data.csv');
      $output = fopen("php://output", "w");   //the w are use only for write only
      fputcsv($output, array('Class NO', 'Name', 'Addendance Persentage'));
      $sid_stmt="SELECT S_id,Reg_no FROM register WHERE Class_id='$cid'  ORDER BY Reg_no ASC";
      $exe_sid=mysqli_query($con ,$sid_stmt);
      $store[]=null;  //array taken which store the row of records
      if (mysqli_num_rows($exe_sid)>0) {
              while ($sid_row=mysqli_fetch_assoc($exe_sid)) {

                          $sname_sql="SELECT student_name FROM student WHERE S_id='".$sid_row['S_id']."'";
                          $exe_sn=mysqli_query($con ,$sname_sql);
                          $sn_row=mysqli_fetch_array($exe_sn);
                          $stmt3="SELECT AT_id,AT_date FROM attendence_record WHERE Class_id='".$cid."' AND S_id='".$sid_row['S_id']."' AND AT_date>='".$starting_date."' AND AT_date<='".$end_date."'";
                          // $stmt3="SELECT attendence.AT_id,attendence_record.AT_date FROM attendence INNER JOIN attendence_record on attendence_record.AT_id=attendence.AT_id WHERE Class_id='$cid' AND S_id='".$sid_row['S_id']."' ORDER BY attendence_record.AT_date DESC";
                          $exe3=mysqli_query($con , $stmt3);
                          $nr=mysqli_num_rows($exe3);
                          if ($nr>0) {

                                                            $p=0;
                                                            $a=0;
                                                            $l=0;
                                                            $lp=0;

                                                            $store[0]=$sid_row['Reg_no'];
                                                            $store[1]=$sn_row['student_name'];
                                                            while ($a_row=mysqli_fetch_assoc($exe3)) {
                                                                if ($a_row['AT_id']==1) {  $p++;  }
                                                                if ($a_row['AT_id']==2) {  $a++;  }
                                                                if ($a_row['AT_id']==3) {  $l++;  }
                                                                $lp++;
                                                            }
                                                            $total=$p+$a+$l;
                                                            $ap=0;
                                                            if ($p==0) {
                                                                  $store[2]=$ap."%";
                                                            }else {
                                                              $ap=(($p/$total)*100);
                                                              $n=number_format($ap,1);           //the number_format are use to display the digit after decimal point

                                                              $store[2]=$n."%";
                                                            }

                          }else {
                            $store[0]=$sid_row['Reg_no'];
                            $store[1]=$sn_row['student_name'];
                            $store[2]="No Attendance";
                        }



                fputcsv($output, $store);
              }



      }else {
        $store[0]="No Students are Register With this Class";
        fputcsv($output, $store);

      }
fclose($output);

 ?>
