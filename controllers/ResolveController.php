<?php

try {
  require '../config/db.php';
  $post_id = $_GET['post_id'];
  $post_status = 'Completed';
  $stmt = $conn->prepare('UPDATE post SET PostStatus = :post_status WHERE PostID = :post_id');
  $stmt->bindParam(':post_id', $post_id);
  $stmt->bindParam(':post_status', $post_status);
  $stmt->execute();

  header('location: ../comments.php?post_id=' . $post_id);

} catch (PDOException $e) {
  echo $e->getMessage();
}

$conn = null;
