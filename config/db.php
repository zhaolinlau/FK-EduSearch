<?php
$servername = "localhost";
$username = "fk-edusearch";
$password = "fk-edusearchpwd";
$dbname = "fk-edusearch";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo $e->getMessage();
}
