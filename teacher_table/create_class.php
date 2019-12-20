<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>create new class</title>

	<link href="teacher_css.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="bootstrap 4/css/glyphicon.css">

<script src="js/jquery.js"></script>

<link rel="stylesheet" href="create_class_css.css">
<script>
    var b =new Date();
    var current_date =b.getFullYear()+"-"+(b.getMonth()+1)+"-"+b.getDate();

</script>
</head>
<body>
<?php include('top_info.php');  ?>


<!-- below area and button such classes helps etc -->
<div class="bttn" style="background: #008c7e;">
		      <ul>
              <a href="tmain_table.php">  <button class="btn btn-outline-light btn-lg ">        All Classes           </button> </a>
                 <a href=""><button class="btn btn-outline-light btn-lg bg-light text-dark">    Create New Class    </button>  </a>
                  <a href="helps.php" >         <button class="btn btn-outline-light btn-lg">        Helps         </button>  </a>

          </ul>
	</div>
<!--above button container are ended -->

<div class="about_area">
    <div class="viewing_area">
      <h5>NOW VIEWING :> <a href="tmain_table.php" style="color: #000"> All Classes  </a> :>
        <a href="" style="color: blue">Create Class </a>

      </h5>
    </div>

    <div class="about">
        <h2>About this page </h2>
        <p class="text">
              This is your Create Class Homepage. Here you can Create New Class for your's students.Provide the required information for the
              Creatation of New Class.provide the suitable Enrollment Key for Class and Remember them to Give to Your Students to Enroll in
              Your Class and Also Remember your Class ID which given by you to your Students to Enroll in Your Class.After Complete all
              the requirements Click the Submit to Create the Class.

        </p>

    </div>

</div>

<style >
  #row1{padding-bottom: 0.6%;}
</style>
<?php
      date_default_timezone_set("Asia/Karachi");
      $current_date=date('Y-m-d');
      /* the below function add number of day to the any date */
      $exp_date=date('Y-m-d', strtotime($current_date. ' + 180 days'));
      /*the above we add the 180 day to current date */


 ?>

<div class="create_class_outside_div" id="ccc" >
  <h3>CREATE NEW CLASS</h3>
	<div class="create_class_inside_div" >
        <form class="" action="" method="post" id="clf" onsubmit="return msg()">
            <div class="row" id="row1">
                <div class="col-6" id="col1">
                  <label for="c_name">Enter Class Name:</label><br>
                  <input type="text" name="cname" value="" title="Enter Class Name" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{2,40}$" title="Class Name shoud start from Alphabet and  between three to twenty character long.">
                </div>

                <div class="col-6" id="col2">
                  <label >Enrollment key:</label><br>
                  <input type="text" name="enroll_key" title="Enter Enrollment key"  required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{2,40}$" title="Enrollment key shoud start from Alphabet and  between three to twenty character long.">
                </div>
            </div>

            <div class="row" id="row2">
                <div class="col-6" id="col1">
                  <label >Enter Class Session:</label><br>
                  <input type="text" name="c_session" value="" title="Enter Your Class Session" required>
                </div>

                <div class="col-6" id="col2">
                  <label >Expire Date:</label><br>
                  <input type="date" name="expire_date" id="expire_date" value="<?php echo $exp_date; ?>" required title="Enter The Expire Data For Your Class" onblur="return msg()">
                  <p id="m" style="color: red;font-weight:bolder;"></p>
                  <script>
                      function msg(){
                        var expire_date =new Date(document.getElementById('expire_date').value);
                        var ex_date=expire_date.getTime();

                        var b=new Date();
                        var current_date=b.getTime();  //the 1 are added b/c month range is 0-11 and 0 for jan

                        var msg=document.getElementById('m');

                        if( ex_date < current_date ) {
                            msg.innerHTML = "Expiry Date must be greater then the current date !";
                            current_date=null;
                            ex_date=null;
                            return false;
                        }
                        else {
                          msg.innerHTML='';
                        }

                        current_date=null;
                        ex_date=null;

                      }

                  </script>
                </div>
            </div>
            <div class="row" id="row3">
                <div class="col-6" id="col1">
                  <label >Enter Subject Name:</label><br>
                  <input type="text" name="subject_name" value="" title="Enter Your Subject Name In Which you Create Class For Them" required>
                </div>


            </div>

            <div id="btn_c_class">
            <button type="submit" name="create_class" >Create Class</button>
            </div>

        </form>
	</div>
</div>

<?php
      if (isset($_POST['create_class'])) {
        // variables for the create class are
        $class_name  = $_POST['cname'];
        $enroll_key  = $_POST['enroll_key'];
        $class_session=$_POST['c_session'];
        $current_date =date("Y-m-d");
        date_default_timezone_set("Asia/Karachi");
        $ctime  =date("h:i:sa");
        $expire_date  =$_POST['expire_date'];
        $subject_name =$_POST['subject_name'];

        $status_subject=0;



        include('db_connection.php');
        if ($con) {
                $stmt1 ="SELECT Subject_id,subject_name FROM subject WHERE subject_name ='$subject_name'";
                $result = mysqli_query($con ,$stmt1);
                //fatchinh record from query
                $row =mysqli_num_rows($result);
                if ($row==1) {
                  $rr=mysqli_fetch_array($result);
                  $_SESSION['subject_id'] = $rr['Subject_id'];
                  $status_subject=1;
                }else {
                  $stmt2 ="INSERT INTO subject (subject_name) VALUES ('$subject_name')";
                  $result2=mysqli_query($con ,$stmt2);
                  if ($result2) {
                    $stmt5 ="SELECT Subject_id,subject_name FROM subject WHERE subject_name ='$subject_name'";
                    $result5 = mysqli_query($con ,$stmt1);
                    //fetching the records
                    $row5=mysqli_fetch_array($result5);
                    $_SESSION['subject_id'] = $row5['Subject_id'];

                    $status_subject=1;

                  }
                }

                if ($status_subject==1) {
                  $tid=$_SESSION['t_id'];
                  $stmt11 ="INSERT INTO class (Name,Enrollment_key,Class_session,Start_date,currenttime,Expire_date,T_id) VALUES ('$class_name', '$enroll_key', '$class_session', '$current_date', '$ctime', '$expire_date', '$tid')";
                  $exe_stmt11=mysqli_query($con,$stmt11);
                      if ($exe_stmt11) {

                        $stmt_22="SELECT Class_id FROM class WHERE(Name='$class_name' AND Enrollment_key='$enroll_key' AND Class_session='$class_session'  AND Start_date='$current_date'  AND currenttime='$ctime'  AND Expire_date='$expire_date' AND T_id='$tid')";
                        $exe_22=mysqli_query($con, $stmt_22);
                            if ($exe_22) {
                              $row_22=mysqli_fetch_array($exe_22);

                              $_SESSION['Class_id'] = $row_22['Class_id'];
                              $s_id=$_SESSION['subject_id'];
                              $c_id=$_SESSION['Class_id'];
                              $stmt_33 ="INSERT INTO have (Subject_id, Class_id) VALUES ('$s_id', '$c_id')";
                              $exe_33 =mysqli_query($con,$stmt_33);
                                          if ($exe_33) {
                                                //here will the final msg for class creation...
                                                ?>
                                                <style>  #ccc{ display:none}   </style>

                                                <div class="create_class_outside_div">
                                                  <h3>CREATE NEW CLASS</h3>
                                                  <div class="create_class_inside_div" style="padding-top: 10px;padding-bottom:30px">
                                                    <style>
                                                           /* css for new user div class */
                                                            #new_user{
                                                              display: block;
                                                                background: rgba(0,166,138,0.7);
                                                                width: 70%;
                                                                 margin:0 auto;
                                                                 margin-top: 20px;
                                                                height: auto;
                                                                 border-radius: 12px;

                                                            }
                                                             #new_user_form{
                                                                 padding-left: 20px;
                                                             }
                                                             #cl1{ background: none;border: none;float: right; font-size: 25px;}
                                                             #cl1:hover{color: red;transition: 0.7s}
                                                             #new_user_body {border: solid 1px yellow;border-radius: 12px;padding-left: 20px;width:90%;margin: 20px  25px;}
                                                             #new_user_body ul li{ color: #fff;padding-top: 5px;padding-bottom: 5px;}
                                                             #new_user_body ul li:hover{ color: blue;font-size: 25px}
                                                             #cl2{background: none; border:solid 1px red;border-radius: 25px;color:yellow}
                                                             #cl2:hover{background: red;color: #fff;transition: 0.8s}
                                                           @media (max-width:960px){
                                                             #new_user{
                                                               background: rgba(0,166,138,0.7);
                                                               width: 80%;
                                                               margin:0 auto;
                                                               margin-top: 10px;
                                                               height: auto;
                                                               border-radius: 12px;
                                                             }
                                                             #new_user_body {border: solid 1px yellow;border-radius: 12px;padding-left: 20px;width:80%;margin: 20px  25px;}

                                                             #new_user_form h2,#new_user_body h2{font-size: 18px}

                                                           }
                                                           @media (max-width:600px){
                                                             #new_user{
                                                               background: rgba(0,166,138,0.7);
                                                               width: 90%;
                                                               margin:0 auto;
                                                               margin-top: 10px;
                                                               height: auto;
                                                               border-radius: 12px;
                                                             }
                                                             #new_user_form h2,#new_user_body h2{font-size: 14px}

                                                           }

                                                           @media (max-width:300px){
                                                             #new_user{
                                                               background: rgba(0,166,138,0.7);
                                                               width: 90%;
                                                               margin:0 auto;
                                                               margin-top: 8px;
                                                               height: auto;
                                                               border-radius: 12px;
                                                             }
                                                             #vl{ font-size: 10px; }
                                                             #new_user_form h2,#new_user_body h2{font-size: 10px}

                                                           }
                                                           /* ended */
                                                     </style>
                                                    <!-- If click on  New use button then this below form are open -->
                                                    <div id="new_user" >
                                                      <div class="new_user_divin">
                                                         <form class="" action="" method="post" id="new_user_form">
                                                             <button type="submit" name="c1" id="cl1" >
                                                             <span class="glyphicon glyphicon-remove"></span></button>
                                                             <h2 style="color: red;font-weight: bolder;letter-spacing: 0.5px">Note! Please Remember the Following Values</h2>
                                                         </form>
                                                         <form action="" method="post">
                                                             <div id="new_user_body">
                                                                 <p> <h2>Your Class been Successfully Created.</h2>
                                                                   <h3 style="border-bottom:solid 1px #fff;"> Give Following Values to Your Students to Enroll in Your Class. </h3>
                                                                   <h4>
                                                                         <ul>
                                                                           <li id="vl">Class ID:<strong><?php echo $_SESSION['Class_id'];  ?> </strong> </li>
                                                                           <li id="vl">Enrollment key: <?php echo $enroll_key;  ?></li>
                                                                           <!-- <li id="vl">Subject ID: <?php  //echo $_SESSION['subject_id']; ?>  </li> -->

                                                                         </ul>
                                                                   </h4>
                                                                 </p>
                                                             </div>
                                                       </form>

                                                         <form class="" action="" method="post">
                                                           <button type="submit" name="c2" id="cl2"><b>Colse </b><span class="glyphicon glyphicon-remove"></span></button>
                                                         </form>
                                                      </div>
                                                    </div>

                                                    <!-- ended -->



                                                  </div>
                                                </div>


                                                <?php

                                                mysqli_close($con);
                                          }else {
                                            // echo "<script> alert('Problem Occur! Please try again....');  </script>";
                                          }


                            }else {
                              // echo "<script> alert('Problem Occur! Please try again....');  </script>";
                            }
                      }
                      else {
                        echo "<script> alert('class creation falied! try again....');  </script>";
                      }

                }else {
                  echo "<script> alert('Problem things Problem while Executing the Database Quires!.....');  </script>";
                }

        }else {
          echo "<script> alert('Problem Occur While Connecting to the Database!');  </script>".mysqli_error($con);
        }
      }
?>































  </body>
</html>
