<?php
session_start();
require "./Middleware/Authenticate.php";
require './config/db.php';
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | Discussion Board</title>
	<link rel="shortcut icon" href="./resources/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
</head>

<body class="h-100">
	<?php require "layouts/navbar.php" ?>

  <div class="container h-100">
    <div class="row h-100">
      <div class="col h-100 d-flex align-items-center justify-content-center">
        <?php
        $post_id = $_GET['post_id'];
        $stmt = $conn->prepare('SELECT * FROM post WHERE PostID = :post_id');
        $stmt->bindParam(':post_id', $post_id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        foreach($result as $row) :
        ?>
        <form action="./controllers/EditPostController.php" class="needs-validation row g-3 shadow p-5 rounded-5" method="post" novalidate>
          <div class="col-12 d-none">
            <label for="post_id" class="form-label">Post ID</label>
            <input type="text" class="form-control" value="<?php echo $row->PostID; ?>" name="post_id" id="post_id" readonly required>
            <div class="invalid-feedback">
              You are disallowed to edit this field.
            </div>
          </div>

          <div class="col-12">
            <label for="post_title" class="form-label">Post Title</label>
            <input type="text" class="form-control" value="<?php echo $row->PostTitle; ?>" name="post_title" id="post_title" required>
            <div class="invalid-feedback">
              Please enter post title.
            </div>
          </div>

          <div class="col-12">
            <label for="post_category">Category</label>
            <select class="form-select" name="post_category" id="post_category" required>
              <option value="<?php echo $row->PostCategory; ?>" selected class="d-none"><?php echo $row->PostCategory; ?></option>
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
            <textarea name="post_content" id="post_content" class="form-control" rows="5" required><?php echo $row->PostContent; ?></textarea>
            <div class="invalid-feedback">
              Please enter post content.
            </div>
          </div>

          <div class="col-12">
            <input type="submit" class="btn btn-primary" name="update_post" value="Update" onclick="return confirm('Are you sure to update the post?');">
            <button type="button" class="btn btn-danger" onclick="history.back();">Cancel</button>
          </div>
        </form>
      <?php endforeach; ?>
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
