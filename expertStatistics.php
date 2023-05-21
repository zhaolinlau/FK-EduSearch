<?php
session_start();
require "./Middleware/Authenticate.php";
require "./Middleware/ExpertAuth.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | Expert Statistics Report </title>
	<link rel="shortcut icon" href="./resources/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
</head>

<body>
	<?php require "layouts/navbar.php" ?>
	<div class="row mt-5">
		<div class="col">

		</div>
	</div>
	<div class="row" style="margin-top: 94px;">
		<div class="col">
		</div>
	</div>


	<div class="">
		<div class="col-9 mx-auto" style="margin-right: 0;">
			<div>
				<h3>Your Report</h3>
				<br>
			</div>

			<div class="d-flex justify-content-center">
				<div class="card bg-light mb-3" style="width: 85%;">
					<div class="card-header bg-primary text-white">Expert Report</div>
					<div class="card-body">
						<h5 class="card-title">Report Summary</h5>
						<p class="card-text">
							<span>Total Responses: <span id="totalResponses">X</span></span>
							<br>
							<span>Average Ratings: <span id="averageRatings">X.X</span>★</span>
							<br>
							<span>Total Ratings Received: <span id="totalRatings">X</span></span>
						</p>
					</div>
				</div>
			</div>

			<br>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<form class="form-inline">
							<div class="form-group">
								<label for="sort-period"><b>Sort by Date Period:</b></label>
								<select class="form-control" id="sort-period">
									<option value="">All</option>
									<option value="1day">Today</option>
									<option value="7days">Last 7 Days</option>
									<option value="30days">Last 30 Days</option>
								</select>
							</div>
						</form>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Post Title</th>
									<th>Post Category</th>
									<th>Rating</th>
									<th>User Feedback</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td id="PostTitle"><a href="" style="text-decoration:none;">Post title</a></td>
									<td id="PostCategory">Category</td>
									<td id="RatingStar">2023-05-01</td>
									<td id="UserFeedback">Feedback</td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>





	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./resources/js/form_validate.js"></script>
	<script src="./recources/js/livechat.js"></script>
	<script>
		document.getElementById("expert_statistics").classList.add("active");
	</script>
</body>

</html>