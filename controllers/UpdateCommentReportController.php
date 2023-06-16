<?php

require '../config/db.php';

try {
  session_start();

  // Retrieve the data from the form or any other source
  $reportID = $_POST['ReportID'];
  $newReportStatus = $_POST['ReportStatus'];

  // Prepare the update statement
  $stmt = $conn->prepare('UPDATE comment_report SET ReportStatus = :newReportStatus WHERE ReportID = :reportID');

  // Bind the parameters
  $stmt->bindParam(':newReportStatus', $newReportStatus);
  $stmt->bindParam(':reportID', $reportID);

  // Execute the update statement
  $stmt->execute();

  // Check if any rows were affected
  $rowCount = $stmt->rowCount();

  if ($rowCount > 0) {
    // Update successful
    $_SESSION['posted'] = 'Comment report ticket status updated successfully!';

    header('location: ../CommentReportList.php');
  } else {
    // No rows updated
    echo "No records found or no changes made.";
  }

} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

$conn = null;
