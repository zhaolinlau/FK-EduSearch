<?php
session_start();
require "./Middleware/Authenticate.php";
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | User Profile</title>
	<link rel="shortcut icon" href="./resources/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
</head>

<body class="h-100">
	<?php require "layouts/navbar.php" ?>
	<div class="container h-100 d-flex align-items-center justify-content-center">
		<div class="row">
			<div class="col-12">
				<div class="shadow rounded-5 p-5">
					<?php
					try {
						require "./config/db.php";
						$stmt = $conn->prepare("SELECT * FROM user WHERE UserID=:UserID");
						$stmt->bindParam(':UserID', $_GET['UserID']);
						$stmt->execute();
						$result = $stmt->fetchAll(PDO::FETCH_OBJ);
						if ($stmt->rowCount() > 0) :
							foreach ($result as $row) :
					?>
								<form action="./controllers/EditUserController.php" class="row g-3 needs-validation" method="post" novalidate>
									<div class="row">
										<div class="col-11">
											<h3>Profile Information</h3>
										</div>
										<div class="col-1 justify-content-end d-flex">
											<button type="button" class="btn btn-danger" onclick="history.back();">Close</button>
										</div>
									</div>

									<div class="col-6 d-none">
										<label for="user_id" class="form-label">User ID</label>
										<input type="text" class="form-control" value="<?php echo $row->UserID; ?>" name="user_id" id="user_id" readonly required>
										<div class="invalid-feedback">
											You are disallowed to modify this field.
										</div>
									</div>

									<div class="col-6">
										<label for="username" class="form-label">Username</label>
										<input type="text" class="form-control" value="<?php echo $row->UserName; ?>" name="username" id="username" required>
										<div class="invalid-feedback">
											Please enter an username.
										</div>
									</div>

									<div class="col-6">
										<label for="email" class="form-label">Email</label>
										<input type="email" class="form-control" value="<?php echo $row->UserEmail; ?>" name="email" id="email" required>
										<div class="invalid-feedback">
											Please enter an email.
										</div>
									</div>

									<div class="col-6">
										<label for="role">Role</label>
										<select name="role" class="form-select" id="role" disabled required>
											<option value="<?php echo $row->UserRole; ?>" hidden selected>
												<?php
												if ($row->UserRole == 0) :
													echo "Admin";
												elseif ($row->UserRole == 1) :
													echo "Expert";
												elseif ($row->UserRole == 2) :
													echo "Staff";
												elseif ($row->UserRole == 3) :
													echo "Student";
												endif;
												?>
											</option>
											<option value="0">Admin</option>
											<option value="1">Expert</option>
											<option value="2">Staff</option>
											<option value="3">Student</option>
										</select>
										<div class="invalid-feedback">
											Please select a role.
										</div>
									</div>
									<?php if (($row->UserRole == 0) || ($row->UserRole == 2)) : ?>
										<div class="col-6">
											<label for="staff_id">Staff ID</label>
											<input type="text" class="form-control" value="<?php echo $row->StaffID; ?>" name="staff_id" id="staff_id" required>
											<div class="invalid-feedback">
												Please enter a staff id.
											</div>
										</div>

									<?php elseif ($row->UserRole == 1) : ?>
										<div class="col-6">
											<label for="staff_id">Expert ID</label>
											<input type="text" value="<?php echo $row->ExpertID; ?>" class="form-control" name="expert_id" id="expert_id" required>
											<div class="invalid-feedback">
												Please enter a expert id.
											</div>
										</div>

									<?php elseif ($row->UserRole == 3) : ?>
										<div class="col-6">
											<label for="student_id">Student ID</label>
											<input type="text" class="form-control" value="<?php echo $row->StudentID; ?>" name="student_id" id="student_id" required>
											<div class="invalid-feedback">
												Please enter a student id.
											</div>
										</div>
									<?php endif; ?>
									<div class="col-12">
										<input type="submit" onclick="return confirm('Confirm update?');" class="btn btn-primary" name="update" value="Update">
									</div>
								</form>
					<?php
							endforeach;
						endif;
					} catch (PDOException $e) {
						echo $e->getMessage();
					}
					?>

					<form class="row needs-validation mt-5 g-3" action="index.html" method="post" novalidate>
						<h3>Change Password</h3>
						<div class="col-6">
							<label for="new_password" class="form-label">New Password</label>
							<input type="password" class="form-control" name="new_password" id="new_password" disabled required>
							<div class="invalid-feedback">
								Please enter your new password.
							</div>
						</div>
						<div class="col-6">
							<label for="confirm_password" class="form-label">Confirm Password</label>
							<input type="password" class="form-control" name="confirm_password" id="confirm_password" disabled required>
							<div class="invalid-feedback">
								Please confirm your new password.
							</div>
						</div>
						<div class="col-12">
							<button type="button" class="btn btn-light" onclick="locker();">Unlock</button>
							<input type="submit" class="btn btn-primary" name="change_password" value="Change Password">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./resources/js/livechat.js"></script>
	<script src="./resources/js/form_validate.js"></script>
	<script>
		document.getElementById("user_list").classList.add("active");

		function locker() {
			const inputs = document.querySelectorAll(["#new_password", "#confirm_password"]);

			inputs.forEach(input => {
				input.disabled = !input.disabled;
			});
		}
	</script>
</body>

</html>
