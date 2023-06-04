<?php
if (!$_SESSION["user_id"]) {
	echo "<script>alert('You are disallowed to access this page!'); window.location.href='./login.php';</script>";
}
