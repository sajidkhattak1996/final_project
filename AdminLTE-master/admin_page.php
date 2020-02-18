<?php
if (isset($_POST['btn_lg'])) {
  $sql="SELECT name,Email, password FROM admin WHERE Email='".$_POST['email']."' AND password='".$_POST['pass']."'";
  $con=mysqli_connect("localhost","root","","project_db");
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
          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Brad Diesel
                      <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      John Pierce
                      <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Nora Silvester
                      <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
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
              <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block"><?php echo $admin_name; ?> </a>
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
              <li class="nav-item">
                <a href="pages/widgets.html" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Widgets
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li>
      <!-- all registered user record         -->
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Registered Users
                    <i class="fas fa-angle-left right"></i>

                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Students Registered </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Teachers Registered</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
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
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Classes
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Total Classes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Active Classes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
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
                  <i class="nav-icon fas fa-tree"></i>
                  <p>
                    Subjects Inserted
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Total Subjects</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Used Subjects</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
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
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Notifications
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Total Notifications</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Active Notifications</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Expired Notifications</p>
                    </a>
                  </li>
                </ul>
              </li>
          <!--=================== ended ===================-->
          <!-- total stored file ============================ -->
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Total File Stored
                  </p>
                </a>
              </li>
          <!-- ended ===================================================-->
          <!-- total upload links ============================ -->
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Total Uploads Link
                  </p>
                </a>
              </li>
          <!-- ended ===================================================-->
              <li class="nav-header">Class Room Records</li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-calendar-alt"></i>
                  <p>
                    Total Attendence Entry
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-image"></i>
                  <p>
                    Total Quizzes
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-envelope"></i>
                  <p>
                    Total Presentations
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-envelope"></i>
                  <p>
                    Total Assignments
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

                    <p>Students Register</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-12">
                <!-- small box -->
                <?php
                $total_admin=mysqli_num_rows(mysqli_query($con ,"SELECT * FROM subject LEFT OUTER JOIN have ON subject.Subject_id=have.Subject_id WHERE have.Subject_id IS NULL"));
                ?>
                <div class="small-box text-light" style="background: #a8c1c1">
                  <div class="inner">
                    <h3><?php echo $total_admin; ?></h3>

                    <p> Unused Subjects </p>
                  </div>
                  <div class="icon">
                    <i style="opacity: 0.3"><img src="../pic/book.png" style="width: 64px; height: 64px" /></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            </div>



            <!-- /.row -->
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title">Monthly Recap Report</h5>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <div class="btn-group">
                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                          <i class="fas fa-wrench"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                          <a href="#" class="dropdown-item">Action</a>
                          <a href="#" class="dropdown-item">Another action</a>
                          <a href="#" class="dropdown-item">Something else here</a>
                          <a class="dropdown-divider"></a>
                          <a href="#" class="dropdown-item">Separated link</a>
                        </div>
                      </div>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">

                      <!-- /.col -->
                      <div class="col-md-12">
                        <p class="text-center">
                          <strong>Goal Completion</strong>
                        </p>

                        <div class="progress-group">
                          Add Products to Cart
                          <span class="float-right"><b>160</b>/200</span>
                          <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: 80%"></div>
                          </div>
                        </div>
                        <!-- /.progress-group -->

                        <div class="progress-group">
                          Complete Purchase
                          <span class="float-right"><b>310</b>/400</span>
                          <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" style="width: 75%"></div>
                          </div>
                        </div>

                        <!-- /.progress-group -->
                        <div class="progress-group">
                          <span class="progress-text">Visit Premium Page</span>
                          <span class="float-right"><b>480</b>/800</span>
                          <div class="progress progress-sm">
                            <div class="progress-bar bg-success" style="width: 60%"></div>
                          </div>
                        </div>

                        <!-- /.progress-group -->
                        <div class="progress-group">
                          Send Inquiries
                          <span class="float-right"><b>450</b>/500</span>
                          <div class="progress progress-sm">
                            <div class="progress-bar bg-warning" style="width: 90%"></div>
                          </div>
                        </div>
                        <!-- /.progress-group -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- ./card-body -->
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                          <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                          <h5 class="description-header">$35,210.43</h5>
                          <span class="description-text">TOTAL REVENUE</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                          <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                          <h5 class="description-header">$10,390.90</h5>
                          <span class="description-text">TOTAL COST</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                          <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                          <h5 class="description-header">$24,813.53</h5>
                          <span class="description-text">TOTAL PROFIT</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-3 col-6">
                        <div class="description-block">
                          <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                          <h5 class="description-header">1200</h5>
                          <span class="description-text">GOAL COMPLETIONS</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

                <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-primary">
                  <div class="card-header">
                    <h3 class="card-title">Direct Chat</h3>

                    <div class="card-tools">
                      <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">3</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                              data-widget="chat-pane-toggle">
                        <i class="fas fa-comments"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                      <!-- Message. Default to the left -->
                      <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-left">Alexander Pierce</span>
                          <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          Is this template really for free? That's unbelievable!
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->

                      <!-- Message to the right -->
                      <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-right">Sarah Bullock</span>
                          <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          You better believe it! hi me is also include in your text to check and testing the you admin
                          pannel on long text messege. Once againg we check it if there is line break or not on long textarea
                          so that put some more text there to check it  what well happen .
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->

                      <!-- Message. Default to the left -->
                      <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-left">Alexander Pierce</span>
                          <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          Working with AdminLTE on a great new app! Wanna join?
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->

                      <!-- Message to the right -->
                      <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-right">Sarah Bullock</span>
                          <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          I would love to.
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->

                    </div>
                    <!--/.direct-chat-messages-->

                    <!-- Contacts are loaded here -->
                    <div class="direct-chat-contacts">
                      <ul class="contacts-list">
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="dist/img/user1-128x128.jpg">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Count Dracula
                                <small class="contacts-list-date float-right">2/28/2015</small>
                              </span>
                              <span class="contacts-list-msg">How have you been? I was...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="dist/img/user7-128x128.jpg">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Sarah Doe
                                <small class="contacts-list-date float-right">2/23/2015</small>
                              </span>
                              <span class="contacts-list-msg">I will be waiting for...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="dist/img/user3-128x128.jpg">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Nadia Jolie
                                <small class="contacts-list-date float-right">2/20/2015</small>
                              </span>
                              <span class="contacts-list-msg">I'll call you back at...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="dist/img/user5-128x128.jpg">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Nora S. Vans
                                <small class="contacts-list-date float-right">2/10/2015</small>
                              </span>
                              <span class="contacts-list-msg">Where is your new...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="dist/img/user6-128x128.jpg">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                John K.
                                <small class="contacts-list-date float-right">1/27/2015</small>
                              </span>
                              <span class="contacts-list-msg">Can I take a look at...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="dist/img/user8-128x128.jpg">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Kenneth M.
                                <small class="contacts-list-date float-right">1/4/2015</small>
                              </span>
                              <span class="contacts-list-msg">Never mind I found...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                      </ul>
                      <!-- /.contacts-list -->
                    </div>
                    <!-- /.direct-chat-pane -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <form action="#" method="post">
                      <div class="input-group">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-primary">Send</button>
                        </span>
                      </div>
                    </form>
                  </div>
                  <!-- /.card-footer-->
                </div>
                <!--/.direct-chat -->

                <!-- TO DO List -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="ion ion-clipboard mr-1"></i>
                      To Do List
                    </h3>

                    <div class="card-tools">
                      <ul class="pagination pagination-sm">
                        <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <ul class="todo-list" data-widget="todo-list">
                      <li>
                        <!-- drag handle -->
                        <span class="handle">
                          <i class="fas fa-ellipsis-v"></i>
                          <i class="fas fa-ellipsis-v"></i>
                        </span>
                        <!-- checkbox -->
                        <div  class="icheck-primary d-inline ml-2">
                          <input type="checkbox" value="" name="todo1" id="todoCheck1">
                          <label for="todoCheck1"></label>
                        </div>
                        <!-- todo text -->
                        <span class="text">Design a nice theme</span>
                        <!-- Emphasis label -->
                        <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                        <!-- General tools such as edit or delete-->
                        <div class="tools">
                          <i class="fas fa-edit"></i>
                          <i class="fas fa-trash-o"></i>
                        </div>
                      </li>
                      <li>
                        <span class="handle">
                          <i class="fas fa-ellipsis-v"></i>
                          <i class="fas fa-ellipsis-v"></i>
                        </span>
                        <div  class="icheck-primary d-inline ml-2">
                          <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                          <label for="todoCheck2"></label>
                        </div>
                        <span class="text">Make the theme responsive</span>
                        <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                        <div class="tools">
                          <i class="fas fa-edit"></i>
                          <i class="fas fa-trash-o"></i>
                        </div>
                      </li>
                      <li>
                        <span class="handle">
                          <i class="fas fa-ellipsis-v"></i>
                          <i class="fas fa-ellipsis-v"></i>
                        </span>
                        <div  class="icheck-primary d-inline ml-2">
                          <input type="checkbox" value="" name="todo3" id="todoCheck3">
                          <label for="todoCheck3"></label>
                        </div>
                        <span class="text">Let theme shine like a star</span>
                        <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                        <div class="tools">
                          <i class="fas fa-edit"></i>
                          <i class="fas fa-trash-o"></i>
                        </div>
                      </li>
                      <li>
                        <span class="handle">
                          <i class="fas fa-ellipsis-v"></i>
                          <i class="fas fa-ellipsis-v"></i>
                        </span>
                        <div  class="icheck-primary d-inline ml-2">
                          <input type="checkbox" value="" name="todo4" id="todoCheck4">
                          <label for="todoCheck4"></label>
                        </div>
                        <span class="text">Let theme shine like a star</span>
                        <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                        <div class="tools">
                          <i class="fas fa-edit"></i>
                          <i class="fas fa-trash-o"></i>
                        </div>
                      </li>
                      <li>
                        <span class="handle">
                          <i class="fas fa-ellipsis-v"></i>
                          <i class="fas fa-ellipsis-v"></i>
                        </span>
                        <div  class="icheck-primary d-inline ml-2">
                          <input type="checkbox" value="" name="todo5" id="todoCheck5">
                          <label for="todoCheck5"></label>
                        </div>
                        <span class="text">Check your messages and notifications</span>
                        <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                        <div class="tools">
                          <i class="fas fa-edit"></i>
                          <i class="fas fa-trash-o"></i>
                        </div>
                      </li>
                      <li>
                        <span class="handle">
                          <i class="fas fa-ellipsis-v"></i>
                          <i class="fas fa-ellipsis-v"></i>
                        </span>
                        </div>
                        <div  class="icheck-primary d-inline ml-2">
                          <input type="checkbox" value="" name="todo6" id="todoCheck6">
                          <label for="todoCheck6"></label>
                        </div>
                        <span class="text">Let theme shine like a star</span>
                        <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                        <div class="tools">
                          <i class="fas fa-edit"></i>
                          <i class="fas fa-trash-o"></i>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add item</button>
                  </div>
                </div>
                <!-- /.card -->
              </section>
              <!-- /.Left col -->
              <!-- right col (We are only adding the ID to make the widgets sortable)-->
              <section class="col-lg-5 connectedSortable">

                <!-- Map card -->
                <div class="card bg-gradient-primary">
                  <div class="card-header border-0">
                    <h3 class="card-title">
                      <i class="fas fa-map-marker-alt mr-1"></i>
                      Visitors
                    </h3>
                    <!-- card tools -->
                    <div class="card-tools">
                      <button type="button"
                              class="btn btn-primary btn-sm daterange"
                              data-toggle="tooltip"
                              title="Date range">
                        <i class="far fa-calendar-alt"></i>
                      </button>
                      <button type="button"
                              class="btn btn-primary btn-sm"
                              data-card-widget="collapse"
                              data-toggle="tooltip"
                              title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    <!-- /.card-tools -->
                  </div>
                  <div class="card-body">
                    <div id="world-map" style="height: 250px; width: 100%;"></div>
                  </div>
                  <!-- /.card-body-->
                  <div class="card-footer bg-transparent">
                    <div class="row">
                      <div class="col-4 text-center">
                        <div id="sparkline-1"></div>
                        <div class="text-white">Visitors</div>
                      </div>
                      <!-- ./col -->
                      <div class="col-4 text-center">
                        <div id="sparkline-2"></div>
                        <div class="text-white">Online</div>
                      </div>
                      <!-- ./col -->
                      <div class="col-4 text-center">
                        <div id="sparkline-3"></div>
                        <div class="text-white">Sales</div>
                      </div>
                      <!-- ./col -->
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
                <!-- /.card -->

                <!-- solid sales graph -->
                <div class="card bg-gradient-info">
                  <div class="card-header border-0">
                    <h3 class="card-title">
                      <i class="fas fa-th mr-1"></i>
                      Sales Graph
                    </h3>

                    <div class="card-tools">
                      <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer bg-transparent">
                    <div class="row">
                      <div class="col-4 text-center">
                        <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                               data-fgColor="#39CCCC">

                        <div class="text-white">Mail-Orders</div>
                      </div>
                      <!-- ./col -->
                      <div class="col-4 text-center">
                        <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                               data-fgColor="#39CCCC">

                        <div class="text-white">Online</div>
                      </div>
                      <!-- ./col -->
                      <div class="col-4 text-center">
                        <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                               data-fgColor="#39CCCC">

                        <div class="text-white">In-Store</div>
                      </div>
                      <!-- ./col -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->

                <!-- Calendar -->
                <div class="card bg-gradient-success">
                  <div class="card-header border-0">

                    <h3 class="card-title">
                      <i class="far fa-calendar-alt"></i>
                      Calendar
                    </h3>
                    <!-- tools card -->
                    <div class="card-tools">
                      <!-- button with a dropdown -->
                      <div class="btn-group">
                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                          <i class="fas fa-bars"></i></button>
                        <div class="dropdown-menu float-right" role="menu">
                          <a href="#" class="dropdown-item">Add new event</a>
                          <a href="#" class="dropdown-item">Clear events</a>
                          <div class="dropdown-divider"></div>
                          <a href="#" class="dropdown-item">View calendar</a>
                        </div>
                      </div>
                      <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                    <!-- /. tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body pt-0">
                    <!--The calendar -->
                    <div id="calendar" style="width: 100%"></div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </section>
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
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
    </body>
    </html>

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
