<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action=""  method="post">
      <label>Email:</label>
      <input type="email" name="em" value="">
      <br>
      <label>Conform Email:</label>
      <input type="email" name="cem" value="">
      <br><br>
      <input type="submit" name="login" value="click">

    </form>


  </body>
</html>
<?php
function fn(){
      echo "string hjkkkkkkkkkkkkkkkkk";
}

if (isset($_POST['login'])) {
  echo fn();
}

?>
