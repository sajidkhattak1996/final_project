<?php
// $connect = mysqli_connect("localhost", "root", "", "testing");
include_once('../db_connection.php');
$output = '';
$cid=$_POST['id'];
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);

	$sid_stmt="
	SELECT register.Class_id,register.S_id,register.Reg_no,student.student_name FROM register
	INNER JOIN student ON register.S_id=student.S_id
	WHERE register.Class_id='".$cid."'
	AND register.Reg_no LIKE '%".$search."%'
	OR student.student_name LIKE '%".$search."%'
	AND register.Class_id='".$cid."'
	ORDER BY register.Reg_no ASC

";


}
else
{
	$sid_stmt="SELECT register.S_id,register.Reg_no,student.student_name FROM register INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='$cid' ORDER BY register.Reg_no ASC";
	$stmt_atd="
	SELECT attendence_record.S_id,attendence_record.AT_date,attendence.status FROM attendence_record
	INNER JOIN attendence ON attendence_record.AT_id=attendence.AT_id WHERE attendence_record.S_id IN(SELECT register.S_id FROM register
	INNER JOIN student ON register.S_id=student.S_id WHERE register.Class_id='".$cid."')
";


}
$result = mysqli_query($con, $sid_stmt);
if(mysqli_num_rows($result) > 0)
{

	$output .= '<div class="table-responsive">
					<table id="p" class="table table-striped  table-bordered table-hover table-sm">
						<thead>
						<tr class="bg-primary">
								<th width="50%">Class NO</th>
								<th width="50%">Name</th>
						</tr>
						</thead>
						<tbody class="bg-light">
						';
	while($row = mysqli_fetch_array($result))
	{
		$query2="
		SELECT attendence_record.AT_date,attendence.status FROM attendence_record
		INNER JOIN attendence ON attendence_record.AT_id=attendence.AT_id
		WHERE attendence_record.Class_id='".$cid."' AND attendence_record.S_id='".$row['S_id']."'
		";
		$output .= '
			<tr class="alert-primary" style="border-top:solid 2px blue;border-left:solid 4px blue;border-right:solid 2px blue;">
		 		<td class="font-weight-bold alert-primary">'.$row["Reg_no"].'</td>
				<td class="font-weight-bold alert-primary">'.$row["student_name"].'</td>
			</tr>
		';
		$exe_q2=mysqli_query($con ,$query2);
		if (mysqli_num_rows($exe_q2)>0) {
			$output .='
				<tr class="alert-success" style="border-left:solid 4px blue;border-right:solid 2px blue;">
				  <td>Attendance Date	</td>
					<td>Attendance Status	</td>
				</tr>
			';
			while ($rr=mysqli_fetch_assoc($exe_q2)) {
				$output .='
					<tr>
				  	<td> '.$rr['AT_date'].'  </td>
						<td> '.$rr['status'].'  </td>
					</tr>
				';
			}

		}else {
					$output .='
					<tr><td colspan="2" class="alert alert-warning text-center font-weight-bold">No Attendance  </td></tr>
					';
		}
	}
	$output .='
	</tbody>
	</table>
	 ';
	echo $output;


}
else
{
	echo '<div class="alert alert-warning font-weight-bold text-center">Attendance Not Found</div>';
}
?>
<script src="../datatables/jquery.dataTables.js"></script>
<script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    // $("#example1").DataTable();
    $('#p').DataTable({
      "paging": true,
			"lengthMenu": [[10, 50, 100,500, -1], [10, 50, 100, 500, "All"]],
			"pageLength": 100,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
