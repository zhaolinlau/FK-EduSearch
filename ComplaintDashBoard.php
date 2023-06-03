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
	<title>FK-EduSearch | Complaint Dashboard</title>
	<link rel="shortcut icon" href="./src/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
</head>

<body class="h-100">
<?php require "layouts/navbar.php" ?>
		<div class="col">
			<div style="width: 800px;  margin: 0 auto; margin-top:80px"><br>
	&nbsp &nbsp<label class="text2">Complaint</label>
	<hr>
	<button type="button" class="btn btn-primary btn-1g" style="padding:30px 30px; margin-right:30px;" onclick="window.location.href='SearchComplaint.php'">All Complaint Information</button>
  <button type="button" class="btn btn-secondary btn-1g" style="padding:30px 30px; margin-right:30px;"onclick="window.location.href='CalculationofComplaints.php'">Calculation of Complaints</button>
	<button type="button" class="btn btn-info btn-1g" style="padding:30px 30px; margin-right:30px;"onclick="window.location.href='ReportofComplaints.php'">Report of Complaints</button>
</div>
		</div>
	</div>
	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./resources/js/livechat.js"></script>

</body>

</html>
