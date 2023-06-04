<?php
if (!isset($_SESSION["expert"])) {
	echo "<script>alert('You are disallowed to access!'); history.back();</script>";
}
