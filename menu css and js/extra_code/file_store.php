<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form  method="post">
          Upload file <input type="file" name="f" /></br>
          name:<input type="text" name="t" />
        </br>
        <input type="submit" name="submit1" value="submit" />
    </form>
              <?php
                $con =mysqli_connect("localhost" ,"root" ,"" ,"test");
                    if (isset($_POST['submit1'])) {

                        if ($con) {
                          $fn=$_POST['f'];
                              $q1="INSERT INTO `file`(`name`) VALUES ('$fn')";
                              if (mysqli_query($con, $q1)) {
                                echo "file are inserted..........";  ?>
                                <script type="text/javascript">
                                    window.location.href='file_store.php';
                                </script>
                                <?php
                              }
                        }
                    }


               ?>
<form  method="post">
        <button type="submit" name="dp">display file</button>
</form>

<table border="1">
    <thead>
      <tr>
        <th>id</th>
        <th>file</th>
      </tr>

<?php
    if (isset($_POST['dp'])) {
          if ($con) {
                $st="SELECT * FROM `file`";
                $r=mysqli_query($con,$st);
                while ($row=mysqli_fetch_assoc($r)) {
                      ?>
                      <tr>
                        <td><?php echo $row['id'];  ?></td>
                          <td><a  href=""><?php echo $row['name'];  ?></a></td>
                      </tr>


                      <?php
                }
          }
    }

?>




</thead>
</table>

  </body>
</html>
