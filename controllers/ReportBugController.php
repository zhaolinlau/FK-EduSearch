<?php

try {
  session_start();
  require '../config/db.php';
  if (isset($_POST['report'])) {

    $bug_title = $_POST['bug_title'];
    $bug_description = $_POST['bug_description'];
    $screenshot = $_FILES['screenshot'];
    $userId = $_SESSION['user_id'];
    $status = 'New Reported';

    $filename = $screenshot['name'];

    $stmt = $conn->prepare('INSERT INTO bug (UserID, Bug_Title, Bug_Description, Screenshot, Bug_Status) VALUES (:user_id, :bug_title, :bug_description, :screenshot, :status)');

    $stmt->bindParam(':user_id', $userId);
    $stmt->bindParam(':bug_title', $bug_title);
    $stmt->bindParam(':screenshot', $filename);
    $stmt->bindParam(':bug_description', $bug_description);
    $stmt->bindParam(':status', $status);

    $stmt->execute();

    $bugReportId = $conn->lastInsertId();

    $folderPath = "../bug_reports/";

    mkdir($folderPath, 0777, true);

    $destination = $folderPath . $bugReportId . '/';
    mkdir($destination, 0777, true);

    $destination .= $filename;
    move_uploaded_file($screenshot['tmp_name'], $destination);

    $_SESSION['reported'] = 'You have submitted the bug report successfully!';
    header('location: ../bug_report.php');
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}

$conn = null;
