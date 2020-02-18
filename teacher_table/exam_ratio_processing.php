<?php
include('../db_connection.php');
if (isset($con)) {
/*=======the below commented varials name are very important to acheive this functionality ========================*/
/*'''''''*/                     // $att=$_POST['attendance_ratio'];                                       /*'''''''*/
/*'''''''*/                     // $assi=$_POST['assignment_ratio'];                                      /*'''''''*/
/*'''''''*/                     // $pre=$_POST['presentatio_ratio'];                                      /*'''''''*/
/*'''''''*/                     // $quize=$_POST['quize_ratio'];                                          /*'''''''*/
/*'''''''*/                     // $E_id=$_POST['btn_manual'];                                            /*'''''''*/
/*=================================================================================================================*/

  $sql_exam=mysqli_query($con ,"SELECT * FROM exam INNER JOIN exam_record ON exam_record.E_id=exam.E_id WHERE exam_record.Class_id='$cid' AND exam_record.E_id='$E_id' GROUP BY exam_record.E_id");
  if (mysqli_num_rows($sql_exam)>0) {
    while ($row=mysqli_fetch_assoc($sql_exam)) {
      ?>
      <div id="display_ratio_record" class="row container-fluid ml-0 py-3 mb-5  border border-success " style="border-radius: 10px;">
        <!-- ratio display manuall -->
        <div class="row container-fluid ml-0 alert alert-success">
          <div class="col-lg-2"> <b>Ratios <i class="fas fa-angle-double-right"></i> </b>   </div>
          <div class="col-lg-2"> <i>Attendance: <b><?php echo $att; ?></b>  </i> </div>
          <div class="col-lg-2"> <i>Assignment: <b><?php echo $assi; ?></b>  </i> </div>
          <div class="col-lg-2"> <i>Presentation: <b><?php echo $pre; ?></b>  </i> </div>
          <div class="col-lg-2"> <i>Quize: <b><?php echo $quize; ?></b>  </i> </div>
          <div class="col-lg-2"> <a href="export_exam_ratio.php?cid=<?php echo $cid; ?>&E_id=<?php echo $row['E_id']; ?>&att=<?php echo $att; ?>&assi=<?php echo $assi; ?>&pre=<?php echo $pre; ?>&quize=<?php echo $quize; ?>"> <button type="button" name="button" class="btn btn-outline-info font-weight-bolder float-right">Export Exam as CSV File</button>  </a> </div>
        </div>
        <div class="col-lg-4 ">
          <span class="font-weight-bold  pl-lg-5 h3">Exam Term: <span class="font-weight-bolder h4" > &nbsp;<?php  echo $row['exam_term']; ?></span> </span>
        </div>
        <div class="col-lg-4 "><span class="font-weight-bold  pl-lg-5 h3">Exam Date: <span class="font-weight-bolder h4" > &nbsp;<?php  echo $row['exam_date']; ?></span> </span></div>
        <div class="col-lg-4"> <span class="font-weight-bold  pl-lg-5 h3">Total Marks: <span class="font-weight-bolder h4" > &nbsp;<?php  echo $row['total_marks']; ?></span> </span> </div>
        <div class="container-fluid">
          <table id="example1"  class="table table-straped table-hover table-bordered table-sm table-responsive-md table-responsive-sm" >
            <thead class="bg-info">
              <tr>
                <th>Class No</th>
                <th>Student Name</th>
                <th>Exam Marks Obtained</th>
                <th>Attendance Ratio</th>
                <th>Assignment Ratio</th>
                <th>Presentation Ratio</th>
                <th>Quize Ratio</th>
                <th>Total</th>
                <th>Total Obtained Marks</th>
              </tr>
            </thead>
            <tbody>


              <?php
              $query2="
              SELECT register.Reg_no,student.student_name,student.S_id,exam_record.obtained_marks FROM exam_record
              INNER JOIN register ON exam_record.S_id=register.S_id
              INNER JOIN student ON exam_record.S_id=student.S_id
              AND exam_record.Class_id='$cid' AND exam_record.E_id='".$row['E_id']."'
              AND register.Class_id='$cid'
              ";
              $exe=mysqli_query($con , $query2);
              if (mysqli_num_rows($exe)>0){
                $attendance_ratio=0;
                $assignment_ratio=0;
                $presentation_ratio=0;
                $quize_ratio=0;

                while ($r=mysqli_fetch_array($exe)) {
                  ?>
                  <tr>
                    <td><?php echo $r['Reg_no'];  ?></td>
                    <td><?php echo $r['student_name'];  ?></td>
                    <td><?php echo $r['obtained_marks'];  ?></td>
                    <td>
                      <?php
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
                          echo "No Attendance Yet";
                        }else {
                          $attendance_ratio=number_format((($a_obtained/$a_total)*$att),2);
                          echo $attendance_ratio;
                        }

                       ?>
                    </td>
                    <td>
                      <?php
                      $sql_assignment=mysqli_query($con ,"
                          SELECT sum(assignment_record.ao_marks),SUM(assignment.at_marks) FROM assignment
                          INNER JOIN assignment_record ON assignment_record.A_id=assignment.A_id
                          WHERE assignment_record.Class_id='$cid'
                          AND assignment_record.S_id='".$r['S_id']."'
                        ");
                          if (mysqli_num_rows($sql_assignment)>0) {
                            $record=mysqli_fetch_array($sql_assignment);
                            if ($record[1]==0) {
                              echo "No Assignment";
                            }else {
                              $assignment_ratio= number_format((($record[0]/$record[1])*$assi),2);
                              echo $assignment_ratio;
                            }
                          }else {
                            echo "No Assignment";
                          }
                      ?>
                    </td>
                    <td>
                      <?php
                          $sql_presentation=mysqli_query($con ,"
                          SELECT sum(presentation_record.po_marks),sum(presentation.pt_marks) FROM presentation
                          INNER JOIN presentation_record ON presentation_record.P_id=presentation.P_id
                          WHERE presentation_record.Class_id='$cid'
                          AND presentation_record.S_id='".$r['S_id']."'
                          ");
                          if (mysqli_num_rows($sql_presentation)>0) {
                            $rp=mysqli_fetch_array($sql_presentation);
                            if ($rp[1]==0) {
                              echo "No Presentation";
                            }else {
                              $presentation_ratio= number_format((($rp[0]/$rp[1])*$pre),2);
                              echo $presentation_ratio;
                            }
                          }else {
                            echo "No Presentation";
                          }

                       ?>
                    </td>
                    <td>
                      <?php
                          $sql_quize=mysqli_query($con ,"
                          SELECT SUM(quiz_record.qo_marks),SUM(quize.qt_marks) FROM quize
                          INNER JOIN quiz_record ON quiz_record.Q_id=quize.Q_id
                          WHERE quiz_record.Class_id='$cid'
                          AND quiz_record.S_id='".$r['S_id']."'
                            ");
                            if (mysqli_num_rows($sql_quize)>0) {
                              $rq=mysqli_fetch_array($sql_quize);
                              if ($rq[1]==0) {
                                echo "No Quize";
                              }else {
                                $quize_ratio= number_format((($rq[0]/$rq[1])*$quize),2);
                                echo $quize_ratio;
                              }
                            }else {
                              echo "No Quize";
                            }
                       ?>
                    </td>
                    <td><?php echo ($attendance_ratio+$assignment_ratio+$presentation_ratio+$quize_ratio);  ?></td>
                    <td><?php echo ($r['obtained_marks']+($attendance_ratio+$assignment_ratio+$presentation_ratio+$quize_ratio));  ?></td>


                  </tr>

                  <?php
                }
              }else {
                echo "Yet No Exam Result are Uploaded.";
              }?>
            </tbody>
          </table>
        </div>
      </div>
      <?php
    }//while are ended...

  }else {?>
    <div class="alert alert-warning text-center font-weight-bold">
      Yet No Exam Result are Uploaded...
    </div>
    <?php
  }


}else {
  echo "<script> alert('problem in the database Connection try again.'); </script>";
}

 ?>
