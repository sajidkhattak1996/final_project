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
                // function fn(obj){
                //   // document.getElementById('r2').contentEditable = true;
                //   document.getElementById("r2").contentEditable = "true";
                //
                // }
                function fn(obj ,edit_btn){
                  // document.getElementById("r1"+obj).contentEditable='TRUE';
                  // document.getElementById("r2"+obj).contentEditable='TRUE';
                  // document.getElementById("r3"+obj).contentEditable='TRUE';
                  // document.getElementById("r4"+obj).contentEditable='TRUE';
                  document.getElementById("row"+obj).style = "background: #b8daff";

                  var c1=document.getElementById("r1"+obj);
                  var c2=document.getElementById("r2"+obj);
                  var c3=document.getElementById("r3"+obj);
                  var c4=document.getElementById("r4"+obj);
                  // c1.readOnly= false;
                  // c2.readOnly= false;
                  c3.readOnly= false;
                  // c4.readOnly= false;

                  c1.style="background: #b8daff;border:none";
                  c2.style="background: #b8daff;border:none";
                  c3.style="border:solid 1px #004085;border-radius: 5px;";
                  c4.style="background: #b8daff;border:none";


                  edit_btn.style.display='none';

                }
                function Fn_change(obj){
                  document.getElementById("edit"+obj).style.display='block';
                }
                //function for the delete items
                function Fn_del(id,obj){
                  obj.style.display='none';
                  document.getElementById("conf_del"+id).style.display='block';
                }
                //below function are use validation of obtained according to the total marks
                function myfn(obj_row_no){

                  var c3=document.getElementById("r3"+obj_row_no).value;    //obtained marks
                  var c4=document.getElementById("r4"+obj_row_no).value;    //total marks
                  var status=0;

                  if(c3==''){  alert('Please fill the field');  return false;}
                  if(c3>c4){  Status=1; }
                  if (status==1) {
                    alert('Obtained Shoud not be Greater then the Total Marks'); return false;
                  }
                }
              </script>
          </head>
            <body>
              <!--============includeing the top navagation menu  ==============================================================================================-->
                    <?php  include('classes_subject_top_menu.php');  ?>
              <!--============ended=============================================================================================================================-->

                <!--=========================edit assignment ========================================================================= -->
                <div class="tend "  style="border-radius: 10px 10px 0px 0px;width:100%;margin:0 auto;margin-bottom: 8px;height: auto;padding-bottom:3px;padding-top: 0px">
                    <div class="row  py-3" style="border-bottom: solid 2px #fff">
                      <div class="col-lg-2 col-sm-3 ">
                        <h3 class="pl-2" >Class ID: <?php echo $cid; ?></h3>
                      </div>
                      <div class="col-lg-3 col-sm-3 ">
                        <h3 class="pl-2">Class Name:&nbsp;<span style="color: blue"><?php echo $r1['Name'];  ?></span></h3>
                      </div>

                      <div class="col-lg-5 col-sm-3 ">
                        <h3 class="pl-2">Subject Name:&nbsp;<span style="color: deeppink;letter-spacing:1px"><?php echo $r2['subject_name'];  ?></span></h3>
                      </div>

                      <div class="col-lg-2 col-sm-3">
                        <a href="edit_quize1.php" class="btn btn-primary float-right" > Edit Quize   </a>
                      </div>
                    </div>
                    <?php
                    $sid=0;
                    if (isset($_GET['id'])) {
                        $sid=$_GET['id'];
                        $sql3="SELECT register.Reg_no,student.S_id,student.student_name FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' AND register.S_id='$sid'";
                        $r3=mysqli_fetch_array(mysqli_query($con ,$sql3));
                    }
                    ?>
                    <div class="row text-light py-2">
                        <div class="col-lg-2 col-sm-2">
                          <h4 class="pl-2">Class NO: <?php echo $r3['Reg_no']; ?></h4>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                          <h4 class="text-capitalize pl-2">Student Name: <?php echo $r3['student_name']; ?></h4>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                          <!-- <a href=""> <button type="button" name="button" class="btn btn-outline-light float-right">ADD New Assignment</button> </a> -->
                        </div>
                    </div>
                </div>


                <table id="example1" class="table table-straped ">

                    <thead class="bg-info">
                        <tr>
                          <td>Quize Topic</td>
                          <td>Quize Date</td>
                          <td>Obtained Marks</td>
                          <td>Total Marks</td>
                          <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                          $ass_record=mysqli_query($con ,"SELECT Quize.Q_id,quize.q_topic,quize.q_date,quize.qt_marks,quiz_record.qo_marks FROM quize INNER JOIN quiz_record on quiz_record.Q_id=quize.Q_id WHERE quiz_record.Class_id='$cid' AND quiz_record.S_id='$sid'");
                          if (mysqli_num_rows($ass_record)>0) {
                            $i=0;
                            if (isset($_SESSION['msg'])) {
                              echo "<script> alert('success') </script>";
                              unset($_SESSION['msg']);
                            }
                            while ($r=mysqli_fetch_assoc($ass_record)) { $i++;
                                ?>
                                <tr id="row<?php echo $i; ?>">
                                  <form  method="post" name="f<?php echo $i; ?>" id="f" action="edit_quize_processing.php?sid=<?php echo $sid; ?>&id=<?php  echo $r['Q_id']; ?>&loop=<?php echo $i; ?>" >
                                  <td> <input type="text" name="topic<?php echo $i; ?>" id="r1<?php echo $i; ?>" value="<?php  echo $r['q_topic'];  ?>"   readonly onchange="Fn_change(<?php echo $i; ?>)" style="border: none" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{2,50}$" title="Assignment Topic be start with Alphabit & between 3 to 50 character long"> </td>
                                  <td> <input type="date" name="datee<?php echo $i; ?>" id="r2<?php echo $i; ?>" value="<?php  echo $r['q_date'];  ?>"   readonly onchange="Fn_change(<?php echo $i; ?>)" style="border: none" required > </td>
                                  <td> <input type="number" name="obtained_marks<?php echo $i; ?>" id="r3<?php echo $i; ?>" value="<?php  echo $r['qo_marks']; ?>" readonly onchange="Fn_change(<?php echo $i; ?>)" style="border: none" required min="0" max="<?php  echo $r['qt_marks']; ?>"> </td>
                                  <td> <input type="number" name="total<?php echo $i; ?>" id="r4<?php echo $i; ?>" value="<?php  echo $r['qt_marks']; ?>" readonly onchange="Fn_change(<?php echo $i; ?>)" style="border: none" min="1" max="5000"> </td>
                                  <style media="screen">
                                      .fa-edit:hover{ color: blue }
                                      .fa-trash-alt:hover{ color: red }
                                  </style>
                                  <td>
                                    <button type="button" class="btn" onclick="fn(<?php echo $i; ?>, this)" title="Click to Edit that Particular Record."><i class="far fa-edit " style="font-size:18px;" ></i></button>
                                    <button type="submit" id="edit<?php echo $i; ?>" onclick="return myfn(<?php echo $i; ?>)" value="<?php echo $cid; ?>" class="btn btn-sm" name="save" style="display:none"> <i class="fas fa-check text-primary" style="font-size: 18px" title="Click to Save the Change "></i>  </button>
                                  </td>

                                  <td id="dd<?php echo $i; ?>">
                                    <button type="button" class="btn"  onclick="Fn_del(<?php echo $i; ?>,this)" id="del_icon<?php echo $i; ?>"><i class="fas fa-trash-alt " style="font-size:18px;"></i></button>
                                    <a href="delete_Quize_processing.php?i=<?php echo $i; ?>&id=<?php echo $r['Q_id']; ?>&cid=<?php echo $cid; ?>&sid=<?php echo $sid; ?>" id="conf_del<?php echo $i; ?>" style="display:none" > <button type="button" name="button" class="btn btn-sm btn-danger">conform</button> </a>
                                  </td>
                                </form>
                                </tr>
                                <?php
                            }
                          }else { ?>
                            <tr>
                              <td colspan="6" class="text-center alert alert-warning">No Quize Yet. </td>
                            </tr>
                            <?php
                          }
                       ?>
                     </tbody>
                   </table>
                  <div class="tend"></div>
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
                    "paging": true,
                    "lengthChange": true,
                    "searching": false,
                    "ordering": false,
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
