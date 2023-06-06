<?php

try {
  if (isset($_POST['add_comment'])) {
    session_start();
    require '../config/db.php';

    $user_id = $_SESSION['user_id'];
    $post_id = $_POST['post_id'];
    $comment = $_POST['comment'];
    $stmt = $conn->prepare('INSERT INTO comment (PostID, UserID, CommentDetails) VALUES (:post_id, :user_id, :comment)');
    $stmt->bindParam(':post_id', $post_id);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':comment', $comment);
    $stmt->execute();

    echo "<script>history.back();</script>";
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}

$conn = null;
