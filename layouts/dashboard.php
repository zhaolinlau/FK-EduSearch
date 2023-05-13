<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
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
		<div class="col">
			<div style="width: 800px;"><canvas id="acquisitions"></canvas></div>
		</div>
	</div>
	<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
	<script src="../node_modules/chart.js/dist/chart.umd.js"></script>
	<script>
		const data = [{
				year: 2010,
				count: 10,
			},
			{
				year: 2011,
				count: 20,
			},
			{
				year: 2012,
				count: 15,
			},
			{
				year: 2013,
				count: 25,
			},
			{
				year: 2014,
				count: 22,
			},
			{
				year: 2015,
				count: 30,
			},
			{
				year: 2016,
				count: 28,
			},
		];

		new Chart(document.getElementById("acquisitions"), {
			type: "polarArea",
			data: {
				labels: data.map((row) => row.year),
				datasets: [{
					label: "Acquisitions by year",
					data: data.map((row) => row.count),
				}, ],
			},
		});
	</script>
</body>

</html>