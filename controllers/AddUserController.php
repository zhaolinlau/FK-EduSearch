<?php
try {
	require "../config/db.php";

	$username = $_POST["username"];
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$email = $_POST["email"];
	$role = $_POST["role"];

	if($_POST["student_id"] != '') {
		$stmt = $conn->prepare("INSERT INTO user (UserName, UserPassword, UserEmail, UserRole, StudentID) VALUES (:username, :password, :email, :role, :student_id)");
		$student_id = $_POST["student_id"];
		$stmt->bindParam(':student_id', $student_id);

	}elseif($_POST['staff_id'] != '') {
		$stmt = $conn->prepare("INSERT INTO user (UserName, UserPassword, UserEmail, UserRole, StaffID) VALUES (:username, :password, :email, :role, :staff_id)");
		$staff_id = $_POST["staff_id"];
		$stmt->bindParam(':staff_id', $staff_id);

	}elseif($_POST['expert_id'] != '') {
		$stmt = $conn->prepare("INSERT INTO user (UserName, UserPassword, UserEmail, UserRole, ExpertID) VALUES (:username, :password, :email, :role, :expert_id)");
		$expert_id = $_POST["expert_id"];
		$stmt->bindParam(':expert_id', $expert_id);
	}

	$stmt->bindParam(':username', $username);
	$stmt->bindParam(':password', $password);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':role', $role);

	$stmt->execute();

	header("location: ../user_list.php");
} catch (PDOException $e) {
	echo $e->getMessage();
}

$conn = null;
