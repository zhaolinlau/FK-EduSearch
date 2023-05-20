<?php
session_start();
require "./Middleware/Authenticate.php";
?>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | Creating Response</title>
	<link rel="shortcut icon" href="./resources/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./custom_css/custom.css">
</head>

<body>
	<?php require "layouts/navbar.php" ?>
	<div class="row" style="margin-top: 94px;">
		<div class="col">

		</div>
	</div>
	<div class="">
		<div class="col-9 mx-auto" style="margin-right: 0;">
			<br>
			<div class="d-flex justify-content-between align-items-center">
				<span class="text2" id="PostTitle"><b>Title of Post</b></span>
				<span><b>Status</b> : <span id="PostStatus"> Active </span></span>
			</div>
			<hr>

			<div class="card" style="width: 100%; min-height: 150px;">
				<div class="card-body position-relative" id="postBody">
					This is the body text of a post.
					<i class="fa fa-thumbs-up position-absolute bottom-0 end-0" style="color: blue;margin-bottom:10px;margin-right:10px"><span id="PostLike"> # </span></i>
				</div>
			</div>

			<span>Posted by <b><span id="UserID">user</span></b> at <span id="PostCreated">(date)</span> </span>
			<span>under <b><span id="PostCategory">(category)</span></b> </span>
			<span style="float:right;">Last updated on <span id="PostUpdated">(date)</span></span>

			<br><br>

			<input class="form-control" type="CommentDetails" placeholder="Response" aria-label="default input example" style="width: 100%; min-height: 150px;">

			<br>
			<div class="d-flex justify-content-end">
				<button class="btn btn-primary btn-sm" style="margin-right: 0; padding: 0.25rem 0.5rem;" onclick="submitForm()">Submit</button>
			</div>
			<br>
			<div class="d-flex justify-content-end">
				<button class="btn btn-primary btn-sm" style="margin-right: 0; padding: 0.25rem 0.5rem;" onclick="closePost()">Close Post</button>
			</div>

			<br><br>

		</div>
	</div>

	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./resources/js/livechat.js"></script>
</body>

</html>