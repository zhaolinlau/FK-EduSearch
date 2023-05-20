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


			<table class="table table-bordered" style="border-color: black;">
				<thead>
					<tr>
						<th id="PostTitle" colspan="3">Post Title</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td id="PostBody" colspan="3">Post Body</td>
					</tr>
					<tr>
						<td style="width: 33%;">
							<div class="d-flex align-items-center justify-content-center">
								<i class="fa fa-thumbs-up" style="font-size: 24px; color: blue;"></i>
								<span class="ms-1 align-middle">Like</span>
							</div>
						</td>
						<td style="width: 33%;">
							<div class="d-flex align-items-center justify-content-center">
								<i class="gg-comment" style="color: red;"></i>
								<span class="ms-1 align-middle">Comment</span>
							</div>
						</td>
						<td style="width: 34%;">
							<div class="d-flex align-items-center justify-content-center">
								<span>Post Status: &nbsp;</span><span id="PostStatus">Placeholder</span>
							</div>
						</td>
					</tr>
				</tbody>
			</table>

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