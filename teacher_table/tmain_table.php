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
            <h5>NOW VIEWING :> <a href="" style="color: blue"> All Classes  </a></h5>
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
          <div class="tabletabs">
              <form  action="" method="post">
                    <ul>
                          <button id="b1" type="submit" name="bb1">   <b>     All Active Classes     </b> </button>
                           <a href=""><button id="b2" type="submit" name="btnexpire" onclick="fn()">  <b>  Expired Classes  </b>  </button>  </a>
                            <!-- <a href="" >         <button id="b3">  <b>      Helps        </b> </button>  </a> -->

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
      if (isset($_POST['btnexpire'])) {
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
<!-- expired classes div is here -->
      <div id="expire_class" style="display: block">
          <div class="tstart" style="padding-top:5px;margin-top: 20px;">
            <h2 class="text-left">Institute Name: <?php echo $_SESSION['institute']; ?> </h2>

          </div>
          <?php

          include('fetch_expire_classes.php');


          ?>


          </div> <!--ended -->

      </div>


      <?php
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
