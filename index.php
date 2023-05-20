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
			<div> <!--Discussion Board and search bar-->
				<h3>Discussion Board</h3>
				<br><br>
				<div class="row g-3">
					<div class="col justify-content-end d-flex">
						<button class="btn btn-primary rounded-5" data-bs-toggle="modal" data-bs-target="#post_form">
							<i class="fa-regular fa-plus"></i>
							Create Post
						</button>
					</div>
				</div>
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

	<div class="modal fade" id="post_form" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content p-3">
				<div class="modal-header">
					<h5 class="modal-title">Create Post</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="#" class="needs-validation" method="post" novalidate>
						<div>
							<label for="post_title" class="form-label">Post Title</label>
							<input type="text" class="form-control" name="post_title" id="post_title" required>
							<div class="invalid-feedback">
								Please enter post title.
							</div>
						</div>
						<div>
							<label for="post_content">Post Content</label>
							<textarea name="post_content" id="post_content" class="form-control" rows="10" required></textarea>
							<div class="invalid-feedback">
								Please enter post content.
							</div>
						</div>

						<div class="modal-footer">
							<input type="submit" class="btn btn-primary" name="post" value="Post">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./resources/js/form_validate.js"></script>
	<script src="./recources/js/livechat.js"></script>
	<script>
		document.getElementById("discussion").classList.add("active");
	</script>
</body>

</html>