<?php
if (isset($_POST['btn_lg'])) {
  $sql="SELECT id,name,Email, password FROM admin WHERE Email='".$_POST['email']."' AND password='".$_POST['pass']."'";
  include('../db_connection.php');
  $exe=mysqli_query($con ,$sql);
  $r=mysqli_fetch_array($exe);
  if ($r['Email']==$_POST['email'] && $r['password']==$_POST['pass']) {
    $admin_name=$r['name'];
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Admin Dashboard</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Tempusdominus Bbootstrap 4 -->
      <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <!-- JQVMap -->
      <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="dist/css/adminlte.min.css">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
      <!-- summernote -->
      <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
      <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">

    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="admin_page.php" class="nav-link">Log  out <i class="fas fa-sign-out-alt"></i></a>
          </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

          <!-- Notifications classes today Dropdown Menu -->
          <?php
            $totay_create_classes=mysqli_query($con ,"SELECT Class_id,Start_date,currenttime,Name FROM `class` WHERE Start_date=CURRENT_DATE");
            $totay_class_row=mysqli_num_rows($totay_create_classes);
           ?>
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i style="opacity: 1.0"><img src="https://img.icons8.com/plasticine/100/000000/classroom.png" style="width: 22px;height: 22px"></i>
              <span class="badge badge-warning navbar-badge"><?php echo $totay_class_row; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">  Today <b><?php echo $totay_class_row; ?> </b>  New Classes Created</span>
              <?php
              $temp=0;
                while ($totay_row=mysqli_fetch_array($totay_create_classes) AND $temp<4) { $temp++;
                  ?>
                  <div class="dropdown-divider"></div>
                  <a href="#active_classes" class="dropdown-item">
                    <i style="opacity: 1.0"><img src="https://img.icons8.com/plasticine/100/000000/classroom.png" style="width: 22px;height: 22px"></i>
                    <?php echo $totay_row[0];  ?>&nbsp;&nbsp;  <?php echo $totay_row[3];  ?>
                    <span class="float-right text-muted text-sm"> <?php echo $totay_row[2]; ?></span> <!--time-->
                  </a>

                  <?php
                }

               ?>
              <div class="dropdown-divider"></div>
              <a href="#active_classes" class="dropdown-item dropdown-footer">See All </a>
            </div>
          </li>

          <!-- file Dropdown Menu -->
          <?php
            $totay_upload_file=mysqli_query($con ,"SELECT id,topic,c_date FROM slide WHERE CURRENT_DATE=c_date");
            $totay_upload_file_row=mysqli_num_rows($totay_upload_file);
           ?>
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fas fa-file-medical"></i>
              <span class="badge badge-warning navbar-badge"><?php echo $totay_upload_file_row; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">  Today <b><?php echo $totay_upload_file_row; ?> </b>  New File are Uploaded</span>
              <?php
              $temp=0;
                while ($totay_row=mysqli_fetch_array($totay_upload_file) AND $temp<4) { $temp++;
                  ?>
                  <div class="dropdown-divider"></div>
                  <a href="#total_store_file" class="dropdown-item">
                    <i style="opacity: 1.0"><img src="https://img.icons8.com/plasticine/100/000000/classroom.png" style="width: 22px;height: 22px"></i>
                    <?php echo $totay_row[0];  ?>&nbsp;&nbsp;  <?php echo $totay_row[2];  ?>
                    <span class="float-right text-muted text-sm"> <?php echo $totay_row[3]; ?></span> <!--time-->
                  </a>

                  <?php
                }

               ?>
              <div class="dropdown-divider"></div>
              <a href="#total_store_file" class="dropdown-item dropdown-footer">See All </a>
            </div>
          </li>

          <!-- notification Dropdown Menu -->
          <?php
            $totay_notification=mysqli_query($con ,"SELECT id,title,cdate FROM notification WHERE CURRENT_DATE=cdate");
            $totay_notification_row=mysqli_num_rows($totay_notification);
           ?>
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fas fa-bell"></i>
              <span class="badge badge-warning navbar-badge"><?php echo $totay_notification_row; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">  Today <b><?php echo $totay_notification_row; ?> </b>  New Notifications </span>
              <?php
              $temp=0;
                while ($totay_row=mysqli_fetch_array($totay_notification) AND $temp<4) { $temp++;
                  ?>
                  <div class="dropdown-divider"></div>
                  <a href="#active_notification" class="dropdown-item">
                    <i style="opacity: 1.0"><img src="https://img.icons8.com/plasticine/100/000000/classroom.png" style="width: 22px;height: 22px"></i>
                    <?php echo $totay_row[0];  ?>&nbsp;&nbsp;  <?php echo $totay_row[1];  ?>
                    <span class="float-right text-muted text-sm"> <?php echo $totay_row[2]; ?></span> <!--time-->
                  </a>

                  <?php
                }

               ?>
              <div class="dropdown-divider"></div>
              <a href="#active_notification" class="dropdown-item dropdown-footer">See All </a>
            </div>
          </li>

          <!-- links Dropdown Menu -->
          <?php
            $totay_upload_links=mysqli_query($con ,"SELECT L_id,description,ldate FROM links WHERE CURRENT_DATE=ldate");
            $totay_upload_links_row=mysqli_num_rows($totay_upload_links);
           ?>
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fas fa-link"></i>
              <span class="badge badge-warning navbar-badge"><?php echo $totay_upload_links_row; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">  Today <b><?php echo $totay_upload_links_row; ?> </b>  New Links are Uploaded</span>
              <?php
              $temp=0;
                while ($totay_row=mysqli_fetch_array($totay_upload_links) AND $temp<4) { $temp++;
                  ?>
                  <div class="dropdown-divider"></div>
                  <a href="#total_store_links" class="dropdown-item">
                    <i style="opacity: 1.0"><img src="https://img.icons8.com/plasticine/100/000000/classroom.png" style="width: 22px;height: 22px"></i>
                    <?php echo $totay_row[0];  ?>&nbsp;&nbsp;  <?php echo $totay_row[2];  ?>
                    <span class="float-right text-muted text-sm"> <?php echo $totay_row[3]; ?></span> <!--time-->
                  </a>

                  <?php
                }

               ?>
              <div class="dropdown-divider"></div>
              <a href="#total_store_links" class="dropdown-item dropdown-footer">See All </a>
            </div>
          </li>





          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
              <i class="fas fa-th-large"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
          <img src="../logo/LOGO1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
          <span class="brand-text font-weight-light">Wellcom To CRM</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <?php
              if ($r['id']==1) {
                ?>
                <a href="../pic/sajid.jpg" class="d-block">  <img src="../pic/sajid.jpg" class="img-rounded " alt="User Image" ></a>
                <?php
              }else if ($r['id']==2) {
                ?>
                <a href="../pic/faheem.jpg" class="d-block">
                  <img src="../pic/faheem.jpg" class="img-rounded " alt="User Image" >
                  <!-- <i class="fas fa-user" style="font-size: 45px"></i> -->
                </a>
                <?php
              }
              else if ($r['id']==3) {
                ?>
                <a href="../pic/kashif.jpg" class="d-block">
                  <img src="../pic/kashif.jpg" class="img-rounded " alt="User Image" >
                  <!-- <i class="fas fa-user" style="font-size: 45px"></i> -->
                </a>
                <?php
              }
              else if ($r['id']==4) {
                ?>
                <a href="../pic/ihsan.jpg" class="d-block">
                  <img src="../pic/ihsan.jpg" class="img-rounded " alt="User Image" >
                  <!-- <i class="fas fa-user" style="font-size: 45px"></i> -->
                </a>
                <?php
              }

             ?>
            </div>
            <div class="info">
            <a href="#">  <?php echo $admin_name; ?>  </a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard

                  </p>
                </a>
                <!-- <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./index.html" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard v3</p>
                    </a>
                  </li>
                </ul> -->
              </li>
    <!--tempralyy commmpeeeeeeeeeeeeetede-->
              <!-- <li class="nav-item">
                <a href="pages/widgets.html" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Widgets
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li> -->
    <!--tempralyy commmpeeeeeeeeeeeeetede-->

      <!-- all registered user record         -->
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="ion ion-person-add"></i>
                  <p>
                    Registered Users
                    <i class="fas fa-angle-left right"></i>

                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#total_student" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Students Registered </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#total_teacher" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Teachers Registered</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#total_admin" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Admin Registered </p>
                    </a>
                  </li>
                </ul>
              </li>
      <!--==== ended ==================================================================-->
  <!--============= below are classes=========================================================== -->
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i style="opacity: 1.0"><img src="https://img.icons8.com/plasticine/100/000000/classroom.png" style="width: 22px;height: 22px"></i>
                  <p>
                    Classes
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#total_classes" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Total Classes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#active_classes" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Active Classes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#expired_classes" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Expired Classes</p>
                    </a>
                  </li>
                </ul>
              </li>
    <!--================ ended ==============================================================================-->
    <!--================== subjects =========================================================================-->
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i style="opacity: 1.0"><img src="../pic/books-stack.png" style="width: 22px;height: 22px"></i>
                  <p>
                    Subjects Inserted
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#total_subject" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Total Subjects</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#total_used_subject" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Used Subjects</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#unuse_subject" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Unused Subjects</p>
                    </a>
                  </li>
                </ul>
              </li>
  <!---=========== ended ----------------->
  <!--====================notification=========================================-->
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-bell"></i>
                  <p>
                    Notifications
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#total_notification" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Total Notifications</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#active_notification" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Active Notifications</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#expired_notification" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Expired Notifications</p>
                    </a>
                  </li>
                </ul>
              </li>
          <!--=================== ended ===================-->
          <!-- total stored file ============================ -->
              <li class="nav-item has-treeview">
                <a href="#total_store_file" class="nav-link">
                  <i class="fas fa-file-medical"></i>
                  <p>
                    Total File Stored
                  </p>
                </a>
              </li>
          <!-- ended ===================================================-->
          <!-- total upload links ============================ -->
              <li class="nav-item has-treeview">
                <a href="#total_store_links" class="nav-link">
                  <i class="fas fa-link"></i>
                  <p>
                    Total Uploads Link
                  </p>
                </a>
              </li>
          <!-- ended ===================================================-->
              <li class="nav-header">Class Room Records</li>
              <li class="nav-item">
                <a href="#total_attendance_entry" class="nav-link">
                  <i class="nav-icon far fa-calendar-alt"></i>
                  <p>
                    Total Attendence Entry
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#total_quizes" class="nav-link">
                  <i class="" style="opacity: 1.0"><img src="https://img.icons8.com/ios-filled/80/000000/quiz.png" style="width: 22px;height: 22px"></i>
                  <p>
                    Total Quizzes
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#total_presentation" class="nav-link">
                  <i style="opacity: 1.0"><img src="https://img.icons8.com/cotton/80/000000/flipboard.png"  style="width: 22px;height: 22px"></i>
                  <p>
                    Total Presentations
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#total_assignment" class="nav-link">
                  <i style="opacity: 1.0"><img src="https://img.icons8.com/dotty/80/000000/assignment-return.png" style="width: 22px;height: 22px"></i>
                  <p>
                    Total Assignments
                  </p>
                </a>
              </li>


              <li class="nav-item has-treeview" >
                <a href="admin_page.php" class="nav-link text-warning" >
                  <i class="fas fa-sign-out-alt" ></i>
                  <p>
                    Log out
                  </p>
                </a>
              </li>

<!--
              <li class="nav-header">MISCELLANEOUS</li>
              <li class="nav-item">
                <a href="https://adminlte.io/docs/3.0" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Documentation</p>
                </a>
              </li>
              <li class="nav-header">MULTI LEVEL EXAMPLE</li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Level 1</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Level 1
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Level 2</p>
                    </a>
                  </li>
                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Level 2
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-dot-circle nav-icon"></i>
                          <p>Level 3</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-dot-circle nav-icon"></i>
                          <p>Level 3</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-dot-circle nav-icon"></i>
                          <p>Level 3</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Level 2</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Level 1</p>
                </a>
              </li>
              <li class="nav-header">LABELS</li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p class="text">Important</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Warning</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-circle text-info"></i>
                  <p>Informational</p>
                </a>
              </li> -->
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Wellcom to the Admin Panel</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <!-- ./col -->
                <!-- small box -->
                <?php
                $total_teacher=mysqli_num_rows(mysqli_query($con ,"SELECT * FROM `teacher` WHERE 1"));
                $total_student=mysqli_num_rows(mysqli_query($con ,"SELECT * FROM `student` WHERE 1"));
                 ?>
              <!-- ./col -->
              <div class="col-lg-4 col-12">
                <!-- small box -->
                <div class="small-box text-light" style="background-color: #006e63">
                  <div class="inner">
                    <h3><?php echo $total_student; ?></h3>

                    <p>Total Students Registered</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#total_student" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-12">
                <div class="small-box text-light" style="background-color: #00a191">
                  <div class="inner">
                    <h3><?php echo $total_teacher; ?></h3>

                    <p>Teachers Register </p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#total_teacher" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-12">
                <!-- small box -->
                <?php
                $total_admin=mysqli_num_rows(mysqli_query($con ,"SELECT * FROM `admin` WHERE 1"));
                ?>
                <div class="small-box text-light" style="background-color: #77afa9">
                  <div class="inner">
                    <h3><?php echo $total_admin; ?></h3>

                    <p>Admins Register </p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#total_admin" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <!-- ./col -->
            </div>

            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-4 col-12">
                <!-- small box -->
                <?php
                $total_classes=mysqli_num_rows(mysqli_query($con ,"SELECT * FROM `class` WHERE 1"));
                ?>
                <div class="small-box text-light" style="background: #09899e">
                  <div class="inner">
                    <h3><?php echo $total_classes; ?></h3>

                    <p>Total Classes</p>
                  </div>
                  <div class="icon">
                    <i style="opacity: 0.3"><img src="https://img.icons8.com/plasticine/100/000000/classroom.png"></i>
                  </div>
                  <a href="#total_classes" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-12">
                <!-- small box -->
                <?php
                    $total_active_classes=mysqli_num_rows(mysqli_query($con ,"SELECT * FROM `class` WHERE Expire_date>=CURRENT_DATE"));
                 ?>
                <div class="small-box text-light" style="background: #32acc0">
                  <div class="inner">
                    <h3><?php echo $total_active_classes; ?></h3>

                    <p>Active Classes</p>
                  </div>
                  <div class="icon">
                    <i style="opacity: 0.3"><img src="https://img.icons8.com/bubbles/100/000000/classroom.png"></i>
                  </div>
                  <a href="#active_classes" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-12">
                <!-- small box -->
                <?php   $total_expire_classes=mysqli_num_rows(mysqli_query($con ,"SELECT * FROM `class` WHERE Expire_date<CURRENT_DATE")); ?>
                <div class="small-box text-light" style="background: #8cbec6">
                  <div class="inner">
                    <h3><?php echo $total_expire_classes; ?></h3>

                    <p>Expired Classes</p>
                  </div>
                  <div class="icon">
                    <i style="opacity: 0.3"><img src="https://img.icons8.com/dusk/64/000000/expired.png"></i>
                  </div>
                  <a href="#expired_classes" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->

            </div>

            <div class="row">
              <!-- ./col -->
              <div class="col-lg-4 col-12">
                <!-- small box -->
                <?php
                $total_subject=mysqli_num_rows(mysqli_query($con ,"SELECT * FROM `subject` WHERE 1"));
                 ?>
                <div class="small-box text-light" style="background: #448182">
                  <div class="inner">
                    <h3><?php echo $total_subject; ?></h3>
                    <p>Total Inserted Subjects </p>
                  </div>
                  <div class="icon">
                    <i style="opacity: 0.3"><img src="../pic/books-stack.png" style="width: 64px;height: 64px"></i>
                  </div>
                  <a href="#total_subject" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-12">
                <div class="small-box text-light" style="background: #71a0a1">
                  <div class="inner">
                    <h3><?php echo mysqli_num_rows(mysqli_query($con ,"SELECT * FROM subject INNER JOIN have ON subject.Subject_id=have.Subject_id GROUP BY have.Subject_id")); ?></h3>
                    <p>Used Subjects</p>
                  </div>
                  <div class="icon">
                    <i style="opacity: 0.3"><img src="../pic/open-book.png" style="width: 64px;height 64px" /></i>
                  </div>
                  <a href="#total_used_subject" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-12">
                <!-- small box -->
                <?php
                $unsed_subject=mysqli_num_rows(mysqli_query($con ,"SELECT * FROM subject LEFT OUTER JOIN have ON subject.Subject_id=have.Subject_id WHERE have.Subject_id IS NULL"));
                ?>
                <div class="small-box text-light" style="background: #a8c1c1">
                  <div class="inner">
                    <h3><?php echo $unsed_subject; ?></h3>

                    <p> Unused Subjects </p>
                  </div>
                  <div class="icon">
                    <i style="opacity: 0.3"><img src="../pic/book.png" style="width: 64px; height: 64px" /></i>
                  </div>
                  <a href="#unuse_subject" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

            </div>

            <div class="row">
              <!-- ./col -->
              <div class="col-lg-4 col-12">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3><?php echo mysqli_num_rows(mysqli_query($con ,"SELECT * FROM `notification` WHERE 1")); ?></h3>

                    <p>Total Notifications </p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-bell"></i>
                  </div>
                  <a href="#total_notification" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-12">
                <div class="small-box bg-warning" >
                  <div class="inner">
                    <h3><?php echo mysqli_num_rows(mysqli_query($con ,"SELECT * FROM `notification` WHERE expire_date>=CURRENT_DATE"));; ?></h3>

                    <p>Active Notifications </p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-bell"></i>
                  </div>
                  <a href="#active_notification" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-12">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3><?php echo mysqli_num_rows(mysqli_query($con ,"SELECT * FROM `notification` WHERE expire_date<CURRENT_DATE"));; ?></h3>

                    <p> Expired Notifications  </p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-bell-slash"></i>
                  </div>
                  <a href="#expired_notification" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

            </div>

            <div class="row">
              <!-- ./col -->
              <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box text-light" style="background: #4565bf">
                  <div class="inner">
                    <h3><?php echo mysqli_num_rows(mysqli_query($con ,"SELECT * FROM `slide` WHERE 1")); ?></h3>

                    <p>Total Stored Files</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-file-medical"></i>
                  </div>
                  <a href="#total_store_file" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <!-- ./col -->
              <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box text-light" style="background: #7a94df">
                  <div class="inner">
                    <h3><?php echo mysqli_num_rows(mysqli_query($con ,"SELECT * FROM `links` WHERE 1")); ?></h3>

                    <p>Total Uploads Link </p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-link"></i>
                  </div>
                  <a href="#total_store_links" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <?php
                $total_attendence_entry=mysqli_num_rows(mysqli_query($con ,"SELECT * FROM `attendence_record` WHERE 1"));
                ?>
                <div class="small-box " style="background: #d229b0">
                  <div class="inner">
                    <h3><?php echo $total_attendence_entry; ?></h3>

                    <p>Total Attendence Entry</p>
                  </div>
                  <div class="icon">
                    <i style="opacity: 0.3"><img src="https://img.icons8.com/ios/80/000000/attendance-mark.png"></i>
                  </div>
                  <a href="#total_attendance_entry" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <?php
                    $total_quizes=mysqli_num_rows(mysqli_query($con ,"SELECT * FROM `quize` WHERE 1"));
                 ?>
                <div class="small-box " style="background:greenyellow">
                  <div class="inner">
                    <h3><?php echo $total_quizes; ?></h3>

                    <p>Total Quizeses</p>
                  </div>
                  <div class="icon">
                    <i class="" style="opacity: 0.3"><img src="https://img.icons8.com/ios-filled/80/000000/quiz.png"></i>
                  </div>
                  <a href="#total_quizes" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <?php   $total_presentation=mysqli_num_rows(mysqli_query($con ,"SELECT * FROM `presentation` WHERE 1")); ?>
                <div class="small-box " style="background:skyblue">
                  <div class="inner">
                    <h3><?php echo $total_presentation; ?></h3>

                    <p>Total Presentations </p>
                  </div>
                  <div class="icon">
                    <i style="opacity: 0.3"><img src="https://img.icons8.com/cotton/80/000000/flipboard.png"></i>
                  </div>
                  <a href="#total_presentation" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <?php
                $total_assignment=mysqli_num_rows(mysqli_query($con ,"SELECT * FROM `assignment` WHERE 1"));
                 ?>
                <div class="small-box" style="background: #7fb466 ">
                  <div class="inner">
                    <h3><?php echo $total_assignment; ?></h3>

                    <p>Total Assignments</p>
                  </div>
                  <div class="icon">
                    <i style="opacity: 0.3"><img src="https://img.icons8.com/dotty/80/000000/assignment-return.png"></i>
                  </div>
                  <a href="#total_assignment" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            </div>

            <!-- /.col -->
            <?php $exe_std=mysqli_query($con ,"SELECT * FROM `student`");  ?>
            <div class="col-md-12" id="total_student">
              <div class="card card-success">
                <div class="card-header" style="background-color: #006e63">
                  <h3 class="card-title">Total Students Registered    &nbsp;&nbsp;  <?php echo mysqli_num_rows($exe_std); ?> </h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">


                  <table id="example1" class="table table-bordered table-striped table-sm table-responsive-sm">
                    <thead>
                    <tr>
                      <th>S_ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Security Question</th>
                      <th>Answer</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($con)) {
                      if (mysqli_num_rows($exe_std)>0) {
                        while ($row=mysqli_fetch_assoc($exe_std)) {
                          echo "<tr>";
                              echo "<td>".$row['S_id']."</td>";
                              echo "<td>".$row['student_name']."</td>";
                              echo "<td>".$row['Email']."</td>";
                              echo "<td>".$row['password']."</td>";
                              echo "<td>".$row['security_question']."</td>";
                              echo "<td>".$row['question_answer']."</td>";
                              ?>
                              <td>
                                      <a href="my_pages/student_edit.php?sid=<?php echo $row['S_id']; ?>"><button class='btn btn-sm float-left'><i class='fas fa-edit text-primary'></i> </button></a>
                                        <button class='btn btn-sm float-right' onclick="Fn_Delete_student('<?php  echo $row['S_id']; ?>','<?php echo $row['student_name']; ?>')"><i class='fas fa-trash text-danger'></i>
                                        </button>
                                </td>

                              <?php


                          echo "</tr>";
                        }
                        unset($exe_std);

                      }else {?>
                        <tr>
                          <td colspan="7" class="text-center alert alert-warning">Sorry No Students are Register.</td>
                        </tr>
                      <?php }
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
              <!-- /.card -->

              <!-- /.col -->
              <?php $teacher_sql=mysqli_query($con ,"SELECT * FROM `teacher`");  ?>
              <div class="col-md-12" id="total_teacher">
                <div class="card card-success">
                  <div class="card-header" style="background-color: #00a191">
                    <h3 class="card-title">Total Teachers Registered    &nbsp;&nbsp;  <?php echo mysqli_num_rows($teacher_sql); ?> </h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive">
                    The body of the card


                    <table id="example2" class="table  table-bordered table-striped table-sm table-responsive-sm">
                      <thead>
                      <tr>
                        <th>T_ID</th>
                        <th>Name</th>
                        <th>Contact_NO</th>
                        <th>CNIC</th>
                        <th>Institute Name</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Security Question</th>
                        <th>Answer</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      if (isset($con)) {
                        if (mysqli_num_rows($teacher_sql)>0) {
                          while ($row=mysqli_fetch_assoc($teacher_sql)) {
                            echo "<tr>";
                            echo "<td>".$row['T_id']."</td>";
                            echo "<td>".$row['Name']."</td>";
                            echo "<td>".$row['Contact_no']."</td>";
                            echo "<td>".$row['Cnic']."</td>";
                            echo "<td>".$row['Institute_name']."</td>";
                            echo "<td>".$row['Country']."</td>";
                            echo "<td>".$row['City']."</td>";
                            echo "<td>".$row['Email']."</td>";
                            echo "<td>".$row['Password']."</td>";
                            echo "<td>".$row['security_question']."</td>";
                            echo "<td>".$row['question_answer']."</td>";
                            ?>
                            <td>
                              <a href="my_pages/teacher_edit.php?id=<?php echo $row['T_id']; ?>"><button class='btn btn-sm float-left'><i class='fas fa-edit text-primary'></i> </button></a>
                                    <a href="my_pages/teacher_view.php?id=<?php echo $row['T_id']; ?>"><button class='btn btn-sm float-left'><i class="fas fa-eye"></i> </button></a>
                                      <!-- <button class='btn btn-sm float-right'><i class='fas fa-trash text-danger'></i> -->

                                      <!-- </button> -->
                              </td>

                            <?php

                            echo "</tr>";
                          }


                        }else {?>
                          <tr>
                            <td colspan="12" class="text-center alert alert-warning">Sorry No Teacher are Register.</td>
                          </tr>
                        <?php }
                      }
                      ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
                <!-- /.card -->

                <!-- /.col -->
                <?php $exe_admin=mysqli_query($con ,"SELECT * FROM `admin`");  ?>
                <div class="col-md-12" id="total_admin">
                  <div class="card card-success">
                    <div class="card-header" style="background-color: #77afa9">
                      <h3 class="card-title">Total Admin Registered    &nbsp;&nbsp;  <?php echo mysqli_num_rows($exe_admin); ?> </h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                      <table id="example" class="table  table-sm table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Admin_ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th >Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($con)) {
                          if (mysqli_num_rows($exe_admin)>0) {
                            while ($row=mysqli_fetch_assoc($exe_admin)) {
                              echo "<tr>";
                              echo "<td>".$row['id']."</td>";
                              echo "<td>".$row['name']."</td>";
                              echo "<td>".$row['Email']."</td>";
                              ?>  <td> <input type="password"  value="<?php echo $row['password']; ?>" style="border:none;background:none">  </td>
                              <td>
                                      <a href="my_pages/admin_edit.php?id=<?php echo $row['id']; ?>"><button class='btn btn-sm float-left'><i class='fas fa-edit text-primary'></i> </button></a>
                                        </button>
                                </td>
                                <?php
                              echo "</tr>";
                            }
                            unset($exe_std);

                          }else {?>
                            <tr>
                              <td colspan="6" class="text-center alert alert-warning">Sorry No Admin are Register.</td>
                            </tr>
                          <?php }
                        }
                        ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
                  <!-- /.card -->

                  <!-- /.col -->
                  <?php $exe_classes=mysqli_query($con ,"SELECT class.Class_id,class.Name,class.Enrollment_key,class.Class_session,class.Start_date,class.currenttime,class.Expire_date,teacher.Name,teacher.T_id FROM class INNER JOIN teacher ON class.T_id=teacher.T_id");  ?>
                  <div class="col-md-12" id="total_classes">
                    <div class="card card-success">
                      <div class="card-header" style="background: #09899e">
                        <h3 class="card-title">Total Classes    &nbsp;&nbsp;  <?php echo mysqli_num_rows($exe_classes); ?> </h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                        <!-- /.card-tools -->
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body table-responsive">
                        <table id="example4" class="table table-bordered table-striped table-sm">
                          <thead>
                          <tr>
                            <th>Class ID</th>
                            <th>Name</th>
                            <th>Enrollment Key</th>
                            <th>Session</th>
                            <th>Start Date</th>
                            <th>Time</th>
                            <th>Expire Date</th>
                            <th>Created By</th>
                            <th>T_ID</th>
                            <th>Action</th>

                          </tr>
                          </thead>
                          <tbody>
                          <?php
                          if (isset($con)) {
                            if (mysqli_num_rows($exe_classes)>0) {
                              while ($row=mysqli_fetch_array($exe_classes)) {
                                echo "<tr>";
                                echo "<td>".$row[0]."</td>";
                                echo "<td>".$row[1]."</td>";
                                echo "<td>".$row[2]."</td>";
                                echo "<td>".$row[3]."</td>";
                                echo "<td>".$row[4]."</td>";
                                echo "<td>".$row[5]."</td>";
                                echo "<td>".$row[6]."</td>";
                                echo "<td>".$row[7]."</td>";
                                echo "<td>".$row[8]."</td>";
                                ?>
                                <td>
                                  <a href="my_pages/teacher_view.php?id=<?php echo $row[8]; ?>"><button class='btn btn-sm float-left'><i class="fas fa-eye text-primary"></i> </button>
                                  </a>
                                </td>
                                <?php

                                echo "</tr>";
                              }
                              unset($exe_std);

                            }else {?>
                              <tr>
                                <td colspan="10" class="text-center alert alert-warning">Sorry No Admin are Register.</td>
                              </tr>
                            <?php }
                          }
                          ?>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                  </div>
                    <!-- /.card -->

                    <!-- /.col -->
                    <?php $exe_active_classes=mysqli_query($con ,"SELECT class.Class_id,class.Name,class.Enrollment_key,class.Class_session,class.Start_date,class.currenttime,class.Expire_date,teacher.T_id,teacher.Name FROM class INNER JOIN teacher ON class.T_id=teacher.T_id AND class.Expire_date>=CURRENT_DATE");  ?>
                    <div class="col-md-12" id="active_classes">
                      <div class="card card-success">
                        <div class="card-header" style="background: #32acc0">
                          <h3 class="card-title">Total Active Classes    &nbsp;&nbsp;  <?php echo mysqli_num_rows($exe_active_classes); ?> </h3>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                          </div>
                          <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                          <table id="example5" class="table table-bordered table-striped table-sm">
                            <thead>
                            <tr>
                              <th>Class ID</th>
                              <th>Name</th>
                              <th>Enrollment Key</th>
                              <th>Session</th>
                              <th>Start Date</th>
                              <th>Time</th>
                              <th>Expire Date</th>
                              <th>Created By</th>
                              <th>T_ID</th>
                              <!-- <th>Drop</th> -->

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($con)) {
                              if (mysqli_num_rows($exe_active_classes)>0) {
                                while ($row=mysqli_fetch_array($exe_active_classes)) {
                                  echo "<tr>";
                                  echo "<td>".$row[0]."</td>";
                                  echo "<td>".$row[1]."</td>";
                                  echo "<td>".$row[2]."</td>";
                                  echo "<td>".$row[3]."</td>";
                                  echo "<td>".$row[4]."</td>";
                                  echo "<td>".$row[5]."</td>";
                                  echo "<td>".$row[6]."</td>";
                                  echo "<td>".$row[8]."</td>";
                                  echo "<td>".$row[7]."</td>";
                                  // echo "<td><button class='btn btn-sm'><i class='fas fa-trash text-danger'></i></button></td>";


                                  echo "</tr>";
                                }
                                unset($exe_std);

                              }else {?>
                                <tr>
                                  <td colspan="9" class="text-center alert alert-warning">Sorry No Records.</td>
                                </tr>
                              <?php }
                            }
                            ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                    </div>
                      <!-- /.card -->

                      <!-- /.col -->
                      <?php $exe_expired_classes=mysqli_query($con ,"SELECT class.Class_id,class.Name,class.Enrollment_key,class.Class_session,class.Start_date,class.currenttime,class.Expire_date,teacher.T_id,teacher.Name FROM class INNER JOIN teacher ON class.T_id=teacher.T_id AND class.Expire_date<CURRENT_DATE");  ?>
                      <div class="col-md-12" id="expired_classes">
                        <div class="card card-success">
                          <div class="card-header" style="background: #8cbec6">
                            <h3 class="card-title">Total Expred Classes    &nbsp;&nbsp;  <?php echo mysqli_num_rows($exe_expired_classes); ?> </h3>

                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                            <!-- /.card-tools -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body table-responsive">
                            <table id="example6" class="table table-bordered table-striped table-sm">
                              <thead>
                              <tr>
                                <th>Class ID</th>
                                <th>Name</th>
                                <th>Enrollment Key</th>
                                <th>Session</th>
                                <th>Start Date</th>
                                <th>Time</th>
                                <th>Expire Date</th>
                                <th>Created By</th>
                                <th>T_ID</th>
                                <!-- <th>Drop</th> -->

                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              if (isset($con)) {
                                if (mysqli_num_rows($exe_expired_classes)>0) {
                                  while ($row=mysqli_fetch_array($exe_expired_classes)) {
                                    echo "<tr>";
                                    echo "<td>".$row[0]."</td>";
                                    echo "<td>".$row[1]."</td>";
                                    echo "<td>".$row[2]."</td>";
                                    echo "<td>".$row[3]."</td>";
                                    echo "<td>".$row[4]."</td>";
                                    echo "<td>".$row[5]."</td>";
                                    echo "<td>".$row[6]."</td>";
                                    echo "<td>".$row[8]."</td>";
                                    echo "<td>".$row[7]."</td>";
                                    // echo "<td><button class='btn btn-sm'><i class='fas fa-trash text-danger'></i></button></td>";


                                    echo "</tr>";
                                  }
                                  unset($exe_std);

                                }else {?>
                                  <tr>
                                    <td colspan="9" class="text-center alert alert-warning">Sorry No Records.</td>
                                  </tr>
                                <?php }
                              }
                              ?>
                              </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>
                      </div>
                        <!-- /.card -->

                        <!-- /.col -->
                        <?php $inserted_subject=mysqli_query($con ,"SELECT * FROM `subject`");  ?>
                        <div class="col-md-12" id="total_subject">
                          <div class="card card-success">
                            <div class="card-header" style="background: #448182">
                              <h3 class="card-title">Total Inserted Subjects    &nbsp;&nbsp;  <?php echo mysqli_num_rows($inserted_subject); ?> </h3>

                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                              </div>
                              <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                              <table id="example7" class="table table-bordered table-striped table-sm">
                                <thead>
                                <tr>
                                  <th>Subject ID</th>
                                  <th>Name</th>
                                  <!-- <th>Drop</th> -->

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($con)) {
                                  if (mysqli_num_rows($inserted_subject)>0) {
                                    while ($row=mysqli_fetch_array($inserted_subject)) {
                                      echo "<tr>";
                                      echo "<td>".$row[0]."</td>";
                                      echo "<td>".$row[1]."</td>";
                                      // echo "<td><button class='btn btn-sm'><i class='fas fa-trash text-danger'></i></button></td>";

                                      echo "</tr>";
                                    }
                                    unset($exe_std);

                                  }else {?>
                                    <tr>
                                      <td colspan="2" class="text-center alert alert-warning">Sorry No Records.</td>
                                    </tr>
                                  <?php }
                                }
                                ?>
                                </tbody>
                              </table>
                            </div>
                            <!-- /.card-body -->
                          </div>
                        </div>
                          <!-- /.card -->

                          <!-- /.col -->
                          <?php
                          $sql_for_total_inserted_used_subject="
                          SELECT subject.Subject_id,subject.subject_name,class.Name,have.Class_id,class.Expire_date,teacher.Name,teacher.T_id FROM have
                          INNER JOIN subject ON have.Subject_id=subject.Subject_id
                          INNER JOIN class ON have.Class_id=class.Class_id
                          INNER JOIN teacher ON class.T_id=teacher.T_id
                          GROUP BY have.Class_id
                          ";
                          $use_subject=mysqli_query($con ,$sql_for_total_inserted_used_subject);

                          ?>
                          <div class="col-md-12" id="total_used_subject">
                            <div class="card card-success">
                              <div class="card-header" style="background: #71a0a1">
                                <h3 class="card-title">Total Inserted Used Subject   &nbsp;&nbsp;  <?php echo mysqli_num_rows($use_subject); ?> </h3>

                                <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                                <!-- /.card-tools -->
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body table-responsive">
                                <table id="example8" class="table table-bordered table-striped table-sm">
                                  <thead>
                                  <tr>
                                    <th>Subject ID</th>
                                    <th>Subject Name</th>
                                    <th>Used In Class</th>
                                    <th>Class ID</th>
                                    <th>Class Expire Date</th>
                                    <th>Class Created BY</th>
                                    <th>T_ID</th>
                                    <!-- <th>Drop</th> -->

                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                  if (isset($con)) {
                                    if (mysqli_num_rows($use_subject)>0) {
                                      while ($row=mysqli_fetch_array($use_subject)) {
                                        echo "<tr>";
                                        echo "<td>".$row[0]."</td>";
                                        echo "<td>".$row[1]."</td>";
                                        echo "<td>".$row[2]."</td>";
                                        echo "<td>".$row[3]."</td>";
                                        echo "<td>".$row[4]."</td>";
                                        echo "<td>".$row[5]."</td>";
                                        echo "<td>".$row[6]."</td>";
                                        // echo "<td><button class='btn btn-sm'><i class='fas fa-trash text-danger'></i></button></td>";

                                        echo "</tr>";
                                      }
                                      unset($exe_std);

                                    }else {?>
                                      <tr>
                                        <td colspan="7" class="text-center alert alert-warning">Sorry No Records.</td>
                                      </tr>
                                    <?php }
                                  }
                                  ?>
                                  </tbody>
                                </table>
                              </div>
                              <!-- /.card-body -->
                            </div>
                          </div>
                            <!-- /.card -->

                            <!-- /.col -->
                            <div class="col-md-12" id="unuse_subject" >
                              <div class="card card-success">
                                <?php
                                $sql_for_total_inserted_unused_subject="
                                SELECT subject.Subject_id,subject.subject_name FROM subject LEFT OUTER JOIN have ON subject.Subject_id=have.Subject_id WHERE have.Subject_id IS NULL
                                ";
                                $unused_subject=mysqli_query($con ,$sql_for_total_inserted_unused_subject);

                                ?>
                                <div class="card-header" style="background: #a8c1c1">
                                  <h3 class="card-title">Total Inserted Unused Subject   &nbsp;&nbsp;  <?php echo mysqli_num_rows($unused_subject); ?> </h3>

                                  <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                  </div>
                                  <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive" >
                                  <table id="example9" class="table table-bordered table-striped table-sm">
                                    <thead>
                                    <tr>
                                      <th>Subject ID</th>
                                      <th>Subject Name</th>
                                      <th>Delete</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (isset($con)) {
                                      if (mysqli_num_rows($unused_subject)>0) {
                                        while ($row=mysqli_fetch_array($unused_subject)) {
                                          echo "<tr>";
                                          echo "<td>".$row[0]."</td>";
                                          echo "<td>".$row[1]."</td>";
                                          ?><td><button class='btn btn-sm' onclick="Fn_Delete_subject('<?php echo $row[0]; ?>','<?php echo $row[1]; ?>')"><i class='fas fa-trash text-danger'></i></button></td><?php

                                          echo "</tr>";
                                        }
                                        unset($exe_std);

                                      }else {?>
                                        <tr>
                                          <td colspan="6" class="text-center alert alert-warning">Sorry No Records.</td>
                                        </tr>
                                      <?php }
                                    }
                                    ?>
                                    </tbody>
                                  </table>
                                </div>
                                <!-- /.card-body -->
                              </div>
                            </div>
                              <!-- /.card -->

                              <!-- /.col -->
                              <?php
                              $total_notification="
                              SELECT notification.id,notification.title,notification.msg,notification.cdate,notification.expire_date,class.Name,class.Class_id,subject.subject_name,subject.Subject_id,teacher.Name,teacher.T_id FROM have
                              INNER JOIN notification ON have.Class_id=notification.Class_id
                              INNER JOIN class ON have.Class_id=class.Class_id
                              INNER JOIN subject ON have.Subject_id=subject.Subject_id INNER JOIN teacher ON class.T_id=teacher.T_id
                              GROUP BY notification.id
                              ";
                              $total_notification_exe=mysqli_query($con ,$total_notification);

                              ?>
                              <div class="col-md-12" id="total_notification">
                                <div class="card card-success">
                                  <div class="card-header bg-warning">
                                    <h3 class="card-title">Total Notifications   &nbsp;&nbsp;  <?php echo mysqli_num_rows($total_notification_exe); ?> </h3>

                                    <div class="card-tools">
                                      <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                  </div>
                                  <!-- /.card-header -->
                                  <div class="card-body table-responsive">
                                    <table id="example10" class="table table-bordered table-striped table-sm">
                                      <thead>
                                      <tr>
                                        <th>Notification ID</th>
                                        <th>Title </th>
                                        <th>Message</th>
                                        <th>Created Date</th>
                                        <th>Expire Date</th>
                                        <th>Created In Class</th>
                                        <th>Class ID</th>
                                        <th>Created for Subject</th>
                                        <th>Subject ID</th>
                                        <th>Created BY Teacher</th>
                                        <th>T_ID</th>
                                        <!-- <th>Drop</th> -->

                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                      if (isset($con)) {
                                        if (mysqli_num_rows($total_notification_exe)>0) {
                                          while ($row=mysqli_fetch_array($total_notification_exe)) {
                                            echo "<tr>";
                                            echo "<td>".$row[0]."</td>";
                                            echo "<td>".$row[1]."</td>";
                                            echo "<td>".$row[2]."</td>";
                                            echo "<td>".$row[3]."</td>";
                                            echo "<td>".$row[4]."</td>";
                                            echo "<td>".$row[5]."</td>";
                                            echo "<td>".$row[6]."</td>";
                                            echo "<td>".$row[7]."</td>";
                                            echo "<td>".$row[8]."</td>";
                                            echo "<td>".$row[9]."</td>";
                                            echo "<td>".$row[10]."</td>";
                                            // echo "<td><button class='btn btn-sm'><i class='fas fa-trash text-danger'></i></button></td>";

                                            echo "</tr>";
                                          }
                                          unset($exe_std);

                                        }else {?>
                                          <tr>
                                            <td colspan="11" class="text-center alert alert-warning">Sorry No Records.</td>
                                          </tr>
                                        <?php }
                                      }
                                      ?>
                                      </tbody>
                                    </table>
                                  </div>
                                  <!-- /.card-body -->
                                </div>
                              </div>
                                <!-- /.card -->

                                <!-- /.col -->
                                <?php
                                $total_active_notification="
                                SELECT notification.id,notification.title,notification.msg,notification.cdate,notification.expire_date,class.Name,class.Class_id,subject.subject_name,subject.Subject_id,teacher.Name,teacher.T_id FROM have
                                INNER JOIN notification ON have.Class_id=notification.Class_id
                                INNER JOIN class ON have.Class_id=class.Class_id
                                INNER JOIN subject ON have.Subject_id=subject.Subject_id INNER JOIN teacher ON class.T_id=teacher.T_id
                                AND notification.expire_date>CURRENT_DATE
                                GROUP BY notification.id
                                ";
                                $total_active_notification_exe=mysqli_query($con ,$total_active_notification);

                                ?>
                                <div class="col-md-12" id="active_notification">
                                  <div class="card card-success">
                                    <div class="card-header bg-warning">
                                      <h3 class="card-title">Total Active  Notifications   &nbsp;&nbsp;  <?php echo mysqli_num_rows($total_active_notification_exe); ?> </h3>

                                      <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                      </div>
                                      <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive">
                                      <table id="example11" class="table table-bordered table-striped table-sm">
                                        <thead>
                                        <tr>
                                          <th>Notification ID</th>
                                          <th>Title </th>
                                          <th>Message</th>
                                          <th>Created Date</th>
                                          <th>Expire Date</th>
                                          <th>Created In Class</th>
                                          <th>Class ID</th>
                                          <th>Created for Subject</th>
                                          <th>Subject ID</th>
                                          <th>Created BY Teacher</th>
                                          <th>T_ID</th>
                                          <!-- <th>Drop</th> -->

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if (isset($con)) {
                                          if (mysqli_num_rows($total_active_notification_exe)>0) {
                                            while ($row=mysqli_fetch_array($total_active_notification_exe)) {
                                              echo "<tr>";
                                              echo "<td>".$row[0]."</td>";
                                              echo "<td>".$row[1]."</td>";
                                              echo "<td>".$row[2]."</td>";
                                              echo "<td>".$row[3]."</td>";
                                              echo "<td>".$row[4]."</td>";
                                              echo "<td>".$row[5]."</td>";
                                              echo "<td>".$row[6]."</td>";
                                              echo "<td>".$row[7]."</td>";
                                              echo "<td>".$row[8]."</td>";
                                              echo "<td>".$row[9]."</td>";
                                              echo "<td>".$row[10]."</td>";
                                              // echo "<td><button class='btn btn-sm'><i class='fas fa-trash text-danger'></i></button></td>";

                                              echo "</tr>";
                                            }
                                            unset($exe_std);

                                          }else {?>
                                            <tr>
                                              <td colspan="11" class="text-center alert alert-warning">Sorry No Active Notifications.</td>
                                            </tr>
                                          <?php }
                                        }
                                        ?>
                                        </tbody>
                                      </table>
                                    </div>
                                    <!-- /.card-body -->
                                  </div>
                                </div>
                                  <!-- /.card -->


                                  <!-- /.col -->
                                  <?php
                                  $total_expires_notification="
                                  SELECT notification.id,notification.title,notification.msg,notification.cdate,notification.expire_date,class.Name,class.Class_id,subject.subject_name,subject.Subject_id,teacher.Name,teacher.T_id FROM have
                                  INNER JOIN notification ON have.Class_id=notification.Class_id
                                  INNER JOIN class ON have.Class_id=class.Class_id
                                  INNER JOIN subject ON have.Subject_id=subject.Subject_id INNER JOIN teacher ON class.T_id=teacher.T_id
                                  AND notification.expire_date<=CURRENT_DATE
                                  GROUP BY notification.id
                                  ";
                                  $total_expired_notification_exe=mysqli_query($con ,$total_expires_notification);

                                  ?>
                                  <div class="col-md-12" id="expired_notification">
                                    <div class="card card-success">
                                      <div class="card-header bg-warning">
                                        <h3 class="card-title">Total Expired Notifications   &nbsp;&nbsp;  <?php echo mysqli_num_rows($total_expired_notification_exe); ?> </h3>

                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                        </div>
                                        <!-- /.card-tools -->
                                      </div>
                                      <!-- /.card-header -->
                                      <div class="card-body table-responsive">
                                        <table id="example12" class="table table-bordered table-striped table-sm">
                                          <thead>
                                          <tr>
                                            <th>Notification ID</th>
                                            <th>Title </th>
                                            <th>Message</th>
                                            <th>Created Date</th>
                                            <th>Expire Date</th>
                                            <th>Created In Class</th>
                                            <th>Class ID</th>
                                            <th>Created for Subject</th>
                                            <th>Subject ID</th>
                                            <th>Created BY Teacher</th>
                                            <th>T_ID</th>
                                            <!-- <th>Drop</th> -->

                                          </tr>
                                          </thead>
                                          <tbody>
                                          <?php
                                          if (isset($con)) {
                                            if (mysqli_num_rows($total_expired_notification_exe)>0) {
                                              while ($row=mysqli_fetch_array($total_expired_notification_exe)) {
                                                echo "<tr>";
                                                echo "<td>".$row[0]."</td>";
                                                echo "<td>".$row[1]."</td>";
                                                echo "<td>".$row[2]."</td>";
                                                echo "<td>".$row[3]."</td>";
                                                echo "<td>".$row[4]."</td>";
                                                echo "<td>".$row[5]."</td>";
                                                echo "<td>".$row[6]."</td>";
                                                echo "<td>".$row[7]."</td>";
                                                echo "<td>".$row[8]."</td>";
                                                echo "<td>".$row[9]."</td>";
                                                echo "<td>".$row[10]."</td>";
                                                // echo "<td><button class='btn btn-sm'><i class='fas fa-trash text-danger'></i></button></td>";

                                                echo "</tr>";
                                              }
                                              unset($exe_std);

                                            }else {?>
                                              <tr>
                                                <td colspan="11" class="text-center alert alert-warning">Sorry No Records.</td>
                                              </tr>
                                            <?php }
                                          }
                                          ?>
                                          </tbody>
                                        </table>
                                      </div>
                                      <!-- /.card-body -->
                                    </div>
                                  </div>
                                    <!-- /.card -->


                                    <div class="col-md-12" id="total_store_file">
                                      <div class="card card-success">
                                        <div class="card-header " style="background: #4565bf">
                                          <?php
                                            $total_store_file=mysqli_query($con ,"
                                            SELECT slide.id,slide.topic,slide.c_date,slide.file,class.Name,slide.Class_id,teacher.Name,teacher.T_id FROM slide
                                              INNER JOIN class ON slide.Class_id=class.Class_id
                                              INNER JOIN teacher ON class.T_id=teacher.T_id");

                                           ?>
                                          <h3 class="card-title">Total Stored File   &nbsp;&nbsp;  <?php echo mysqli_num_rows($total_store_file); ?> </h3>

                                          <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                          </div>
                                          <!-- /.card-tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive">
                                          <table id="example13" class="table table-straped table-hover table-bordered table-sm">
                                                <thead id="bb">
                                                    <tr>
                                                      <th>ID</th>
                                                      <th>Description</th>
                                                      <th>Date</th>
                                                      <th>Download File</th>
                                                      <th>Upload In</th>
                                                      <th>Class ID</th>
                                                      <th>Upload By</th>
                                                      <th>T_ID</th>
                                                      <!-- <th>Delete</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody style="background: #ECF4F6">
                                                  <?php
                                                              if (mysqli_num_rows($total_store_file)>0) {
                                                                while($row=mysqli_fetch_array($total_store_file))
                                                                {
                                                                  echo '<tr>';
                                                                  echo '<td>' . $row[0].'</td>';
                                                                  echo '<td>' . $row[1].'</td>';
                                                                  echo '<td>' .$row[2].'</td>';
                                                                  echo "<td><a title='Click here to download in file.' href='../teacher_table/slide_download.php?id={$row[3]}'>{$row[3]} </a></td>";
                                                                  echo '<td>' .$row[4].'</td>';
                                                                  echo '<td>' .$row[5].'</td>';
                                                                  echo '<td>' .$row[6].'</td>';
                                                                  echo '<td>' .$row[7].'</td>';

                                                                  // echo '<td>' . $row['Class_id'].'</td>';
                                                                 ?>
                                                                 <!-- <td> -->
                                                                <!-- <a href="slide_deleteById.php?id=<?php //echo $row['id'] ?>&imageurl=<?php //echo $row['file'] ?>&tid=<?php// echo $id; ?>" id="dd">
                                                                <button class="btn btn-danger" title="Click here to erase file."> Delete </button>
                                                                </a> -->
                                                                <!-- </td> -->
                                                                <?php
                                                                echo '</tr>';

                                                                }
                                                              }else { ?>
                                                                  <tr>
                                                                      <td colspan="8" class="text-center alert alert-warning">No Slides or Cource Topics are Uploaded.</td>
                                                                  </tr>
                                                              <?php  }


                                                        ?>

                                                </tbody>
                                          </table>
                                        </div>
                                        <!-- /.card-body -->
                                      </div>
                                    </div>
                                      <!-- /.card -->

                                      <div class="col-md-12" id="total_store_links">
                                        <div class="card card-success">
                                          <div class="card-header " style="background: #7a94df">
                                            <?php
                                              $total_store_links=mysqli_query($con ,"
                                              SELECT links.L_id,links.link,links.description,links.ldate,class.Name,links.Class_id,teacher.Name,teacher.T_id FROM `links`
                                              INNER JOIN class ON links.Class_id=class.Class_id
                                              INNER JOIN teacher ON class.T_id=teacher.T_id
                                              ");

                                             ?>
                                            <h3 class="card-title">Total Stored Links   &nbsp;&nbsp;  <?php echo mysqli_num_rows($total_store_links); ?> </h3>

                                            <div class="card-tools">
                                              <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                            </div>
                                            <!-- /.card-tools -->
                                          </div>
                                          <!-- /.card-header -->
                                          <div class="card-body table-responsive">
                                            <table id="example14" class="table table-straped table-hover table-bordered table-sm">
                                                  <thead>
                                                      <tr>
                                                        <th>ID</th>
                                                        <th>Description</th>
                                                        <th>Date</th>
                                                        <th>Download File</th>
                                                        <th>Upload In</th>
                                                        <th>Class ID</th>
                                                        <th>Upload By</th>
                                                        <th>T_ID</th>
                                                        <!-- <th>Delete</th> -->
                                                      </tr>
                                                  </thead>
                                                  <tbody style="background: #ECF4F6">
                                                    <?php
                                                    if (mysqli_num_rows($total_store_links)>0) {

                                                      while ($row_link=mysqli_fetch_array($total_store_links)) {
                                                        echo "<tr>";
                                                        echo "<td>".$row_link[0]."</td>";
                                                        echo "<td>".$row_link[2]."</td>";
                                                        echo "<td>".$row_link[3]."</td>";
                                                        echo "<td><a href='".$row_link[1]."'> click me to view  </a></td>";
                                                        echo "<td>".$row_link[4]."</td>";
                                                        echo "<td>".$row_link[5]."</td>";
                                                        echo "<td>".$row_link[6]."</td>";
                                                        echo "<td>".$row_link[7]."</td>";

                                                        ?>
                                                        <!-- <td>
                                                          <a href="delete_link_code.php?id=<?php// echo $row_link['L_id']; ?>" id="dd">
                                                            <button class="btn btn-danger" title="Click here to erase file."> Delete </button> </a>
                                                          </td> -->
                                                          <?php
                                                          echo "</tr>";
                                                        }
                                                    }else { ?>
                                                        <tr>
                                                            <td colspan="8" class="text-center alert alert-warning">No Links are Uploaded for Class Slides or Cource topic.</td>
                                                        </tr>
                                                    <?php   }


                                                          ?>

                                                  </tbody>
                                            </table>
                                          </div>
                                          <!-- /.card-body -->
                                        </div>
                                      </div>
                                        <!-- /.card -->




                                        <!-- /.col -->
                                        <?php
                                        $total_attendance_entry="
                                        SELECT attendence_record.AT_date,attendence.status,attendence_record.Class_id,student.student_name,attendence_record.S_id
                                        FROM attendence_record
                                        INNER JOIN attendence ON attendence_record.AT_id=attendence.AT_id
                                        INNER JOIN student ON attendence_record.S_id=student.S_id
                                        ";
                                        $total_attendance_entry_exe=mysqli_query($con ,$total_attendance_entry);

                                        ?>
                                        <div class="col-md-12" id="total_attendance_entry">
                                          <div class="card card-success">
                                            <div class="card-header "  style="background: #d229b0">
                                              <h3 class="card-title">Total Attendance Entry   &nbsp;&nbsp;  <?php echo mysqli_num_rows($total_attendance_entry_exe); ?> </h3>

                                              <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                              </div>
                                              <!-- /.card-tools -->
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body table-responsive">
                                              <table id="testing1" class="table table-bordered table-striped table-sm">
                                                <thead>
                                                <tr>
                                                  <th>Attendance Date</th>
                                                  <th>Status </th>
                                                  <th>Of Class</th>
                                                  <th>Student Name</th>
                                                  <th>S_ID</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                if (isset($con)) {
                                                  if (mysqli_num_rows($total_attendance_entry_exe)>0) {
                                                    while ($row=mysqli_fetch_array($total_attendance_entry_exe)) {
                                                      echo "<tr>";
                                                      echo "<td>".$row[0]."</td>";
                                                      echo "<td>".$row[1]."</td>";
                                                      echo "<td>".$row[2]."</td>";
                                                      echo "<td>".$row[3]."</td>";
                                                      echo "<td>".$row[4]."</td>";

                                                      // echo "<td><button class='btn btn-sm'><i class='fas fa-trash text-danger'></i></button></td>";

                                                      echo "</tr>";
                                                    }
                                                    unset($exe_std);

                                                  }else {?>
                                                    <tr>
                                                      <td colspan="5" class="text-center alert alert-warning">Sorry No Records.</td>
                                                    </tr>
                                                  <?php }
                                                }
                                                ?>
                                                </tbody>
                                              </table>
                                            </div>
                                            <!-- /.card-body -->
                                          </div>
                                        </div>
                                          <!-- /.card -->

                                          <!-- /.col -->
                                          <?php
                                          $total_quize_attend="
                                          SELECT quize.Q_id,quize.q_topic,quize.q_date,quize.qt_marks,quiz_record.Class_id FROM quiz_record INNER JOIN quize ON quize.Q_id=quiz_record.Q_id GROUP by quize.Q_id


                                          ";
                                          $total_quize_attend_exe=mysqli_query($con ,$total_quize_attend);

                                          ?>
                                          <div class="col-md-12" id="total_quizes">
                                            <div class="card card-success">
                                              <div class="card-header "  style="background:greenyellow">
                                                <h3 class="card-title">Total Quizzes Attends   &nbsp;&nbsp;  <?php echo mysqli_num_rows($total_quize_attend_exe); ?> </h3>

                                                <div class="card-tools">
                                                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body table-responsive">
                                                <table id="testing2" class="table table-bordered table-striped table-sm">
                                                  <thead>
                                                  <tr>
                                                    <th>Q_ID</th>
                                                    <th>Topic </th>
                                                    <th>Date </th>
                                                    <th>Total Marks</th>
                                                    <th>Of Class</th>
                                                  </tr>
                                                  </thead>
                                                  <tbody>
                                                  <?php
                                                  if (isset($con)) {
                                                    if (mysqli_num_rows($total_quize_attend_exe)>0) {
                                                      while ($row=mysqli_fetch_array($total_quize_attend_exe)) {
                                                        echo "<tr>";
                                                        echo "<td>".$row[0]."</td>";
                                                        echo "<td>".$row[1]."</td>";
                                                        echo "<td>".$row[2]."</td>";
                                                        echo "<td>".$row[3]."</td>";
                                                        echo "<td>".$row[4]."</td>";


                                                        // echo "<td><button class='btn btn-sm'><i class='fas fa-trash text-danger'></i></button></td>";

                                                        echo "</tr>";
                                                      }
                                                      unset($exe_std);

                                                    }else {?>
                                                      <tr>
                                                        <td colspan="5" class="text-center alert alert-warning">Sorry No Records.</td>
                                                      </tr>
                                                    <?php }
                                                  }
                                                  ?>
                                                  </tbody>
                                                </table>
                                              </div>
                                              <!-- /.card-body -->
                                            </div>
                                          </div>
                                            <!-- /.card -->


                                            <!-- /.col -->
                                            <?php
                                            $total_presentation_attend="
                                            SELECT presentation.P_id,presentation.p_topic,presentation.p_date,presentation.pt_marks,presentation_record.Class_id FROM presentation_record INNER JOIN presentation ON presentation.P_id=presentation_record.P_id GROUP BY presentation.P_id

                                            ";
                                            $total_presentation_attend_exe=mysqli_query($con ,$total_presentation_attend);

                                            ?>
                                            <div class="col-md-12" id="total_presentation">
                                              <div class="card card-success">
                                                <div class="card-header "  style="background:skyblue">
                                                  <h3 class="card-title">Total Presentation Attends   &nbsp;&nbsp;  <?php echo mysqli_num_rows($total_presentation_attend_exe); ?> </h3>

                                                  <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                                  </div>
                                                  <!-- /.card-tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body table-responsive">
                                                  <table id="testing3" class="table table-bordered table-striped table-sm">
                                                    <thead>
                                                    <tr>
                                                      <th>P_ID</th>
                                                      <th>Topic </th>
                                                      <th>Date </th>
                                                      <th>Total Marks</th>
                                                      <th>Of Class</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    if (isset($con)) {
                                                      if (mysqli_num_rows($total_presentation_attend_exe)>0) {
                                                        while ($row=mysqli_fetch_array($total_presentation_attend_exe)) {
                                                          echo "<tr>";
                                                          echo "<td>".$row[0]."</td>";
                                                          echo "<td>".$row[1]."</td>";
                                                          echo "<td>".$row[2]."</td>";
                                                          echo "<td>".$row[3]."</td>";
                                                          echo "<td>".$row[4]."</td>";


                                                          // echo "<td><button class='btn btn-sm'><i class='fas fa-trash text-danger'></i></button></td>";

                                                          echo "</tr>";
                                                        }
                                                        unset($exe_std);

                                                      }else {?>
                                                        <tr>
                                                          <td colspan="5" class="text-center alert alert-warning">Sorry No Records.</td>
                                                        </tr>
                                                      <?php }
                                                    }
                                                    ?>
                                                    </tbody>
                                                  </table>
                                                </div>
                                                <!-- /.card-body -->
                                              </div>
                                            </div>
                                              <!-- /.card -->

                                              <!-- /.col -->
                                              <?php
                                              $total_assignment_attend="
                                              SELECT assignment.A_id,assignment.a_name,assignment.a_date,assignment.at_marks,assignment_record.Class_id FROM assignment_record
                                              INNER JOIN assignment ON assignment_record.A_id=assignment.A_id
                                              GROUP BY assignment_record.A_id
                                              ";
                                              $total_assignment_attend_exe=mysqli_query($con ,$total_assignment_attend);

                                              ?>
                                              <div class="col-md-12" id="total_assignment">
                                                <div class="card card-success">
                                                  <div class="card-header "  style="background: #7fb466 ">
                                                    <h3 class="card-title">Total Assignment Attends   &nbsp;&nbsp;  <?php echo mysqli_num_rows($total_assignment_attend_exe); ?> </h3>

                                                    <div class="card-tools">
                                                      <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                  </div>
                                                  <!-- /.card-header -->
                                                  <div class="card-body table-responsive">
                                                    <table id="testing4" class="table table-bordered table-striped table-sm">
                                                      <thead>
                                                      <tr>
                                                        <th>P_ID</th>
                                                        <th>Topic </th>
                                                        <th>Date </th>
                                                        <th>Total Marks</th>
                                                        <th>Of Class</th>
                                                      </tr>
                                                      </thead>
                                                      <tbody>
                                                      <?php
                                                      if (isset($con)) {
                                                        if (mysqli_num_rows($total_assignment_attend_exe)>0) {
                                                          while ($row=mysqli_fetch_array($total_assignment_attend_exe)) {
                                                            echo "<tr>";
                                                            echo "<td>".$row[0]."</td>";
                                                            echo "<td>".$row[1]."</td>";
                                                            echo "<td>".$row[2]."</td>";
                                                            echo "<td>".$row[3]."</td>";
                                                            echo "<td>".$row[4]."</td>";


                                                            // echo "<td><button class='btn btn-sm'><i class='fas fa-trash text-danger'></i></button></td>";

                                                            echo "</tr>";
                                                          }
                                                          unset($exe_std);

                                                        }else {?>
                                                          <tr>
                                                            <td colspan="5" class="text-center alert alert-warning">Sorry No Records.</td>
                                                          </tr>
                                                        <?php }
                                                      }
                                                      ?>
                                                      </tbody>
                                                    </table>
                                                  </div>
                                                  <!-- /.card-body -->
                                                </div>
                                              </div>
                                                <!-- /.card -->



                </div>
                <!-- /.card -->
              </section>
              <!-- /.Left col -->

              <!-- right col -->
            </div>
            <!-- /.row (main row) -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2020 <a href="../index.php">Class Room Management System</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0
        </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <script src="dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <!-- plugins for modal only -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    </body>
    </html>
    <script>
//delete the student
function Fn_Delete_student(id,name){
  $.confirm({
      title: 'Delete Student!',
      content: "Are You Sure You want to Delete this Student? <h5>"+name+" </h5> ",
      type: 'red',
      typeAnimated: true,
      buttons: {
          tryAgain: {
              text: 'Click To Continue',
              btnClass: 'btn-red',
              action: function(){
                $.ajax({
                  url:'my_pages/delete_student.php',
                  type:'POST',
                  data:{id},
                  success: function(data){
                    if (data=="yes") {
                      alert("Student are Successfully Deleted.");
                      var a=0;
                      if (a==0) {
                         a++;   window.location.reload();  }
                    }else if (data=="no") {
                      alert("Student Deletion Failed! Try again.");
                    }

                  }
                });
              }
          },
          close: function () {
          }
      }
  });

}



    //delete function
    function Fn_Delete_subject(subject_id,subject_name){
      $.confirm({
          title: 'Delete Subject!',
          content: "Are You Sure You want to Delete this Subject? <h5>"+subject_name+" </h5> ",
          type: 'red',
          typeAnimated: true,
          buttons: {
              tryAgain: {
                  text: 'Click To Continue',
                  btnClass: 'btn-red',
                  action: function(){
                    $.ajax({
                      url:'my_pages/delete_subject.php',
                      type:'POST',
                      data:{subject_id},
                      success: function(data){
                        if (data=="yes") {
                          alert("Your Subject are Successfully Deleted.");
                          var i="#unuse_subject";
                          var a=0;
                          if (a==0) {
                             a++;   window.location.reload();  }
                        }else if (data=="no") {
                          alert("Subject Deletion Failed! Try again.");
                        }

                      }
                    });
                  }
              },
              close: function () {
              }
          }
      });
    }







    // above are modal
      $(function () {
     //for student table
        $('#example1').DataTable({
          "paging": true,
          "pageLength": 5,
          "lengthMenu": [ [5,10, 500, 5000, -1], [5,10, 500, 5000, "All"] ],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });

        //for teacher table
        $("#example2").DataTable({
          "paging": true,
          "pageLength": 5,
          "lengthMenu": [ [5,10, 500, 5000, -1], [5,10, 500, 5000, "All"] ],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });

        //for class table all
        $("#example4").DataTable({
          "paging": true,
          "pageLength": 5,
          "lengthMenu": [ [5,10, 500, 5000, -1], [5,10, 500, 5000, "All"] ],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });
        //for all active classes
        $("#example5").DataTable({
          "paging": true,
          "pageLength": 5,
          "lengthMenu": [ [5,10, 500, 5000, -1], [5,10, 500, 5000, "All"] ],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });
        //for all expired classes
        $("#example6").DataTable({
          "paging": true,
          "pageLength": 5,
          "lengthMenu": [ [5,10, 500, 5000, -1], [5,10, 500, 5000, "All"] ],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });
        //for table inserted subjects
        $("#example7").DataTable({
          "paging": true,
          "pageLength": 5,
          "lengthMenu": [ [5,10, 500, 5000, -1], [5,10, 500, 5000, "All"] ],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });
        //for table total used subject
        $("#example8").DataTable({
          "paging": true,
          "pageLength": 5,
          "lengthMenu": [ [5,10, 500, 5000, -1], [5,10, 500, 5000, "All"] ],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });
        //for table total unused subject
        $("#example9").DataTable({
          "paging": true,
          "pageLength": 5,
          "lengthMenu": [ [5,10, 500, 5000, -1], [5,10, 500, 5000, "All"] ],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });

//notification==================================================================================
        //for table total notification
        $("#example10").DataTable({
          "paging": true,
          "pageLength": 1,
          "lengthMenu": [ [1,5,10, 500, 5000, -1], [1,5,10, 500, 5000, "All"] ],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });
        //for table total active notification
        $("#example11").DataTable({
          "paging": true,
          "pageLength": 1,
          "lengthMenu": [ [1,5,10, 500, 5000, -1], [1,5,10, 500, 5000, "All"] ],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });
        //for table total expire notification
        $("#example12").DataTable({
          "paging": true,
          "pageLength": 1,
          "lengthMenu": [ [1,5,10, 500, 5000, -1], [1,5,10, 500, 5000, "All"] ],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });
        //for table total slide stored
        $("#example13").DataTable({
          "paging": true,
          "pageLength": 1,
          "lengthMenu": [ [1,5,10, 500, 5000, -1], [1,5,10, 500, 5000, "All"] ],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });
        //for table total links upload
        $("#example14").DataTable({
          "paging": true,
          "pageLength": 1,
          "lengthMenu": [ [1,5,10, 500, 5000, -1], [1,5,10, 500, 5000, "All"] ],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });

        //for table total attendance Entry
        $("#example15").DataTable({
          "paging": true,
          "pageLength": 1,
          "lengthMenu": [ [1,5,10, 500, 5000, -1], [1,5,10, 500, 5000, "All"] ],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });

        //for table total attendance entry
        $("#testing1").DataTable({
          "paging": true,
          "pageLength": 1,
          "lengthMenu": [ [1,5,10, 500, 5000, -1], [1,5,10, 500, 5000, "All"] ],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });

        //for table total Quizzes entry
        $("#testing2").DataTable({
          "paging": true,
          "pageLength": 1,
          "lengthMenu": [ [1,5,10, 500, 5000, -1], [1,5,10, 500, 5000, "All"] ],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });

        //for table total presentation entry
        $("#testing3").DataTable({
          "paging": true,
          "pageLength": 1,
          "lengthMenu": [ [1,5,10, 500, 5000, -1], [1,5,10, 500, 5000, "All"] ],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });

        //for table total Assignment entry
        $("#testing4").DataTable({
          "paging": true,
          "pageLength": 1,
          "lengthMenu": [ [1,5,10, 500, 5000, -1], [1,5,10, 500, 5000, "All"] ],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });
//ended=========================================================================================
      });

//       $(document).ready( function () {
//     $('#example1111').DataTable({
//       "paging": true,
//        "pageLength": 1,
//        "lengthMenu": [ [1,5,10, 500, 5000, -1], [1,5,10, 500, 5000, "All"] ],
//        "lengthChange": true,
//        "searching": true,
//        "ordering": true,
//        "info": true,
//        "autoWidth": true,
//
//     });
// } );
    </script>




    <?php
  }else {
      echo "<script> alert('Email or Password is Wrong!. Try Agian'); </script>";
      header('location: index.php');
  }

}else {
  echo "<script> alert('Please Login First!...'); </script>";
  header('location: index.php');
}
?>
