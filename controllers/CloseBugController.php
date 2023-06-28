<?php

try {
  require '../config/db.php';

  $bug_id = $_GET['bug_id'];
  $bug_status = 'Resolved';

  $stmt = $conn->prepare('UPDATE bug SET Bug_Status = :bug_status WHERE BugID = :bug_id');
  $stmt->bindParam(':bug_id', $bug_id);
  $stmt->bindParam(':bug_status', $bug_status);
  $stmt->execute();

  echo "<script>alert('The bug has been added to resolved list!'); history.back();</script>";
} catch (PDOException $e) {
  echo $e->getMessage();
}

$conn = null;
