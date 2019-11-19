<!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">

        <title>welcome to login </title>
    	<link href="sajid_tcss.css" rel="stylesheet" type="text/css">
      </head>
    <body>
      <?php  include('std_top_menu.php');  ?>





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
