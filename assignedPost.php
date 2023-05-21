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
	<title>FK-EduSearch | Assigned Posts </title>
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
				<h3>Assigned Posts to be Answered</h3>
				<h6>Last activity on : <span id="">PLACEHOLDER DATE</span> <!--last updated date of expert activity--></h6>
				<br><br>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="card border-0 shadow">
							<div class="card-header bg-white">
								<a href="#" style="text-decoration:none; color:red;">
									<h5 class="card-title fw-semibold">Post Title</h5>
								</a>
							</div>
							<div class="card-body">
								<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat, eos non commodi obcaecati molestias qui ab? Sed inventore, nam consequuntur dicta dignissimos eaque doloremque, tempore qui necessitatibus, sequi assumenda ducimus?</p>
							</div>
							<div class="card-footer bg-white">
								<span class="badge bg-info fs-6">Post Status: Placeholder</span>
								<span style="float:right;"><b>Expiry Date : </b><span id="">PLACEHOLDER DATE</span></span>
							</div>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./resources/js/form_validate.js"></script>
	<script src="./recources/js/livechat.js"></script>
	<script>
		document.getElementById("assigned_posts").classList.add("active");
	</script>
</body>

</html>