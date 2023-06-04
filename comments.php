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
	<title>FK-EduSearch | Comments</title>
	<link rel="shortcut icon" href="./resources/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
</head>

<body>
	<?php require "layouts/navbar.php" ?>

	<div class="container p-5 m-5 mx-auto">
		<div class="row g-5">
      <div class="col-12 justify-content-end d-flex">
        <a class="btn btn-danger rounded-5" href="./"><i class="fa-solid fa-xmark"></i> Close</a>
      </div>
			<?php
      $post_id = $_GET['post_id'];
			$stmt = $conn->prepare('SELECT * FROM post JOIN user ON post.UserID = user.UserID WHERE post.PostID = :post_id');
      $stmt->bindParam(':post_id', $post_id);
			$stmt->execute();

			$result = $stmt->fetchAll(PDO::FETCH_OBJ);

			foreach($result as $row) :
			?>
			<div class="col-12">
				<div class="card border-0 shadow">
					<div class="card-header bg-white">
						<div class="row">
              <div class="col-12">
								<span class="badge bg-secondary fs-6">Category: <?php echo $row->PostCategory; ?></span>
								Posted by <?php echo $row->UserName; ?> on <?php echo $row->PostCreated; ?>
							</div>
							<div class="col-11">
								<h5 class="card-title fw-semibold"><?php echo $row->PostTitle; ?></h5>
							</div>
							<?php
							if($_SESSION['user_id'] == $row->UserID) : ?>
							<div class="col-1 d-flex justify-content-end">
								<div class="dropdown">
									<button class="btn circle-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
										<i class="fa-solid fa-ellipsis fa-xl"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end shadow-sm">
										<li><a class="dropdown-item" href="./EditPost.php?post_id=<?php echo $row->PostID; ?>">Edit</a></li>
										<li><a class="dropdown-item" href="#">Resolved</a></li>
										<li><a class="dropdown-item" href="./Controllers/DeletePostController.php?post_id=<?php echo $row->PostID; ?>" onclick="return confirm('Are you sure to delete the post?')">Delete</a></li>
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
						    99+
						    <span class="visually-hidden">Comments</span>
						  </span>
						</a>

						<span class="badge bg-info fs-6 ms-4">Status: <?php echo $row->PostStatus; ?></span>
					</div>
				</div>
			</div>
		<?php endforeach; ?>

    <div class="col-12">
      <form class="row g-3 needs-validation" action="./Controllers/CommentController.php" method="post" novalidate>
        <div class="col-12 d-none">
          <label for="post_id" class="form-label">Post ID</label>
          <input name="post_id" id="post_id" class="form-control" value="<?php echo $_GET['post_id'] ?>" readonly required>
          <div class="invalid-feedback">
            You are disallowed to modify this field.
          </div>
        </div>
        <div class="col-12">
          <label for="comment" class="form-label">Comment as <?php echo $_SESSION['username']; ?></label>
          <textarea name="comment" id="comment" class="form-control" rows="5" required></textarea>
          <div class="invalid-feedback">
            Please enter your comment.
          </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
          <input type="submit" class="btn btn-primary" name="add_comment" value="Comment">
        </div>
      </form>
    </div>

    <div class="col-12">
      <ul class="list-group list-group-flush">
        <?php
        $post_id = $_GET['post_id'];
        $stmt = $conn->prepare('SELECT * FROM comment JOIN user ON comment.UserID = user.UserID WHERE comment.PostID = :post_id');
        $stmt->bindParam(':post_id', $post_id);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_OBJ);
        foreach($comments as $comment) :
        ?>
        <li class="list-group-item row">
          <div class="col-12">
              <b><?php echo $comment->UserName; ?></b> commented on <?php echo $comment->CommentCreated; ?>
          </div>

          <div class="col-12">
            <?php echo $comment->CommentDetails; ?>
          </div>
        </li>
      <?php endforeach; ?>
      </ul>
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
