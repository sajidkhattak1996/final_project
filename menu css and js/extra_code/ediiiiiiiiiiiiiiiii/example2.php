<?php 
include "config.php";
?>

<!doctype html>
<html>
    <head>
        <title>Make Live Editable Table with jQuery AJAX</title>
        <link href='style.css' rel='stylesheet' type='text/css'>
        <script src='jquery-3.0.0.js' type='text/javascript'></script>
        <script src='script2.js' type='text/javascript'></script>
    </head>
    <body>
        
        <div class='container'>
              
            <table width='100%' border='0'>
                <tr>
                    <th width='10%'>S.no</th>
                    <th width='40%'>Username</th>
                    <th width='40%'>Name</th>
                </tr>
            <?php 
                $query = "select * from users order by name";
                $result = mysqli_query($con,$query);
                $count = 1;
                while($row = mysqli_fetch_array($result) ){
                    $id = $row['id'];
                    $username = $row['username'];
                    $name = $row['name'];
            ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td> 
                            <div class='edit' > <?php echo $username; ?></div> 
                            <input type='text' class='txtedit' value='<?php echo $username; ?>' id='username_<?php echo $id; ?>' >
                        </td>
                        <td> 
                            <div class='edit' ><?php echo $name; ?> </div> 
                            <input type='text' class='txtedit' value='<?php echo $name; ?>' id='name_<?php echo $id; ?>' >
                        </td>
                    </tr>
            <?php
                    $count ++;
                }
            ?>  
            </table>
             
        </div>    
        
    </body>
</html>