<?php
include 'calculate_percentage.php';
$starting_date=$_POST['start_date'];
$end_date=$_POST['end_date'];
?>

<div style="margin-top:5px">
  <form method="post"  action="export_calculate_percentage_csv.php">
    <input type="date" name="d1" value="<?php echo $starting_date; ?>" style="display:none">
    <input type="date" name="d2" value="<?php echo $end_date; ?>" style="display:none">
    <button type="submit" class="btn btn-outline-primary" name="export" value="<?php echo $cid; ?>" style="float: left;margin-left: 2%;"><b>Export as CSV File</b>
    </button>
  </form>

<table id="example1" class="table table-striped  table-bordered table-hover table-sm">
    <thead class="bg-info">
            <tr>
              <th scope="col" scope="row">Class No</th>
              <th scope="col">Name</th>
              <th scope="col">Attendance Percentage</th>


            </tr>
      </thead>
        <tbody class="bg-light">

          <?php
              if (isset($con)) {
                    $sid_stmt="SELECT S_id,Reg_no FROM register WHERE Class_id='$cid'";
                    $exe_sid=mysqli_query($con ,$sid_stmt);
                    if (mysqli_num_rows($exe_sid)>0) {
                      //this query check if class have no attendece of all student
                      $stmt_check_attendence="SELECT * FROM `attendence_record` WHERE Class_id='$cid'";
                      $exe_attd=mysqli_query($con ,$stmt_check_attendence);
                          if (mysqli_num_rows($exe_attd)>0 ) {
                            while ($sid_row=mysqli_fetch_assoc($exe_sid)) {
                              $sname_sql="SELECT student_name FROM student WHERE S_id='".$sid_row['S_id']."'";
                              $exe_sn=mysqli_query($con ,$sname_sql);
                              $sn_row=mysqli_fetch_array($exe_sn);
                              //the below commented sql statement display all attendece records
                              // $stmt3="SELECT attendence.AT_id,attendence_record.AT_date FROM attendence INNER JOIN attendence_record on attendence_record.AT_id=attendence.AT_id WHERE Class_id='$cid' AND S_id='".$sid_row['S_id']."' ORDER BY attendence_record.AT_date DESC";
                              $stmt3="SELECT AT_id,AT_date FROM attendence_record WHERE Class_id='".$cid."' AND S_id='".$sid_row['S_id']."' AND AT_date>='".$starting_date."' AND AT_date<='".$end_date."'";
                              $exe3=mysqli_query($con , $stmt3);
                              $nr=mysqli_num_rows($exe3);
                              if ($nr>0) {

                                $p=0;
                                $a=0;
                                $l=0;

                                ?><tr><?php
                                ?><td><?php echo $sid_row['Reg_no'];  ?></td>  <?php
                                ?><td><?php echo $sn_row['student_name'];  ?></td> <?php

                                while ($aid_row=mysqli_fetch_assoc($exe3)) {
                                  // echo "okkkkkkkkkkkkkkkkkkkkkkk<br>";
                                  // echo "t2===".$t2;
                                  if ($aid_row['AT_id']==1) {
                                    $p++;
                                  }
                                  if ($aid_row['AT_id']==2) {
                                    $a++;
                                  }
                                  if ($aid_row['AT_id']==3) {
                                    $l++;
                                  }


                                  // echo "<h1>".$std_id."date==".$r['AT_date']."</h1>";
                                }
                                $total=$p+$a+$l;
                                $ap=0;
                                /*================================================condition for attendence percentage =======================================================*/
                                if ($p==0) {  ?>
                                  <td class="bg-danger">
                                    <?php  echo $ap;  ?>&nbsp;%  And <?php echo $l; ?> L &nbsp;&nbsp;
                                  </td>
                                  <?php
                                }else {
                                  $ap=(($p/$total)*100);
                                  $n=number_format($ap,1);           //the number_format are use to display the digit after decimal point
                                  ?>
                                  <td >
                                    <?php  echo $n;  ?>&nbsp;%  And <?php echo $l; ?> L &nbsp;&nbsp;
                                  </td>
                                  <?php
                                }

                                /*================================================ended =======================================================*/

                              }else {  ?>
                                <td><?php echo $sid_row['Reg_no']; ?></td>
                                <td><?php echo $sn_row['student_name'];  ?></td>
                                <td class="alert alert-warning "><?php echo "No Attendance ";  ?></td>
                              <?php  }

                              ?>
                            </tr>
                            <?php
                          }
                          }else {
                                ?> <tr>
                                  <td colspan="3" class="alert alert-warning text-center font-weight-bold">
                                      No Attendance for the all the Class Students.
                                  </td>
                                </tr> <?php
                          }



                    }else {?>
                    <tr>
                      <td colspan="4" class="text-center alert alert-warning"> <?php echo "No student are register with this class"; ?>  </td>
                    </tr>
                    <?php
                    }





              }
              else {
                echo "<script>  alert('Error Occur while connecting to the Database!');   </script>".mysqli_error($con);
              }
           ?>

          </tbody>


  </table>
  <!--===============below loader are include =================-->
  <?php include('../plugins/loader/loader1.html'); ?>
  <!--=================ended==================================-->
</div>

<?php

 ?>
