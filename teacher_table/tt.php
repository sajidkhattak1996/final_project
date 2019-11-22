<?php
        session_start();
        echo "<h1> button are press </h1>";
        echo "<h2>Session Variable are below</h2>";

        echo "<h3> email in session variable is :</h3>".$_SESSION['email'];
        echo "<h3> password in session variable is :</h3>".$_SESSION['pass'];
        echo "<h3> T_ID in session variable is :".$_SESSION['t_id']."</h3>";

        // variables for the create class are
        $class_name  = $_POST['cname'];
        $enroll_key  = $_POST['enroll_key'];
        $class_session=$_POST['c_session'];
        $current_date =date("Y-m-d");
        date_default_timezone_set("Asia/Karachi");
        $ctime  =date("h:i:sa");
        $expire_date  =$_POST['expire_date'];
        $subject_name =$_POST['subject_name'];

        $status_subject=0;
        echo "timeeeeeeeeeeeeeeeeeeeeeee   ..".$ctime;
        echo "current date is ";
        echo "Today is " . date("Y-m-d") . "<br>";

        echo "<h3>your entered values are the following ... </h3>";
        echo "<h4>Class Name:".$class_name ."</h4>";
        echo "<h4>Enroll key :".$enroll_key ."</h4>";
        echo "<h4>Class session :".$class_name ."</h4>";
        echo "<h4>Current Date :".$current_date ."</h4>";
        echo "<h4>Expire Date :".$expire_date ."</h4>";
        echo "<h4>Subject Name :".$subject_name ."</h4>";


        $con = mysqli_connect("localhost","root","","project_db");
        if ($con) {
                $stmt1 ="SELECT Subject_id,subject_name FROM subject WHERE subject_name ='$subject_name'";
                $result = mysqli_query($con ,$stmt1);
                //fatchinh record from query
                $row =mysqli_num_rows($result);
                if ($row==1) {
                  $_SESSION['subject_id'] = $row['Subject_id'];
                  $status_subject=1;
                }else {
                  $stmt2 ="INSERT INTO subject (subject_name) VALUES ('$subject_name')";
                  $result2=mysqli_query($con ,$stmt2);
                  if ($result2) {
                    $stmt5 ="SELECT Subject_id,subject_name FROM subject WHERE subject_name ='$subject_name'";
                    $result5 = mysqli_query($con ,$stmt1);
                    //fetching the records
                    $row5=mysqli_fetch_array($result5);
                    $_SESSION['subject_id'] = $row5['Subject_id'];

                    $status_subject=$result2;

                  }
                }

                if ($status_subject==1) {
                  $tid=$_SESSION['t_id'];
                  $stmt11 ="INSERT INTO class (Name,Enrollment_key,Class_session,Start_date,currenttime,Expire_date,T_id) VALUES ('$class_name', '$enroll_key', '$class_session', '$current_date', '$ctime', '$expire_date', '$tid')";
                  $exe_stmt11=mysqli_query($con,$stmt11);
                      if ($exe_stmt11) {

                        $stmt_22="SELECT Class_id FROM class WHERE(Name='$class_name' AND Enrollment_key='$enroll_key' AND Class_session='$class_session'  AND Start_date='$current_date'  AND currenttime='$ctime'  AND Expire_date='$expire_date' AND T_id='$tid')";
                        $exe_22=mysqli_query($con, $stmt_22);
                            if ($exe_22) {
                              $row_22=mysqli_fetch_array($exe_22);
                              echo "<script> alert('class record are inserted ...');  </script>";
                              $_SESSION['Class_id'] = $row_22['Class_id'];
                              $s_id=$_SESSION['subject_id'];
                              $c_id=$_SESSION['Class_id'];
                              $stmt_33 ="INSERT INTO have (Subject_id, Class_id) VALUES ('$s_id', '$c_id')";
                              $exe_33 =mysqli_query($con,$stmt_33);
                                          if ($exe_33) {
                                                //here will the final msg for class creation...










                                          }else {
                                            echo "<script> alert('Problem Occur! Please try again....');  </script>";
                                          }


                            }else {
                              echo "<script> alert('Problem Occur! Please try again....');  </script>";
                            }
                      }
                      else {
                        echo "<script> alert('class creation falied! try again....');  </script>";
                      }

                }else {
                  echo "<script> alert('Problem things Problem while Executing the Database Quires!.....');  </script>";
                }

        }else {
          echo "<script> alert('Problem Occur While Connecting to the Database!');  </script>".mysqli_error($con);
        }
?>
