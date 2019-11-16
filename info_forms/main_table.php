
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

    	<link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/defaults.css">
        <link rel="stylesheet" href="css/nav1-core.css">
        <link rel="stylesheet" href="css/nav1-layout.css">

        <!--[if lt IE 9]>
        <link rel="stylesheet" href="css/ie8-core.min.css">
        <link rel="stylesheet" href="css/ie8-layout.min.css">
        <script src="js/html5shiv.min.js"></script>
        <![endif]-->

        <script src="js/rem.min.js"></script>

      </head>
    <body>

    <!--the top menu and the user information menu are start from here and below wel be the end comment -->
    <!-- div class for the logo on the left most top -->
    <div class="" style="width: 100%; height: 60px;background: #008c7e;">
        <img src="LOGO2.png" style="width: 140px; height: 50px;margin-top:5px;margin-left: 5px;">
        <label id="websitename"> Welcome to the Class Room Management</label>
    </div>
    <!-- logo class ended -->


    <!--information menu are start   -->
    <a href="#" class="nav1-button">Menu</a>
    <nav1 class="nav1">
        <ul>
            <li><a href="#">User full Name </a></li>
            <li><a href="#">user information</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="C:\xampp\htdocs\final_project\index.html">Log out</a></li>
        </ul>
    </nav1>
    <a href="#" class="nav1-close">Close Menu</a>
    <!--information menu are ended -->
    <!-- the ssdiv cover the empty which are on the left side of the information menu -->
    <div id="ssdiv" style="background: #008c7e; width: 100%; height: 46px;border-top:solid 1px #fff;" >
    </div>
    <!-- no things is written in this div B/c it is hide inthe mobile size -->


    <script src="js/jquery.js"></script>
    <script src="js/nav1.jquery.min.js"></script>
    <script>
        $('.nav1').nav1();
    </script>
    <!-- from here the nav menu and user informatio menu are ended -->
    <!--top head area ended -->





    <!-- below area and button such classes helps etc -->
    <div class="bttn" style="background: #008c7e;">
    		      <ul>
                    <button class="btn btn-outline-light btn-lg bg-light text-dark">        All Classes           </button>
                     <a href="enroll_class.html"><button class="btn btn-outline-light btn-lg">    Enroll in Class    </button>  </a>
                      <a href="helps.html" >         <button class="btn btn-outline-light btn-lg">        Helps         </button>  </a>

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
              This is your Student Homepage. The Homepage show the classes you are enrolled in. To enroll in a new class,
              click the enroll in a class button. Click a class name to open your class homepage for the class.from the Class Homepage you can see
              you'r Class records.

            </p>

        </div>

    </div>





      <div class="container-fluid" id="divtable" >
        <div class="tstart" style="padding-top:5px;">
          <h2 class="text-left">Institute Name: University Of Peshawar </h2>
        </div>

                        		<table class="table table-striped table-bordered table-hover table-sm table-light" >
                                			<thead class="bg-info">
                                    			<tr>
                                        				<th scope="col" scope="row">Class ID</th>
                                        				<th scope="col">Class Name</th>
                                        				<th scope="col">Teacher</th>
                                        				<th scope="col">Slide</th>
                                        				<!-- <th scope="col">Start Date</th> -->
                                        				<th scope="col">Date</th>
                                        				<th scope="col">Drop</th>
                                    			</tr>
                                			</thead>
                                  			<tbody>
                                        			<tr>
                                        				<td scope="row">23432</td>
                                        				<td><a href="student_record.html">Msc final</a></td>
                                        				<td>Waheed Rehman</td>
                                        				<td>AI</td>
                                        				<!-- <td>15/10/2019</td> -->
                                        				<td>20/10/2019</td>
                                        				<td><button class="btn btn-outline-warning text-dark" > remove </button> </td>
                                        			</tr>
                                        			<tr>
                                        				<td scope="row">12345</td>
                                        				<td><a href="student_record.html">Msc final</a></td>
                                        				<td>Haseeb</td>

                                        				<td>Algorithm</td>
                                        				<td>10/12/2019</td>
                                        				<td > <button class="btn btn-outline-warning text-dark"> remove </button>  </td>
                                        			</tr>

                          		          </tbody>
                        		</table>
                        <div class="tend">

                        </div>
      </div>

      </body>
    </html>
