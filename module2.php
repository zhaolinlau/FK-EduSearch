<?php 
session_start();
require "./Middleware/Authenticate.php";
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AnalyticsManagement/Admin-UI</title>
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="./node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="./node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
	<link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css" rel="stylesheet" />
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
    .post {
      margin-bottom: 20px;
    }

    .comment {
      margin-left: 30px;
    }
  </style>
</head>

<body>
<?php require "layouts/navbar.php" ?>
	<div class="row" style="margin-top: 94px;">
		<div class="col">
	
		</div>
	</div>

<!--	<div class="justify-content-center d-flex bg-light">
		<div class="col-4" style="margin-top: 20px; display:block;">
			<canvas id="UserActivity" style="background-color: #fff8e1; margin-top: 20px;"></canvas>
			<h3 style="text-align: center;" >User Activity</h3>
		</div>
		</div> 
		</div>
	</div>
    -->
	<!-- No Changes Above -->
    <!--Search Engine-->
<!--
    <input type="text" class="form-control mt-4 ">
-->
    
<!--Start -->
    <div class="container">
    <div class="post">
      <h2>ASP.NET Core updates in .NET 8 Preview 4 - .NET Blog</h2>
      <p class="container"><a href="#">https://devblogs.microsoft.com/dotnet/asp-net-core-updates-in-dotnet-8-preview-4/</a></p>
      <button type="button" class="btn btn-light like-btn" ><i class="fa-light fa-thumbs-up"></i></button>
      <span class="likes-count">0</span> Likes
      <button type="button" class="btn btn-light like-btn" ><i class="fa-regular fa-comment"></i></button>
      <span class="likes-count">0</span> Comments
      <hr>
      <h3>Comments</h3>
      <div class="comments-container">
        <!-- Comments will be added dynamically here -->
      </div>
      <form id="comment-form">
        <div class="mb-3">
          <label for="comment-input" class="form-label">Leave a comment:</label>
          <input type="text" class="form-control" id="comment-input" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
<!--End-->





	
	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
	<script src="./node_modules/chart.js/dist/chart.umd.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js"></script>
	<script src="./resources/js/datatables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
	<script>
        // Like button functionality
        const likeButton = document.querySelector('.like-btn');
        const likesCount = document.querySelector('.likes-count');
        let likeCount = 0;

        likeButton.addEventListener('click', () => {
        likeCount++;
        likesCount.textContent = likeCount;
        });

        // Comment functionality
        const commentForm = document.getElementById('comment-form');
        const commentsContainer = document.querySelector('.comments-container');

        commentForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const commentInput = document.getElementById('comment-input');
        const commentText = commentInput.value.trim();

        if (commentText !== '') {
            const commentElement = document.createElement('div');
            commentElement.classList.add('comment');
            commentElement.textContent = commentText;
            commentsContainer.appendChild(commentElement);

            commentInput.value = '';
        }
        });
	</script>
</body>

</html>