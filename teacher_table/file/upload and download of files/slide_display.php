<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" />
	<title>Download Files</title>
	<style type="text/css">
	#wrapper {
	margin: 0 auto;
	float: none;
	width:70%;
}
.header {
	padding:10px 0;
	border-bottom:1px solid #CCC;
}
.title {
	padding: 0 5px 0 0;
	float:left;
	margin:0;
}
.container form input {
	height: 30px;
}
body
{

    font-size:14;
    font-weight:bold;
}
		</style>
</head>
<body  align="center">

<br>
<div class="container home">
<font face="comic sans ms">
<h3><center> List of Files the can be download </center> </h3>
</font>

 <table class="table table-bordered">
  <thead>
   <tr>
    <th><font face="comic sans ms">id</font></th>
		<th><font face="comic sans ms">Topic </font></th>
    <th><font face="comic sans ms">Date </font></th>
		<th><font face="comic sans ms">Download Files </font></th>
		<th><font face="comic sans ms">Class id  </font></th>
		<th><font face="comic sans ms">Delete </font></th>
  </tr>
   </thead>
    <tbody>
                        <?php

	include('connection.php');

	$q="SELECT * FROM slide ORDER BY id ASC ";
	$ros=mysqli_query($con,$q);

	while($row=mysqli_fetch_array($ros))
	{
		echo '<tr>';
		echo '<td align=center>' . $row['id'];
		echo '<td align=center>' . $row['topic'];
		echo '<td align=center>' .$row['c_date'];
		echo "<td align=center><a title='Click here to download in file.'
		     href='slide_download.php?id={$row['file']}'>{$row['file']} </a>";
	 echo '<td align=center>' . $row['Class_id'];
	 ?>
	 <td>
  <a href="slide_deleteById.php?id=<?php echo $row['id'] ?> ">
 <button class="btn btn-danger" title="Click here to erase file."> Delete </button>
 	</a>
 	</td>
	<?php
		echo '</tr>';

	}
	echo '</table>';
	echo  '</tbody>';
	echo '<br/>';


?>

</div>
</body>
</html>
