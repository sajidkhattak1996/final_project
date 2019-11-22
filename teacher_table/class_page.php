<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>welcome to login </title>
	<link href="teacher_css.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="bootstrap 4/css/glyphicon.css">

    <style type="text/css">

.tabletabs{

      width:98.5%;
      margin: 0 auto;
      border-radius: 30px 30px 0px 0px;

      /* border-bottom:solid 1px rgba(172,239,206,0.66); */
      height:30px;
      margin-bottom: -20px;

}


    #table_maindiv {

      	border-radius: 10px;
      	padding-top:10px;
      	padding-bottom: 10px;
      	width: 100%;
}
#b1{
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
#b2,#b3,#b4,#b5{
    background-image: -webkit-linear-gradient(270deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
    background-image: -moz-linear-gradient(270deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
    background-image: -o-linear-gradient(270deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
    background-image: linear-gradient(180deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
    color: #6f9de8;
    border:solid 1px rgba(127,243,228,0.52);
    border-radius: 7px 7px 0px 0px;
}
#b2:hover{
   background-image: -webkit-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
    background-image: -moz-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
    background-image: -o-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
    background-image: linear-gradient(180deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
    color: #1f5de8;
}
#b3:hover{
   background-image: -webkit-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
    background-image: -moz-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
    background-image: -o-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
    background-image: linear-gradient(180deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
    color: #1f5de8;
}
#b4:hover{
   background-image: -webkit-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
    background-image: -moz-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
    background-image: -o-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
    background-image: linear-gradient(180deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
    color: #1f5de8;
}
#b5:hover{
   background-image: -webkit-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
    background-image: -moz-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
    background-image: -o-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
    background-image: linear-gradient(180deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
    color: #1f5de8;
}


    </style>





  </head>
<body>
<?php  include('top_info.php');  ?>
<!-- below area and button such classes helps etc -->
<div class="bttn" style="background: #008c7e;">
		      <ul>
              <a href="tmain_table.php"><button class="btn btn-outline-light btn-lg bg-light text-dark">     All Classes    </button></a>
                 <a href="create_class.php"><button class="btn btn-outline-light btn-lg">    Create New Class    </button>  </a>
                  <a href="helps.php" >         <button class="btn btn-outline-light btn-lg">        Helps         </button>  </a>

          </ul>
	</div>
<!--above button container are ended -->

<div class="about_area">
    <div class="viewing_area">
      <h5>NOW VIEWING :> <a href="tmain_table.php" style="color: blue"> All Classes  </a></h5>
    </div>

    <div class="about">
        <h2>About this page </h2>
        <p class="text">
          This is your Teacher Class Record Homepage. The page show the Class records of all Students such is Attendence , Assignment , Presentation and Quizes.
          The Homepage display all the previous records of the Students.Click on Eye Open (view) to display that particular records of
          that Student.The Button Attendence , Assignment , Quizes and Presentation display that Particular Records of Students.


        </p>

    </div>

</div>





  <div class="container-fluid" id="table_maindiv">

    <!-- below area and button such etc -->
    <div class="tabletabs">
        <form  action="" method="post">
              <ul>
                     <button id="b1" type="submit" name="bb1">                            <b>     Class Record     </b>  </button>
                     <button id="b2" type="submit" name="attendence_btn" onclick="fn()">  <b>  Attendence  </b>  </button>

                     <button id="b3" type="submit" name="assignment_btn">    <b>      Assignments   </b> </button>
                     <button id="b4" type="submit" name="quize_btn">         <b>      Quizes   </b> </button>
                     <button id="b5" type="submit" name="presentation_btn">  <b>      Presentation   </b> </button>

              </ul>
          </form>
      </div>
    <!--above button container are ended -->
<!-- <script>
    function fn(){
      var x = document.getElementById('active_class');
      x.style.display="none";
    }
</script> -->

<?php
if (isset($_POST['attendence_btn'])) {
?>
<style >
  #active_class{ display:none; }
  #b1{
    background-image: -webkit-linear-gradient(270deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
      background-image: -moz-linear-gradient(270deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
      background-image: -o-linear-gradient(270deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
      background-image: linear-gradient(180deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
    color: #6f9de8;
    border:solid 1px rgba(127,243,228,0.52);
    border-radius: 7px 7px 0px 0px;}

    #b2{
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
</style>

<div id="expire_class" style="display: block">
    <div class="tstart" style="padding-top:5px;margin-top: 20px;">
      <h2 class="text-left">Institute Name: University Of Peshawar </h2>
    </div>

                        <table class="table table-striped table-bordered table-hover table-sm table-light" >
                                  <thead class="bg-info">
                                      <tr>
                                            <th scope="col" scope="row">Class ID</th>
                                            <th scope="col">Class Name</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Slide</th>
                                            <th scope="col">Edit</th>
                                      </tr>
                                  </thead>
                                    <tbody>
                                            <tr>
                                              <td scope="row">23432</td>
                                              <td><a href="">Msc final</a></td>
                                              <td>10-10-2019</td>
                                              <td><button class="btn btn-outline-info btn-lg">Click</button</td>
                                              <td><button class="btn btn-outline-primary" > <span class="glyphicon glyphicon-pencil" style="font-size: 14px"></span></button> </td>
                                            </tr>

                                    </tbody>
                        </table>
                    <div class="tend">

                    </div>


    </div>

</div>


<?php
}
?>


<div id="active_class">
    <div class="tstart" style="padding-top:5px;margin-top: 20px;">
      <h2 class="text-left">Institute Name: University Of Peshawar </h2>
    </div>

    <table class="table table-striped  table-bordered table-hover table-sm">
        <thead class="bg-info">
                <tr>
                  <th scope="col" scope="row">Reg.No</th>
                  <th scope="col">Name</th>
                  <th scope="col">Attendence</th>
                  <th scope="col">Assignment</th>
                  <th scope="col">Quiz</th>
                  <th scope="col">Presentation</th>

                </tr>
          </thead>
          <tbody>
                <tr>
                  <th scope="row">0</th>
                  <td>Sajid ali gulzar</td>
                  <td>&nbsp;&nbsp;  80%  &nbsp;&nbsp;&nbsp;&nbsp;<a href="attendence_record.html"> <span class="glyphicon glyphicon-eye-open" style="color: black;"></span></a></td>
                  <td>&nbsp;&nbsp;  80 out of 100  &nbsp;&nbsp;&nbsp;&nbsp;<a href="assignment.html"><span class="glyphicon glyphicon-eye-open" style="color: black;"></span></a></td>
                  <td>&nbsp;&nbsp;  20 out of 25  &nbsp;&nbsp;&nbsp;&nbsp;<a href="quize.html"><span class="glyphicon glyphicon-eye-open" style="color: black;"></span></a></td>
                  <td>&nbsp;&nbsp;  5 out of 10  &nbsp;&nbsp;&nbsp;&nbsp;<a href="presentation.html"><span class="glyphicon glyphicon-eye-open" style="color: black;"></span></a></td>

                </tr>
                <tr>
                  <th scope="row">0</th>
                  <td>Sajid ali gulzar</td>
                  <td>&nbsp;&nbsp;  60%  &nbsp;&nbsp;&nbsp;&nbsp;<a href="attendence_record.html"> <span class="glyphicon glyphicon-eye-open" style="color: black;"></span></a></td>
                  <td>&nbsp;&nbsp;  70 out of 100  &nbsp;&nbsp;&nbsp;&nbsp;<a href="assignment.html"><span class="glyphicon glyphicon-eye-open" style="color: black;"></span></a></td>
                  <td>&nbsp;&nbsp; 15 out of 25  &nbsp;&nbsp;&nbsp;&nbsp;<a href="quize.html"><span class="glyphicon glyphicon-eye-open" style="color: black;"></span></a></td>
                  <td>&nbsp;&nbsp;  6 out of 10  &nbsp;&nbsp;&nbsp;&nbsp;<a href="presentation.html"><span class="glyphicon glyphicon-eye-open" style="color: black;"></span></a></td>

                </tr>


            </tbody>
      </table>

        <div class="tend"></div>  <!--it cover and highliting buttom area of the table -->


    </div>

</div>




  </body>
</html>
