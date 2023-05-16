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
		<div class="col" >
			<div style="width: 900px; border:1px solid; border-color:lightgrey; padding-left:20px;padding-right:20px; margin-top:20px; margin-bottom:20px;"><br>
      <br>
	&nbsp &nbsp<label class="text2">Calculation of Complaints</label>
	<hr>
  <label>Total Number of Complaints based on complaint type</label>
  <input class="btn btn-primary" type="button" value="Click To View" style="margin-left: 30px; padding:10px 30px;">
  <br><br>
  <label><b><u>Complaint List</u></b></label>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Complaint ID</th>
      <th scope="col">Username</th>
      <th scope="col">Complaint Type</th>
      <th scope="col">Complaint Description</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Complaint Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mingkang</td>
      <td>Unsatisfied Expert’s Feedback</td>
      <td>The feedback doesn't provide me a clear direction</td>
      <td>4/5/2023</td>
      <td>7:48pm</td>
      <td>In Investigation</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>William</td>
      <td>Wrongly Assigned Research Area</td>
      <td>The feedback provided is out of my reseaarch area</td>
      <td>5/5/2023</td>
      <td>11:48am</td>
      <td>On Hold</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Sit Wei Min</td>
      <td>Wrongly Assigned Research Area</td>
      <td>The feedback provided is not related to my reseaarch area</td>
      <td>5/4/2023</td>
      <td>1:48pm</td>
      <td>Resolved</td>
    </tr>
  </tbody>
</table>
<div class="container">
<input class="btn btn-primary" type="button" value="Calculation of total
complaints by particular day" style="margin-left: 30px; padding:10px 30px;">
<input class="btn btn-primary" type="button" value="Calculation of total
complaints by week" style="margin-left: 40px; padding:10px 30px;">
<input class="btn btn-primary" type="button" value="Calculation of total
complaints by month" style="margin-left: 40px; padding:10px 30px;">
</div>
<br>
  </div>
</div>
  <div class="footer" style="background-color:lightblue; padding:10px 10px;">
	<p class="text-center" >Copyright © 2023 FK-EduSearch System</p>
</div>
	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>
