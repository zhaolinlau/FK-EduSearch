<?php
session_start();
require "./Middleware/Authenticate.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | Discussion</title>
	<link rel="shortcut icon" href="./src/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">>
	<link href='https://css.gg/css' rel='stylesheet'>
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
			<div> <!--Discussion Board and search bar-->
				<h3>Discussion Board</h3>
				<br><br>
				<form class="row g-3">
					<div class="col justify-content-end d-flex">
						<button class="btn btn-primary rounded-5" onclick="">
							<i class="fa-regular fa-plus"></i>
							Create Post
						</button>
					</div>
				</form>
			</div>

			<div class="dropdown d-flex align-items-center justify-content-center text-center">
				<a class="dropdown-toggle d-flex align-items-center text-decoration-none text-black" href="#" role="button" id="filterDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="gg-format-center"></i> &nbsp; Filter by Post Status
				</a>
				<ul class="dropdown-menu" aria-labelledby="filterDropdown">
					<li><a class="dropdown-item" href="#" onclick="">Accepted</a></li>
					<li><a class="dropdown-item" href="#" onclick="">Revised</a></li>
					<li><a class="dropdown-item" href="#" onclick="">Completed</a></li>
				</ul>
			</div>
			<br>


			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="card border-0 shadow">
							<div class="card-header bg-white">
								<h5 class="card-title fw-semibold">Post Title</h5>
							</div>
							<div class="card-body">
								<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat, eos non commodi obcaecati molestias qui ab? Sed inventore, nam consequuntur dicta dignissimos eaque doloremque, tempore qui necessitatibus, sequi assumenda ducimus?</p>
							</div>
							<div class="card-footer bg-white">
								<button class="btn btn-outline-primary"><i class="fa-solid fa-thumbs-up"></i> Like</button>
								<button class="btn btn-light"><i class="fa-solid fa-comment"></i> Comment</button>
								<span class="badge bg-info fs-6">Post Status: Placeholder</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./js/form_validate.js"></script>
	<script src="./src/plugins/livechat.js"></script>
	<script>
		document.getElementById("discussion").classList.add("active");
	</script>
</body>

</html>