<?php

try {
  require '../config/db.php';
  $post_id = $_GET['post_id'];
  $post_status = 'Completed';
  $stmt = $conn->prepare('UPDATE post SET PostStatus = :post_status WHERE PostID = :post_id');
  $stmt->bindParam(':post_id', $post_id);
  $stmt->bindParam(':post_status', $post_status);
  $stmt->execute();

  echo "<script>history.back()</script>";

} catch (PDOException $e) {
  echo $e->getMessage();
}

$conn = null;
