
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap 4\css\glyphicon.css">
                              <table class="table table-striped table-bordered table-hover table-sm table-light" >
                                        <thead class="bg-info">
                                            <tr>
                                                  <th scope="col" scope="row">Class ID</th>
                                                  <th scope="col">Class Name</th>
                                                  <!-- <th scope="col">Subject</th> -->
                                                  <th scope="col">Start Date</th>
                                                  <th scope="col">Expire Date</th>
                                                  <th scope="col">Slides</th>
                                                  <th scope="col">Edit</th>
                                                  <th scope="col">Drop</th>
                                            </tr>
                                        </thead>
                                          <tbody>

                                            <?php
                                            dp();

                                            function dp(){
                                                  $con=mysqli_connect("localhost","root","","project_db");
                                                  if ($con) {
                                                      $stmt ="SELECT Class_id,Name,Start_date,Expire_date FROM class WHERE T_id='1'";
                                                      $e =mysqli_query($con ,$stmt);

                                                      if (mysqli_num_rows($e)>0) {
                                                            while ($row=mysqli_fetch_assoc($e)) { ?>
                                                        <tr>
                                                              <td scope="row"><?php echo $row['Class_id'];  ?></td>
                                                                <td><style> #classbtn{background:none;border:none;color: blue} #classbtn:hover{border-bottom: solid 2px blue;} </style>
                                                                    <form action="" method="post">
                                                                      <button type="submit" name="class_name" id="classbtn">
                                                                        <?php echo $row['Name'];  ?>
                                                                      </button>
                                                                    </form>
                                                              </td>
                                                                <td><?php echo $row['Start_date'];  ?></td>
                                                                <td><?php echo $row['Expire_date'];  ?></td>

                                                          <?php
                                                          //functions call
                                                          Slides($row['Class_id'],$row['Name']);
                                                          Edit($row['Name']);
                                                          Delete($row['Class_id'],$row['Name']);

                                                         }

                                                      }else {
                                                        echo "<h2>no record found!  </h2>";
                                                      }

                                                    }
                                                  else {
                                                    echo mysqli_error($con);
                                                  }
                                                }
                                        // function which display the slide button
                                                  function Slides($i ,$s){ ?>
                                                  <td>    <form class="" action="" method="post">
                                                            <button type="submit" name="button" value="<?php  echo $i; ?>" class="btn btn-outline-info btn-sm">Slides</button>
                                                            <input type="text" name="s" value="<?php echo $s; ?>" style="display:none">
                                                      </form>
                                                    </td>
                                                  <?php  }

                                            // slides function ended

                                            // function which display the edit buttons icons
                                                      function Edit($i){ ?>
                                                      <td>    <form class="" action="" method="post">
                                                        <button class="btn btn-outline-primary" name="btn_edit" value="<?php echo $i; ?>" style="border:none"> <span class="glyphicon glyphicon-pencil" style="font-size: 14px"></span></button>

                                                          </form>
                                                        </td>
                                                      <?php  }
                                                // edit function ended
                                                // function which display the delete buttons icons
                                                          function Delete($i,$j){ ?>
                                                            <style> #cd<?php echo $i; ?>{display: none} </style>
                                                          <td>
                                                            <form class="" action="" method="post" name="fff" id="f1" >
                                                            <input type="text" name="cn" id="gg" value="<?php echo $j; ?>" style="display:none">
                                                            <button id="dd<?php echo $i;?>" type="submit" class="btn btn-outline-danger" name="btn_delete" value="<?php echo $i; ?>" style="border:none"> <span class="glyphicon glyphicon-trash" style="font-size: 14px"></span></button>
                                                            <button id="cd<?php echo $i; ?>" type="submit" class="btn btn-danger btn-sm" name="c_delete"  value="<?php echo $i; ?>">conform</button>
                                                              </form>
                                                            </td>
                                                          </tr>
                                                          <?php  }
                                                    // edit function ended
                                            ?>

                                          </tbody>
                              </table>

                              <?php

                                  fn_pagination();   // send this result for pagination
                              //funciton for the pagination to handle them
                              function fn_pagination(){
                                echo "this is pagskjdfkhajhfkjhination";
                                $con=mysqli_connect("localhost","root","","project_db");
                                if ($con) {
                                    $stmt ="SELECT Class_id,Name,Start_date,Expire_date FROM class WHERE T_id='1'";
                                    $e =mysqli_query($con ,$stmt);

                                    echo "conneciton is okkkkkkkkk";
                                  }
                              }
                               ?>

<?php
    //for delete button are press
    if (isset($_POST['btn_delete'])) {  ?>
      <style media="screen">
            #dd<?php echo $_POST['btn_delete']; ?>{ display: none}
            #cd<?php echo $_POST['btn_delete']; ?>{ display: block}
      </style>
      <?php
    }
    //for conform delete button are presss
    if (isset($_POST['c_delete'])) {
      $a=$_POST['c_delete'];
      $cn=$_POST['cn'];
      echo "<h2>".$a."=conform delete are presss</h2>";
      echo "<h2>class name is=".$cn."</h2>";
    }


    if (isset($_POST['button'])) {
      $cid= $_POST['button'];
      $sid= $_POST['s'];

      echo "<h1>".$cid."</h1>";
      echo "<h1>".$sid."</h1>";
    }



?>
