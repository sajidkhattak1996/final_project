<?php
// $connect = mysqli_connect("localhost", "root", "", "testing");
include_once('../../db_connection.php');
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
					<table class="table table-striped  table-bordered table-hover table-sm">
						<thead>
						<tr class="bg-primary">
								<th colspan="2">Class NO</th>
								<th colspan="2">Name</th>

						</tr>
						</thead>
						';
	while($row = mysqli_fetch_array($result))
	{
		$query2="
		SELECT attendence_record.AT_date,attendence.status FROM attendence_record
		INNER JOIN attendence ON attendence_record.AT_id=attendence.AT_id
		WHERE attendence_record.Class_id='".$cid."' AND attendence_record.S_id='".$row['S_id']."'
		";
		$output .= '
		<tbody class="bg-light">
			<tr class="alert-primary">
		 		<td colspan="2" class="font-weight-bold alert-primary">'.$row["Reg_no"].'</td>
				<td colspan="2" class="font-weight-bold alert-primary">'.$row["student_name"].'</td>
			</tr>
		';
		$exe_q2=mysqli_query($con ,$query2);
		if (mysqli_num_rows($exe_q2)>0) {
			$output .='
				<tr class="alert-success">
				  <td colspan="2">Attendance Date	</td>
					<td colspan="2">Attendance Status	</td>
				</tr>
			';
			while ($rr=mysqli_fetch_assoc($exe_q2)) {
				$output .='
					<tr>
				  	<td colspan="2"> '.$rr['AT_date'].'  </td>
						<td colspan="2"> '.$rr['status'].'  </td>
					</tr>
				';
			}
			$output .='		</tbody> ';

		}else {
					$output .='
					<tr><td colspan="3" class="alert alert-warning text-center font-weight-bold">No Attendance  </td></tr>
					';
		}
	}
	echo $output;


}
else
{
	echo 'Data Not Found';
}
?>
