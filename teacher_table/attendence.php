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
                  <td>Class Name:&nbsp;&nbsp;&nbsp;<span style="color: blue"><?php echo $r1['Name'];  ?></span></td>
                  <td>Subject Name:&nbsp;&nbsp;&nbsp;<span style="color: deeppink;letter-spacing:1px"><?php echo $r2['subject_name'];  ?></span></td>
                  <form method="post">
                    <td>
                        Attendence Date:&nbsp;&nbsp;&nbsp;
                        <input type="date" name="AT_date" id="at_date" onblur="fn()" style="background: lightblue;border: solid 1px #008c7e;border-radius:5px"><br>
                        <span id="dmsg" style="color: yellow"></span>
                    </td>
                  </form>
              </tr>
            </thead>
      </table>
  </div>
<script>
     function fn()
      {
        var a=document.getElementById("at_date").value;
          if (a=="") {
            document.getElementById("dmsg").innerHTML='Please Fill this field!';
            return false;
          }
          else {
            document.getElementById("dmsg").innerHTML='';
            document.getElementById("dmsg").style.display='none';
          }
      }
      function remove(){
        document.getElementById("dmsg").innerHTML='';
        document.getElementById("dmsg").style.display='none';
      }

 </script>
<span id="spn" style="margin-left: 300px"></span>
  <table id="example1" class="table table-striped table-bordered table-hover table-xl table-light" >

            <thead class="bg-info">
                <tr>
                      <!-- <th scope="col" scope="row">Student ID</th> -->
                      <th scope="col">Class No</th>
                      <th scope="col">Name</th>
                      <th scope="col">Attendence Status</th>
                </tr>
            </thead>
              <tbody>
                <?php

                    $cid=$_SESSION['class_id'];
                    $stmt_register="SELECT register.S_id , register.Reg_no , student.student_name ,student.Email FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' ORDER BY register.Reg_no";
                    $exe=mysqli_query($con,$stmt_register);
                    $a=0;
                    while ($row=mysqli_fetch_assoc($exe)) { $a++;
                     ?>
                <tr>
                      <td><input style="background: none;border: none;width: 50px" type="text" onkeyup="update('<?php echo $a;?>','<?php echo $row['S_id']; ?>');" id="xyz<?php echo $a;?>" value="<?php echo $row['Reg_no']; ?>">     </td>

                      <td scope="col" ><?php  echo $row['student_name']; ?> </td>
                      <td>      <input type="text" name="student_id<?php echo $a; ?>" value="<?php echo $row['S_id']; ?>" style="display:none">
                                <span style="font-size: 16px">Present:</span>     <input type="radio"  name="r<?php echo $a; ?>" checked value="1" style="width:5%;height:15px;">&nbsp;&nbsp;&nbsp;
                                <span style="font-size: 16px">Absent:</span>  <input type="radio"  name="r<?php echo $a; ?>" value="2" style="width:5%;height:15px;">&nbsp;&nbsp;&nbsp;
                                <span style="font-size: 16px">Leave:</span>       <input type="radio"  name="r<?php echo $a; ?>" value="3" style="width:5%;height:15px;">&nbsp;&nbsp;&nbsp;

                      </td>
                </tr>
                 <?php }
                  $_SESSION['a']=$a;
                  ?>
                </tbody>
            </table>
            <button type="submit" name="save" style="margin-left: 35%;margin-top: 0px;margin-bottom: 10px;width:30%;font-weight:bolder" class="btn btn-primary btn-lg">Submit</button>
      <div class="tend">  </div>
</form>
</div>  <!--ended -->

</body>
</html>
<!-- php for above form -->
<?php
        if (isset($_POST['save'])) {

            $a=$_SESSION['a'];
            unset($_SESSION['a']);
            if ($a==0) {
              echo "<script> document.getElementById('spn').innerHTML='You Cannot Perform this Action! Because No Students are Found in the Class'; setTimeout(empty, 5000); </script>";

            }
            if ($a!=0) {

                          $at_date=$_POST['AT_date'];
                          $cid=$_SESSION['class_id'];
                          $query_check_date="SELECT AT_date FROM attendence_record WHERE Class_id='$cid' AND AT_date='$at_date'";


                          if (isset($con)) {
                              $exe_check_date=mysqli_query($con ,$query_check_date);
                              $status=mysqli_num_rows($exe_check_date);

                              if ($status>0) {
                                echo "<script> document.getElementById('dmsg').innerHTML='Attendence for that Date is already found in Database!. try Another';  </script>";
                              }else {
                                      $temp=1;
                                      $t=1;
                                      while ($t <= $a)
                                        {
                                          $student_id=$_POST['student_id'.$t];
                                          $attendence_id=$_POST['r'.$t];
                                          $query_insert="INSERT INTO `attendence_record` (`AT_id`, `AT_date`, `Class_id`, `S_id`) VALUES ('$attendence_id', '$at_date', '$cid', '$student_id')";
                                          $exe_insert=mysqli_query($con ,$query_insert);

                                        $t++; $temp++; }
                                        if ($temp==$t) {
                                          echo "<script> document.getElementById('dmsg').innerHTML='Attendence are Successfully Inserted...'; setTimeout(remove, 5000); </script>";

                                        }else {
                                          echo "<script> document.getElementById('dmsg').innerHTML='Problem Occur while Inserted Some records!'; setTimeout(remove, 10000); </script>";

                                        }
                             }

                          }else {
                            echo "<script> alert('problem occur while connecting to the database!... try again'); </script>";
                          }
            }


          }

 ?>
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
