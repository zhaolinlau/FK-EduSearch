<?php
session_start();
require "./Middleware/Authenticate.php";
require './Middleware/AdminAuth.php';
require './config/db.php';
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AnalyticsManagement/Admin-UI</title>
	<link rel="shortcut icon" href="./resources/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="./node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="./node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
	<link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css" rel="stylesheet" />
</head>

<body>
	<?php require "layouts/navbar.php" ?>

	<div class="row justify-content-center d-flex bg-light py-5">
		<div class="col-4 my-auto">
			<div class="shadow bg-white">
				<?php
				$stmt = $conn->prepare('SELECT COUNT(*) AS admins FROM user WHERE userRole = 0');
				$stmt->execute();
				$admins = $stmt->fetchAll(PDO::FETCH_OBJ);
				$total_admins = $admins[0]->admins;

				$stmt = $conn->prepare('SELECT COUNT(*) AS experts FROM user WHERE userRole = 1');
				$stmt->execute();
				$experts = $stmt->fetchAll(PDO::FETCH_OBJ);
				$total_experts = $experts[0]->experts;

				$stmt = $conn->prepare('SELECT COUNT(*) AS lecturers FROM user WHERE userRole = 2');
				$stmt->execute();
				$lecturers = $stmt->fetchAll(PDO::FETCH_OBJ);
				$total_lecturers = $lecturers[0]->lecturers;

				$stmt = $conn->prepare('SELECT COUNT(*) AS students FROM user WHERE userRole = 3');
				$stmt->execute();
				$students = $stmt->fetchAll(PDO::FETCH_OBJ);
				$total_students = $students[0]->students;
				?>
				<canvas id="users"></canvas>
			</div>
		</div>

		<div class="col-3">
			<canvas id="UserActivity" style="background-color: #fff8e1; margin-top: 20px;"></canvas>
			<h3 style="text-align: center;">User Activity</h3>
		</div>

		<div class="col-12">
			<div class="container"> <br>
				&nbsp &nbsp<label class="text3 fs-3">Report List</label>
				<hr>
				<div id="alertContainer"></div>
				<table class="table w-100">
					<thead>
						<tr>
							<th scope="col">No.</th>
							<th scope="col">Comment ID</th>
							<th scope="col">Reported By</th>
							<th scope="col">Report Description</th>
							<th scope="col">Reported On</th>
							<th scope="col" style="width: 240px;">Report Status</th>
							<th scope="col">Operation</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td>5534646723</td>
							<td>234512</td>
							<td>Go kill yourself you fucking bitch you deserve be raoe just die bitch!</td>
							<td>2023/05/27 07:48:12</td>
							<td>
								<select class="form-select" aria-label="Complaint Status">
									<option selected>Select Report Status</option>
									<option value="1">In Investigation</option>
									<option value="2">On Hold</option>
									<option value="3">Resolved</option>
								</select>
							</td>
							<td>
								<ul class="list-inline">
									<li class="list-inline-item">
										<button type="button" class="btn btn-primary" onclick="showAlert()">Update</button>
									</li>
								</ul>
							</td>
						</tr>


						<th scope="row">2</th>
						<td>9476923039</td>
						<td>758023</td>
						<td>How can I commit suicide wihtout pain?</td>
						<td>2023/08/07 13:25:32</td>
						<td><select class="form-select" aria-label="Complaint Status">
								<option selected>Select Report Status</option>
								<option value="1">In Investigation</option>
								<option value="2">On Hold</option>
								<option value="3">Resolved</option>
							</select></td>
						<td>
							<ul class="list-inline">
								<li class="list-inline-item">
									<button type="button" class="btn btn-primary" onclick="showAlert()">Update</button>
								</li>
								</li>
								</li>
							</ul>
						</td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>1043465349</td>
							<td>884394</td>
							<td>You are fucking horrible animals!</td>
							<td>2023/12/15 23:58:52</td>
							<td><select class="form-select" aria-label="Complaint Status">
									<option selected>Select Report Status</option>
									<option value="1">In Investigation</option>
									<option value="2">On Hold</option>
									<option value="3">Resolved</option>
								</select></td>
							<td>
								<ul class="list-inline">
									<li class="list-inline-item">
										<button type="button" class="btn btn-primary" onclick="showAlert()">Update</button>
									</li>
								</ul>
							</td>
						</tr>
					</tbody>
				</table>
				<nav aria-label="Page navigation">
					<ul class="pagination">
						<li class="page-item disabled">
							<a class="page-link" href="#" tabindex="-1">Previous</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
							<a class="page-link" href="#">Next</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>


	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./resources/js/livechat.js"></script>
	<script src="./node_modules/chart.js/dist/chart.umd.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js"></script>
	<script src="./resources/js/datatables.js"></script>
	<script>

	const users = [{
			user_label: "Admins",
			user_count: <?php echo $total_admins; ?>,
		},
		{
			user_label: "Experts",
			user_count: <?php echo $total_experts; ?>,
		},
		{
			user_label: "Lecturers",
			user_count: <?php echo $total_lecturers; ?>,
		},
		{
			user_label: "Students",
			user_count: <?php echo $total_students; ?>,
		},
	];

   new Chart(document.getElementById('users'), {
     type: 'bar',
     data: {
       labels: users.map((row) => row.user_label),
       datasets: [{
         label: 'Total Number of Users',
         data: users.map((row) => row.user_count),
				 backgroundColor: [
		      'rgba(255, 99, 132, 0.2)',
		      'rgba(255, 159, 64, 0.2)',
		      'rgba(255, 205, 86, 0.2)',
		      'rgba(75, 192, 192, 0.2)',
		    ],
		    borderColor: [
		      'rgb(255, 99, 132)',
		      'rgb(255, 159, 64)',
		      'rgb(255, 205, 86)',
		      'rgb(75, 192, 192)',
		    ],
         borderWidth: 1
       }]
     },
     options: {
       scales: {
         y: {
           beginAtZero: true,
					 ticks: {
          	precision: 0,
        	}
        }
       }
     }
   });

		const info = [{
				activity: "Posts",
				count: 10,
			},
			{
				activity: "Comments",
				count: 20,
			},
			{
				activity: "Likes",
				count: 15,
			},
		];


		new Chart(document.getElementById("UserActivity"), {
			type: "polarArea",
			data: {
				labels: info.map((row) => row.activity),
				datasets: [{
					label: "Total counts",
					data: info.map((row) => row.count),
				}, ],
			},
		});

		function showAlert() {
			var alertContainer = document.getElementById("alertContainer");
			var alertHTML = `
      	<div class="alert alert-success alert-dismissible fade show" role="alert">
    		Report status updated!
        	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    	  </div>`;
			alertContainer.innerHTML = alertHTML;
		}

		document.getElementById("data_analytics").classList.add("active");
	</script>
</body>

</html>
