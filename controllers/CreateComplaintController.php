<?php

require '../config/db.php';

try {
  session_start();

  $user_id = $_SESSION['user_id'];
  $complaint_description = $_POST['complaint_description'];
  $complaint_status = 'In Investigation';
  $feedback_id = $_POST['feedback_id'];
  $complaint_type = $_POST['complaint_type'];

  $stmt = $conn->prepare('INSERT INTO complaint (UserID,FeedbackID, ComplaintDescription, ComplaintStatus, ComplaintType) VALUES (:user_id, :feedback_id, :complaint_description, :complaint_status, :complaint_type)');

  $stmt->bindParam(':user_id', $user_id);
  $stmt->bindParam(':feedback_id', $feedback_id);
  $stmt->bindParam(':complaint_description', $complaint_description);
  $stmt->bindParam(':complaint_status', $complaint_status);
  $stmt->bindParam(':complaint_type', $complaint_type);
  $stmt->execute();

  $_SESSION['posted'] = 'You have created a complaint successfully!';

  header('location: ../');
} catch (PDOException $e) {

  echo $e->getMessage();
}

$conn = null;
