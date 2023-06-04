<?php
if (!isset($_SESSION["expert"])) {
	echo "<script>alert('You are disallowed to access this page!'); window.location.href='./';</script>";
}
