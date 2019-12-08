<!--==============================plugin=====================-->
<script src="../../info_forms/js/jquery.js"></script>
<script src="../../datatables/jquery.dataTables.js"></script>
<script src="../../datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="../../datatables-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="../../menu css and js/bootstrap 4/css/bootstrap.css">
<!--================ended===============================================================-->
<div id="active_class">
    <div class="tstart" >
      <h2 class="text-left">Institute Name: University Of Peshawar </h2>
    </div>

    <table id="example5" class="table table-striped  table-bordered table-hover table-sm">
        <thead class="bg-info">
                <tr>
                  <th scope="col" scope="row">Reg.No</th>
                  <th scope="col">Name</th>


                </tr>
          </thead>
          <tbody>
              <?php
                  if (isset($con)) {

                    $cid=$_SESSION['class_id'];
                    //this query extract student records which are enroll to that class from from database
                    $st1 ="SELECT register.Reg_no, student.student_name FROM register INNER JOIN student ON register.S_id = student.S_id WHERE register.Class_id='$cid'  ORDER BY register.Reg_no ";
                    $exe1=mysqli_query($con,$st1);
                    while ($row=mysqli_fetch_assoc($exe1)) {


                    ?>
                    <tr>
                      <th scope="row"><?php echo $row['Reg_no']; ?></th>
                      <td><?php echo $row['student_name']; ?></td>


                    </tr>
                    <?php
                    }
                  }
                  else {
                    echo "<script>  alert('Error Occur while connecting to the Database!');   </script>".mysqli_error($con);
                  }
               ?>

            </tbody>
      </table>

        <div class="tend"></div>  <!--it cover and highliting buttom area of the table -->


    </div>

<script src="../../info_forms/js/jquery.js"></script>
<script src="../..datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../../datatables/jquery.dataTables.js"></script>
    <script>
      $(function () {
        $("#example5").DataTable();
        // $('#example2').DataTable({
        //   "paging": true,
        //   "lengthChange": false,
        //   "searching": false,
        //   "ordering": true,
        //   "info": true,
        //   "autoWidth": false,
        // });
      });
    </script>
