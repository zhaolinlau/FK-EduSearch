<?php
session_start();
require "./Middleware/Authenticate.php";
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | Calculation of Complaints</title>
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
<?php require "./layouts/navbar.php"; ?>
		<div class="col" >
			<div style="width: 900px; border:1px solid; border-color:lightgrey; padding-left:20px;padding-right:20px; margin:0 auto; margin-top:75px; margin-bottom:20px;"><br>
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
	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>
