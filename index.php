<?php

include "db.php";
$db = db_connection();

$fetchSql = "SELECT * FROM crud_table WHERE del_status = 0";
$fetchRsql = mysqli_query($db, $fetchSql);

if(isset($_POST['data_submit'])){
	$id 		  = $_POST['id'];
	$name 		  = $_POST['name'];
	$mobileNumber = $_POST['mobileNumber'];
	$emailId	  = $_POST['emailId'];
	$gender 	  = $_POST['gender'];
	$dateOfBirth  = $_POST['dateOfBirth'];

	if(isset($id) > 0){
		$updateSql = "UPDATE crud_table SET name='".$name."', mobile_no='".$mobileNumber."', email_id='".$emailId."', gender='".$gender."', date_of_birth='".$dateOfBirth."', updated_on='".date('Y-m-d H:i:s')."' WHERE id = '".$id."'";
		$updateRsql = mysqli_query($db, $updateSql);
		header("location:index.php");
	} else {
		$InsertSql = "INSERT INTO crud_table SET name='".$name."', mobile_no='".$mobileNumber."', email_id='".$emailId."', gender='".$gender."', date_of_birth='".$dateOfBirth."', added_on='".date('Y-m-d H:i:s')."'";
		$InsertRsql = mysqli_query($db, $InsertSql);
		header("location:index.php");
	}
	
}

if(isset($_GET['del_id'])){
	$delSql = "UPDATE crud_table SET del_status = 1, deleted_on = '".date('Y-m-d H:i:s')."' WHERE id = '".$_GET['del_id']."'";
	$delRsql = mysqli_query($db, $delSql);
	header('location:index.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>CRUD Table</title>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto|Varela+Round'>
	<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="container">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>CRUD Table</h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New </span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>S No</th>
						<th>Name</th>
						<th>Mobile Number</th>
						<th>Email Id</th>
						<th>Gender</th>
						<th>Date of Birth</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $sno = 1; foreach($fetchRsql as $data){ ?>
					<tr>
						<td><?= $sno ?></td>
						<td><?= $data['name'] ?></td>
						<td><?= $data['mobile_no'] ?></td>
						<td><?= $data['email_id'] ?></td>
						<td><?= $data['gender'] ?></td>
						<td><?= $data['date_of_birth'] ?></td>
						<td>
							<a href="#editEmployeeModal" class="edit" onclick="edit_data(<?= $data['id'] ?>);" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="index.php?del_id=<?= $data['id'] ?>" class="delete" onclick="return confirm('Are you sure you want to Delete...');" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<?php $sno++; } ?>
				</tbody>
			</table>
		</div>
    </div>

    <!-- Add Modal -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="index.php" method="post" enctype="multipart/form-data" autocomplete="off">
					<div class="modal-header">
						<h4 class="modal-title">Add Data</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
						</div>
						<div class="form-group">
							<label>Mobile Number</label>
							<input type="number" name="mobileNumber" id="mobileNumber" class="form-control" placeholder="Mobile Number" required>
						</div>
						<div class="form-group">
							<label>Email Id</label>
							<input type="email" name="emailId" id="emailId" class="form-control" placeholder="Email Id" required>
						</div>
						<div class="form-group">
							<label>Gender</label>
							<select name="gender" id="gender" class="form-control" required="required">
								<option value="" selected>Select</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="form-group">
							<label>Date of Birth</label>
							<input type="date" name="dateOfBirth" id="dateOfBirth" class="form-control" placeholder="Date of Birth" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="data_submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
    </div>
    <!-- Edit Modal -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="index.php" method="post" enctype="multipart/form-data" autocomplete="off">
					<div class="modal-header">
						<h4 class="modal-title">Edit Data</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<input type="hidden" name="id" id="editId" value="">
					<div class="modal-body">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" id="editName" class="form-control" placeholder="Name" required>
						</div>
						<div class="form-group">
							<label>Mobile Number</label>
							<input type="number" name="mobileNumber" id="editMobileNumber" class="form-control" placeholder="Mobile Number" required>
						</div>
						<div class="form-group">
							<label>Email Id</label>
							<input type="email" name="emailId" id="editEmailId" class="form-control" placeholder="Email Id" required>
						</div>
						<div class="form-group">
							<label>Gender</label>
							<select name="gender" id="editGender" class="form-control" required="required">
								<option value="" selected>Select</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="form-group">
							<label>Date of Birth</label>
							<input type="date" name="dateOfBirth" id="editDateOfBirth" class="form-control" placeholder="Date of Birth" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="data_submit" class="btn btn-success" value="Submit">
					</div>
				</form>
			</div>
		</div>
    </div>
    <!-- partial -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src="./script.js"></script>

	<script>
		function edit_data(id){
			$.ajax({
				url:"ajax.php",
				method:"POST",
				data:{action:'fetch_data', id:id},
				dataType:"json",
				success:function(data){
					$('#editId').val(data.id);
					$('#editName').val(data.name);
					$('#editMobileNumber').val(data.mobile_no);
					$('#editEmailId').val(data.email_id);
					$('#editGender').val(data.gender);
					$('#editDateOfBirth').val(data.date_of_birth);
				}
			});
		}
	</script>


</body>

</html>