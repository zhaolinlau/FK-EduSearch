<?php
require '../config/db.php';

try {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$stmt = $conn->prepare("SELECT * FROM user WHERE UserName=:username");
	$stmt->bindParam(':username', $username);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	
} catch (PDOException $e) {
	echo $e->getMessage();
}

$conn = null;
