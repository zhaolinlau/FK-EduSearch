<?php

try {
  session_start();
  require '../config/db.php';

  $user_id = $_SESSION['user_id'];
  $CommentID = $_POST['CommentID'];
  $ReportDescription = $_POST['ReportDescription'];
  $ReportStatus = '1'; //in investigation
  $Reported_On = date("Y-m-d H:i:s");
  $screenshot = $_FILES['screenshot'];
  $filename = $screenshot['name'];

  $stmt = $conn->prepare('INSERT INTO comment_report (UserID, CommentID, ReportDescription, ReportStatus, Reported_On, screenshot) VALUES (:UserID, :CommentID, :ReportDescription, :ReportStatus, :Reported_On, :screenshot)');

  $stmt->bindParam(':UserID', $user_id);
  $stmt->bindParam(':CommentID', $CommentID);
  $stmt->bindParam(':ReportDescription', $ReportDescription);
  $stmt->bindParam(':ReportStatus', $ReportStatus);
  $stmt->bindParam(':Reported_On', $Reported_On);
  $stmt->bindParam(':screenshot', $filename);

  $stmt->execute();
  $commentReportId = $conn->lastInsertId();

  $folderPath = "../comment_reports/";

  mkdir($folderPath, 0777, true);

  $destination = $folderPath . $commentReportId . '/';
  mkdir($destination, 0777, true);

  $destination .= $filename;
  move_uploaded_file($screenshot['tmp_name'], $destination);


  $_SESSION['posted'] = 'You have created comment report ticket successfully!';

  header('location: ../index.php');
} catch (PDOException $e) {

  echo $e->getMessage();
}

$conn = null;
