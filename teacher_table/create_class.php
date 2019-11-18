<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
<!-- <meta http-equiv="refresh" content="1"> -->
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
              Creatation of New Class.provide the suitable Enrollment Key for students , in they are register with your Class.After Complete all
              the requirements Click the Submit to Create the Class.

        </p>

    </div>

</div>


<div class="create_class_outside_div">
  <h3>CREATE NEW CLASS</h3>
	<div class="create_class_inside_div">
        <form class="" action="" method="post" id="clf" onsubmit="return msg()">
            <div class="row" id="row1">
                <div class="col-6" id="col1">
                  <label for="c_name">Enter Class Name:</label><br>
                  <input type="text" name="cname" value="" title="enter class name please" required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{5,40}$">
                </div>

                <div class="col-6" id="col2">
                  <label >Enrollment key:</label><br>
                  <input type="text" name="enroll_key" value=""  required pattern="^[a-zA-Z][a-zA-Z0-9-_\s.]{5,40}$">
                </div>
            </div>

            <div class="row" id="row2">
                <div class="col-6" id="col1">
                  <label >Enter Class Session:</label><br>
                  <input type="text" name="c_session" value="" title="enter the class session " required>
                </div>

                <div class="col-6" id="col2">
                  <label >Expire Date:</label><br>
                  <input type="date" name="expire_date" id="expire_date" required >
                  <p id="m" style="color: red;font-weight:bolder;"></p>
                  <script>
                      function msg(){
                        var b=new Date();
                        var current_date=b.getFullYear()+"-"+(b.getMonth()+1)+"-"+b.getDate();  //the 1 are added b/c month range is 0-11 and 0 for jan
                        var expire_date = document.getElementById('expire_date').value;
                        var msg=document.getElementById('m');

                        if( expire_date <= current_date ) {
                            msg.innerHTML = "Expiry Date must be greater then the current date !";
                            return false;
                        }
                        else {
                          msg.style.display='none';
                        }

                      }

                  </script>
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
/* variable for the fileds  */
$cname = $_POST['cname'];
$ekey  = $_POST['enroll_key'];
$session=$_POST['c_session'];
$edate = $_POST['expire_date'];
$cdate ="<script>document.write(current_date)</script>";


$server ="localhost";
$user  ="root";
$pass ="";
$db="project_db";
$con =mysqli_connect($server,$user,$pass,$db);
if ($con) {
   echo "connection created <br>";
}


?>
<div class="">
    <h1>your class successfully create .... </h1>
    <h3>
      <?php
        echo "name = ".$cname."<br>ekey = ".$ekey."<br>session = ".$session."<br>expire date = ".$edate."<br> current date=".$cdate;
      ?>
    </h3>
</div>

<?php
}


?>





  </body>
</html>
