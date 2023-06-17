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
				<h3>Assigned Posts</h3>
			</div>

			<div class="col-12">
				<div class="dropdown d-flex align-items-center justify-content-center text-center">
			    <a class="dropdown-toggle d-flex align-items-center text-decoration-none text-black" href="#" role="button" id="filterDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			      <i class="gg-format-center"></i> &nbsp; Filter by Post Status
			    </a>
			    <ul class="dropdown-menu" aria-labelledby="filterDropdown">
			      <li><a class="dropdown-item <?php if(!isset($_GET['post_status'])) : echo 'active'; endif; ?>" href="./assignedPost.php">All</a></li>
			      <li><a class="dropdown-item <?php if(isset($_GET['post_status']) && $_GET['post_status'] == 'Accepted') : echo 'active'; endif; ?>" href="./assignedPost.php?post_status=Accepted">Accepted</a></li>
			      <li><a class="dropdown-item <?php if(isset($_GET['post_status']) && $_GET['post_status'] == 'Revised') : echo 'active'; endif; ?>" href="./assignedPost.php?post_status=Revised">Revised</a></li>
			      <li><a class="dropdown-item <?php if(isset($_GET['post_status']) && $_GET['post_status'] == 'Completed') : echo 'active'; endif; ?>" href="./assignedPost.php?post_status=Completed">Completed</a></li>
			    </ul>
			  </div>
			</div>

			<?php
      $expert_id = $_SESSION['id'];
			if(isset($_GET['post_status']) && $_GET['post_status'] == "Accepted") :
			  $stmt = $conn->prepare('SELECT * FROM post JOIN user ON post.UserID = user.UserID WHERE post.ExpertID = :expert_id AND post.PostStatus = "Accepted" ORDER BY post.PostID DESC');
			elseif (isset($_GET['post_status']) && $_GET['post_status'] == "Revised") :
			  $stmt = $conn->prepare('SELECT * FROM post JOIN user ON post.UserID = user.UserID WHERE post.ExpertID = :expert_id AND post.PostStatus = "Revised" ORDER BY post.PostID DESC');
			elseif (isset($_GET['post_status']) && $_GET['post_status'] == "Completed") :
			  $stmt = $conn->prepare('SELECT * FROM post JOIN user ON post.UserID = user.UserID WHERE post.ExpertID = :expert_id AND post.PostStatus = "Completed" ORDER BY post.PostID DESC');
			elseif (!isset($_GET['post_status'])) :
				$stmt = $conn->prepare('SELECT * FROM post JOIN user ON post.UserID = user.UserID WHERE post.ExpertID = :expert_id ORDER BY post.PostID DESC');
			endif;

      $stmt->bindParam(':expert_id', $expert_id);
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
							<div class="col-12">
								<h5 class="card-title fw-semibold"><?php echo $row->PostTitle; ?></h5>
							</div>
						</div>
					</div>
					<div class="card-body">
						<p><?php echo $row->PostContent; ?></p>
					</div>
					<div class="card-footer bg-white">
						<a class="btn btn-outline-primary position-relative
						<?php
						$user_id = $_SESSION['user_id'];
						$post_id = $row->PostID;

						$stmt = $conn->prepare('SELECT * FROM likes WHERE UserID = :user_id AND PostID = :post_id');
						$stmt->bindParam(':user_id', $user_id);
						$stmt->bindParam(':post_id', $post_id);
						$stmt->execute();

						$result = $stmt->fetchAll(PDO::FETCH_OBJ);

						if($stmt->rowCount() > 0) {
							echo 'active';
						} else {
							echo '';
						}
						 ?>" href="./controllers/LikeController.php?post_id=<?php echo $row->PostID ?>">
							<i class="fa-solid fa-thumbs-up"></i>
						  Like
						  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
								<?php
								$post_id = $row->PostID;
								$stmt = $conn->prepare('SELECT COUNT(*) AS total_likes FROM likes JOIN post ON likes.PostID = post.PostID WHERE likes.PostID = :post_id');
								$stmt->bindParam(':post_id', $post_id);
								$stmt->execute();
								$likes = $stmt->fetchAll(PDO::FETCH_OBJ);

								if ($likes[0]->total_likes > 99) {
								    echo "99+";
								} else {
								    echo $likes[0]->total_likes;
								}
								?>
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
		<?php
	endforeach;
	$conn = null;
	?>
		</div>
	</div>

	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./recources/js/livechat.js"></script>
	<script>
		document.getElementById("assigned_posts").classList.add("active");
		document.getElementById("nav_assigned_posts").classList.add("active");
	</script>
</body>

</html>
