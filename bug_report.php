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
		<div class="row">
			<div class="col-8 mx-auto">
				<form action="./controllers/ReportBugController.php" class="row m-5 shadow p-4 rounded-5 g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
					<?php if (isset($_SESSION['reported'])) : ?>
						<div class="col-12 alert alert-success alert-dismissible fade show" role="alert">
							<i class="bi bi-exclamation-triangle-fill h5"></i> <?php echo $_SESSION['reported']; ?>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php
						unset($_SESSION['reported']);
					endif;
					?>
					<div class="col-12">
						<h3>Bug Report</h3>
					</div>
					<div class="col-12">
						<label for="bug_title" class="form-label">Bug Title</label>
						<input type="text" class="form-control" name="bug_title" id="bug_title" required>
						<div class="invalid-feedback">
							Please enter a bug title.
						</div>
					</div>
					<div class="col-12">
						<label for="bug_description" class="form-label">Bug Description</label>
						<textarea name="bug_description" class="form-control" id="bug_description" maxlength="255" cols="100" rows="5" required></textarea>
						<div class="invalid-feedback">
							Please describe the bug.
						</div>
					</div>
					<div class="col-12">
						<label for="screenshot">Screenshot (JPG/PNG)</label>
						<input type="file" class="form-control" name="screenshot" accept="image/jpeg,image/x-png" required>
						<div class="invalid-feedback">
							Please upload a screenshot of the bug.
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
