<?php
if (isset($_GET['id'])) {

  ?>
  <?php
    include('top_info.php');
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

  <form class="" action="" method="post" onsubmit="return fn()">
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
                    <td><a href="attendence.php" class="btn btn-primary">  Attendence   </a></td>
                </tr>
              </thead>
        </table>
    </div>
    <h5><strong>Note: </strong>Click on Student Name to Select them to Edit his/her Attendece.</h5>
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
                  include('db_connection.php');
                  $sql="SELECT register.S_id,register.Reg_no,student.student_name FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' ORDER BY register.Reg_no ASC";
                  $query2=mysqli_query($con ,$sql);
                  while ($row=mysqli_fetch_assoc($query2)) {
                    ?>
                    <tr>
                      <td><?php echo $row['Reg_no']; ?></td>
                      <td><a href="edit_attendence2.php?id=<?php echo $row['S_id']; ?>" style="text-decoration:none"><?php echo $row['student_name']; ?></a></td>
                    </tr>
                    <?php
                  }
                 ?>
          </tbody>
      </table>
        <div class="tend">  </div>
  </form>
  </div>  <!--ended -->

  </body>
  </html>
  <!-- php for above form -->


  <script type="text/javascript" src="js/jquery.js"></script>
  <script src="../datatables/jquery.dataTables.js"></script>
  <script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script type="text/javascript">
    function update(id,id2) {

             var reg_no =$('#xyz'+id).val();
             var student_id =id2;
             // console.log(value);
             // console.log(student_id); it display the vlaue on console screen

        $.ajax({
        url:'reg_update.php',
        type:'POST',
        data:{reg_no,student_id},
        success:function(data){
        if(data=="yes"){
          // alert('Update Sucessfully');
        $('#spn').html('<small id="smid" style="color:green;margin-left:100px"><b>Update Sucessfully<b></small>');
        // setTimeout(myFn,2000);
        }
        else if(data=="no"){
        $('#spn').html('<small id="smid" style="color:red;margin-left:100px"><b>Update Failed</b></small>');
        // alert('Update Failed');
        // setTimeout(myFn,2000);
        }
        else {
        $('#spn').html('');
        }

        }
        });
        setTimeout(myFn ,2000);
    }

   function myFn(){  document.getElementById("spn").innerHTML='';}  //use th empty the msg field
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
