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
                  This is Teacher Share Information Homepage. In this Page you can share/upload the course slides/notes or external link for the
                  course content and also Delete record of them.You can also create Notification by click on Share Information to inform your's
                  student of that class and you can also view your information and slides.

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
                            #b3{
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
                            #b3 {
                              pointer-events: none;
                            }


                  </style>
    <?php
        date_default_timezone_set("Asia/Karachi");
        $current_date=date('Y-m-d');
        /* the below function add number of day to the any date */
        $exp_date=date('Y-m-d', strtotime($current_date. ' + 10 days'));
        /*the above we add the 10 day to current date */
        if(isset($_SESSION['s']) && $_SESSION['s']=='ss'){ ?>
          <div class="alert alert-primary text-center" id="msg1"><b id="msg"> Your Information is Successfully Share. <b></div>
            <script type="text/javascript">
                    // document.getElementById("msg").innerHTML="";
                    setTimeout(hide ,2000);
                    function hide(){
                      // document.getElementById("msg").innerHTML="";
                      document.getElementById('msg1').style.display='none';
                    }

            </script>
        <?php unset($_SESSION['s']); }
        if(isset($_SESSION['s']) && $_SESSION['s']=='no'){ ?>
          <div class="alert alert-danger text-center" id="msg1"><b id="msg"> Falid Occur try Again!.... <b></div>
            <script type="text/javascript">
                    // document.getElementById("msg").innerHTML="";
                    setTimeout(hide ,2000);
                    function hide(){
                      // document.getElementById("msg").innerHTML="";
                      document.getElementById('msg1').style.display='none';
                    }

            </script>
        <?php unset($_SESSION['s']); }
     ?>
                  <div class="tend" style="border-radius: 10px 10px 0px 0px">   </div>
                    <div class="row" style="margin-top: 0px;margin-left: 0px;margin-right: 0px;border:solid 1px #13bca4;border-radius: 0px 0px 10px 10px;height:auto;padding-bottom:20px">
                            <form class="" action="save_notification.php" method="post">
                                  <div class="" style="margin-top: 10px;margin-left: 20px;">
                                          <div class="col-sm">
                                                    <label><b>Enter Title <b></label>
                                                    <input type="text" name="t" class="form-control" value="">

                                          </div>
                                          <div class="col-sm">
                                                <label>Enter Your Message</label>
                                                <textarea name="msg" rows="3" cols="300" class="form-control"></textarea>
                                          </div>
                                          <div class="col-sm">
                                                <label>Expire Date</label>
                                                <input type="date" name="edate" value="<?php echo $exp_date;  ?>" class="form-control" title="The Default Expire Date are Taken 10 days Farword on the Current Date . You Also Change this">
                                          </div>
                                  </div>
                                  <div class="col-10" style="margin: 0 auto;margin-top: 10px">
                                    <button type="submit" name="btn_share" class="btn btn-primary btn-lg btn-block" value="<?php  echo $_SESSION['class_id']; ?>">Click To Submit</button>

                                  </div>
                            </form>
                    </div>
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
