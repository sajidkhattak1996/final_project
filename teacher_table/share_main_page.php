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
          <?php include 'classes_top_menu.php';  ?>
        <!--above button container are ended -->

        <!-- the below css link have high periority then above top_info.php file  -->
        <link rel="stylesheet" href="../datatables-bs4/css/dataTables.bootstrap4.css">

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

<style media="screen">
  #file{ border: solid 1px #13bca4;border-radius: 5px;margin-top:23px}
    #sub{border:solid 1px #13bca4; border-radius: 5px;height: 27px; width: 250px}
        #upload{border:solid 1px #13bca4;border-radius: 5px;height: 27px;font-weight: bolder;font-size: 14px;padding:1px 1px 1px 1px  }
          #c{margin-left: 5px}

</style>



  <div class="container-fluid" id="table_maindiv">
<?php
if (isset($con)) {
      $stmt1="SELECT subject.subject_name FROM subject INNER JOIN have ON have.Subject_id=subject.Subject_id WHERE have.Class_id='".$_SESSION['class_id']."'";
      $row=mysqli_fetch_array(mysqli_query($con, $stmt1));
      //for class name
      $q2="SELECT Name FROM class WHERE Class_id='".$_SESSION['class_id']."' and T_id='".$_SESSION['t_id']."'";
      $rq2=mysqli_fetch_array(mysqli_query($con,$q2));
}else {
  echo "connection erroe".mysqli_error($con);
}

 ?>
        <!-- all active classes --><style> #dmsg{ display: none} </style>
              <div id="active_class">
                  <div class="tstart" style="padding-top:5px;margin-top: 20px;">
                    <h2>
                      <div class="row container-fluid">
                            <div class="col-sm ">  <span>Class ID:  <?php echo $_SESSION['class_id']; ?></span>  </div>
                            <div class="col-sm ">  <span>Class Name: <?php echo $rq2['Name']; ?> </span>  </div>
                            <div class="col-sm">  <span>Subject Name: <?php echo $row['subject_name']; unset($row); ?> </span>  </div>
                      </div>
                    </h2>

                  </div> <!--ended-->
                        <?php  include 'share_navagation_menu.php';  ?>

                  <div class="tend" style="border-radius: 10px 10px 0px 0px">   </div>
                    <div class="row" style="margin-top: 0px;margin-left: 0px;margin-right: 0px;border:solid 1px #13bca4;border-radius: 0px 0px 10px 10px;height:auto">
                                <form id="form3" enctype="multipart/form-data" method="post" action="share_main_page.php" style="margin:0 auto;padding-top:10px">
                                      <div class="row" style="padding-bottom:10px">
                                        <div class="col-sm" id="c" style="margin-right: 50px;margin-bottom:5px">
                                              <input type="file" name="file" id="file"  class=" form-control-file"  title="Click here to select file to upload." required />
                                        </div>
                                        <div class="col-sm "id="c" style="margin-right: 50px;margin-bottom:5px">
                                              Enter File Name:
                                              <input type="text" name="sub" id="sub" class="input-medium" required  placeholder="Enter the Name of File"/>
                                        </div>
                                        <div class="col-sm " id="c">
                                          <input type="submit" style="margin-top:20px" class="btn btn-info btn-lg" name="upload" id="upload" title="Click here to upload the file." value="Upload File" />
                                        </div>
                                      </div>
                                </form>
                    </div>
          </div>

<style media="screen">
  #bb{
      background-image: -webkit-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
      background-image: -moz-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
      background-image: -o-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
      background-image: linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
      color: #000;
      border:solid 1px rgba(127,243,228,0.52);
      border-radius: 12px;
      font-weight: bolder;
    }
</style>
<!-- php code for upload file  -->
<?php
if(!empty($_POST))
{
include('db_connection.php');
if (!$con)
  echo('Could not connect: ' . mysql_error());
else
{
  if (file_exists("download/" . $_FILES["file"]["name"]))
  {
    echo '<script language="javascript">alert(" Sorry!! Filename Already Exists...")</script>';
  }
  else
  {
    date_default_timezone_set("Asia/Karachi");
    $current_date =date("Y-m-d");
    move_uploaded_file($_FILES["file"]["tmp_name"],"download/" . $_FILES["file"]["name"]) ;
    $sql="INSERT INTO slide(topic, c_date, file, Class_id) VALUES ('" . $_POST["sub"] ."','" . $current_date . "','" .$_FILES["file"]["name"] ."','".$_SESSION['class_id']."')";

    if (!mysqli_query($con,$sql))
      echo('Error : ' . mysqli_error());
    else ?>
      <script language="javascript">
      alert("Your File are Successfully Uploded");
      window.location.href='share_main_page.php';
      </script>
      <?php
    }
}
mysqli_close($con);
}
?>








          <div style="margin-top:10px;">
                <table id="example6" class="table table-straped table-hover table-bordered table-sm">
                      <thead id="bb">
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Download File</th>
                            <th>Class ID</th>
                            <th>Delete</th>
                          </tr>
                      </thead>
                      <tbody style="background: #ECF4F6">
                        <?php
                                    include('db_connection.php');
                                    $q="SELECT * FROM slide WHERE Class_id='".$_SESSION['class_id']."' ORDER BY c_date DESC";
                                    $ros=mysqli_query($con,$q);

                                    while($row=mysqli_fetch_array($ros))
                                    {
                                      echo '<tr>';
                                      echo '<td>' . $row['id'];
                                      echo '<td>' . $row['topic'];
                                      echo '<td>' .$row['c_date'];
                                      echo "<td><a title='Click here to download in file.' href='slide_download.php?id={$row['file']}'>{$row['file']} </a>";
                                      echo '<td>' . $row['Class_id'];
                                     ?>
                                     <td>
                                    <a href="slide_deleteById.php?id=<?php echo $row['id'] ?>" id="dd">
                                    <button class="btn btn-danger" title="Click here to erase file."> Delete </button>
                                    </a>
                                    </td>
                                    <?php
                                    echo '</tr>';

                                    }
                                    mysqli_close($con);
                              ?>

                      </tbody>
                </table>
          </div>
</div>
<script src="../datatables/jquery.dataTables.js"></script>
<script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    // $("#example6").DataTable();
    $('#example6').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>


          </body>
          <?php  echo "<pre>".print_r($_SESSION, TRUE)."</pre>";


          ?>
        </html>
    <?php   }
    else {
      echo "<script> alert('Please Login first!.... '); </script>";
    }

  ?>
