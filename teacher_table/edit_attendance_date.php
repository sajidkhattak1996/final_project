<?php
if (isset($_GET['id'])) {

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
                <tr>
                    <td>Class ID:&nbsp;&nbsp;&nbsp;<span style="color: blue"><?php echo $cid;  ?></span></td>
                    <td>Class Name:&nbsp;&nbsp;&nbsp;<span style="color: blue"><?php echo $r1['Name'];  ?></span></td>
                    <td>Subject Name:&nbsp;&nbsp;&nbsp;<span style="color: deeppink;letter-spacing:1px"><?php echo $r2['subject_name'];  ?></span></td>
                    <td><a href="attendence.php" class="btn btn-primary">  Attendance   </a></td>
                </tr>
              </thead>
        </table>
    </div>
<div id="table_area_date">
<div id="msg_date">   </div>
      <table class="table table-straped" id="example1">
          <thead>
             <tr>
               <th width="80%">Attendance Date</th>
               <th width="10%">Edit </th>
              <th width="10%">Delelte</th>

             </tr>
          </thead>
          <tbody>
                <?php
                  $attendance_date=mysqli_query($con ,"SELECT AT_date FROM `attendence_record` WHERE Class_id='$cid' GROUP BY AT_date ORDER BY AT_date DESC");
                  if (mysqli_num_rows($attendance_date)>0) {
                    $j=0;
                    while ($r=mysqli_fetch_assoc($attendance_date)) { $j++;
                      ?>
                      <tr id="date_row<?php echo $j; ?>">
                        <td>
                          <span id="td_output<?php echo $j; ?>"><?php  echo $r['AT_date'];  ?></span>
                          <input type="date" name="" id="row_input<?php echo $j; ?>" value="<?php  echo $r['AT_date'];  ?>" onchange="Fn_change_date('<?php echo $j; ?>')" readonly style="background:none ;border:none;display:none">
                        </td>
                        <td>
                          <button type="button" id="btn_edit<?php  echo $j; ?>" name="button" class="btn btn-lg"  onclick="Edit_date('<?php  echo $j; ?>')"> <i class="fas fa-edit text-primary"></i> </button>
                          <button type="button" id="btn_save<?php  echo $j; ?>" style="display:none" name="button" class="btn btn-primary" onclick="Edit_save('<?php echo $r['AT_date'];  ?>','<?php echo $cid; ?>','<?php  echo $j; ?>')">Save</button>
                        </td>
                        <td>  <button type="button" name="button" class="btn btn-lg"  onclick="Fn_Delete('<?php echo $r['AT_date'];  ?>','<?php echo $cid; ?>','<?php  echo $j; ?>')"> <i class="fas fa-trash-alt text-danger"></i> </button>   </td>
                      </tr>
                    <?php
                    }

                  }else {
                    ?>
                    <tr>
                      <td></td>
                    </tr>
                    <?php
                  }

                 ?>
          </tbody>
      </table>
        <div class="tend">  </div>
    </div>
  </div>  <!--ended -->

  </body>
  </html>
  <!-- php for above form -->


  <script type="text/javascript" src="js/jquery.js"></script>
  <script src="../datatables/jquery.dataTables.js"></script>
  <script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
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

function Edit_date(jloop){
  document.getElementById("btn_edit"+jloop).style.display='none';
  document.getElementById("td_output"+jloop).style.display='none';
  var a=document.getElementById("row_input"+jloop);
  a.style="background: #f9f9f9; border:solid 1px #13bca4;border-radius: 5px";
  a.readOnly=false;
}
function Fn_change_date(loop){
  document.getElementById("btn_save"+loop).style.display='block';
}
function Edit_save(old_date ,cid ,jloop){
  var m=document.getElementById("msg_date");
  var new_date=document.getElementById("row_input"+jloop).value;  //new date
  if (new_date=="") {
    alert('please fill the Date');
  }else {
    $.ajax({
      url:'update_attendance.php',
      type:'POST',
      data:{new_date,old_date,cid},
      success:function(data){
        if (data=="yes") {
          // m.innerHTML="<div class='alert alert-success font-weight-bold text-center'> Attendance Date are Successfully updated. </div>";
        $.confirm({
          title: 'Update Successfull',
          content: "Your Attendance for this Date   <b>"+new_date+"</b> are Successfully Updated.",
          type: 'blue',
          typeAnimated: true,
          buttons: {
            Continue: {
              text: 'OK',
              btnClass: 'btn-blue',
              action: function(){
               // $("#table_area_date").load(location.href + " #table_area_date");
               window.location.reload();

            }
          },

        }
      });
        }
        else if(data=="no"){
          // m.innerHTML="<div class='alert alert-danger font-weight-bold text-center'> Date Updation Failed! Try Again</div>";
          $.confirm({
            title: 'Update Failed!',
            content: "Your Update for this Attendance Date   <b>"+new_date+"</b> Failed.",
            type: 'orange',
            typeAnimated: true,
            buttons: {
              Continue: {
                text: 'Close',
                btnClass: 'btn-orange',
                action: function(){
                 // $("#table_area_date").load(location.href + " #table_area_date");
                 // window.location.reload();

              }
            },

          }
        });
        }
        else if(data=="pp"){
          // m.innerHTML="<div class='alert alert-danger font-weight-bold text-center'> Attendance for this Date are allready Present.</div>"
          $.confirm({
            title: 'Attendance Present!',
            content: "Your Attendance for this Date   <b>"+new_date+"</b> is allready Present an Database <br><br> Try new Date",
            type: 'red',
            typeAnimated: true,
            buttons: {
              Continue: {
                text: 'OK',
                btnClass: 'btn-red',
                action: function(){


              }
            },

          }
        });






         }

        setTimeout(f_hide ,2000);
        function f_hide(){ m.innerHTML="";
        $("#table_area_date").load(location.href + " #"+a); // Add space between URL and selector.

      }
    }
  });
  }


}


  //delete function
  function Fn_Delete(adate ,class_id,loop){

    var r=document.getElementById("date_row"+loop);
    r.style="color: #721c24;background-color: #f8d7da;border-color: #f5c6cb";
    var attendence_date=adate;
    var cid=class_id;
    var m=document.getElementById("msg_date");
    $.confirm({
      title: 'Delete Attendance!',
      content: "Are  you  sure to  Delete the Attendance  of this <br><b> "+attendence_date+" </b> .<br> Do you want to Continue?",
      type: 'red',
      typeAnimated: true,
      buttons: {
        Continue: {
          text: 'Continue',
          btnClass: 'btn-red',
          action: function(){
            $.ajax({
              url:'delete_attendance_date.php',
              type:'POST',
              data:{attendence_date,cid},
              success:function(data){
                if (data=="yes") { m.innerHTML="<div class='alert alert-success font-weight-bold text-center'> Attendance Date & its Records are Successfully Deleted. </div>";   }
                else if(data=="no"){ m.innerHTML="<div class='alert alert-danger font-weight-bold text-center'> Attendance Date & its Records Deletion Failed! Try Again</div>";  }

                setTimeout(f_hide ,2000);
                function f_hide(){ m.innerHTML="";
                $("#table_area_date").load(location.href + " #table_area_date"); // Add space between URL and selector.

              }
            }
          });

        }
      },
      close: function () {
        r.style="background: none";
      }
    }
  });
}

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
