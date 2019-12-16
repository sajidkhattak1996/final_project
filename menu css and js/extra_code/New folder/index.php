<!doctype html>
<html>
<head>
    <?php
    include("config.php");

    if(isset($_POST['but_upload'])){
        $name = $_FILES['file']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){

            // Convert to base64
            $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

            // Insert record
            $query = "insert into images(name,image) values('".$name."','".$image."')";

            mysqli_query($con,$query) or die(mysqli_error($con));

            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name);

        }

    }
    ?>
<body>
    <form method="post" action="" enctype='multipart/form-data'>
        <input type='file' name='file' />
        <input type='submit' value='Save name' name='but_upload'>

    </form>
    <?php
    $con=mysqli_connect("localhost","root","","images");
    if ($con) {
      $s="SELECT * FROM images ";
      $r=mysqli_query($con ,$s);
      while ($row=mysqli_fetch_assoc($r)) {
        echo "<h3>".$row['id']."</h3>";
        echo "<h3>".$row['name']."</h3>";
        
      }
    }


     ?>

</body>
</html>
