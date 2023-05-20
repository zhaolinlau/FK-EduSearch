<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | Dashboard</title>
	<link rel="shortcut icon" href="./resources/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body class="h-100">
	<nav class="navbar navbar-expand-lg shadow-sm">
		<div class="container-fluid">
			<a class="navbar-brand" href="./">
				<img src="./logo.png" class="rounded-circle" width="50px">
				<span class="mx-3 fw-bold">FK-EduSearch</span>
			</a>

		</div>
	</nav>
	<div class="row h-100">
		<div class="col-3 h-100">
			<div class="offcanvas-lg offcanvas-end p-2 h-100" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
				<div class="offcanvas-body h-100">
					<ul class="nav nav-pills flex-column h-100 border-end pe-5 ps-4">
						<li class="nav-item mt-3">
							<a class="nav-link border" href="#">User Profile</a>
						</li>
						<li class="nav-item">
							<a class="nav-link border" href="#">Discussion Board</a>
						</li>
						<li class="nav-item">
							<a class="nav-link border" href="#">Report</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#">Complaint</a>
						</li>
						<li class="nav-item">
							<a class="nav-link border" href="#"><b>Log Out</b></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col">
			<div style="width: 800px;"><br>
				&nbsp &nbsp<label class="text2">Complaint</label>
				<hr>
				<button type="button" class="btn btn-primary btn-1g" style="padding:30px 30px; margin-right:30px;">All Complaint Information</button>
				<button type="button" class="btn btn-secondary btn-1g" style="padding:30px 30px; margin-right:30px;">Calculation of Complaints</button>
				<button type="button" class="btn btn-info btn-1g" style="padding:30px 30px; margin-right:30px;">Report of Complaints</button>
			</div>
		</div>
	</div>
	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./resources/js/livechat.js"></script>

</body>

</html>