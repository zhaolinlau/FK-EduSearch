<?php

require '../config/db.php';

try {
  session_start();

  $user_id = $_SESSION['user_id'];
  $post_title = $_POST['post_title'];
  $post_content = $_POST['post_content'];
  $post_category = $_POST['post_category'];
  $post_status = 'Null';

  $stmt = $conn->prepare('INSERT INTO post (UserID, PostTitle, PostContent, PostCategory, PostStatus) VALUES (:user_id, :post_title, :post_content, :post_category, :post_status)');

  $stmt->bindParam(':user_id', $user_id);
  $stmt->bindParam(':post_title', $post_title);
  $stmt->bindParam(':post_content', $post_content);
  $stmt->bindParam(':post_category', $post_category);
  $stmt->bindParam(':post_status', $post_status);

  $stmt->execute();

  $_SESSION['posted'] = 'You have created a post successfully!';

  header('location: ../');

} catch (PDOException $e) {

  echo $e->getMessage();

}

$conn = null;
