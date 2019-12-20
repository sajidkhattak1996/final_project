<?php
$con =mysqli_connect("localhost","root","","test");
$s="SELECT * FROM user ";
$rr=mysqli_query($con ,$s);
$t=mysqli_num_rows($rr);
$u[]=0;
$
while ($row=mysqli_fetch_assoc($rr)) {

}


while(){
echo "upeeeeeer looooooop ".$row['reg_no']."<br>";
    for ($i=0; $i <3 ; $i++) {
        echo "inner loop==".$row['reg_no']."<br>";
    }


}



 ?>
