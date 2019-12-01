<?php
  include('top_info.php');
  if (isset($_SESSION['email']) && isset($_SESSION['pass'])) { ?>
    <!DOCTYPE html>
      <html lang="en" dir="ltr">
        <head>

          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="description" content="">

          <title>welcome to webside as a teacher  </title>

          </head>
      <body>

      <!-- below area and button such classes helps etc -->
      <div class="bttn" style="background: #008c7e;">
                <ul>
                    <a href="tmain_table.php">    <button class="btn btn-outline-light btn-lg bg-light text-dark">         All Classes           </button> </a>
                       <a href="create_class.php"><button class="btn btn-outline-light btn-lg">    Create New Class     </button>  </a>
                          <a href="helps.php" >         <button class="btn btn-outline-light btn-lg">        Helps               </button>  </a>

                </ul>
        </div>
      <!--above button container are ended -->

      <div class="about_area">
          <div class="viewing_area">
            <h5>NOW VIEWING :>
              <strong>
              <a href="" style="color: blue"> All Classes  </a>
            </strong>
            </h5>
          </div>

          <div class="about">
              <h2>About this page </h2>
              <p class="text">
                This is your Teacher Homepage. The Homepage show the classes you are Created and along with the Start and Expire date. You can also Add,Drop ,Edit Add Slides to the Class
                Details. Your Expired Classes are move to the Expired Classes Area.You see Class inside details by clicking on the Class Name.

                you'r Class records.

              </p>

          </div>

      </div>





        <div class="container-fluid" id="table_maindiv">

          <!-- below area and button such etc -->
          <style> #b2:hover{color: blue;border-color: #008c7e} </style>
          <div class="tabletabs">
              <form  action="" method="post">
                    <ul>
                          <button id="b1" type="submit" name="bb1">   <b>     All Active Classes     </b> </button>
                           <a href=""><button id="b2" type="submit" name="btnexpire" >  <b>  Expired Classes  </b>  </button>  </a>
                            <!-- <a href="" >         <button id="b3">  <b>      Helps        </b> </button>  </a> -->

                    </ul>
                </form>
            </div>

      <?php
      if (isset($_POST['btnexpire'])) {
              echo "<script> window.location.href='expire_class.php'; </script>";
      }
      ?>

      <!-- all active classes --><style> #dmsg{ display: none} </style>
            <div id="active_class">
                <div class="tstart" style="padding-top:5px;margin-top: 20px;">
                  <h2 class="text-left">Institute Name: <?php  echo $_SESSION['institute'];?>
                  </h2>
                    <span class="alert alert-primary"  id="dmsg" style="float: right;margin-top: -20px;margin-right:30px;">Record Successfully Deleted.</span>
                </div>


                                                        <?php

                                                        include('fetch_active_classes.php');

                                                        ?>




                </div> <!--ended-->


        </body>
      </html>
  <?php   }
  else {
    echo "<script> alert('Please Login first!.... '); </script>";
  }

?>
