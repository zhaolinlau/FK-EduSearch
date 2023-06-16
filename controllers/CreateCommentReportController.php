<?php

require '../config/db.php';

try {
  session_start();

  $user_id = $_SESSION['user_id'];
  $CommentID = $_POST['CommentID'];
  $ReportDescription = $_POST['ReportDescription'];
  $ReportStatus = '1'; //in investigation
  $Reported_On = date("Y-m-d H:i:s");

  $stmt = $conn->prepare('INSERT INTO comment_report (UserID, CommentID, ReportDescription, ReportStatus, Reported_On) VALUES (:UserID, :CommentID, :ReportDescription, :ReportStatus, :Reported_On)');

  $stmt->bindParam(':UserID', $user_id);
  $stmt->bindParam(':CommentID', $CommentID);
  $stmt->bindParam(':ReportDescription', $ReportDescription);
  $stmt->bindParam(':ReportStatus', $ReportStatus);
  $stmt->bindParam(':Reported_On', $Reported_On);

  $stmt->execute();

  $_SESSION['posted'] = 'You have created comment report ticket successfully!';

  header('location: ../');
} catch (PDOException $e) {

  echo $e->getMessage();
}

$conn = null;
