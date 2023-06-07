<?php

try {
  session_start();
  if (isset($_POST['add_comment'])) {
    require '../config/db.php';

    $user_id = $_SESSION['user_id'];
    $post_id = $_POST['post_id'];
    $comment = $_POST['comment'];
    $stmt = $conn->prepare('INSERT INTO comment (PostID, UserID, CommentDetails) VALUES (:post_id, :user_id, :comment)');
    $stmt->bindParam(':post_id', $post_id);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':comment', $comment);
    $stmt->execute();

    if (isset($_SESSION['expert'])) {
      $expert_id = $_SESSION['id'];
      $post_status = 'Revised';
      $stmt = $conn->prepare('UPDATE post SET PostStatus = :post_status, ExpertID = :expert_id WHERE PostID = :post_id');
      $stmt->bindParam(':post_id', $post_id);
      $stmt->bindParam(':expert_id', $expert_id);
      $stmt->bindParam(':post_status', $post_status);
      $stmt->execute();
    }
  }
  header('location: ../comments.php?post_id=' . $post_id);
} catch (PDOException $e) {
  echo $e->getMessage();
}

$conn = null;
