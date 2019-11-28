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
                    <a href="tmain_table.php"> <form>   <button class="btn btn-outline-light btn-lg bg-light text-dark">         All Classes           </button> </form> </a>
                       <a href="create_class.php"><button class="btn btn-outline-light btn-lg">    Create New Class     </button>  </a>
                          <a href="helps.php" >         <button class="btn btn-outline-light btn-lg">        Helps               </button>  </a>

                </ul>
        </div>
      <!--above button container are ended -->

      <div class="about_area" >
          <div class="viewing_area">
            <h5>NOW VIEWING :> <a href="" style="color: blue"> Specific Class Name  </a></h5>
            <h5 style="padding-top: 10px;">Subject Name :> <span href="" style="color: deeppink;font-weight: bolder;letter-spacing: 0.8px"> class subject name  </span></h5>
          </div>
      </div>



  <div class="container-fluid" id="table_maindiv" >
            <div id="expire_class" style="display: block;">
                <div class="tstart" style="padding-top:5px;margin-top: 20px;padding-bottom: 2px">
                      <h2 class="text-left">&nbsp;Institute Name: <?php echo $_SESSION['institute']; ?> </h2>
                        <div class="">
                                  <form class="" action="" method="post">
                                          <table class="table">
                                                        <tr>
                                                              <th scope="col">Class Student</th>
                                                              <th scope="col">Attendence</th>
                                                              <th scope="col">Assignment</th>
                                                              <th scope="col">Presentation</th>
                                                              <th scope="col">Quizes</th>
                                                        </tr>
                                                  <tbody>
                                                        <tr>
                                                              <td scope="col">   <button class="btn btn-primary btn-lg">&nbsp;&nbsp;    Click   &nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open"></span> </button>   </td>
                                                              <td scope="col"><button class="btn btn-success btn-lg">&nbsp; ADD  &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plus"></span> </button></td>
                                                              <td scope="col"><button class="btn btn-success btn-lg">&nbsp; ADD  &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plus"></span>  </button></td>
                                                              <td scope="col"><button class="btn btn-success btn-lg">&nbsp; ADD  &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plus"></span>  </button></td>
                                                              <td scope="col"><button class="btn btn-success btn-lg"> &nbsp; ADD  &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plus"></span> </button></td>
                                                        </tr>
                                                </tbody>
                                        </table>
                                  </form>
                        </div>
                    </div>
              </div>
  </div>
<div class="container-fluid">
  <div class="tend"  style="border-radius: 10px 10px 0px 0px"><!--it the div give the above beautiful style to the table top --></div>
  <table class="table table-striped table-bordered table-hover table-sm table-light" >
            <thead class="bg-info">
                <tr>
                      <th scope="col" scope="row">Reg NO</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                </tr>
            </thead>
              <tbody>
                <tr>
                      <td scope="col" scope="row">Class ID</td>
                      <td scope="col">Class Name</td>
                      <td scope="col">Subject</td>
                </tr>

              </tbody>

            </table>



                              <div class="tend">

                              </div>

</div>

<?php
    }
  else {
    echo "<script> alert('Please Login first!.... '); </script>";
  }

?>
