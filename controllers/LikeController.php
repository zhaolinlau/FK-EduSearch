<?php
try {
  session_start();
  require '../config/db.php';

  $user_id = $_SESSION['user_id'];
  $post_id = $_GET['post_id'];

  $stmt = $conn->prepare('SELECT * FROM likes WHERE UserID = :user_id AND PostID = :post_id');
  $stmt->bindParam(':user_id', $user_id);
  $stmt->bindParam(':post_id', $post_id);
  $stmt->execute();

  $result = $stmt->fetchAll(PDO::FETCH_OBJ);

  if($stmt->rowCount() > 0) {
    $stmt = $conn->prepare('DELETE FROM likes WHERE UserID = :user_id AND PostID = :post_id');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':post_id', $post_id);
    $stmt->execute();
  } else {
    $stmt = $conn->prepare('INSERT INTO likes (UserID, PostID) VALUES (:user_id, :post_id)');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':post_id', $post_id);
    $stmt->execute();
  }
  echo "<script>history.back();</script>";
} catch (PDOException $e) {
  echo $e->getMessage();
}

$conn = null;
