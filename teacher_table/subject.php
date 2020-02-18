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
            #cls{
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


<!--==================== we are including the subject top menu here ===========================-->
<?php  include('classes_subject_top_menu.php');  ?>
<!--================================== ended ====================================================-->


<!-- started -->
<span id="spn"></span>
<!-- below table which display the student record which are enroll in the this class which are clicked    -->
<div class="container-fluid ">
  <!-- <div class="tend"  style="border-radius: 10px 10px 0px 0px"><it the div give the above beautiful style to the table top ></div> -->


  <table id="example1" class="table table-striped table-bordered table-hover table-xl table-light table-responsive-sm" >

            <thead class="bg-info">
                <tr>
                      <th scope="col">Class No</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                </tr>
            </thead>
              <tbody>
                <?php
                    $cid=$_SESSION['class_id'];
                    $stmt_register="SELECT register.S_id , register.Reg_no , student.student_name ,student.Email FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' ORDER BY register.Reg_no";

                    $exe=mysqli_query($con,$stmt_register);
                    if (mysqli_num_rows($exe)>0) {
                      $a=0;
                      while ($row=mysqli_fetch_assoc($exe)) { $a++;
                       ?>
                  <tr>
                    <td><input style="background: none;border: none" type="text" onkeyup="update('<?php echo $a;?>','<?php echo $row['S_id']; ?>');" id="xyz<?php echo $a;?>" value="<?php echo $row['Reg_no']; ?>">     </td>

                        <td scope="col" ><?php  echo $row['student_name']; ?> </td>
                        <td scope="col"><?php  echo $row['Email']; ?> </td>
                  </tr>


                   <?php
                  }
                    }else {
                      ?>
                      <tr>
                          <td colspan="3" class="alert alert-warning text-center">No Student are Register with this Class.</td>
                      </tr>
                      <?php
                    }
               ?>

              </tbody>
            </table>
      <div class="tend">  </div>

</div>
<!-- ended -->


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
      $('#spn').html('<small id="smid" style="color:green;margin-left:450px"><b>Update Sucessfully<b></small>');
      // setTimeout(myFn,2000);
      }
      else if(data=="no"){
      $('#spn').html('<small id="smid" style="color:red;margin-left:450px"><b>Update Failed</b></small>');
      // alert('Update Failed');
      // setTimeout(myFn,2000);
      }
      else {
      $('#spn').html('');
      }

      }
      });
      setTimeout(myFn ,3000);
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
