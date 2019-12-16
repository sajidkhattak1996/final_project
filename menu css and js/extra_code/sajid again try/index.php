<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>file upload to database </title>
  </head>
  <body>
    <?php
        $con=new PDO("mysql:host=localhost;dbname=test","root","");
        if (isset($_POST['btn'])) {
            $name=$_FILES['myfile']['name'];
            $type=$_FILES['myfile']['type'];
            $data =file_get_contents($_FILES['myfile']['tmp_name']);
            $stmt =$con->prepare("INSERT INTO `file2`(`id`, `name`, `mime`, `data`) VALUES ('',?,?,?)");
            $stmt->bindParam(1,$name);
            $stmt->bindParam(2,$type);
            $stmt->bindParam(3,$data);
            $stmt->execute();
        }

     ?>
     <form method="post" enctype="multipart/form-data">
            <input type="file" name="myfile" value=""/>
            <button name="btn">Upload</button>
     </form>

     <p>
       <ol>
         <?php
              $stmt2=$con->prepare("SELECT id, name,mime, data FROM `file2`;");
              $stmt2->execute();
              while ($row =$stmt2->fetch()) {
                  echo "<li><a target='_blank' href='view.php?id=".$row['id']."'>".$row['name']."</a><br>";
                  // <embed src='data:".$row['mime'].";base64,".base64_encode($row['data'])."' width='200'></li>
              }


          ?>
       </ol>
     </p>
  </body>
</html>
