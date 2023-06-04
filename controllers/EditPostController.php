<?php

try {
  if(isset($_POST['update_post'])) {
    require '../config/db.php';

    $post_id = $_POST['post_id'];
    $post_title = $_POST['post_title'];
    $post_content = $_POST['post_content'];
    $post_category = $_POST['post_category'];

    $stmt = $conn->prepare('UPDATE post SET PostTitle = :post_title, PostContent = :post_content, PostCategory = :post_category WHERE PostID = :post_id');
    $stmt->bindParam(':post_id', $post_id);
    $stmt->bindParam(':post_title', $post_title);
    $stmt->bindParam(':post_content', $post_content);
    $stmt->bindParam(':post_category', $post_category);

    $stmt->execute();

    echo "<script>alert('You have updated the post successfully!'); window.location.href='../';</script>";
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}

$conn = null;
