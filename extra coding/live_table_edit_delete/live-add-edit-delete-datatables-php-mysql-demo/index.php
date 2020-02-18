<?php
//the below header contain the cdn link which neccesary for its dispaly data
include('inc/header.php');
?>
<title>phpzag.com : Demo Live Add Edit Delete datatables Records with Ajax, PHP and MySQL</title>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/ajax.js"></script>
<!-- the below are the top home button and header data -->
<?php //include('inc/container.php');?>
<div class="container contact">
	<h2>Example: Live Add Edit Delete datatables Records with Ajax, PHP and MySQL</h2>
	<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-10">
					<h3 class="panel-title"></h3>
				</div>
				<div class="col-md-2" align="right">
					<button type="button" name="add" id="addRecord" class="btn btn-success">Add New Record</button>
				</div>
			</div>
		</div>
		<table id="recordListing" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Age</th>
					<th>Skills</th>
					<th>Address</th>
					<th>Designation</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
		</table>
	</div>
	<div id="recordModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="recordForm">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Record</h4>
    				</div>
    				<div class="modal-body">
						<div class="form-group"
							<label for="name" class="control-label">Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
						</div>
						<div class="form-group">
							<label for="age" class="control-label">Age</label>
							<input type="number" class="form-control" id="age" name="age" placeholder="Age">
						</div>
						<div class="form-group">
							<label for="lastname" class="control-label">Skills</label>
							<input type="text" class="form-control"  id="skills" name="skills" placeholder="Skills" required>
						</div>
						<div class="form-group">
							<label for="address" class="control-label">Address</label>
							<textarea class="form-control" rows="5" id="address" name="address"></textarea>
						</div>
						<div class="form-group">
							<label for="lastname" class="control-label">Designation</label>
							<input type="text" class="form-control" id="designation" name="designation" placeholder="Designation">
						</div>
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="id" id="id" />
    					<input type="hidden" name="action" id="action" value="" />
    					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>
</div>
<?php //include('inc/footer.php');?>
