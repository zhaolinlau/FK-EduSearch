<?php
try {
	require "../config/db.php";
	$stmt = $conn->prepare("DELETE FROM user WHERE UserID=:UserID");
	$stmt->bindParam(':UserID', $_GET['UserID']);
	$stmt->execute();
	echo "<script>alert('The user has been deleted successfully.'); window.location.href='../user_list.php';</script>";
} catch (PDOException $e) {
	echo $e->getMessage();
}

$conn = null;
