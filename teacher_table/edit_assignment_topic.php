<?php
/*======================includeing the navagation menu ===========*/
  include('top_info.php');
  /*===========ended ===========*/
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
                    #ass{
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
                  var c4=document.getElementById("r4"+obj);
                  c1.readOnly= false;
                  c2.readOnly= false;
                  c4.readOnly= false;

                  c1.style="border:solid 1px #004085;border-radius: 5px;";
                  c2.style="border:solid 1px #004085;border-radius: 5px;";
                  c4.style="border:solid 1px #004085;border-radius: 5px;";


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
                  var c1=document.getElementById("r1"+obj_row_no).value;
                  var c2=document.getElementById("r2"+obj_row_no).value;
                  var c4=document.getElementById("r4"+obj_row_no).value;    //total marks
                  console.log(obj_row_no);
                  console.log(c1);
                  console.log(c2);
                  console.log(c4);
                  if(c1==''){  alert('Please fill the field');  return false;}
                  if(c2==''){  alert('Please fill the field');  return false;}

                }
              </script>
          </head>
            <body>
              <!--============includeing the top navagation menu  ==============================================================================================-->
                    <?php  include('classes_subject_top_menu.php');  ?>
              <!--============ended=============================================================================================================================-->

                <!--=========================edit assignment ========================================================================= -->
                <div class="tend "  style="border-radius: 10px 10px 0px 0px;width:100%;margin:0 auto;margin-bottom: 8px;height: auto;padding-bottom:3px;padding-top: 0px">
                    <div class="row  py-3 ">
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
                        <a href="edit_assignment1.php" class="btn btn-primary float-right" > Edit Assignment   </a>
                      </div>
                    </div>

                </div>


                <table id="example1" class="table table-straped ">

                    <thead class="bg-info">
                        <tr>
                          <td>Assignment Topic</td>
                          <td>Assignment Date</td>
                          <td>Total Marks</td>
                          <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tbody>
                      <div class="alert alert-warning font-weight-bold">
                        <b>Note:</b><br>
                        IF You Edit the Assignment ,the assignment total marks will not be editable for lower value and the Assignment change are applayed to all student of class.
                        <p>If You Delete Assignment , the records for that Particular Assignment are Also deleted.</p>
                      </div>
                      <?php
                          $ass_record=mysqli_query($con ,"SELECT assignment.A_id,assignment.a_name,assignment.a_date,assignment.at_marks FROM assignment INNER JOIN assignment_record ON assignment_record.A_id=assignment.A_id WHERE Class_id='$cid' GROUP BY A_id ");
                          if (mysqli_num_rows($ass_record)>0) {
                            $i=0;
                            if (isset($_SESSION['msg'])) {
                              echo "<script> alert('success') </script>";
                              unset($_SESSION['msg']);
                            }
                            while ($r=mysqli_fetch_assoc($ass_record)) { $i++;
                                ?>
                                <tr id="row<?php echo $i; ?>">
                                  <form  method="post" name="f<?php echo $i; ?>" id="f" action="edit_assignment_topic_processing.php?aid=<?php  echo $r['A_id']; ?>&loop=<?php echo $i; ?>" >
                                  <td> <input type="text" name="an<?php echo $i; ?>" id="r1<?php echo $i; ?>" value="<?php  echo $r['a_name'];  ?>"   readonly onchange="Fn_change(<?php echo $i; ?>)" style="border: none" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{2,50}$" title="Assignment Topic be start with Alphabit & between 3 to 50 character long"> </td>
                                  <td> <input type="date" name="ad<?php echo $i; ?>" id="r2<?php echo $i; ?>" value="<?php  echo $r['a_date'];  ?>"   readonly onchange="Fn_change(<?php echo $i; ?>)" style="border: none" required > </td>
                                  <td> <input type="number" name="at<?php echo $i; ?>" id="r4<?php echo $i; ?>" value="<?php  echo $r['at_marks']; ?>" readonly onchange="Fn_change(<?php echo $i; ?>)" style="border: none" min="<?php  echo $r['at_marks']; ?>" max="5000"> </td>
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
                                    <a href="delete_assignment_topic_processing.php?i=<?php echo $i; ?>&aid=<?php echo $r['A_id']; ?>&cid=<?php echo $cid; ?>" id="conf_del<?php echo $i; ?>" style="display:none" > <button type="button" name="button" class="btn btn-sm btn-danger">conform</button> </a>
                                  </td>
                                </form>
                                </tr>
                                <?php
                            }
                          }else { ?>
                            <tr>
                              <td colspan="5" class="text-center alert alert-warning">No Assignment Yet. </td>
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
