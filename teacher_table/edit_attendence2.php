<?php
if (isset($_GET['id'])) {
//the above id is the student id
  ?>
  <?php
    include('top_info.php');
    // <!--===============below loader are include =================-->
     include('../plugins/loader/loader1.html');
    // <!--=================ended==================================-->
    if (isset($_SESSION['email']) && isset($_SESSION['pass'])) { ?>
      <!DOCTYPE html>
        <html lang="en" dir="ltr">
          <head>
            <link rel="stylesheet" href="../datatables-bs4/css/dataTables.bootstrap4.css">
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">

            <title>welcome to webside as a teacher  </title>

            </head>
        <body>
  <style media="screen">
      #att{
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


        <!--========= we are including the subject top menu here ===================-->
        <?php  include('classes_subject_top_menu.php');  ?>
        <!--=================================== ended =======================-->

  <script>
  function empty(){  document.getElementById("spn").innerHTML='';}  //use th empty the msg field

  </script>

  <!-- started -->

  <!-- below table which display the student record which are enroll in the this class which are clicked    -->
  <div class="container-fluid" style="padding-bottom: 10px">
    <div class="tend"  style="border-radius: 10px 10px 0px 0px;margin-bottom: 8px;height: auto;padding-bottom:3px;padding-top: 0px">
        <table class="table table-straped">
              <thead>
                <tr style="border-bottom:solid 2px #fff">
                    <td>Class ID:&nbsp;&nbsp;&nbsp;<span style="color: blue"><?php echo $cid;  ?></span></td>
                    <td>Class Name:&nbsp;&nbsp;&nbsp;<span style="color: blue"><?php echo $r1['Name'];  ?></span></td>
                    <td>Subject Name:&nbsp;&nbsp;&nbsp;<span style="color: deeppink;letter-spacing:1px"><?php echo $r2['subject_name'];  ?></span></td>
                    <td><a href="attendence.php" class="btn btn-primary">  Attendance   </a></td>
                </tr>
                <?php
                $sid=0;
                if (isset($_GET['id'])) {
                    $sid=$_GET['id'];
                    $sql3="SELECT register.Reg_no,student.S_id,student.student_name FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' AND register.S_id='$sid'";
                    $r3=mysqli_fetch_array(mysqli_query($con ,$sql3));
                }
                ?>
                <tr>
                    <td style="color: #fff;">Class No:&nbsp;&nbsp;<?php echo $r3['Reg_no'];  ?></td>
                    <td style="color: #fff;">Student Name:&nbsp;&nbsp;<span style="text-transform: capitalize"><?php echo $r3['student_name'];  ?></span></td>
                    <td><a href="self_add_attendence.php?id=<?php echo $sid; ?>"><button type="button" name="add_new" class="btn btn-outline-light">Add New Attendance</button></a></td>
                </tr>
              </thead>
        </table>
    </div>
    <p><b>Note: </b><small>When You Click the Edit icon and change the Status of Attendance, To display this change ,You need to refresh the page. Thank You</small></p>
  <div id="spn" class="text-center"></div>
      <table id="example1" class="table table-straped ">

          <thead class="bg-info">
            <a href=""><button type="button" class="btn btn-md btn-secondary float-right" name="button">Refresh  <i class="fas fa-redo-alt"></i></button></a>
              <tr>
                  <th width="30%">Attendance Date</th>
                  <th width="10%">Status</th>
                  <th><div id="att1" style="display:none">Change Status</div></th>
                  <th width="5%">Edit</th>
                  <th width="5%">Delete</th>
              </tr>
          </thead>
          <tbody>


                <?php
                    $sql9="SELECT attendence_record.AT_date,attendence.status FROM attendence_record INNER JOIN attendence ON attendence_record.AT_id=attendence.AT_id WHERE attendence_record.Class_id='$cid' AND attendence_record.S_id='$sid' ORDER BY attendence_record.AT_date DESC";
                    $exe9=mysqli_query($con ,$sql9);
                    if (mysqli_num_rows($exe9)>0) {
                      $i=1;
                      while ($r9=mysqli_fetch_assoc($exe9)) {
                        ?>
                        <tr>
                          <td><?php echo $r9['AT_date']; ?></td>
                          <td><?php echo $r9['status']; ?></td>
                          <td >
                            <div id="att1<?php echo $r9['AT_date']; ?>" style="display:none">
                              <?php
                              // the strcmp function return 0 if both string are match with each other
                              if (strcmp($r9['status'] ,"P")==0) {?>
                                Present &nbsp;&nbsp;<input type="radio" value="1" onclick="update('<?php echo $i; ?>1','<?php echo $r9['AT_date']; ?>','<?php echo $cid; ?>','<?php echo $r3['S_id']; ?>')" id="aid<?php echo $i; ?>1" checked  name="atd<?php echo $i; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Absent  &nbsp;&nbsp;<input type="radio" value="2" onclick="update('<?php echo $i; ?>2','<?php echo $r9['AT_date']; ?>','<?php echo $cid; ?>','<?php echo $r3['S_id']; ?>')" id="aid<?php echo $i; ?>2"  name="atd<?php echo $i; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Leave   &nbsp;&nbsp;<input type="radio" value="3" onclick="update('<?php echo $i; ?>3','<?php echo $r9['AT_date']; ?>','<?php echo $cid; ?>','<?php echo $r3['S_id']; ?>')" id="aid<?php echo $i; ?>3"  name="atd<?php echo $i; ?>" />
                                <?php
                              }
                              if (strcmp($r9['status'] ,"A")==0) {?>
                                Present &nbsp;&nbsp;<input type="radio" value="1" onclick="update('<?php echo $i; ?>1','<?php echo $r9['AT_date']; ?>','<?php echo $cid; ?>','<?php echo $r3['S_id']; ?>')"  id="aid<?php echo $i; ?>1"  name="atd<?php echo $i; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Absent &nbsp;&nbsp;<input type="radio"  value="2" onclick="update('<?php echo $i; ?>2','<?php echo $r9['AT_date']; ?>','<?php echo $cid; ?>','<?php echo $r3['S_id']; ?>')"  id="aid<?php echo $i; ?>2" checked  name="atd<?php echo $i; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Leave &nbsp;&nbsp;<input type="radio"   value="3" onclick="update('<?php echo $i; ?>3','<?php echo $r9['AT_date']; ?>','<?php echo $cid; ?>','<?php echo $r3['S_id']; ?>')"  id="aid<?php echo $i; ?>3"  name="atd<?php echo $i; ?>" />
                                <?php
                              }

                              if (strcmp($r9['status'] ,"L")==0) {?>
                                Present &nbsp;&nbsp;<input type="radio" value="1" onclick="update('<?php echo $i; ?>1','<?php echo $r9['AT_date']; ?>','<?php echo $cid; ?>','<?php echo $r3['S_id']; ?>')"  id="aid<?php echo $i; ?>1"  name="atd<?php echo $i; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Absent &nbsp;&nbsp;<input type="radio"  value="2" onclick="update('<?php echo $i; ?>2','<?php echo $r9['AT_date']; ?>','<?php echo $cid; ?>','<?php echo $r3['S_id']; ?>')"  id="aid<?php echo $i; ?>2"  name="atd<?php echo $i; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Leave &nbsp;&nbsp;<input type="radio"   value="3" onclick="update('<?php echo $i; ?>3','<?php echo $r9['AT_date']; ?>','<?php echo $cid; ?>','<?php echo $r3['S_id']; ?>')"  id="aid<?php echo $i; ?>3" checked  name="atd<?php echo $i; ?>" />
                                <?php
                              }

                              ?>
                            </div>
                          </td>
                          <form action="" method="post">
                            <td>
                              <button type="button" id="edit1<?php echo $i; ?>" class="btn btn-lg text-primary" onclick="document.getElementById('att1<?php echo $r9['AT_date']; ?>').style.display='block';document.getElementById('att1').style.display='block';this.style.display='none';"><span class="glyphicon glyphicon-pencil"></span></button>
                            </td>
                          </form>
                          <style media="screen">
                          #cd<?php echo $i; ?>{
                            display: none;
                          }
                          </style>
                          <td>
                            <button class="btn btn-lg text-danger" onclick="this.style.display='none';document.getElementById('cd<?php echo $i;?>').style.display='block';"><span class="glyphicon glyphicon-trash"></span></button>
                            <button type="button" class="btn btn-danger" onclick="fn_delete('<?php echo $r9['AT_date']; ?>','<?php  echo $cid; ?>','<?php echo $sid; ?>')" name="c_delete<?php echo $i; ?>" id="cd<?php echo $i; ?>" >Conform</button>
                          </td>
                        </tr>
                        <?php
                        $i++;
                      }
                    }else {?>
                          <tr>
                            <td colspan="5" class="alert alert-warning text-center">No Attendance Records Yet.</td>
                          </tr>
                          <?php
                    }
                 ?>
          </tbody>
      </table>

        <div class="tend"></div>

  </div>  <!--ended -->

  </body>
  </html>
  <!-- php for above form -->


  <script type="text/javascript" src="js/jquery.js"></script>
  <script src="../datatables/jquery.dataTables.js"></script>
  <script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script type="text/javascript">
    function update(id,id2,id3,id4) {

             var att_id =$('#aid'+id).val();    //radio filed
             var atd_date =id2;      //date of attendence
             var class_id=id3;    // class id
             var sid=id4;        //student_id
             // console.log(att_id);
             // console.log(atd_date); //it display the vlaue on console screen
             // console.log(class_id);
             // console.log(sid);

        $.ajax({
        url:'edit_atd_update.php',
        type:'POST',
        data:{att_id,atd_date,class_id,sid},
        success:function(data){
        if(data=="yes"){
          // alert('Update Sucessfully');
        $('#spn').html('<div id="smid" class="alert alert-primary"><b>Update Sucessfully<b></div>');
        // setTimeout(myFn,2000);
        }
        else if(data=="no"){
        $('#spn').html('<div id="smid" class="alert alert-danger"><b>Update Failed</b></div>');
        // alert('Update Failed');
        // setTimeout(myFn,2000);
        }
        else {  $('#spn').html('');  }
        }
        });
        setTimeout(myFn ,2000);
    }

   function myFn(){  document.getElementById("spn").innerHTML='';}  //use th empty the msg field

// function call when conform delete are press
   function fn_delete(id1,id2,id3) {
            var atd_date =id1;      //date of attendence
            var class_id=id2;    // class id
            var sid=id3;        //student_id
            console.log(atd_date); //it display the vlaue on console screen
            console.log(class_id);
            console.log(sid);

       $.ajax({
       url:'confrom_delete_attendence.php',
       type:'POST',
       data:{atd_date,class_id,sid},
       success:function(data){
       if(data=="yes"){
         // alert('Update Sucessfully');
       $('#spn').html('<div id="smid" class="alert alert-primary"><b>Delete Sucessfully<b></div>');
       setTimeout(f,1000);
       function f(){ window.location.href='edit_attendence2.php?id=<?php echo $sid; ?>'; }
       }
       else if(data=="no"){
       $('#spn').html('<div id="smid" class="alert alert-danger"><b>Delete Failed</b></div>');
       // alert('Update Failed');
       // setTimeout(myFn,2000);
       }
       else {  $('#spn').html('');  }
       }
       });
       setTimeout(myFn ,2000);
   }

  </script>


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

  <?php
      }
    else {
      echo "<script> alert('Please Login first!.... '); </script>";
    }

  ?>




  <?php
}

 ?>
