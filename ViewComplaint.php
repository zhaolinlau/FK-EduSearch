<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | Dashboard</title>
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
  <style>
    .form-group{
    margin:10px;
    }
  </style>
</head>

<body class="h-100">
	<nav class="navbar navbar-expand-lg shadow-sm">
		<div class="container-fluid">
			<a class="navbar-brand" href="./">
				<img src="./logo.png" class="rounded-circle" width="50px">
				<span class="mx-3 fw-bold">FK-EduSearch</span>
			</a>

		</div>
	</nav>
	<div class="row h-100">
		<div class="col-3 h-300">
			<div class="offcanvas-lg offcanvas-end p-2 h-100" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
				<div class="offcanvas-body h-100">
					<ul class="nav nav-pills flex-column h-100 border-end pe-5 ps-4">
						<li class="nav-item mt-3">
							<a class="nav-link border" href="#">User Profile</a>
						</li>
						<li class="nav-item">
              <a class="nav-link border" href="#">Discussion Board</a>
            </li>
            <li class="nav-item">
              <a class="nav-link border" href="#">Report</a>
            </li>
            <li class="nav-item">
             <a class="nav-link active" aria-current="page" href="#">Complaint</a>
            </li>
	          <li class="nav-item">
             <a class="nav-link border" href="#"><b>Log Out</b></a>
           </li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col" style="margin-top:20px; margin-bottom:20px">
			<div style="width: 800px; border:1px solid; border-color:lightgrey">
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
    <label for="PostID" class="col-sm-2 col-form-label">Post ID</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="PostID" placeholder="Post ID" value="1" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="FeedbackID" class="col-sm-2 col-form-label">Feedback ID</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="FeedbackID" placeholder="Feedback ID" value="1" disabled>
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
  <input class="btn btn-primary" type="button" value="Edit" style="margin-left: 30px; padding:10px 30px;">
  <input class="btn btn-primary" id="delete-btn" type="button" value="Delete" style="margin-left: 80px; padding:10px 30px;">
  <input class="btn btn-primary" type="button" value="Back" style="margin-left: 80px;padding:10px 30px;">
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
  <div class="footer" style="background-color:lightblue; padding:10px 10px;">
	<p class="text-center" >Copyright © 2023 FK-EduSearch System</p>
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
