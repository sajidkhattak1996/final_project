<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>welcome to login </title>
	<link href="sajid_tcss.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/bootstrap.css">

  </head>
<body>
  <!--===============below loader are include =================-->
  <?php include('../plugins/loader/loader1.html'); ?>
  <!--=================ended==================================-->
<?php  include('top_info.php'); ?>



<!-- below area and button  -->
<div class="bttn" style="background: #008c7e">
		      <ul>
                <a href="tmain_table.php">     <button class="btn btn-outline-light btn-lg">   All Classes      </button>    </a>
                  <a href="create_class.php">   <button class="btn btn-outline-light btn-lg ">   Create New Class  </button>   </a>
                   <button class="btn btn-outline-light btn-lg bg-light text-dark bg-light">         Helps             </button>

          </ul>
	</div>

<div class="about_area">
    <div class="viewing_area">
      <h5>

        NOW VIEWING :>
        <a href="tmain_table.php" style="color: black"> All Classes</a>   :>
        <a href="" style="color: blue" > Helps</a>


      </h5>
    </div>

    <div class="about">
        <h2>Helps About Class Creatation. </h2>

    </div>
<div class="container-fluid " >
        <a href="../pic/help/create class step 1.jpg"><img src="../pic/help/create class step 1.jpg" class="img-fluid  pb-2" alt="Responsive image"  style=" height: auto;border: solid 1px blue;border-radius: 26px;box-shadow: 1px 1px 12px 1px "></a>
        <a href="../pic/help/create class step 2.jpg"><img src="../pic/help/create class step 2.jpg" class="img-fluid  pb-2" alt="Responsive image"  style=" height: auto;border: solid 1px blue;border-radius: 26px;box-shadow: 1px 1px 12px 1px "></a>
</div>

</div>




  </body>
</html>
