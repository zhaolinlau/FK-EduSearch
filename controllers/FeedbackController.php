<?php

try {
  session_start();
  if (isset($_POST['add_answer'])) {
    require '../config/db.php';

    $post_id = $_POST['post_id'];
    $answer = $_POST['answer'];
		$expert_id = $_SESSION['id'];
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare('INSERT INTO feedback (PostID, ExpertID, ExpertFeedback, UserID) VALUES (:post_id, :expert_id, :answer,:user_id)');
    $stmt->bindParam(':post_id', $post_id);
    $stmt->bindParam(':expert_id', $expert_id);
		$stmt->bindParam(':answer', $answer);
    $stmt->bindParam(':user_id', $user_id);
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
