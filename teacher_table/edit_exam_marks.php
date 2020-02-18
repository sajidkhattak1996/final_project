<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>presentation exam display records </title>
	<link href="teacher_css.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="bootstrap 4/css/glyphicon.css">

<script type="text/javascript">
  function Fn_double(temp){
      temp.readOnly= false;
      temp.style.background= "lightblue";
  }
  function fn(obj ,edit_btn){
    document.getElementById("row"+obj).style = "background: #b8daff";
    var c3=document.getElementById("r3"+obj);
    c3.readOnly= false;
    c3.style="border:solid 1px #004085;border-radius: 5px;";
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

</script>


  </head>
<body>
  <!--===============below loader are include =================-->
  <?php include('../plugins/loader/loader1.html'); ?>
  <!--=================ended==================================-->
<!--=========top nvagation menu ==========-->
<?php  include('top_info.php');  ?>
<!--=========top nvagation menu endeddd ==========-->

<!-- the below css link have high periority then above top_info.php file  -->
<link rel="stylesheet" href="../datatables-bs4/css/dataTables.bootstrap4.css">

<!--=========including the top classes button below the top navagation menu ================-->
<?php  include('display table/display_classes_top_menu.php');  ?>
<!--=========ended ================-->
<?php
  $cid=$_SESSION['class_id'];
  $iname=$_SESSION['institute'];
  $query1 ="SELECT Name FROM class WHERE Class_id='$cid'";
  $e=mysqli_query($con,$query1);
  $r=mysqli_fetch_array($e);
  //class subject name
  $q2="SELECT Subject_id FROM have WHERE Class_id='$cid'";
  $roww=mysqli_fetch_array(mysqli_query($con, $q2));
  $subid=$roww['Subject_id'];
  $q3="SELECT subject_name FROM subject WHERE Subject_id='$subid'";
  $rr=mysqli_fetch_array(mysqli_query($con,$q3));

 ?>

<div class="about_area">
    <div class="viewing_area">
      <h5>CLASS NOW VIEWING :> <a href="" style="color: blue"> <?php  echo $r['Name']; ?></a></h5>
      <h5>SUBJECT :> <a href="subject.php" style="color: deeppink"><strong> <?php  echo $rr['subject_name']; ?> </strong> </a></h5>
    </div>

    <div class="about">
        <h2>About this page </h2>
        <p class="text">
          This is your Exam Marks Display Homepage. In this page exam records of all students of a class are Display and also you can EDIT ,Delete the Exam and its Records.
          You can also Add the new Exam Marks record, by click on button (+ Exam Marks ).<i style="color: orange">Double Click on Exam Term ,Exam Date and Exam Total Marks to Enable the Edit process.</i>
          <i class="text-danger font-weight-bold">Note:</i> When Delete are press the Exam and its Records are also deleted.


        </p>

    </div>

</div>




<!--=========including the top classes button below the top navagation menu ================-->
<?php  include('display_classes_table_top_menu.php');  ?>
<!--=========ended =====================================================================-->

<style media="screen">
#b6{
  background-image: -webkit-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
  background-image: -moz-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
  background-image: -o-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
  background-image: linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
  color: blue;
  border-left: solid 1px rgba(172,239,224,0.66);
  border-top: solid 1px rgba(172,239,224,0.66);
  border-right: solid 1px rgba(172,239,224,0.66);

  border-radius: 7px 7px 0px 0px;
}
#b1{
  background-image: -webkit-linear-gradient(270deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
  background-image: -moz-linear-gradient(270deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
  background-image: -o-linear-gradient(270deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
  background-image: linear-gradient(180deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
  color: #6f9de8;
  border:solid 1px rgba(127,243,228,0.52);
  border-radius: 7px 7px 0px 0px;
}
#b6 {
  pointer-events: none;
}
</style>


<style media="screen">
      .tstart{

        border-radius: 10px 10px 0px 0px ;
        padding-bottom: 0px;

        background-image: -webkit-linear-gradient(0deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,0.90) 98.45%);
        background-image: -moz-linear-gradient(0deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,0.90) 98.45%);
        background-image: -o-linear-gradient(0deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,0.90) 98.45%);
        background-image: linear-gradient(0deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,0.90) 98.45%);
      }
</style>

<div id="active_class" class="container-fluid">
    <div class="tstart" >
      <h2 class="text-left">Institute Name:  <?php  echo $_SESSION['institute']; ?> </h2>
      <div class="pb-5">
        <a href="edit_exam_marks.php?cid=<?php echo $cid; ?>"><button type="button" class="btn btn-md btn-outline-light active float-right mr-3 font-weight-bold" name="button"><i class="fas fa-pen"></i> &nbsp; Edit  </button></a>
        <a href="add_exam_marks.php?cid=<?php echo $cid; ?>"><button type="button" class="btn btn-md btn-outline-light float-right mr-3 font-weight-bold" name="button"><i class="fas fa-plus"></i> &nbsp; Exam Marks  </button></a>
      </div>
      <div class="bg-light">
      <div class="row container-fluid  ml-0 mt-5 py-3 border-bottom border-left border-right border-success" style="border-radius: 0px 0px 15px 15px;">
          <div class="col-lg-4 ">
                <span class="font-weight-bold  pl-lg-5 h3">Class Name: <span class="font-weight-bolder h4" style="color: blue"> &nbsp;<?php  echo $r['Name']; ?></span> </span>
          </div>
          <div class="col-lg-4 ">
            <span  class="font-weight-bold  pl-lg-5 h3">Subject:  <span class="font-weight-bolder h4" style="color: deeppink"> &nbsp; <?php  echo $rr['subject_name']; ?></span></span>
          </div>
          <div class="col-lg-4"></div>
      </div>
      <?php
      $sql_exam=mysqli_query($con ,"SELECT * FROM exam INNER JOIN exam_record ON exam_record.E_id=exam.E_id WHERE exam_record.Class_id='$cid' GROUP BY exam_record.E_id");
      if (mysqli_num_rows($sql_exam)>0) {
        $j=0;
        while ($row=mysqli_fetch_assoc($sql_exam)) {  $j++;
          ?>
          <div class="row container-fluid ml-0 py-3 mb-5  border border-success " style="border-radius: 10px;">
            <div class="col-lg-3 col-md-6 ">
            <span class="font-weight-bold  pl-lg-5 h4">Exam Term: <span class="font-weight-bolder h5" > &nbsp; <input type="text" id="term<?php echo $j; ?>"  readonly ondblclick="Fn_double(this)"  onchange="Fn_Exam_update(<?php echo $j; ?>,<?php echo $row['E_id']; ?>)" value="<?php  echo $row['exam_term']; ?>"  style="background:none; border:none;color: #13bca4"> </span> </span>
            </div>
            <div class="col-lg-3 col-md-6 "><span class="font-weight-bold  pl-lg-5 h4">Exam Date: <span class="font-weight-bolder h5" > &nbsp; <input type="Date" id="e_date<?php echo $j; ?>"  readonly ondblclick="Fn_double(this)" onchange="Fn_Exam_update(<?php echo $j; ?>,<?php echo $row['E_id']; ?>)" value="<?php  echo $row['exam_date']; ?>"  style="background:none; border:none;color: #13bca4"> </span> </span></div>
            <div class="col-lg-3 col-md-6">
              <span class="font-weight-bold  pl-lg-5 h4">Total Marks:
                <span class="font-weight-bolder h5" >   &nbsp;
                <input type="number" name="" readonly ondblclick="Fn_double(this)" onchange="Fn_Exam_update(<?php echo $j; ?>,<?php echo $row['E_id']; ?>)"  id="r4<?php echo $j; ?>" value="<?php  echo $row['total_marks']; ?>"  style="background:none; border:none;color: #13bca4" min="<?php  echo $row['total_marks']; ?>" >
               </span>
             </span>
           </div>
           <div class="col-lg-3 pb-3 col-md-6">
                <button type="button" class="btn  btn-danger float-right font-weight-bold" onclick="Fn_Delete(<?php echo $row['E_id'];  ?>,<?php echo $j;  ?>)" name="delete_exam">Delete Exam Record</button>
          </div>


            <div class="container-fluid">
              <!--=============== below are the msg div class  ====================================================================================-->
              <div class="alert text-center" id="msg1<?php  echo $j; ?>"></div>
              <!--=============== above are the msg div class  ====================================================================================-->

            <table id="example1"  class="table table-straped table-hover table-bordered table-responsive-sm" >
                <thead class="bg-info">
                  <tr id="row<?php echo $i; ?>">
                    <th>Class No</th>
                    <th>Student Name</th>
                    <th>Obtained Marks</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>

                  <style media="screen">
                  .fa-edit:hover{ color: blue }
                  .fa-trash-alt:hover{ color: red }
                  </style>

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
            $i=0;
            while ($r=mysqli_fetch_array($exe)) { $i++;
              ?>
              <tr id="row<?php echo $i.$j;  ?>">
                <td id="r1<?php echo $i; ?>"><?php echo $r['Reg_no'];  ?></td>
                <td id="r2<?php echo $i; ?>"><?php echo $r['student_name'];  ?></td>
                <td>
                  <input type="number" name="obtained_marks<?php echo $i; ?>" id="r3<?php echo $i.$j; ?>" value="<?php  echo $r['obtained_marks']; ?>" readonly onchange="Fn_change(<?php echo $i.$j; ?>)" style="border: none;background:none" required min="0" max="<?php  echo $row['total_marks']; ?>">
                  <span id="ob_msg<?php echo $i.$j; ?>">  </span>
                </td>

                <td>
                  <button type="button" id="edit_icon<?php echo $i.$j; ?>" class="btn" onclick="fn(<?php echo $i.$j; ?>, this)" title="Click to Edit that Particular Record."><i class="far fa-edit " style="font-size:18px;" ></i></button>
                  <button type="button" id="edit<?php echo $i.$j; ?>"  onclick="return myfn(<?php echo $i.$j; ?>,<?php echo $j; ?>,<?php echo $cid; ?>,<?php echo $r['S_id']; ?>,<?php echo $row['E_id']; ?>)" value="<?php echo $r['S_id']; ?>" class="btn btn-sm" name="save" style="display:none"> <i class="fas fa-check text-primary" style="font-size: 18px" title="Click to Save the Change "></i>  </button>
                </td>

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

      ?>


    </div>
</div>
        <div class="tend"></div>  <!--it cover and highliting buttom area of the table -->


    </div>

  </body>
</html>
<!-- <script type="text/javascript" src="js/jquery.js"></script> -->
<script src="../datatables/jquery.dataTables.js"></script>
<script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>


  $(function () {
  //  $("#example1").DataTable();
    $('#example1').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

  //below function are use validation of obtained according to the total marks
  function myfn(loop,j,cid,sid,eid){
    var exam_term=document.getElementById("term"+j).value;
    var exam_date=document.getElementById("e_date"+j).value;
    var total_marks=parseInt(document.getElementById("r4"+j).value);    //total marks
    var obtained_marks=parseInt(document.getElementById("r3"+loop).value);    //obtained marks
    var E_id=eid;
    var sid=sid;
    var cid=cid;

    var main_msg=document.getElementById("msg1"+j);
    var obt_msg=document.getElementById("ob_msg"+loop);
    if (exam_term=="") {  main_msg.innerHTML="<div class='alert alert-danger font-weight-bold'> Please Enter the Exam Term. </div>"; return false;}
    else if (exam_date=="") { main_msg.innerHTML="<div class='alert alert-danger font-weight-bold'> Please Enter the Exam Date. </div>"; return false;}
    else if (total_marks=="") { main_msg.innerHTML="<div class='alert alert-danger font-weight-bold'> Please Enter the Exam Total Marks. </div>"; return false;}
    else {  main_msg.innerHTML="";  }


    if(obtained_marks==''){  obt_msg.innerHTML="<i class='text-danger font-weight-bold'>Please fill the field.</i>"; return false;}
    else if ( obtained_marks > total_marks ) { obt_msg.innerHTML="<i class='text-danger font-weight-bold'>Obtained Marks > Total Marks</i>";  return false;}
    else {  obt_msg.innerHTML="";

    $.ajax({
    url:'edit_exam_marks_processing.php',
    type:'POST',
    data:{sid,cid,obtained_marks,E_id},

    success:function(data){
      document.getElementById("edit"+loop).style.display='none';
      document.getElementById("edit_icon"+loop).style.display='block';
      document.getElementById("r3"+loop).readOnly=true;

    if(data=="yes"){obt_msg.innerHTML="<i class='alert alert-primary'> Update Successfully</i>";}
    else if(data=="no"){  obt_msg.innerHTML="<i class='alert alert-danger'> Update Failed!...</i>";  }
    else {
    $('#ob_msg').html('');
    }
    setTimeout(hide ,2000);
    function hide(){
      obt_msg.style.display='none';
      document.getElementById("row"+loop).style ='';
      document.getElementById("r3"+loop).style='border:none';
  }
    }
    });

  }

  }


//update the exam top area records ....
function Fn_Exam_update(j ,eid){
  var msg=document.getElementById("msg1"+j);

  var E_id=eid;
  var exam_term=document.getElementById("term"+j).value;
  var exam_date=document.getElementById("e_date"+j).value;
  var total_marks=document.getElementById("r4"+j).value;    //total marks

  if (exam_term=="") {  msg.innerHTML="<div class='alert alert-danger font-weight-bold'> Please Enter the Exam Term. </div>"; return false;}
  else if (exam_date=="") { msg.innerHTML="<div class='alert alert-danger font-weight-bold'> Please Enter the Exam Date. </div>"; return false;}
  else if (total_marks=="") { msg.innerHTML="<div class='alert alert-danger font-weight-bold'> Please Enter the Exam Total Marks. </div>"; return false;}
  else {  msg.innerHTML="";  }

  $.ajax({
  url:'edit_exam_record_processing.php',
  type:'POST',
  data:{E_id,exam_term,exam_date,total_marks},
  success:function(data){
    var t=document.getElementById("term"+j);
    var d=document.getElementById("e_date"+j);
    var tl=document.getElementById("r4"+j);
    t.readOnly=true;d.readOnly=true;tl.readOnly=true;
    t.style="background:none;border:none";d.style="background:none;border:none";tl.style="background:none;border:none";

  if(data=="yes"){msg.innerHTML="<div class='alert alert-primary font-weight-bold'> Record Update Successfully. </div>";  }
  else if(data=="no"){msg.innerHTML="<div class='alert alert-danger font-weight-bold'> Update Failed. </div>";}
  else {msg.innerHTML="";}

  setTimeout(hide ,600);
  function hide(){  msg.innerHTML=''; $("#active_class").load(location.href + " #active_class"); // Add space between URL and selector. }
  }
  }
});

}

//delete function
function Fn_Delete(eid ,j){
  var E_id=eid;
  var m=document.getElementById("msg1"+j);
  $.confirm({
      title: 'Delete Exam Record!',
      content: 'Are  you  sure to  Delete this  Exam  &  its  Records.<br> Do you want to Continue?',
      type: 'red',
      typeAnimated: true,
      buttons: {
          Continue: {
              text: 'Continue',
              btnClass: 'btn-red',
              action: function(){
                $.ajax({
                  url:'delete_exam_record.php',
                  type:'POST',
                  data:{E_id},
                  success:function(data){
                    if (data=="yes") { m.innerHTML="<div class='alert alert-primary font-weight-bold'> Your's Exam & its Records are Successfully Deleted. </div>";   }
                    else if(data=="no"){ m.innerHTML="<div class='alert alert-danger font-weight-bold'> Exam Records Deletion Failed! </div>";  }

                    setTimeout(f_hide ,2000);
                    function f_hide(){ m.innerHTML="";
                    $("#active_class").load(location.href + " #active_class"); // Add space between URL and selector.
                  }
                  }
                });

              }
          },
          close: function () {
          }
      }
  });
}
</script>
