<?php
require '../config/db.php';

try {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$stmt = $conn->prepare("SELECT * FROM user WHERE UserName=:username");
	$stmt->bindParam(':username', $username);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($result && password_verify($password, $result['UserPassword'])) {
		session_start();
		$result['UserID'] = $_SESSION['UserID'];
		if ($result['UserRole'] == 0) {
			header("Location: ../admin.php");
		} elseif ($result['UserRole'] == 1) {
			header("Location: ../expert.php");
		} elseif ($result['UserRole'] == 2) {
			header("Location: ../expert.php");
		} elseif ($result['UserRole'] == 3) {
			header("Location: ../expert.php");
		}
	} else {
		session_start();
		$_SESSION['error'] = "Username or password is invalid";
		header("Location: ../");
	}
} catch (PDOException $e) {
	echo $e->getMessage();
}

$conn = null;
