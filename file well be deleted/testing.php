<?php
$server ="localhost";
$user   ="root";
$pass   ="";
$db     ="project_db";

$con = mysqli_connect($server,$user,$pass,$db);
if ($con) {
        echo "connection are created successfully <br>";
        $em=$_POST['email'];
        $password =$_POST['pass'];

        echo "email =".$em."<br>pass=".$password;
        echo "<br>";
      /* first condition for the login of email are checked and started   */
        $q1 ="select Email, Password from teacher WHERE Email ='$em' AND Password='$password'";
        $q2 ="select Email , Password from Student WHERE Email='$em' AND Password='$password'";

        $r1 =mysqli_query( $con  ,$q1 );
        $r2 =mysqli_query( $con  ,$q2 );

        $t1 =mysqli_num_rows($r1);
        $t2 =mysqli_num_rows($r2);

        if ( $r1  AND $r2 ) {
              echo "query1 are successfully executed .... ";
              echo "query2 are successfully executed .... ";
              echo "<br>";
              echo "query 1 have no of rows == ".$t1."<br> and query 2 have no of nows == ".$t2;

          /* this condition check and use if email are found in the  both table and also there Password are also same for them */
              if ( $t1>0  AND $t2>0) {
                echo "<h1> Email and password for the both table are same ....  </h1>";
              }
              if ($t1 >0 AND $t2 <1 ) {
                echo "<h1>email and password are only matched with the teacher table </h1>";
              }
              if ($t2 >0 AND $t1 <1) {
                echo "<h1>email and password are only matched with the student table  </h1>";
              }
              if($t1 <1 && $t2<1) {
                echo "<br><h1>Something problem in email or password !.... </h1>";

                /* here we check for wrong email or password */
                $temail ="select Email FROM teacher WHERE Email ='$em'";
                $tpass ="select Password from teacher WHERE Password='$password'";

                $tr1=mysqli_query($con ,$temail);
                $tr2=mysqli_query($con ,$tpass);

                $te=mysqli_num_rows($tr1);
                $tp=mysqli_num_rows($tr2);


                /* student */
                $semail ="select Email FROM student WHERE Email ='$em'";
                $spass ="select Password from student WHERE Password='$password'";

                $sr1=mysqli_query($con ,$semail);
                $sr2=mysqli_query($con ,$spass);

                $se=mysqli_num_rows($sr1);
                $sp=mysqli_num_rows($sr2);

                if ($tr1 && $tr2 && $sr1 && $sr2) {
                    echo "all are executed ....";
                    if ($te>0  &&  $se >0  && $tp==0 && $sp==0 )
                    {
                      echo "<h2> password are wrong!!!... </h2>";
                    }
                    if ($te >0 &&  $se==0 && $tp==0) {
                      echo "<h2>teacher email password are wrong!!!... </h2>";
                    }
                    if ($se>0  && $te==0 && $sp==0) {
                      echo "<h2>Student email password are wrong!!!... </h2>";
                    }
                    /*condition for email wrong */
                    if ($te==0 && $se==0 && $tp==0 && $sp==0) {  /* use if both fields are wrong */
                      echo "<h2><script> alert(' Email or Password is wrong !....') </script> </h2>";
                    }
                    if ($te==0  && $se==0 &&  $tp>0  && $sp>0 ) {
                      echo "<h2>Email are wrong !... </h2>";
                    }
                    if ($te==0 && $se==0  && $tp>0 && $sp==0) {
                      echo "teacher email are wrong !";
                    }
                    if ($te==0  && $se==0 && $sp>0  && $tp==0) {
                      echo "student email are wrong ! ";
                    }

                }
                else {
                  echo "<script> alert('Problem occur please try again !....') </script>".mysqli_error($con);
                }


              }
        }
        else {
          echo "<script> alert('Something Problem in Database Connection Please Try Again ! '); </script>".mysqli_error($r1).mysqli_error($r2);
        }


}
else {
  echo "<script> alert('Something Problem in Database Connection Please Try Again ! '); </script>".mysqli_error($con);
}

mysqli_close($con);
?>
