<?php
session_start();
require "./Middleware/Authenticate.php";
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | View Complaint</title>
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
<?php require "layouts/navbar.php"?>
		<div class="col" style="margin-top:80px; margin-bottom:20px">
			<div style="width: 900px; border:1px solid; margin:0 auto;border-color:lightgrey">
    	<br>
	&nbsp &nbsp<label class="text2">View Complaint</label>
	<hr>
  <form>
  <div class="form-group row">
    <label for="UserID" class="col-sm-2 col-form-label">User ID</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="UserID" placeholder="UserID" value="1" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="Username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="Username" placeholder="Username" value="Mingkang" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="PostTitle" class="col-sm-2 col-form-label">Post Title</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="Post Title" placeholder="Post Title" value="DBMS Secirty" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="Feedback" class="col-sm-2 col-form-label">Feedback</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="Feedback" placeholder="Expert Feedback" value="You can find Google. Google will give you direction." disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="ComplaintType" class="col-sm-2 col-form-label">Complaint Type</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="ComplaintType" placeholder="Complaint Type" value="Unsatisfied Expert’s Feedback" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="ComplaintDescription" class="col-sm-2 col-form-label">Complaint Description</label>
    <div class="col-sm-8">
      <textarea class="form-control" id="ComplaintDescription" placeholder="Complaint Description" disabled>The feedback doesn't provide me a clear direction</textarea>
    </div>
  </div>
  <div class="form-group row">
  <label for="ComplaintDate" class="col-sm-2 col-form-label">Complaint Date</label>
  <div class="col-sm-8">
     <input type="text" class="form-control" id="ComplaintDate" placeholder="Complaint Date" value="04/05/2023" disabled>
  </div>
</div>
  <div class="form-group row">
  <label for="ComplaintTime" class="col-sm-2 col-form-label">Complaint Time</label>
  <div class="col-sm-8">
     <input type="text" class="form-control" id="ComplaintTime" placeholder="Complaint Time" value="7:48pm"disabled>
  </div>
  </div>
  <div class="form-group row">
  <label for="ComplaintStatus" class="col-sm-2 col-form-label">Complaint Status</label>
  <div class="col-sm-8">
     <input type="text" class="form-control" id="ComplaintStatus" placeholder="Complaint Status" value="In Investigation"disabled>
  </div>
  </div>
  <div class="form-group row">
  <div class="col-sm-8">
  <input class="btn btn-primary" type="button" value="Edit" style="margin-left: 30px; padding:10px 30px;" onclick="window.location.href='EditComplaint.php'">
  <input class="btn btn-primary" id="delete-btn" type="button" value="Delete" style="margin-left: 80px; padding:10px 30px;">
  <input class="btn btn-primary" type="button" value="Back" style="margin-left: 80px;padding:10px 30px;" onclick="window.location.href='SearchComplaint.php'">
  </div>
  </div>
</form>
  </div>
  </div>
  <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="alertModalLabel">Record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="alertMessage"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
<script>
    const deleteBtn = document.getElementById('delete-btn');
  deleteBtn.addEventListener('click', function() {
    const confirmed = confirm("Are you sure you want to delete this record?");
    if (confirmed) {
      showAlert("The record of complaint is sucessfully deleted");
    }
  });
  function showAlert(message) {
    var alertMessage = document.getElementById("alertMessage");
    alertMessage.textContent = message;
    var alertModal = new bootstrap.Modal(document.getElementById("alertModal"));
    alertModal.show();
  }
  </script>
  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
