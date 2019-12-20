<?php
 $connect = mysqli_connect("localhost", "root", "", "db");
 $query ="SELECT * FROM test ORDER BY id desc";
 $result = mysqli_query($connect, $query);
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Webslesson Tutorial | Export Mysql Table Data to CSV file in PHP</title>

      </head>
      <body>
           <br /><br />
           <div class="container" style="width:900px;">
                <h2 align="center">Export Mysql Table Data to CSV file in PHP</h2>
                <h3 align="center">Employee Data</h3>
                <br />
                <form method="post" action="export.php" align="center">
                     <input type="submit" name="export" value="CSV Export" class="btn btn-success" />
                </form>
                <br />
                <div class="table-responsive" id="employee_table">
                     <table class="table table-bordered">
                          <tr>
                               <th width="5%">ID</th>
                               <th width="25%">Name</th>
                               <th width="35%">Address</th>
                               <th width="10%">Gender</th>
                               <th width="20%">Designation</th>
                               <th width="5%">Age</th>
                          </tr>
                     <?php
                     while($row = mysqli_fetch_array($result))
                     {
                     ?>
                          <tr>
                               <td><?php echo $row["id"]; ?></td>
                               <td><?php echo $row["name"]; ?></td>
                               <td><?php echo $row["address"]; ?></td>
                               <td><?php echo $row["gender"]; ?></td>
                               <td><?php echo $row["designation"]; ?></td>
                               <td><?php echo $row["age"]; ?></td>
                          </tr>
                     <?php
                     }
                     ?>
                     </table>
                </div>
           </div>
      </body>
 </html>
