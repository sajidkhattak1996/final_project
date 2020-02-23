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
        <h2>Helps About Main Page. </h2>
        <p>
          <span> <b><a href="#fig1">  Figure 1 </a> </b>: Contain the Information about the Homepage Display to the Teacher.  </span><br>
          <span> <b><a href="#fig1.1">  Figure 1.1 </a> </b>: Display the screen When Click on the User name/info icon in the nevagation.To edit his/her information.  </span><br>
          <span> <b><a href="#fig1.2">  Figure 1.2 </a> </b>  : Contain the Information about Class Name Clicked.  </span><br>
              <span> &nbsp;&nbsp;&nbsp;&nbsp; <b><a href="#fig1.2.1">  Figure 1.2.1 </a> </b>:To Display the all students records click for particular tabs for particular records. </span><br>
              <span> &nbsp;&nbsp;&nbsp;&nbsp; <b><a href="#fig1.2.2">  Figure 1.2.2 </a> </b>: When Class Name is Clicked the Following Displayed and it Contained Information are. </span><br>
              <span> &nbsp;&nbsp&nbsp;&nbsp; <b><a href="#fig1.2.3">  Figure 1.2.3 </a> </b>:Display the Information about Eye Open Icon in the Class Record Homepage. </span><br>
          <span> <b><a href="#fig1.3">  Figure 1.3 </a> </b> : Contain the Information about Class Subject Clicked. </span><br>
              <span> &nbsp;&nbsp;&nbsp;&nbsp; <b><a href="#fig1.3.1">  Figure 1.3.1 </a> </b>: To ADD Attendance , presentation ,Quize & Assignment Click on Particular button.  </span><br>
          <span> <b><a href="#fig1.4">  Figure 1.4 </a> </b> : Share Icon Contained the following Information about Class.</span><br>
              <span> &nbsp;&nbsp;&nbsp;&nbsp; <b><a href="#fig1.4.1">  Figure 1.4.1 </a> </b>: When Clicked on Share icon following information are Displayed.  </span><br>

    </div>
<div class="container-fluid " >
        <figure class="figure" id="fig1">
           <a href="../pic/help/all classes main page step1.jpg"><img src="../pic/help/all classes main page step1.jpg" class="figure-img img-fluid  pb-2" alt="Responsive image"></a>
           <figcaption class="figure-caption" ><b> Figure 1 </b>:Contain the Information about the Homepage Display to the Teacher.</figcaption>
        </figure>

        <figure class="figure" id="fig1.1">
          <a href="../pic/help/info icon click step 2.jpg"><img src="../pic/help/info icon click step 2.jpg" class="figure-img img-fluid " alt="Responsive image" ></a>
          <figcaption class="figure-caption" ><b> Figure 1.1 </b>: Display the screen When Click on the User name/info icon in the nevagation.To edit his/her information.</figcaption>
        </figure>

        <figure class="figure" id="fig1.2">
          <a href="../pic/help/class name step 1.jpg"><img src="../pic/help/class name step 1.jpg" class="figure-img img-fluid " alt="Responsive image" ></a>
          <figcaption class="figure-caption" ><b> Figure 1.2 </b>: Contain the Information about Class Name Clicked. </figcaption>
        </figure>
              <figure class="figure" id="fig1.2.1">
                <a href="../pic/help/class name step 1.1.jpg"><img src="../pic/help/class name step 1.1.jpg" class="figure-img img-fluid " alt="Responsive image" ></a>
                <figcaption class="figure-caption" ><b> Figure 1.2.1 </b> :To Display the all students records click for particular tabs for particular records.</figcaption>
              </figure>

              <figure class="figure" id="fig1.2.2">
                <a href="../pic/help/class name step 1.2.jpg"><img src="../pic/help/class name step 1.2.jpg" class="figure-img img-fluid " alt="Responsive image" ></a>
                <figcaption class="figure-caption" ><b> Figure 1.2.2 </b>: When Class Name is Clicked the Following Displayed and it Contained Information are. </figcaption>
              </figure>

              <figure class="figure" id="fig1.2.3">
                <a href="../pic/help/class name step 1.3.jpg"><img src="../pic/help/class name step 1.3.jpg" class="figure-img img-fluid " alt="Responsive image" ></a>
                <figcaption class="figure-caption" ><b> Figure 1.2.3 </b>:Display the Information about Eye Open Icon in the Class Record Homepage. </figcaption>
              </figure>

        <figure class="figure" id="fig1.3">
          <a href="../pic/help/subject step1.jpg"><img src="../pic/help/subject step1.jpg" class="figure-img img-fluid " alt="Responsive image" ></a>
          <figcaption class="figure-caption" ><b> Figure 1.3 </b>: Contain the Information about Class Subject Clicked. </figcaption>
        </figure>
            <figure class="figure" id="fig1.3.1">
              <a href="../pic/help/subject step 1.1.jpg"><img src="../pic/help/subject step 1.1.jpg" class="figure-img img-fluid " alt="Responsive image" ></a>
              <figcaption class="figure-caption" ><b> Figure 1.3.1 </b>: To ADD Attendance , presentation ,Quize & Assignment Click on Particular button. </figcaption>
            </figure>
       <figure class="figure" id="fig1.4">
         <a href="../pic/help/share icon step 2.jpg"><img src="../pic/help/share icon step 2.jpg" class="figure-img img-fluid " alt="Responsive image" ></a>
         <figcaption class="figure-caption" ><b> Figure 1.4 </b>: Share Icon Contained the following Information about Class. </figcaption>
       </figure>

             <figure class="figure" id="fig1.4.1">
               <a href="../pic/help/share icon step 2.1.jpg"><img src="../pic/help/share icon step 2.1.jpg" class="figure-img img-fluid " alt="Responsive image" ></a>
               <figcaption class="figure-caption" ><b> Figure 1.4.1 </b>: When Clicked on Share icon following information are Displayed. </figcaption>
             </figure>

</div>

</div>




  </body>
</html>
