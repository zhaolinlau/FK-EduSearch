<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | Admin Dashboard</title>
	<link rel="shortcut icon" href="./src/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
	<h1>Admin</h1>
	<h1></h1>
	<form action="./controllers/create.php" class="needs-validation" method="post" novalidate>
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
				<option value="2">Lecturer</option>
				<option value="3">Student</option>
			</select>
			<div class="invalid-feedback">
				Please select a role.
			</div>
		</div>
		<input type="submit" class="btn btn-primary" name="create" value="Create">
	</form>
	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./js/form_validate.js"></script>
	<script src="./src/plugins/livechat.js"></script>
</body>

</html>