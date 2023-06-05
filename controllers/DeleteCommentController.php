<?php

try {
  require '../config/db.php';

  $comment_id = $_GET['comment_id'];
  $stmt = $conn->prepare('DELETE FROM comment WHERE CommentID = :comment_id');
  $stmt->bindParam(':comment_id', $comment_id);
  $stmt->execute();

  echo "<script>alert('The comment has been deleted!'); history.back();</script>";
} catch (PDOException $e) {
  echo $e->getMessage();
}

$conn = null;
