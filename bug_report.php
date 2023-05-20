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
	<title>FK-EduSearch | Bug Report</title>
	<link rel="shortcut icon" href="./resources/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
</head>

<body class="h-100">
	<?php require "./layouts/navbar.php"; ?>
	<div class="container h-100 d-flex align-items-center justify-content-center">
		<div class="row w-100">
			<div class="col-12 w-100 d-flex justify-content-center">
				<form action="#" class="row g-3 needs-validation" method="post" novalidate>
					<div class="col-12">
						<label for="bug_description" class="form-label">Bug Description</label>
						<textarea name="bug_description" class="form-control" id="bug_description" cols="100" rows="10" required></textarea>
						<div class="invalid-feedback">
							Please describe the bug.
						</div>
					</div>
					<div class="col-12">
						<input type="submit" class="btn btn-primary" name="report" value="Report">
						<input type="reset" class="btn btn-light" value="Reset">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./resources/js/livechat.js"></script>
	<script src="./resources/js/form_validate.js"></script>
	<script>
		document.getElementById("bug_report").classList.add("active");
	</script>
</body>

</html>