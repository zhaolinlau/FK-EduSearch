<?php
session_start();
require "./Middleware/Authenticate.php";
require "./Middleware/AdminAuth.php";
require './config/db.php';
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | Bug List</title>
	<link rel="shortcut icon" href="./resources/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="./node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="./node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
	<link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css" rel="stylesheet" />
</head>

<body class="h-100">
	<?php require "./layouts/navbar.php"; ?>
	<div class="container h-100 d-flex align-items-center">
		<div class="row w-100">
			<div class="col-12">
				<div class="table-responsive w-100">
					<table class="table table-hover w-100" id="bug_table">
						<h3>Bug List</h3>
						<thead>
							<tr>
								<th>No.</th>
								<th>Bug Description</th>
								<th>Reported By</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$stmt = $conn->prepare('SELECT * FROM user JOIN bug ON user.UserID = bug.UserID');
							$stmt->execute();
							$bugs = $stmt->fetchAll(PDO::FETCH_OBJ);
							foreach($bugs as $bug) : ?>
							<tr>
								<td>1</td>
								<td>Unable to create post.</td>
								<td>UserID: 253</td>
								<td><a href="#" class="btn btn-success" onclick="confirm('Are you sure the bug has been resolved?');">Resolved</a></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
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
	<script>
		document.getElementById("bug_list").classList.add("active");
		$.fn.dataTable.Buttons.defaults.dom.button.className =
			"btn btn-outline-primary";
		$("#bug_table").DataTable({
			language: {
				searchPlaceholder: "Search by a field...",
			},
			dom: "Bfrtip",
			buttons: [
				"colvis",
				"pageLength",
				{
					extend: "collection",
					text: "Export",
					buttons: ["csv", "excel", "pdf"],
				},
				"print",
			],
		});
	</script>
</body>

</html>
