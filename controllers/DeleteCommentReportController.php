<?php


try {
  require '../config/db.php';

  $report_id = $_GET['report_id'];
  $stmt = $conn->prepare('DELETE FROM comment_report WHERE ReportID = :report_id');
  $stmt->bindParam(':report_id', $report_id);
  $stmt->execute();

  echo "<script>alert('The comment report has been deleted!'); history.back();</script>";
} catch (PDOException $e) {
  echo $e->getMessage();
}

$conn = null;
