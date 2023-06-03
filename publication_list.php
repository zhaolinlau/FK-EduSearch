<?php
session_start();
require "./Middleware/Authenticate.php";
require "./Middleware/ExpertAuth.php";
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | User List</title>
	<link rel="shortcut icon" href="./resources/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="./node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="./node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
	<link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css" rel="stylesheet" />
</head>

<body class="h-100">
	<?php require "layouts/navbar.php" ?>
	<div class="container h-100 d-flex align-items-center">
		<div class="row w-100 g-3">
			<div class="col-12">
				<h3>Publication List</h3>
			</div>
			<div class="col-12">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#user_form">
					Add Publication
				</button>
			</div>
			<div class="col-12">
				<div class="table-responsive w-100">
					<table class="table table-hover table-bordered w-100" id="user_table">
						<thead>
							<tr>
								<th style="width:20%;">Publication Date</th>
								<th style="width:50%;">Publication Title</th>
								<th style="width:20%;">Deletion</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Date</td>
								<td>Title</td>
								<td class="text-center"><a class="btn btn-danger">Delete</a></td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="user_form" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content px-5 py-3">
				<div class="modal-header">
					<h5 class="modal-title">Add Publication</h5>
				</div>
				<form action="" class="needs-validation" method="post" novalidate>
					<div>
						<label for="PublicationDate" class="form-label">Publication Date</label>
						<input type="text" class="form-control" name="PublicationDate" id="PublicationDate" required>
						<div class="invalid-feedback">
							Please enter a date.
						</div>
					</div>
					<div>
						<label for="PublicationTitle">Publication Title</label>
						<input type="password" class="form-control" name="PublicationTitle" id="PublicationTitle" required>
						<div class="invalid-feedback">
							Please enter the title.
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" name="create" value="Create">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./resources/js/form_validate.js"></script>
	<script src="./resources/js/livechat.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js"></script>

</body>

</html>