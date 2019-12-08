<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="../../info_forms/js/jquery.js"></script>
    <script src="../../datatables/jquery.dataTables.js"></script>
    <script src="../../datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="../../datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../menu css and js/bootstrap 4/css/bootstrap.css">

  </head>
  <body>
    <table id="example1" class="table table-striped  table-bordered table-hover table-sm">
        <thead class="bg-info">
                <tr>
                  <th scope="col" scope="row">Reg.No</th>
                  <th scope="col">Name</th>
                  <th scope="col">Attendence</th>
                  <th scope="col">Assignment</th>
                  <th scope="col">Quiz</th>


                </tr>
          </thead>
          <tbody>
            <?php
                $conn=mysqli_connect("localhost","root","","test");
                if ($conn) {
                  $r=mysqli_query($conn,"SELECT * FROM user");
                  while ($row=mysqli_fetch_array($r)) {
                    ?>
                    <tr>
                      <th scope="row"> <?php echo $row[0];  ?></th>
                      <th scope="row"> <?php echo $row[1];  ?></th>
                      <th scope="row"> <?php echo $row[2];  ?></th>
                      <th scope="row"> <?php echo $row[3];  ?></th>
                      <th scope="row"> <?php echo $row[4];  ?></th>

                <?php
                  }
                }
             ?>

                <!-- <tr>
                  <th scope="row">0</th>
                  <td>Sajid ali gulzar</td>
                  <td>&nbsp;&nbsp;  60%  &nbsp;&nbsp;&nbsp;&nbsp;<a href="attendence_record.html"> <span class="glyphicon glyphicon-eye-open" style="color: black;"></span></a></td>
                  <td>&nbsp;&nbsp;  70 out of 100  &nbsp;&nbsp;&nbsp;&nbsp;<a href="assignment.html"><span class="glyphicon glyphicon-eye-open" style="color: black;"></span></a></td>
                  <td>&nbsp;&nbsp; 15 out of 25  &nbsp;&nbsp;&nbsp;&nbsp;<a href="quize.html"><span class="glyphicon glyphicon-eye-open" style="color: black;"></span></a></td>
                  <td>&nbsp;&nbsp;  6 out of 10  &nbsp;&nbsp;&nbsp;&nbsp;<a href="presentation.html"><span class="glyphicon glyphicon-eye-open" style="color: black;"></span></a></td>

                </tr> -->


            </tbody>
      </table>



  </body>
</html>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
