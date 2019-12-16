<?php
if($_POST['page'])
{
$page = $_POST['page'];
$cur_page = $page;
$page -= 1;
$per_page = 10;
$previous_btn = true;
$next_btn = true;
$first_btn = true;
$last_btn = true;
$start = $page * $per_page;
include ('connect.php');

$query_pag_data = "SELECT * FROM up_files ORDER BY ID DESC LIMIT $start, $per_page";
$result_pag_data = mysqli_query($con,$query_pag_data);
$msg = "";
while ($details = mysqli_fetch_array($result_pag_data)) {
    $msg .= "<tbody>
				 <tr valign='top'>
                    <td>".$details['id']."</td>
				 <td align='left'>
					<strong>File Name : </strong> ".$details['fname']." <br />
					<strong>File Descripitons : </strong> ".$details['fdesc']." <br />
					<strong>File Uploader : </strong> ".$details['fuplder']." <br />
				    <strong>Uploaded On : </strong> ".$details['fdatein']." <br />

				 </td>

				    <td align='left'>
						<a href='".$details['floc']."' alt='Download' title='Download' class='btn btn-primary' target='_blank' >Download</a>
					</td>
				</tr>
    		</tbody>

    ";


}
//$msg = "<div class='data'><table>" . $msg . "</table></div>"; // Content for Data
$msg = "
<div class='data'>
<table border='0' cellspacing='1' width='100%' align='center' class='table table-bordered'>
            <thead  class='table_headers'>
                <tr>
                    <th><strong>S/N</strong></th>
                    <th><strong>File Descriptions</strong></th>
                    <th><strong>Actions</strong></th>
                </tr>
            </thead>
	" . $msg . "
</table>
</div>";


/* --------------------------------------------- */
$query_pag_num = "SELECT COUNT(*) AS count FROM up_files";
$result_pag_num = mysqli_query($con,$query_pag_num);
$row = mysqli_fetch_array($result_pag_num);
$count = $row['count'];
$no_of_paginations = ceil($count / $per_page);

/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
if ($cur_page >= 7) {
    $start_loop = $cur_page - 3;
    if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
    } else {
        $end_loop = $no_of_paginations;
    }
} else {
    $start_loop = 1;
    if ($no_of_paginations > 7)
        $end_loop = 7;
    else
        $end_loop = $no_of_paginations;
}
/* ----------------------------------------------------------------------------------------------------------- */
$msg .= "<div class='pagination'><ul align='left'>";

// FOR ENABLING THE FIRST BUTTON
if ($first_btn && $cur_page > 1) {
    $msg .= "<li p='1' class='active btn btn-sm'>First</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive btn btn-sm'>First</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre' class='active btn btn-sm'>Previous</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive btn btn-sm'>Previous</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
    else
        $msg .= "<li p='$i' class='active'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' class='active btn btn-sm'>Next</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive btn btn-sm'>Next</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' class='active btn btn-sm'>Last</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactive btn btn-sm'>Last</li>";
}
$goto = "<input type='text' class='goto' size='1' style='margin-top:5px;margin-left:60px;'/><input type='button' id='go_btn' class='btn btn-sm' value='Go'/>";
$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
$msg = $msg . "</ul>" . $goto . $total_string . "</div>";  // Content for pagination
echo $msg;


}
