<?php

try {
  require '../config/db.php';
  $post_status = "Accepted";
  $post_id = $_POST['post_id'];
  $expert_id = $_POST['expert_id'];
  $stmt = $conn->prepare('UPDATE post SET PostStatus = :post_status, ExpertID = :expert_id WHERE PostID = :post_id');
  $stmt->bindParam(':post_status', $post_status);
  $stmt->bindParam(':post_id', $post_id);
  $stmt->bindParam(':expert_id', $expert_id);

  $stmt->execute();

  echo "<script>history.back();</script>";
} catch (PDOException $e) {
  echo $e->getMessage();
}

$conn = null;
