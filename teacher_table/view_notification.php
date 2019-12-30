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
                        <style media="screen">
                            #b4{
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
                  <form class="" action="" method="post">
                          <table class="table table-straped ">
                            <thead id="bb">
                                <tr>
                                  <th width="20%">Title</th>
                                  <th width="55%">Message</th>
                                  <th width="10%">Upload Date</th>
                                  <th width="7%"> Expire Date</th>
                                  <th width="7%"> Delete</th>
                                </tr>
                            </thead>
                            <!-- <script type="text/javascript">  function hide(){ document.get.getElementById("m").style.display='none'; }</script>
                              <tr id="m">
                                <td colspan="5" class="text-center alert-primary" >Your Notification are Successfully Deleted.</td>
                              </tr> -->
                          <?php

                                if (isset($con)) {
                                      $sql="SELECT id,title, msg , cdate , expire_date ,Class_id  FROM notification WHERE Class_id='".$_SESSION['class_id']."'";
                                      $exe_sql=mysqli_query($con ,$sql);
                                      if (mysqli_num_rows($exe_sql)>0) {
                                        while ($result=mysqli_fetch_assoc($exe_sql)) {
                                          ?>
                                          <tr>
                                                <td><?php echo $result['title']; ?></td>
                                                <td><?php echo $result['msg']; ?></td>
                                                <td><?php echo $result['cdate']; ?></td>
                                                <td><?php echo $result['expire_date']; ?></td>
                                                <td>
                                                    <a href="delete_notification.php?id=<?php echo $result['id']; ?>&cid=<?php echo $result['Class_id'];?>"><button type="button" name="button" class="btn btn-danger btn-md" >Delete</button></a>
                                                  <!-- <a href=""><button type="button" name="button" class="btn btn-danger btn-md" id="">Conform</button> </a> -->
                                                </td>
                                          </tr>
                                          <?php
                                        }
                                      }else { ?>
                                        <tr>
                                              <td colspan="5" class="alert alert-warning text-center" > <?php  echo "No Notification are Upload.";  ?> </td>
                                        </tr>

                                        <?php
                                      }

                                }else {
                                  echo "problem occur in database connection ";
                                }
                           ?>

                         </table>

                  </form>

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
