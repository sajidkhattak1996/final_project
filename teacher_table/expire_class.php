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
            <h5>
              NOW VIEWING :>
              <strong>
               <a href="tmain_table.php" style="color: black"> All Active Classes &nbsp; </a>:>&nbsp;&nbsp;
              <a href="" style="color: blue"> Expire Classes  </a>
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
          <style> #b1:hover{color: blue;border-color: #008c7e} </style>
          <div class="tabletabs">
              <form  action="" method="post">
                    <ul>
                          <button id="b1" type="submit" name="bb1">   <b>     All Active Classes     </b> </button>
                           <a href=""><button id="b2" type="submit" name="btnexpire" onclick="fn()">  <b>  Expired Classes  </b>  </button>  </a>
                            <!-- <a href="" >         <button id="b3">  <b>      Helps        </b> </button>  </a> -->

                    </ul>
                </form>
            </div>
<?php
    if (isset($_POST['bb1'])) {
      echo "<script> window.location.href='tmain_table.php'; </script>";
    }

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

        </body>
      </html>
  <?php   }
  else {
    echo "<script> alert('Please Login first!.... '); </script>";
  }

?>
