<?php
session_start();
require "./Middleware/Authenticate.php";
require "./Middleware/ExpertAuth.php";
require "./controllers/CountRatingController.php";
require "./controllers/ExpertReportController.php";
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
	<style>
		.table th:nth-child(1),
		.table td:nth-child(1) {
			width: 50%;
		}

		.table th:nth-child(2),
		.table td:nth-child(2),
		.table th:nth-child(3),
		.table td:nth-child(3) {
			width: 25%;
		}
	</style>
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
							<span>Total Feedbacks Received: <span id="totalResponses"><?php echo $totalDataRows; ?></span></span>
							<br>
							<span>Average Ratings: <span id="averageRatings"><?php echo $averageUserRating; ?></span> ★</span>
							<br>
							<span>Total Ratings Received: <span id="totalRatings"><?php echo $totalRating; ?></span> ★</span>
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
								<select class="form-control" id="sort-period" onchange="filterTableByDate()">
									<option value="all">All</option>
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
									<th>Rating</th>
									<th>Feedback Created</th>
								</tr>
							</thead>
							<tbody id="table-body">
								<?php foreach ($postData as $post) { ?>
									<tr>
										<td id="PostTitle"><?php echo $post['PostTitle']; ?></a></td>
										<td id="Rating"><?php echo $post['UserRating']; ?></td>
										<td id="FeedbackCreated"><?php echo $post['FeedbackCreated']; ?></td>
									</tr>
								<?php } ?>
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

	<script>
		var originalRows = Array.from(document.getElementById('table-body').getElementsByTagName('tr'));

		function filterTableByDate() {
			var select = document.getElementById('sort-period');
			var selectedValue = select.value;
			var tableBody = document.getElementById('table-body');
			while (tableBody.firstChild) {
				tableBody.removeChild(tableBody.firstChild);
			}

			originalRows.forEach(function(row) {
				var feedbackCreated = row.cells[2].textContent;
				var feedbackDate = new Date(feedbackCreated);
				var currentDate = new Date();
				var timeDiff = Math.abs(currentDate.getTime() - feedbackDate.getTime());
				var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

				if (selectedValue === "all" || selectedValue === "") {
					tableBody.appendChild(row);
				} else if (selectedValue === "1day" && diffDays <= 1) {
					tableBody.appendChild(row);
				} else if (selectedValue === "7days" && diffDays <= 7) {
					tableBody.appendChild(row);
				} else if (selectedValue === "30days" && diffDays <= 30) {
					tableBody.appendChild(row);
				}
			});
			sortTableByDate();
		}

		function sortTableByDate() {
			var tableBody = document.getElementById('table-body');
			var rows = Array.from(tableBody.getElementsByTagName('tr'));

			rows.sort(function(a, b) {
				var dateA = new Date(a.cells[2].textContent);
				var dateB = new Date(b.cells[2].textContent);
				if (dateA.getTime() === dateB.getTime()) {
					var postIDA = parseInt(a.cells[0].textContent);
					var postIDB = parseInt(b.cells[0].textContent);
					return postIDB - postIDA; // Sort by PostID descendingly
				}
				return dateA - dateB;
			});

			while (tableBody.firstChild) {
				tableBody.removeChild(tableBody.firstChild);
			}

			rows.forEach(function(row) {
				tableBody.appendChild(row);
			});

			// Reverse the table rows to display in descending order
			rows.reverse().forEach(function(row) {
				tableBody.appendChild(row);
			});
		}

		document.getElementById('sort-period').value = 'all';
		filterTableByDate();
	</script>


</body>

</html>