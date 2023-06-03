<?php

require '../config/db.php';

try {
  session_start();

  $stmt = $conn->prepare('INSERT INTO post (UserID, PostTitle, PostContent, PostCategory) VALUES (:user_id, :post_title, :post_content, :post_category)');

  $stmt->bindParam(':user_id', $_POST['user_id']);
  $stmt->bindParam(':post_title', $_POST['post_title']);
  $stmt->bindParam(':post_content', $_POST['post_content']);
  $stmt->bindParam(':post_category', $_POST['post_category']);

  $stmt->execute();

  $_SESSION['posted'] = 'You have created a post successfully!';

  header('location: ../');

} catch (PDOException $e) {

  echo $e->getMessage();

}

$conn = null;
