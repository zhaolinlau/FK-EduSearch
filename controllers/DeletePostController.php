<?php

try {
  require '../config/db.php';

  $post_id = $_GET['post_id'];
  $stmt = $conn->prepare('DELETE FROM post WHERE PostID = :post_id');
  $stmt->bindParam(':post_id', $post_id);
  $stmt->execute();

  echo "<script>alert('You have deleted the post successfully.'); window.location.href='../';</script>";
} catch (PDOException $e) {
  echo $e->getMessage();
}

$conn = null;
