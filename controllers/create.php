<?php
require '../config/db.php';

try {
	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$email = $_POST['email'];
	$role = $_POST['role'];

	$stmt = $conn->prepare("INSERT INTO users (username, password, email, role) VALUES (:username, :password, :email, :role)");
	$stmt->bindParam(':username', $username);
	$stmt->bindParam(':password', $password);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':role', $role);

	$stmt->execute();

	header("location: ../");
} catch (PDOException $e) {
	echo $e->getMessage();
}

$conn = null;
