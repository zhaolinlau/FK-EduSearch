<?php
if (!isset($_SESSION["admin"])) {
	echo "<script>alert('You are disallowed to access this page!'); window.location.href='./';</script>";
}
