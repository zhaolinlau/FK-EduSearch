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
		<div class="row g-4">
      <div class="col-12 justify-content-end d-flex">
        <button class="btn btn-danger rounded-5" onclick="history.back();"><i class="fa-solid fa-xmark"></i> Close</button>
      </div>
			<div class="col-3">
			<?php
			$post_id = $_GET['post_id'];
			$stmt = $conn->prepare('SELECT * FROM user JOIN post ON user.UserID = post.UserID WHERE post.PostID = :post_id');
      $stmt->bindParam(':post_id', $post_id);
			$stmt->execute();

			$result = $stmt->fetchAll(PDO::FETCH_OBJ);

			foreach($result as $row) :
				if($row->ExpertID) :
			?>
					<h4>Assigned Expert:
					<?php
					if($_SESSION['id'] == $row->ExpertID) :
						echo 'You';
					elseif($_SESSION['id'] != $row->ExpertID) :
						echo $row->ExpertID;
					endif;
					?>
					</h4>
					<?php
					if($_SESSION['id'] != $row->ExpertID) :
						$expert_id = $row->ExpertID;
						$stmt = $conn->prepare('SELECT * FROM rating WHERE PostID = :post_id AND ExpertID = :expert_id');
						$stmt->bindParam(':post_id', $post_id);
						$stmt->bindParam(':expert_id', $expert_id);
						$stmt->execute();

						$rating = $stmt->fetchAll(PDO::FETCH_OBJ);

						if($stmt->rowCount() == 0) :
					?>
					<form class="needs-validation row g-3" action="./Controllers/RateController.php" method="post" novalidate>
						<div class="col-12 d-none">
		          <label for="post_id" class="form-label">Post ID</label>
		          <input name="post_id" id="post_id" class="form-control" value="<?php echo $post_id; ?>" readonly required>
		          <div class="invalid-feedback">
		            You are disallowed to modify this field.
		          </div>
		        </div>

						<div class="col-12 d-none">
		          <label for="expert_id" class="form-label">Expert ID</label>
		          <input name="expert_id" id="expert_id" class="form-control" value="<?php echo $row->ExpertID; ?>" readonly required>
		          <div class="invalid-feedback">
		            You are disallowed to modify this field.
		          </div>
		        </div>

						<div class="col-12">
							<label for="rating">Rating</label>
							<select class="form-select" name="rating" id="rating" required>
								<option value="" hidden selected></option>
								<option value="1">1 Star</option>
								<option value="2">2 Stars</option>
								<option value="3">3 Stars</option>
								<option value="4">4 Stars</option>
								<option value="5">5 Stars</option>
							</select>
							<div class="invalid-feedback">
								Please rate a value.
							</div>
						</div>
						<div class="col-12">
							<label for="feedback" class="form-label">Feedback</label>
							<textarea name="feedback" id="feedback" class="form-control"></textarea>
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-primary" name="submit" onclick="return confirm('Confirm rate?')">Submit</button>
						</div>
					</form>
				<?php
				elseif($stmt->rowCount() > 0) :
					foreach($rating as $rate) :
						echo '<p>Rated Stars:' . $rate->UserRating . '</p>';
						if($rate->UserFeedback) :
							echo '<p>Feedback:' . $rate->UserFeedback . '</p>';
						elseif($rate->UserFeedback == '') :
							echo '';
						endif;
					endforeach;
				endif;
				endif;
			 elseif($row->ExpertID == '') : ?>
				<h4>Assigned Expert: None</h4>
			<?php endif; ?>
		</div>
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
						 ?>" href="./Controllers/LikeController.php?post_id=<?php echo $row->PostID ?>">
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

    <div class="col-12">
      <form class="row g-3 needs-validation" action="./Controllers/CommentController.php" method="post" novalidate>
        <div class="col-12 d-none">
          <label for="post_id" class="form-label">Post ID</label>
          <input name="post_id" id="post_id" class="form-control" value="<?php echo $post_id; ?>" readonly required>
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
        $stmt = $conn->prepare('SELECT * FROM comment JOIN user ON comment.UserID = user.UserID WHERE comment.PostID = :post_id ORDER BY comment.CommentID ASC');
        $stmt->bindParam(':post_id', $post_id);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_OBJ);
        foreach($comments as $comment) :
        ?>
        <li class="list-group-item row">
          <div class="col-12">
						<div class="row">
							<div class="col-11">
								<b><?php echo $comment->UserName; ?></b> commented on <?php echo $comment->CommentCreated; ?>
							</div>
							<?php
							if($_SESSION['user_id'] == $comment->UserID) : ?>
							<div class="col-1 d-flex justify-content-end">
								<div class="dropdown">
									<button class="btn circle-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
										<i class="fa-solid fa-ellipsis fa-xl"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end shadow-sm">
										<li><a class="dropdown-item" href="./EditComment.php?comment_id=<?php echo $comment->CommentID; ?>"><i class="fa-solid fa-pen-to-square text-info"></i> Edit</a></li>
										<li>
											<a class="dropdown-item" href="./Controllers/DeleteCommentController.php?comment_id=<?php echo $comment->CommentID; ?>" onclick="return confirm('Confirm delete this comment?')">
											<i class="fa-solid fa-trash text-danger"></i> Delete
										</a>
										</li>
									</ul>
								</div>
							</div>
						<?php endif; ?>
						</div>

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
	<script src="./resources/js/livechat.js"></script>
	<script>
		document.getElementById("discussion").classList.add("active");
	</script>
</body>

</html>
