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
<?php require "layouts/navbar.php"?>
		<div class="col" style="margin-top:80px">
			<div style="width: 900px; margin:0 auto; border:1px solid; border-color:lightgrey"><br>
	&nbsp &nbsp<label class="text2">File A Complaint</label>
	<hr>

	<?php
require "./config/db.php";

try{
	$UserID = $_SESSION["user_id"];
	$query = "SELECT UserName From User where UserID=$UserID";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$UserName= $row["UserName"];
	}
	}catch(PDOException $e){
	echo $e->getMessage();
	}
	?>
  <form action="AfterFileComplaint.php" method="post">
  <div class="form-group row">
    <label for="UserID" class="col-sm-2 col-form-label">User ID</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="UserID" name="UserID" placeholder="UserID">
    </div>
  </div>
  <div class="form-group row">
    <label for="Username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="Username" name="Username" placeholder="Username">
    </div>
  </div>
  <div class="form-group row">
    <label for="PostTitle" class="col-sm-2 col-form-label">Post Title</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="PostTitle" placeholder="Post Title">
    </div>
  </div>
  <div class="form-group row">
    <label for="Feedback" class="col-sm-2 col-form-label">Expert Feedback</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="Feedback"  placeholder="Expert Feedback">
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
  <input class="btn btn-primary" type="submit" name="submit"value="Submit">
    </div>
  </div>
</form>
<?php
require "./config/db.php";

try{
	$UserID = $_SESSION["user_id"];
	if(isset($_POST["submit"])){
	$ComplaintType=$_POST["ComplaintType"];
	$ComplaintDescription=$_POST["ComplaintDescription"];
	$ComplaintStatus="In Investigation";
	$ComplaintCreatedDate=date('Y/m/d H:i:s');
	$expertFeedback=$_POST["ExpertFeedback"];
	$stmt = $conn->prepare("SELECT FeedbackID FROM feedback WHERE ExpertFeedback = :expertFeedback");
	$stmt->bindParam(':expertFeedback', $expertFeedback);
	$stmt->execute();

	if ($stmt->rowCount() > 0) {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$feedbackID = $row['FeedbackID'];

			echo "The feedback ID for the expert feedback '$expertFeedback' is: $feedbackID";
	} else {
			echo "No feedback found for the given expert feedback.";
	}
	}
	}catch(PDOException $e){
	echo $e->getMessage();
	}
	?>
</div>
	</div>
</div>
	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>
