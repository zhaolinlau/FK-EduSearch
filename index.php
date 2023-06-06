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

	<div class="container p-5 m-5 mx-auto">
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
			<?php
			unset($_SESSION['posted']);
			endif;
			?>

			<?php
			if(isset($_GET['post_status']) && $_GET['post_status'] == "Accepted") :
				require './AcceptedPosts.php';
			elseif (isset($_GET['post_status']) && $_GET['post_status'] == "Revised") :
				require './RevisedPosts.php';
			elseif (isset($_GET['post_status']) && $_GET['post_status'] == "Completed") :
				require './CompletedPosts.php';
			elseif(!isset($_GET['post_status'])) :
				require './PendingPosts.php';
			endif;
			?>
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
					<form action="./Controllers/CreatePostController.php" class="needs-validation row g-3" method="post" novalidate>
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
								<option value="QNA">QNA</option>
								<option value="Annoucement">Annoucement</option>
								<option value="Sharing">Sharing</option>
								<option value="Others">Others</option>
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
