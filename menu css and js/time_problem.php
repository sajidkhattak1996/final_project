<?php
date_default_timezone_set("Asia/Karachi");
$c=date("h:i:sa");
  $c2=time();

  $a=0;
  while ($a <= 10) {
    date_default_timezone_set("Asia/Karachi");
    // MILLISECONDS
//     $currentMilliSecond = (int) (microtime(true) * 1000);
//     echo 'CUR MILLISECONDS:'.$currentMilliSecond.PHP_EOL;  echo " <br>";
//     echo 'DATE:'.date('d/m/Y H:i:s', intval($currentMilliSecond/1000)).PHP_EOL;  echo " <br>";
echo " <br>";echo " <br>";
    // MICROSECONDS
    $currentMicroSecond = (int) (microtime(true) * 1000000);
    echo 'CUR MICROSECONDS:'.$currentMicroSecond.PHP_EOL;    echo " <br>";
    echo 'DATE:'.date('d/m/Y H:i:s', intval($currentMicroSecond/1000000)).PHP_EOL;   echo " <br>";
echo " <br>";echo " <br>";
    // NANOSECONDS
    $currentNanoSecond = (int) (microtime(true) * 1000000000);
    echo 'CUR NANOSECONDS:'.$currentNanoSecond.PHP_EOL;  echo " <br>";
    echo 'TIME:'.date('H:i:sa', intval($currentNanoSecond/1000000000)).PHP_EOL;  echo " <br>";
echo " <br>";echo " <br>";echo " <br>";echo " <br>";echo " <br>";echo " <br>";
  $a++;
  }


 ?>
