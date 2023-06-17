<?php

try {
  require '../config/db.php';

  $bug_id = $_GET['bug_id'];

  $stmt = $conn->prepare('DELETE FROM bug WHERE BugID = :bug_id');
  $stmt->bindParam(':bug_id', $bug_id);
  $stmt->execute();

  $folderPath = "../bug_reports/" . $bug_id . '/';
  if (is_dir($folderPath)) {
    $files = glob($folderPath . '*');
    foreach ($files as $file) {
      if (is_file($file)) {
        unlink($file);
      }
    }
    rmdir($folderPath);
  }

  $_SESSION['message'] = 'Bug report deleted successfully!';

  echo "<script>alert('The bug report has been deleted!'); history.back();</script>";
} catch (PDOException $e) {
  echo $e->getMessage();
}

$conn = null;
