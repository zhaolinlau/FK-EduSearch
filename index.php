<?php
session_start();
require "./Middleware/Authenticate.php";
require './config/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | Discussion Board</title>
	<link rel="shortcut icon" href="./resources/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
</head>

<body>
	<?php require "layouts/navbar.php" ?>

	<div class="container mt-5">
		<div class="row g-5">
			<div class="col-12">
				<h3>Discussion Board</h3>
			</div>

			<?php if(isset($_SESSION['posted'])) : ?>
			<div class="col-12">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?php echo $_SESSION['posted'] ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		<?php endif; ?>

			<div class="col-12">
				<button class="float-end btn btn-primary rounded-5" data-bs-toggle="modal" data-bs-target="#post_form">
					<i class="fa-regular fa-plus"></i>
					Create Post
				</button>

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
			</div>

			<?php
			$stmt = $conn->prepare('SELECT * FROM post ORDER BY PostID DESC');
			$stmt->execute();

			$result = $stmt->fetchAll(PDO::FETCH_OBJ);

			foreach($result as $row) :
			?>
			<div class="col-12">
				<div class="card border-0 shadow">
					<div class="card-header bg-white">
						<div class="row">
							<div class="col-11">
								<h5 class="card-title fw-semibold"><?php echo $row->PostTitle; ?></h5>
							</div>
							<?php
							if($_SESSION['user_id'] == $row->UserID) : ?>
							<div class="col-1 d-flex justify-content-end">
								<div class="dropdown">
									<button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
										<i class="fa-solid fa-ellipsis"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end shadow-sm">
										<li><a class="dropdown-item" href="#">Edit</a></li>
										<li><a class="dropdown-item" href="#">Resolved</a></li>
										<li><a class="dropdown-item" href="#">Delete</a></li>
									</ul>
								</div>
							</div>
						<?php endif; ?>
						</div>
					</div>
					<div class="card-body">
						<p><?php echo $row->PostContent; ?></p>
					</div>
					<div class="card-footer bg-white">
						<a class="btn btn-outline-primary" href=""><i class="fa-solid fa-thumbs-up"></i> Like</a>
						<a class="btn btn-light" href=""><i class="fa-solid fa-comment"></i> Comment</a>
						<span class="badge bg-info fs-6">Post Status: <?php echo $row->PostStatus; ?></span>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
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
					<form action="./Controllers/CreatePostController.php" class="needs-validation row g-3" method="post" enctype="multipart/form-data" novalidate>
						<div class="col-12">
							<label for="post_title" class="form-label">Post Title</label>
							<input type="text" class="form-control" name="post_title" id="post_title" required>
							<div class="invalid-feedback">
								Please enter post title.
							</div>
						</div>

						<div class="col-12">
							<label for="post_category">Category</label>
							<select class="form-select" name="post_category" id="post_category" required>
								<option value="" hidden selected></option>
								<option value="qna">QNA</option>
								<option value="announcement">Annoucement</option>
								<option value="sharing">Sharing</option>
								<option value="others">Others</option>
							</select>
							<div class="invalid-feedback">
								Please select a category.
							</div>
						</div>

						<div class="col-12">
							<label for="post_content">Post Content</label>
							<textarea name="post_content" id="post_content" class="form-control" rows="5" required></textarea>
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
