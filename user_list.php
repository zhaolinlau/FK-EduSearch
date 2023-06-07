<?php
session_start();
require "./Middleware/Authenticate.php";
require "./Middleware/AdminAuth.php";
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
				<h3>User List</h3>
			</div>
			<div class="col-12">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#user_form">
					Add User
				</button>
			</div>
			<div class="col-12">
				<div class="table-responsive w-100">
					<table class="table table-hover table-bordered w-100" id="user_table">
						<thead>
							<tr>
								<th>No</th>
								<th>Username</th>
								<th>Email</th>
								<th>Role</th>
								<th>Modification</th>
								<th>Deletion</th>
							</tr>
						</thead>
						<tbody>
							<?php
							try {
								require "./config/db.php";
								$stmt = $conn->prepare("SELECT * FROM user ORDER BY UserID DESC");
								$stmt->execute();
								$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
								$count = 1;

								foreach ($result as $row) :
							?>
									<tr>
										<td><?php echo $count++; ?></td>
										<td><?php echo $row["UserName"]; ?></td>
										<td><a href="mailto:<?php echo $row["UserEmail"]; ?>"><?php echo $row["UserEmail"]; ?></a></td>
										<td>
											<?php
											if ($row["UserRole"] == 0) :
												echo "Admin";
											elseif ($row["UserRole"] == 1) :
												echo "Expert";
											elseif ($row["UserRole"] == 2) :
												echo "Staff";
											elseif ($row["UserRole"] == 3) :
												echo "Student";
											endif;
											?>
										</td>
										<td class="text-center">
											<a class="btn btn-info" href="./user_profile.php?UserID=<?php echo $row["UserID"]; ?>">View</a>
										</td>
										<td class="text-center"><a class="btn btn-danger" href="./Controllers/DeleteUserController.php?UserID=<?php echo $row["UserID"]; ?>" onclick="return confirm('Are you sure to delete <?php echo $row['UserName']; ?> ?')">Delete</a></td>
									</tr>
							<?php
								endforeach;
							} catch (PDOException $e) {
								echo $e->getMessage();
							}
							?>
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
					<h5 class="modal-title">Add User</h5>
				</div>
				<form action="./Controllers/AddUserController.php" class="needs-validation" method="post" novalidate>
					<div>
						<label for="username" class="form-label">Username</label>
						<input type="text" class="form-control" name="username" id="username" required>
						<div class="invalid-feedback">
							Please enter an username.
						</div>
					</div>
					<div>
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" required>
						<div class="invalid-feedback">
							Please enter a password.
						</div>
					</div>
					<div>
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" id="email" required>
						<div class="invalid-feedback">
							Please enter an email.
						</div>
					</div>
					<div>
						<label for="role">Role</label>
						<select name="role" class="form-select" id="role" required>
							<option value="" selected></option>
							<option value="0">Admin</option>
							<option value="1">Expert</option>
							<option value="2">Staff</option>
							<option value="3">Student</option>
						</select>
						<div class="invalid-feedback">
							Please select a role.
						</div>
					</div>

					<div id="staff">
						<label for="staff_id">Staff ID</label>
						<input type="text" class="form-control" name="staff_id" id="staff_id">
						<div class="invalid-feedback">
							Please enter a staff id.
						</div>
					</div>

					<div class="col-6">
						<label for="staff_id">Expert ID</label>
						<input type="text" class="form-control" name="expert_id" id="expert_id">
						<div class="invalid-feedback">
							Please enter a expert id.
						</div>
					</div>

					<div id="student">
						<label for="student_id">Student ID</label>
						<input type="text" class="form-control" name="student_id" id="student_id">
						<div class="invalid-feedback">
							Please enter a student id.
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
	<script>
		document.getElementById("user_list").classList.add("active");
		$.fn.dataTable.Buttons.defaults.dom.button.className =
			"btn btn-outline-primary";
		$("#user_table").DataTable({
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
