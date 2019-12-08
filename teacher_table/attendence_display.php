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




  </head>
<body>
<!--=========top nvagation menu ==========-->
<?php  include('top_info.php');  ?>
<!--=========top nvagation menu endeddd ==========-->

<!--=========including the top classes button below the top navagation menu ================-->
<?php  include('display_classes_top_menu.php');  ?>
<!--=========ended ================-->



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

<!--=========including the top tablee navagation menu ================-->
<?php  include('display_classes_table_top_menu.php');  ?>
<!--=========ended ================-->




  </body>
</html>
