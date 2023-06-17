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

	<div class="row justify-content-center d-flex py-5">
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
        <h3 class="text-center mt-3">Total Number Of Users</h3>
			</div>
		</div>

		<div class="col-3">
			<div class="shadow">
				<?php
        try {
          //Get total likes
          $stmt = $conn->prepare('SELECT COUNT(*) AS total_likes FROM likes');
          $stmt->execute();
          $likes = $stmt->fetch(PDO::FETCH_OBJ);
          $totalLikes = $likes->total_likes;
          // Get total posts
          $stmt = $conn->prepare('SELECT COUNT(*) AS total_posts FROM post');
          $stmt->execute();
          $posts = $stmt->fetch(PDO::FETCH_OBJ);
          $totalPosts = $posts->total_posts;

          // Get total comments
          $stmt = $conn->prepare('SELECT COUNT(*) AS total_comments FROM comment');
          $stmt->execute();
          $comments = $stmt->fetch(PDO::FETCH_OBJ);
          $totalComments = $comments->total_comments;
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
				?>
      <canvas id="UserActivity" class="bg-white"></canvas>
			<h3 class="text-center mt-1">User Activity</h3>
      </div>
		</div>

		<div class="col-4 my-auto">
			<div class="shadow bg-white">
				<?php
				$stmt = $conn->prepare('SELECT COUNT(*) AS new FROM bug WHERE Bug_Status = "New Reported"');
				$stmt->execute();
				$new = $stmt->fetchAll(PDO::FETCH_OBJ);
				$total_new = $new[0]->new;

				$stmt = $conn->prepare('SELECT COUNT(*) AS fixing FROM bug WHERE Bug_Status = "Fixing"');
				$stmt->execute();
				$fixing = $stmt->fetchAll(PDO::FETCH_OBJ);
				$total_fixing = $fixing[0]->fixing;

				$stmt = $conn->prepare('SELECT COUNT(*) AS resolved FROM bug WHERE Bug_Status = "Resolved"');
				$stmt->execute();
				$resolved = $stmt->fetchAll(PDO::FETCH_OBJ);
				$total_resolved = $resolved[0]->resolved;
				?>
				<canvas id="bugs"></canvas>
        <h3 class="text-center mt-3">Total Number Of Bugs</h3>
			</div>
		</div>
	</div>


	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./resources/js/livechat.js"></script>
	<script src="./node_modules/chart.js/dist/chart.umd.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
				count: <?php echo $totalPosts; ?>,
			},
			{
				activity: "Comments",
				count: <?php echo $totalComments; ?>,
			},
			{
				activity: "Likes",
				count: <?php echo $totalLikes; ?>,
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

		const bugs = [{
				bug_label: "New Reported",
				bug_count: <?php echo $total_new; ?>,
			},
			{
				bug_label: "Fixing",
				bug_count: <?php echo $total_fixing; ?>,
			},
			{
				bug_label: "Resolved",
				bug_count: <?php echo $total_resolved; ?>,
			},
		];

	   new Chart(document.getElementById('bugs'), {
	     type: 'doughnut',
	     data: {
	       labels: bugs.map((row) => row.bug_label),
	       datasets: [{
	         label: 'Total Number of Bugs',
	         data: bugs.map((row) => row.bug_count),
					 backgroundColor: [
						 'rgb(255, 99, 132)',
				      'rgb(54, 162, 235)',
				      'rgb(255, 205, 86)'
			    ],
					hoverOffset: 4
	       }]
	     },
	   });

		document.getElementById("data_analytics").classList.add("active");
	</script>
</body>

</html>
