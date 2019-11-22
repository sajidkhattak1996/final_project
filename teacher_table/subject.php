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


            <div id="expire_class" style="display: block">
                <div class="tstart" style="padding-top:5px;margin-top: 20px;">
                  <h2 class="text-left">Institute Name: <?php echo $_SESSION['institute']; ?> </h2>
                </div>

                                    <table class="table table-striped table-bordered table-hover table-sm table-light" >
                                              <thead class="bg-info">
                                                  <tr>
                                                        <th scope="col" scope="row">Class Name</th>
                                                        <th scope="col">Subject Name</th>
                                                        <th scope="col">Attendence</th>
                                                        <th scope="col">Assignment</th>
                                                        <th scope="col">Presentation</th>
                                                        <th scope="col">Quizes</th>
                                                  </tr>
                                              </thead>
                                                <tbody>
                                                        <tr>
                                                          <td><a href="class_page.php">Msc final</a></td>
                                                          <td><a href="">C++</a></td>
                                                          <td><button class="btn btn-outline-info">Add</button></td>
                                                          <td><button class="btn btn-outline-info">Add</button></td>
                                                          <td><button class="btn btn-outline-info">Add</button></td>
                                                          <td><button class="btn btn-outline-info">Add</button></td>
                                                        </tr>

                                                </tbody>
                                    </table>
                                <div class="tend">

                                </div>


                </div>

            </div>




<?php
    }
  else {
    echo "<script> alert('Please Login first!.... '); </script>";
  }

?>
