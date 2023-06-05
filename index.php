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
			$stmt = $conn->prepare('SELECT * FROM post JOIN user ON post.UserID = user.UserID ORDER BY post.PostID DESC');
			$stmt->execute();

			$result = $stmt->fetchAll(PDO::FETCH_OBJ);

			foreach($result as $row) :
			?>
			<div class="col-12">
				<div class="card border-0 shadow">
					<div class="card-header bg-white">
						<div class="row">
							<div class="col-11">
								<span class="badge bg-secondary fs-6"><i class="fa-solid fa-tag"></i> <?php echo $row->PostCategory; ?></span>
								Posted by <?php echo $row->UserName; ?> on <?php echo $row->PostCreated; ?>
							</div>
							<?php
							if($_SESSION['user_id'] == $row->UserID) : ?>
							<div class="col-1 d-flex justify-content-end">
								<div class="dropdown">
									<button class="btn circle-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
										<i class="fa-solid fa-ellipsis fa-xl"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end shadow-sm">
										<li><a class="dropdown-item" href="./EditPost.php?post_id=<?php echo $row->PostID; ?>"><i class="fa-solid fa-pen-to-square text-info"></i> Edit</a></li>
										<li><a class="dropdown-item" href="#"><i class="fa-solid fa-check text-success"></i> Resolved</a></li>
										<li>
											<a class="dropdown-item" href="./Controllers/DeletePostController.php?post_id=<?php echo $row->PostID; ?>" onclick="return confirm('Are you sure to delete the post?')">
											<i class="fa-solid fa-trash text-danger"></i> Delete
										</a>
										</li>
									</ul>
								</div>
							</div>
						<?php endif; ?>
							<div class="col-12">
								<h5 class="card-title fw-semibold"><?php echo $row->PostTitle; ?></h5>
							</div>
						</div>
					</div>
					<div class="card-body">
						<p><?php echo $row->PostContent; ?></p>
					</div>
					<div class="card-footer bg-white">
						<a class="btn btn-outline-primary position-relative">
							<i class="fa-solid fa-thumbs-up"></i>
						  Like
						  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
						    99+
						    <span class="visually-hidden">Likes</span>
						  </span>
						</a>

						<a class="btn btn-light position-relative ms-4" href="./comments.php?post_id=<?php echo $row->PostID; ?>">
							<i class="fa-solid fa-comment"></i>
						  Comment
						  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
								<?php
								$post_id = $row->PostID;
								$stmt = $conn->prepare('SELECT COUNT(*) AS total_comments FROM comment JOIN post ON comment.PostID = post.PostID WHERE comment.PostID = :post_id');
								$stmt->bindParam(':post_id', $post_id);
								$stmt->execute();
								$comments = $stmt->fetchAll(PDO::FETCH_OBJ);

								if ($comments[0]->total_comments > 99) {
								    echo "99+";
								} else {
								    echo $comments[0]->total_comments;
								}
								?>
						    <span class="visually-hidden">Comments</span>
						  </span>
						</a>

						<span class="badge bg-info fs-6 ms-4">Status: <?php echo $row->PostStatus; ?></span>
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
