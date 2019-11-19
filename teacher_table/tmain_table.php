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

      <div id="expire_class" style="display: block">
          <div class="tstart" style="padding-top:5px;margin-top: 20px;">
            <h2 class="text-left">Institute Name: <?php echo $_SESSION['institute']; ?> </h2>
          </div>

                              <table class="table table-striped table-bordered table-hover table-sm table-light" >
                                        <thead class="bg-info">
                                            <tr>
                                                  <th scope="col" scope="row">Class ID</th>
                                                  <th scope="col">Class Name</th>
                                                  <th scope="col">Subject</th>
                                                  <th scope="col">Date</th>
                                                  <th scope="col">Slide</th>
                                                  <th scope="col">Edit</th>
                                            </tr>
                                        </thead>
                                          <tbody>
                                                  <tr>
                                                    <td scope="row">23432</td>
                                                    <td><a href="">Msc final</a></td>
                                                    <td><a href="">C++</a></td>
                                                    <td>10-10-2019</td>
                                                    <td><button class="btn btn-outline-info btn-lg">Click</button</td>
                                                    <td><button class="btn btn-outline-primary" style="border:none"> <span class="glyphicon glyphicon-pencil" style="font-size: 14px"></span></button> </td>
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
            <h2 class="text-left">Institute Name: <?php echo $_SESSION['institute']; ?> </h2>
          </div>

                              <table class="table table-striped table-bordered table-hover table-sm table-light" >
                                        <thead class="bg-info">
                                            <tr>
                                                  <th scope="col" scope="row">Class ID</th>
                                                  <th scope="col">Class Name</th>
                                                  <th scope="col">Subject</th>
                                                  <th scope="col">Start Date</th>
                                                  <th scope="col">Expire Date</th>
                                                  <th scope="col">Slides</th>
                                                  <th scope="col">Edit</th>
                                                  <th scope="col">Drop</th>
                                            </tr>
                                        </thead>
                                          <tbody>
                                                <tr>
                                                  <td scope="row">23432</td>
                                                  <td><a href="">Msc final</a></td>
                                                  <td><a href="">C++</a></td>
                                                  <td>1-1-2019</td>
                                                  <td>10-10-2019</td>
                                                  <td><button class="btn btn-outline-info btn-lg">Click</button</td>
                                                  <td><button class="btn btn-outline-primary" style="border:none"> <span class="glyphicon glyphicon-pencil" style="font-size: 14px"></span></button> </td>
                                                  <td><button class="btn btn-outline-danger" style="border:none"> <span class="glyphicon glyphicon-trash" style="font-size: 14px;border"></span></button> </td>

                                                </tr>
                                                <tr>
                                                  <td scope="row">23432</td>
                                                  <td><a href="">Msc final</a></td>
                                                  <td><a href="">database</a></td>
                                                  <td>1-1-2019</td>
                                                  <td>10-10-2019</td>
                                                  <td><button class="btn btn-outline-info btn-lg">Click</button</td>
                                                  <td><button class="btn btn-outline-primary" style="border:none"> <span class="glyphicon glyphicon-pencil" style="font-size: 14px"></span></button> </td>
                                                  <td><button class="btn btn-outline-danger" style="border:none"> <span class="glyphicon glyphicon-trash" style="font-size: 14px"></span></button> </td>

                                                </tr>
                                                <tr>
                                                  <td scope="row">23432</td>
                                                  <td><a href="">Msc final</a></td>
                                                  <td><a href="">java</a></td>
                                                  <td>1-1-2019</td>
                                                  <td>10-10-2019</td>
                                                  <td><button class="btn btn-outline-info btn-lg">Click</button</td>
                                                  <td><button class="btn btn-outline-primary" style="border:none"> <span class="glyphicon glyphicon-pencil" style="font-size: 14px"></span></button> </td>
                                                  <td><button class="btn btn-outline-danger" style="border:none"> <span class="glyphicon glyphicon-trash" style="font-size: 14px"></span></button> </td>

                                                </tr>


                                          </tbody>
                              </table>
                          <div class="tend">

                          </div>


          </div>

      </div>



        </body>
      </html>
  <?php   }
  else {
    echo "<script> alert('Please Login first!.... '); </script>";
  }

?>
