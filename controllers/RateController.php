<?php

try {
  session_start();
  require '../config/db.php';

  $post_id = $_POST['post_id'];
  $user_id = $_SESSION['user_id'];
  $expert_id = $_POST['expert_id'];
  $rating = $_POST['rating'];
  $feedback = $_POST['feedback'];

  $stmt = $conn->prepare('INSERT INTO rating (PostID, UserID, ExpertID, UserRating, UserFeedback) VALUES (:post_id, :user_id, :expert_id, :rating, :feedback)');
  $stmt->bindParam(':post_id', $post_id);
  $stmt->bindParam(':user_id', $user_id);
  $stmt->bindParam(':expert_id', $expert_id);
  $stmt->bindParam(':rating', $rating);
  $stmt->bindParam(':feedback', $feedback);

  $stmt->execute();

  header('location: ../comments.php?post_id=' . $post_id);

} catch (PDOException $e) {
  echo $e->getMessage();
}

$conn = null;
