<?php

try {
  require '../config/db.php';

  $user_id = $_POST['user_id'];
  $username = $_POST['username'];
  $email = $_POST['email'];

  if (isset($_POST['student_id'])) {

    $student_id = $_POST['student_id'];
    $stmt = $conn->prepare('UPDATE user SET UserName = :username, UserEmail = :email, StudentID = :student_id WHERE UserID = :user_id');
    $stmt->bindParam(':student_id', $student_id);

  } elseif (isset($_POST['staff_id'])) {

    $staff_id = $_POST['staff_id'];
    $stmt = $conn->prepare('UPDATE user SET UserName = :username, UserEmail = :email, StaffID = :staff_id WHERE UserID = :user_id');
    $stmt->bindParam(':staff_id', $staff_id);

  } elseif (isset($_POST['expert_id'])) {

    $expert_id = $_POST['expert_id'];
    $stmt = $conn->prepare('UPDATE user SET UserName = :username, UserEmail = :email, ExpertID = :expert_id WHERE UserID = :user_id');
    $stmt->bindParam(':expert_id', $expert_id);

  }

  $stmt->bindParam(':user_id', $user_id);
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':email', $email);
  $stmt->execute();

  echo "<script>alert('You have updated the user profile!'); history.back();</script>";
} catch (PDOException $e) {
  echo $e->getMessage();
}

$conn = null;
