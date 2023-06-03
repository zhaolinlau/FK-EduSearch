<?php
session_start();
require "./Middleware/Authenticate.php";
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | Search Complaint</title>
	<link rel="shortcut icon" href="./src/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
  <style>
    .form-group{
    margin:10px;
    }
  </style>
</head>

<body class="h-100">
<?php require "layouts/navbar.php" ?>
		<div class="col" style="margin-top:80px; margin-bottom:20px">
			<div style="width: 900px;margin:0 auto; border:1px solid; border-color:lightgrey">
    	<br>
      <div id="alertContainer"></div>
	&nbsp &nbsp<label class="text2">Edit Complaint</label>
	<hr>
  <form>
  <div class="form-group row">
    <label for="UserID" class="col-sm-2 col-form-label">User ID</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="UserID" placeholder="UserID" value="1">
    </div>
  </div>
  <div class="form-group row">
    <label for="Username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="Username" placeholder="Username" value="Mingkang">
    </div>
  </div>
  <div class="form-group row">
    <label for="PostTitle" class="col-sm-2 col-form-label">Post Title</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="PostTitle" placeholder="Post Title" value="DBMS Security">
    </div>
  </div>
  <div class="form-group row">
    <label for="Feedback" class="col-sm-2 col-form-label">Expert Feedback</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="Feedback" placeholder="Expert Feedback" value="You can find Google. Google will give you direction.">
    </div>
  </div>
  <div class="form-group row">
    <label for="ComplaintType" class="col-sm-2 col-form-label">Complaint Type</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="ComplaintType" placeholder="Complaint Type" value="Unsatisfied Expert’s Feedback">
    </div>
  </div>
  <div class="form-group row">
    <label for="ComplaintDescription" class="col-sm-2 col-form-label">Complaint Description</label>
    <div class="col-sm-8 ">
      <textarea class="form-control" id="ComplaintDescription" placeholder="Complaint Description">The feedback doesn't provide me a clear direction</textarea>
    </div>
  </div>
  <div class="form-group row">
  <div class="col-sm-8 offset-sm-4">
  <input class="btn btn-primary" id="confirm-btn" type="button" value="Confirm" onclick="showAlert()">
  </div>
  </div>
</form>
  </div>
  </div>
<script>
function showAlert() {
    var alertContainer = document.getElementById("alertContainer");
    var alertHTML = `
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        The complaint record is sucessfully edited!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    `;
    alertContainer.innerHTML = alertHTML;
  }
</script>
  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
<script>