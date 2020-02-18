<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Search for the attendance</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	</head>
	<body>
		<div class="container">
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Search</span>
					<input type="text" name="search_text" id="search_text" placeholder="Search by Student name or class no" class="form-control" />
					<input type="text" name=""  id="cid" value="<?php echo "1227"; ?>">
				</div>
			</div>
			<div id="result"></div>
		</div>
		<div style="clear:both"></div>
	</body>
</html>

<script>
$(document).ready(function(){
	var i =$('#cid').val();
	load_data('',i);
	function load_data(query,id)
	{
		$.ajax({
			url:"fetch.php",
			method:"post",
			data:{query:query,id:id},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}

	$('#search_text').keyup(function(){
		var search = $(this).val();
		var i =$('#cid').val();

		if(search != '')
		{
			load_data(search,i);
		}
		else
		{
			load_data('',i);
		}
	});
});
</script>
