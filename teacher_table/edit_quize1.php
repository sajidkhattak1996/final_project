<?php
/*======================includeing the navagation menu ===========*/
  include('top_info.php');
  /*===========ended ===========*/
  // <!--===============below loader are include =================-->
   include('../plugins/loader/loader1.html');
  // <!--=================ended==================================-->
  if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {
    ?>
    <!DOCTYPE html>
      <html lang="en" dir="ltr">
        <head>
                <link rel="stylesheet" href="../datatables-bs4/css/dataTables.bootstrap4.css">
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="description" content="">

                <title>welcome to webside as a teacher  </title>

                <style media="screen">
                    #quz{
                      background-image: -webkit-linear-gradient(180deg,rgba(172,239,224,0.96) 21.76%,rgba(0,140,126,0.50) 98.45%);
                      background-image: -moz-linear-gradient(180deg,rgba(172,239,224,0.96) 21.76%,rgba(0,140,126,0.50) 98.45%);
                      background-image: -o-linear-gradient(180deg,rgba(172,239,224,0.96) 21.76%,rgba(0,140,126,0.50) 98.45%);
                      background-image: linear-gradient(180deg,rgba(172,239,224,0.96) 21.76%,rgba(0,140,126,0.50) 98.45%);
                      color: blue;
                      font-weight: bolder;
                      border-left: solid 1px rgba(172,239,224,0.66);
                      border-top: solid 1px rgba(172,239,224,0.66);
                      border-right: solid 1px rgba(172,239,224,0.66);
                    }
                </style>
              <script type="text/javascript">
                function FnCheck(){
                  var loop_lenght=document.getElementById("temp").value;
                  var total_marks=parseInt(document.getElementById("t_marks").value);
                  var status=0;
                  for (var i = 1; i <=loop_lenght; i++) {
                      var obtanined_marks=parseInt(document.getElementById("ob_marks"+i).value);
                      var row=document.getElementById("r"+i);
                      var msg=document.getElementById("m2");
                      if (obtanined_marks>total_marks) {
                        status=1;
                        document.getElementById("m2").innerHTML='Obtained Of Student Shoud not be Greater then the Total Marks';
                        document.getElementById("m2").style.display='block';
                        row.style.background='#f8d7da';
                        row.style.color='#721c24';
                      }else {
                        row.style.background='#cce5ff';
                        row.style.color='#004085';
                      }
                  }
                  if (status==1) {return false;}else {
                    document.getElementById("m2").innerHTML='';
                    document.getElementById("m2").style.display='none';
                  }
                }

              </script>
          </head>
            <body>
              <!--============includeing the top navagation menu  ================-->
                    <?php  include('classes_subject_top_menu.php');  ?>
              <!--============ended===============================================-->

                <!--=========================edit assignment ========================================================================= -->
                <div class="tend row py-3"  style="border-radius: 10px 10px 0px 0px;width:100%;margin:0 auto;margin-bottom: 8px;height: auto;padding-bottom:3px;padding-top: 0px">
                    <div class="col-lg-2 col-sm-3 ">
                      <h3>Class ID: <?php echo $cid; ?></h3>
                    </div>
                    <div class="col-lg-3 col-sm-3 ">
                      <h3>Class Name:&nbsp;<span style="color: blue"><?php echo $r1['Name'];  ?></span></h3>
                    </div>

                    <div class="col-lg-5 col-sm-3 ">
                      <h3>Subject Name:&nbsp;<span style="color: deeppink;letter-spacing:1px"><?php echo $r2['subject_name'];  ?></span></h3>
                    </div>

                    <div class="col-lg-2 col-sm-3">
                      <a href="edit_quize_topic.php" class="btn btn-primary  float-right" > Edit Quize Topic  </a>
                    </div>

                </div>

                <h5><strong>Note: </strong>Click on Student Name to Select them to Edit his/her Quize.</h5>
              <span id="spn" style="margin-left: 300px"></span>
                  <table class="table table-straped" id="example1">
                      <thead>
                         <tr>
                            <th>Class No</th>
                            <th>Name</th>
                         </tr>
                      </thead>
                      <tbody>
                            <?php
                              include('../db_connection.php');
                              $sql="SELECT register.S_id,register.Reg_no,student.student_name FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' ORDER BY register.Reg_no ASC";
                              $query2=mysqli_query($con ,$sql);
                              if (mysqli_num_rows($query2)>0) {
                                while ($row=mysqli_fetch_assoc($query2)) {
                                  ?>
                                  <tr>
                                    <td><?php echo $row['Reg_no']; ?></td>
                                    <td><a href="edit_quize2.php?id=<?php echo $row['S_id']; ?>" style="text-decoration:none"><?php echo $row['student_name']; ?></a></td>
                                  </tr>
                                  <?php
                                }
                              }else {
                                  ?>
                                  <tr>
                                    <td colspan="2" class="alert alert-warning text-center">No Student are Register to the Class. </td>
                                  </tr>

                                  <?php
                              }
                             ?>
                      </tbody>
                  </table>
                    <div class="tend">  </div>
              <!-- =========================edit assignment ended=========================================================================-->

              </body>
              </html>

              <script type="text/javascript" src="js/jquery.js"></script>
              <script src="../datatables/jquery.dataTables.js"></script>
              <script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>

              <script>
                $(function () {
                  // $("#example1").DataTable();
                  $('#example1').DataTable({
                    "paging": false,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                  });
                });
              </script>




            </body>
      </html>


  <?php
          }
        else {
          echo "<script> alert('Please Login first!.... '); </script>";
        }

  ?>
