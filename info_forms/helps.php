<!DOCTYPE html>
<?php  session_start(); ?>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>welcome to login </title>
	<link href="sajid_tcss.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/bootstrap.css">
  <style media="screen">
        .container-fluid{
          height: auto;
          border: solid 1px blue;
          border-radius: 6px;
          box-shadow: 1px 1px 12px 1px ;
        }
        .container-fluid img{
          height: auto;
          border: solid 1px blue;
          border-radius: 6px;
          box-shadow: 1px 1px 12px 1px ;
        }
  </style>
  </head>
<body>
  <!--===============below loader are include =================-->
  <?php include('../plugins/loader/loader1.html'); ?>
  <!--=================ended==================================-->
<?php include('std_top_menu.php'); ?>

<style media="screen">  #b33{ background: #fff; color: #000 ;font-weight: bold;}  </style>
<?php include('std_2nd_top_menu.php'); ?>


<div class="about_area">
    <div class="viewing_area">
      <h5>

        NOW VIEWING :>
        <a href="main_table.php" style="color: black"> All Classes</a>   :>
        <a href="" style="color: blue" > Helps</a>


      </h5>
    </div>

    <div class="about">
        <h2>Helps About ClassRoom Management System. </h2>
        <p class="text">
          <span> <b><a href="#fig1">  Figure 1 </a> </b>    : Students Main Page Information After Login.  </span><br>
          <span> <b><a href="#fig2">  Figure 2 </a> </b>    : Information About Bell Icon.  </span><br>
          <span> <b><a href="#fig3">  Figure 3 </a> </b>     : How to Enroll to New Class.  </span><br>
          <span> <b><a href="#fig4">  Figure 4 </a> </b>      : How to Display the slides/notes of Class. </span><br>
          <span> &nbsp;&nbsp;&nbsp;&nbsp; <b><a href="#fig4.1">  Figure 4.1 </a> </b>    : Download slides/notes or view the related link of course topic.  </span><br>


        </p>

    </div>
</div>
<div class="container-fluid">
  <figure class="figure" id="fig1">
    <img src="../pic/help/student step1.jpg" class="figure-img img-fluid  pb-2" alt="Responsive image"  >
    <figcaption class="figure-caption" ><b> Figure 1 </b> : Students Main Page Information After Login. </figcaption>
   </figure>

   <figure class="figure" id="fig2">
     <img src="../pic/help/student step1.2.1.jpg" class="figure-img img-fluid  pb-2" alt="Responsive image"  >
     <figcaption class="figure-caption" ><b> Figure 2 </b>  : Information About Bell Icon.</figcaption>
    </figure>

    <figure class="figure" id="fig3">
      <img src="../pic/help/student step1.3.jpg" class="figure-img img-fluid  pb-2" alt="Responsive image"  >
      <figcaption class="figure-caption" ><b> Figure 3 </b> : How to Enroll to New Class.</figcaption>
     </figure>

     <figure class="figure" id="fig4">
       <img src="../pic/help/student step1slide.jpg" class="figure-img img-fluid  pb-2" alt="Responsive image"  >
       <figcaption class="figure-caption" ><b> Figure 4 </b> : How to Display the slides/notes of Class.</figcaption>
      </figure>

      <figure class="figure" id="fig4.1">
        <img src="../pic/help/student step1.4.jpg" class="figure-img img-fluid  pb-2" alt="Responsive image"  >
        <figcaption class="figure-caption" ><b> Figure 4.1 </b> : Download slides/notes or view the related link of cource topic.</figcaption>
       </figure>

</div>





  </body>
</html>
