<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | After File A Complaint</title>
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
		<div class="col-3 h-100">
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
		<div class="col" style="margin-top:20px">
			<div style="width: 800px; border:1px solid; border-color:lightgrey">
      <br>
	&nbsp &nbsp<label class="text2">After File A Complaint</label>
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
    <label for="ComplaintDescription" class="col-sm-2 col-form-label">Feedback ID</label>
    <div class="col-sm-8">
      <textarea class="form-control" id="ComplaintDescription" placeholder="Complaint Description" disabled>The feedback doesn't provide me a clear direction</textarea>
    </div>
  </div>
  <div class="form-group row">
  <label for="ComplaintID" class="col-sm-2 col-form-label">Complaint ID</label>
  <div class="col-sm-4">
     <input type="text" class="form-control" id="ComplaintID" placeholder="Complaint ID" value="1" disabled>
  </div>
  </div>
</form>
</div>
</div>
  <div class="footer" style="background-color:lightblue; padding:10px 10px;">
	<p class="text-center" >Copyright © 2023 FK-EduSearch System</p>
</div>
	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>


<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | File a Complaint</title>
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
		<div class="col-3 h-100">
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
		<div class="col" style="margin-top:20px">
			<div style="width: 800px; border:1px solid; border-color:lightgrey"><br>
	&nbsp &nbsp<label class="text2">File A Complaint</label>
	<hr>
  <form>
  <div class="form-group row">
    <label for="UserID" class="col-sm-2 col-form-label">User ID</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="UserID" placeholder="UserID">
    </div>
  </div>
  <div class="form-group row">
    <label for="Username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="Username" placeholder="Username">
    </div>
  </div>
  <div class="form-group row">
    <label for="PostID" class="col-sm-2 col-form-label">Post ID</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="PostID" placeholder="Post ID">
    </div>
  </div>
  <div class="form-group row">
    <label for="FeedbackID" class="col-sm-2 col-form-label">Feedback ID</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="FeedbackID" placeholder="Feedback ID">
    </div>
  </div>
  <div class="form-group row">
    <label for="ComplaintType" class="col-sm-2 col-form-label">Complaint Type</label>
    <div class="col-sm-8">
    <select class="form-select" aria-label="Complaint Type">
          <option selected>Select Complaint Type</option>
          <option value="1">Unsatisfied Expert’s Feedback</option>
          <option value="2">Wrongly Assigned Research Area</option>
          </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="ComplaintDescription" class="col-sm-2 col-form-label">Complaint Description</label>
    <div class="col-sm-8">
      <textarea class="form-control" id="ComplaintDescription" placeholder="Complaint Description"></textarea>
    </div>
  </div>
  <div class="form-group row">
  <div class="col-sm-8 offset-sm-4">
  <input class="btn btn-primary" type="submit" value="Submit">
    </div>
  </div>
</form>
</div>
	</div>
</div>
  <div class="footer" style="background-color:lightblue; padding:10px 10px;">
	<p class="text-center" >Copyright © 2023 FK-EduSearch System</p>
</div>
	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>