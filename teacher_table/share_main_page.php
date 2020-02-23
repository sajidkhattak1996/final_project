<?php
include('top_info.php');
// <!--===============below loader are include =================-->
 include('../plugins/loader/loader1.html');
// <!--=================ended==================================-->
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
                  This is Teacher Share Information Homepage. In this Page you can share/upload the course slides/notes or external link for the
                  course content and also Delete record of them.You can also create Notification by click on Share Information to inform your's
                  student of that class and you can also view your information and slides.<p> <b class="text-danger">Note: </b>The Maximum size of 10 MB  of file are allowed for upload.  </p>
                </p>

            </div>

        </div>

<style media="screen">
  #file{ border: solid 1px #13bca4;border-radius: 5px;margin-top:23px}
    #sub{border:solid 1px #13bca4; border-radius: 5px;height: 27px; width: 250px}
        #upload{border:solid 1px #13bca4;border-radius: 5px;height: 27px;font-weight: bolder;font-size: 14px;padding:1px 1px 1px 1px  }
          #c{margin-left: 5px}
            #f2{ display: none}

</style>

  <div class="container-fluid" id="table_maindiv">
        <?php
        if (isset($con)) {
              $stmt1="SELECT subject.subject_name FROM subject INNER JOIN have ON have.Subject_id=subject.Subject_id WHERE have.Class_id='".$_SESSION['class_id']."'";
              $row=mysqli_fetch_array(mysqli_query($con, $stmt1));
              //for class name
              $q2="SELECT Name FROM class WHERE Class_id='".$_SESSION['class_id']."' and T_id='".$_SESSION['t_id']."'";
              $rq2=mysqli_fetch_array(mysqli_query($con,$q2));

              /* query for the display of links just below slide data table */
              $cid=$_SESSION['class_id'];

              /*table for them are below  */
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
                                <style media="screen">
                                          #b1{
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
                                        #b1 {
                                          pointer-events: none;
                                        }
                                </style>

                          <div class="tend" style="border-radius: 10px 10px 0px 0px">   </div>
                          <div id="file_msg"> </div>
                            <div class="row" style="margin-top: 0px;margin-left: 0px;margin-right: 0px;border:solid 1px #13bca4;border-radius: 0px 0px 10px 10px;height:auto">
                                        <form id="form3" enctype="multipart/form-data" method="post" action="share_main_page.php" style="margin:0 auto;padding-top:10px">
                                              <div class="row" style="padding-bottom:10px">

                                                <div class="col-sm" id="c" style="margin-right: 50px;margin-bottom:5px">
                                                      <input type="file" name="file" id="file"  class=" form-control-file"  title="Click here to select file to upload." required />
                                                </div>
                                                <div class="col-sm "id="c" style="margin-right: 50px;margin-bottom:5px">
                                                      Enter Description:
                                                      <input type="text" name="sub" id="sub" class="input-medium" required  placeholder="Enter the Name of File"/>
                                                </div>
                                                <div class="col-sm " id="c">
                                                  <input type="submit" style="margin-top:20px" class="btn btn-info btn-lg" name="upload" id="upload" title="Click here to upload the file." value="Upload File" />
                                                </div>
                                                <div class="col-sm" style="margin-top:18px;margin-left:5px">
                                                  <button type="button" name="btn_link" onclick="fn();" class="btn btn-outline-primary btn-lg" >Click to Save Link</button>
                                                </div>
                                              </div>
                                        </form>
                            <script>
                                    function fn(){
                                        var f1=document.getElementById("form3");
                                        var f2=document.getElementById("f2");
                                            f1.style.display='none'
                                            f2.style.display='block';
                                    }
                                    function fn2(){
                                      var f1=document.getElementById("form3");
                                      var f2=document.getElementById("f2");
                                          f1.style.display='block'
                                          f2.style.display='none';
                                    }

                            </script>

                                        <form id="f2" method="post" action="save_link.php" style="margin:0 auto;padding-top:10px">
                                              <div class="row" style="padding-bottom:10px">
                                                <div class="col-sm" id="c" style="margin-right: 50px;margin-bottom:5px">
                                                      Enter Link
                                                      <input type="text" name="l" id="sub" class="form-control" title="Enter/past your link" required>
                                                </div>
                                                <div class="col-sm "id="c" style="margin-right: 50px;margin-bottom:5px">
                                                      Enter Description:
                                                      <input type="text" name="des" id="sub" class="input-medium form-control"  placeholder="Enter the Description of your link. "  required >
                                                </div>
                                                <div class="col-sm " id="c">
                                                  <button type="submit" style="margin-top:20px" class="btn btn-info btn-lg" name="save" id="save" title="Click here to Save your link." value="<?php echo $_SESSION['class_id']; ?>">Save Link</button>
                                                </div>
                                                <div class="col-sm" id="c" style="margin-top:18px;margin-left:5px">
                                                  <button type="button" name="btn_link" onclick="fn2()" class="btn btn-outline-primary btn-lg" >Click to Upload Link </button>
                                                </div>
                                              </div>
                                        </form>


                            </div>
                  </div>


        <!-- php code for upload file  -->
        <?php
        if(!empty($_POST))
        {
        include('db_connection.php');
        if (!$con)
          echo('Could not connect: ' . mysql_error());
        else
        {
          $f=$_FILES["file"]["name"];
          if($_FILES['file']['size'] > 10485760) { //10 MB (size is also in bytes)
            // echo "file is tooo big";
          ?>  <script>
            // alert(" Sorry!! Filename Already Exists...")
              var m=document.getElementById("file_msg");
              m.innerHTML="<div class='alert alert-danger text-center'> Your File Size is too Big  </div>";
              setTimeout(fh ,5000);
              function fh(){
                m.innerHTML="";
              }
            </script>
            <?php
          }

      else {
              $file_extension=explode(".",$f);
              $ext=end($file_extension);
              $allowed = array('gif', 'png', 'jpg','pfd','PDF','doc','DOC','docx','DOCX','csv','CSV','ppt','pptx','xml','xps','sql');
              if (!in_array($ext, $allowed)) {
                  // echo 'not allowed error';
                  ?>  <script>
                    // alert(" Sorry!! Filename Already Exists...")
                      var m=document.getElementById("file_msg");
                      m.innerHTML="<div class='alert alert-danger text-center'> This Extension of file are not allowed!.  </div>";
                      setTimeout(fh ,5000);
                      function fh(){
                        m.innerHTML="";
                      }
                    </script>
                    <?php
              }

            else {
              if (file_exists("download/" . $_FILES["file"]["name"]))
              {?>
                <script>
                //// alert(" Sorry!! Filename Already Exists...")
                  var m=document.getElementById("file_msg");
                  m.innerHTML="<div class='alert alert-danger text-center'> Sorry!! Filename Already Exists...  </div>";
                  setTimeout(fh ,4000);
                  function fh(){
                    m.innerHTML="";
                  }
                </script>
                <?php
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
                  // //alert("Your File are Successfully Uploded");
                  // //window.location.href='share_main_page.php';

                  var m=document.getElementById("file_msg");
                  m.innerHTML="<div class='alert alert-success text-center'> Your File are Successfully Uploded  </div>";
                  setTimeout(fh ,4000);
                  function fh(){
                    m.innerHTML="";
                  }
                  </script>
                  <?php
                }

            }




          }
        }
        mysqli_close($con);
        }
        ?>
        <style media="screen">
          /* table top head css */
                #bb{
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

                  <div style="margin-top:10px;">
                        <table id="example6" class="table table-straped table-hover table-bordered table-sm">
                              <thead id="bb">
                                  <tr>
                                    <!-- <th>ID</th> -->
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Download File</th>
                                    <!-- <th>Class ID</th> -->
                                    <th>Delete</th>
                                  </tr>
                              </thead>
                              <tbody style="background: #ECF4F6">
                                <?php
                                            include('db_connection.php');
                                            $q="SELECT * FROM slide WHERE Class_id='".$_SESSION['class_id']."' ORDER BY c_date DESC";
                                            $ros=mysqli_query($con,$q);
                                            if (mysqli_num_rows($ros)>0) {
                                              while($row=mysqli_fetch_array($ros))
                                              {
                                                echo '<tr>';
                                                // echo '<td>' . $row['id'].'</td>';
                                                echo '<td>' . $row['topic'].'</td>';
                                                echo '<td>' .$row['c_date'].'</td>';
                                                echo "<td><a title='Click here to download in file.' href='slide_download.php?id={$row['file']}'>{$row['file']} </a></td>";
                                                // echo '<td>' . $row['Class_id'].'</td>';
                                               ?>
                                               <td>
                                              <a href="slide_deleteById.php?id=<?php echo $row['id'] ?>&imageurl=<?php echo $row['file'] ?>" id="dd">
                                              <button class="btn btn-danger" title="Click here to erase file."> Delete </button>
                                              </a>
                                              </td>
                                              <?php
                                              echo '</tr>';

                                              }
                                            }else { ?>
                                                <tr>
                                                    <td colspan="4" class="text-center alert alert-warning">No Slides or Cource Topics are Uploaded.</td>
                                                </tr>
                                            <?php  }


                                      ?>
                                      <tr>
                                          <td colspan="4" class="alert alert-warning text-center"> <b>Below are Links to download notes or cource Data. </b> </td>
                                      </tr>
                                      <!-- the below are written for the links   -->
                                      <?php

                                              $query_link="SELECT * FROM links WHERE Class_id='$cid'";
                                              $exe_link=mysqli_query($con,$query_link);
                                              if (mysqli_num_rows($exe_link)>0) {

                                                while ($row_link=mysqli_fetch_assoc($exe_link)) {
                                                  echo "<tr>";
                                                  echo "<td>".$row_link['description']."</td>";
                                                  echo "<td>".$row_link['ldate']."</td>";
                                                  echo "<td><a href='".$row_link['link']."'> click me to view  </a></td>";
                                                  ?>
                                                  <td>
                                                    <a href="delete_link_code.php?id=<?php echo $row_link['L_id']; ?>" id="dd">
                                                      <button class="btn btn-danger" title="Click here to erase file."> Delete </button> </a>
                                                    </td>
                                                    <?php
                                                    echo "</tr>";
                                                  }
                                              }else { ?>
                                                  <tr>
                                                      <td colspan="4" class="text-center alert alert-warning">No Links are Uploaded for Class Slides or Cource topic.</td>
                                                  </tr>
                                              <?php   }
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
        </html>
    <?php   }
    else {
      echo "<script> alert('Please Login first!.... '); </script>";
    }

  ?>
