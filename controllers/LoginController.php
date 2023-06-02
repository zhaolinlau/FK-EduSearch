<?php
require "../config/db.php";

try {
	session_start();
	$username = $_POST["username"];
	$password = $_POST["password"];

	$stmt = $conn->prepare("SELECT * FROM user WHERE UserName=:username");
	$stmt->bindParam(":username", $username);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($result && password_verify($password, $result["UserPassword"])) {

		$_SESSION["user_id"] = $result["UserID"];
		$_SESSION["username"] = $result["UserName"];
		$_SESSION["user_password"] = $result["UserPassword"];
		$_SESSION["user_email"] = $result["UserEmail"];
		$_SESSION["user_research_area"] = $result["UserResearchArea"];
		$_SESSION["research_topic"] = $result["ResearchTopic"];
		require "../Middleware/UserRole.php";
	} else {
		$_SESSION["error"] = "Username or password is invalid";
		header("location: ../login.php");
	}
} catch (PDOException $e) {
	echo $e->getMessage();
}

$conn = null;
