<?php
      //export.php
      include('db_connection.php');
      $cid=$_POST['export'];
      $sid=$_POST['sid'];
      header('Content-Type: text/csv; charset=utf-8');
      header('Content-Disposition: attachment; filename=data.csv');
      $output = fopen("php://output", "w");
      fputcsv($output, array('Class NO', 'Name', 'Addendence Date', 'Addendence Percentage'));
      $store[]=null;
      $sid_stmt="SELECT S_id,Reg_no FROM register WHERE Class_id='$cid' AND s_id='$sid' ORDER BY Reg_no ASC";
      $exe_sid=mysqli_query($con ,$sid_stmt);
      if (mysqli_num_rows($exe_sid)>0) {
              while ($sid_row=mysqli_fetch_assoc($exe_sid)) {
                          $sname_sql="SELECT student_name FROM student WHERE S_id='".$sid_row['S_id']."'";
                          $exe_sn=mysqli_query($con ,$sname_sql);
                          $sn_row=mysqli_fetch_array($exe_sn);

                          $stmt3="SELECT attendence.AT_id,attendence_record.AT_date FROM attendence INNER JOIN attendence_record on attendence_record.AT_id=attendence.AT_id WHERE Class_id='$cid' AND S_id='".$sid_row['S_id']."' ORDER BY attendence_record.AT_date DESC";
                          $exe3=mysqli_query($con , $stmt3);
                          $nr=mysqli_num_rows($exe3);
                          if ($nr>0) {
                                $t=0;
                                $t2=0;
                                $Aid_array[]=0;
                                $Adate_array[]=0;
                                while ($row=mysqli_fetch_assoc($exe3)) {
                                      $Aid_array[$t]=$row['AT_id'];
                                      $Adate_array[$t]=$row['AT_date'];
                                      $t++;
                                      }
                                      $temp=($t/30);
                                      $temp_round=ceil($temp);
                                      for ($i=0; $i <$temp_round ; $i++) {
                                                            $p=0;
                                                            $a=0;
                                                            $l=0;
                                                            $lp=0;
                                                            $store[0]=$sid_row['Reg_no'];
                                                            $store[1]=$sn_row['student_name'];
                                                            $store[2]=$Adate_array[$t2];

                                                            while ($lp<30 && $t>0) {
                                                              // echo "okkkkkkkkkkkkkkkkkkkkkkk<br>";
                                                              // echo "t2===".$t2;
                                                                if ($Aid_array[$t2]==1) {
                                                                  $p++;
                                                                }
                                                                if ($Aid_array[$t2]==2) {
                                                                  $a++;
                                                                }
                                                                if ($Aid_array[$t2]==3) {
                                                                  $l++;
                                                                }
                                                                $lp++;
                                                                $t--;
                                                                $t2++;
                                                                // echo "<h1>".$std_id."date==".$r['AT_date']."</h1>";
                                                            }
                                                            $total=$p+$a+$l;
                                                            $ap=0;
                                                            if ($p==0) {
                                                                  $store[3]=$ap."%";

                                                            }else {
                                                              $ap=(($p/$total)*100);
                                                              $n=number_format($ap,1);           //the number_format are use to display the digit after decimal point
                                                              $store[3]=$n."%";

                                                            }
                                                        fputcsv($output, $store);
                                              }



                          }else {
                              $store[0]="No Attendance Record";
                              }
                      // fputcsv($output, $store);
              }



      }else {
        $store[0]="No student are register with this class";
        fputcsv($output, $store);

      }
fclose($output);

 ?>
