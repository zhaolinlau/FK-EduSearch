<?php
if (!(isset($_SESSION["student"]) || isset($_SESSION['staff']))) {
	echo "<script>alert('You are disallowed to access this page!'); window.location.href='./';</script>";
}
