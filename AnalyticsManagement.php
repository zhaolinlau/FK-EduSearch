<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AnalyticsManagement/Admin-UI</title>
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
</head>

<body class="h-100">
	<nav class="navbar navbar-expand-lg shadow-sm">
		<div class="container-fluid">
			<a class="navbar-brand" href="./">
				<img src="../resources/img/logo.png" class="rounded-circle" width="50px">
				<span class="mx-2 fw-bold">FK-EduSearch</span>
			</a>

		</div>
	</nav>
	<div class="row h-100">
		<div class="col-2 h-100">
			<div class="offcanvas-lg offcanvas-end p-2 h-100" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
				<div class="offcanvas-header">
					<h5 class="offcanvas-title" id="offcanvasResponsiveLabel">Responsive offcanvas</h5>
					<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body h-100">
					<ul class="nav nav-pills flex-column h-100 border-end pe-5 ps-4">
						<li class="nav-item mt-3">
							<a class="nav-link active" aria-current="page" href="#">Active</a>
						</li>   
						<li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled">Disabled</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="justify-content-center d-flex bg-primary">
		<div class="col-4" style="margin-top: 20px; display:block;">
			<canvas id="UserActivity" style="background-color: #fff8e1;"></canvas>
			<h3 style="text-align: center;" >User Activity</h3>
		</div>
		</div>
		

		</div>
	</div>
	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
	<script src="./node_modules/chart.js/dist/chart.umd.js"></script>
	<script>


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

	</script>
</body>

</html>