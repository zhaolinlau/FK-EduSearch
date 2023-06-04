<?php
if (!isset($_SESSION["admin"])) {
	echo "<script>alert('You are disallowed to access!'); history.back();</script>";
}
