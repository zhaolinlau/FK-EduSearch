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
      <li><a class="dropdown-item" href="./">Pending</a></li>
      <li><a class="dropdown-item active" href="./index.php?post_status=Accepted">Accepted</a></li>
      <li><a class="dropdown-item" href="./index.php?post_status=Revised">Revised</a></li>
      <li><a class="dropdown-item" href="./index.php?post_status=Completed">Completed</a></li>
    </ul>
  </div>
</div>
<?php
$accepted = "Accepted";
$stmt = $conn->prepare('SELECT * FROM post JOIN user ON post.UserID = user.UserID WHERE PostStatus = :accepted ORDER BY post.PostID DESC');
$stmt->bindParam(':accepted', $accepted);
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

        <div class="col-1 d-flex justify-content-end">
          <?php if($_SESSION['expert']) : ?>
            <?php if($row->PostStatus == "Pending") : ?>
              <form class="needs-validation" action="./Controllers/AcceptPostController.php" method="post" novalidate>
                <div class="col d-none">
                  <input type="text" name="post_id" class="form-control" value="<?php echo $row->PostID; ?>" readonly required>
                  <div class="invalid-feedback">
                    You are disallowed to modify this field.
                  </div>
                </div>
                <button class="btn" type="submit" onclick="return confirm( )"><i class="fa-solid fa-marker"></i></button>
              </form>
            <?php  else : echo "Assigned";
             endif;
          endif; ?>
        <?php if($_SESSION['user_id'] == $row->UserID) : ?>
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
        <?php endif; ?>
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
$conn =null;
?>
