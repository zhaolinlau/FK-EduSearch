<?php
if ($result["UserRole"] == 0) {
	$_SESSION["admin"] = $result["UserRole"];
	$_SESSION["id"] = $result["StaffID"];
} elseif ($result["UserRole"] == 1) {
	$_SESSION["expert"] = $result["UserRole"];
	$_SESSION["id"] = $result["ExpertID"];
} elseif ($result['UserRole'] == 2) {
	$_SESSION["staff"] = $result["UserRole"];
	$_SESSION["id"] = $result["StaffID"];
} elseif ($result["UserRole"] == 3) {
	$_SESSION["student"] = $result["UserRole"];
	$_SESSION["id"] = $result["StudentID"];
}

header("location: ../");
