<?php
session_start();
require "./Middleware/Authenticate.php";
 try{
	require "./config/db.php";
	$complaintID = $_GET['ComplaintID'];
	$UserID = $_SESSION["user_id"];
	if(isset($_POST["Submit"])){
		$complaintType=$_POST["ComplaintType"];
		$complaintDescription=$_POST["ComplaintDescription"];
	  $stmt=$conn->prepare("UPDATE complaint set ComplaintType = :complaintType, ComplaintDescription = :complaintDescription 
	                      where ComplaintID = :complaintID"); 
		$stmt->bindParam(':complaintType', $complaintType);
		$stmt->bindParam(':complaintDescription', $complaintDescription);
		$stmt->bindParam(':complaintID',$complaintID);
		$stmt->execute();

		echo '
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const alertContainer = document.getElementById("alertContainer");
                    const successAlert = document.createElement("div");
                    successAlert.classList.add("alert", "alert-success", "alert-dismissible", "fade", "show");
                    successAlert.innerHTML = `The complaint record is successfully edited! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`;
                    alertContainer.appendChild(successAlert);
                });
            </script>';
	}

	$stmt=$conn->prepare("SELECT u.UserID, u.UserName,c.FeedbackID, c.ComplaintStatus,c.ComplaintDescription,c.ComplaintType,c.ComplaintCreatedDate FROM user u
	                      JOIN complaint c ON u.UserID = c.UserID
	                      WHERE ComplaintID = :complaintID;");
	 $stmt->bindParam(':complaintID', $complaintID);
	 $stmt->execute();
	 $complaint = $stmt->fetch(PDO::FETCH_ASSOC);
	 $timestamp=strtotime($complaint['ComplaintCreatedDate']);
	 $feedbackID=$complaint["FeedbackID"];
	 $stmt=$conn->prepare("SELECT c.ComplaintID, f.ExpertFeedback, f.FeedbackID, p.PostTitle
	 											FROM complaint c
	 											JOIN feedback f ON c.FeedbackID = f.FeedbackID
	 											JOIN post p ON f.PostID = p.PostID
												WHERE f.FeedbackID = :feedbackID");
	 $stmt->bindParam(':feedbackID', $feedbackID);
	 $stmt->execute();
	 $feedback= $stmt->fetch(PDO::FETCH_ASSOC);
	$conn = null;
}catch(PDOException $e){
	echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | Edit Complaint</title>
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
  <form method="post">
  <div class="form-group row">
    <label for="ComplaintID" class="col-sm-2 col-form-label">Complaint ID</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="ComplaintID" placeholder="ComplaintID" value="<?php echo $feedback["ComplaintID"]?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="Username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="Username" placeholder="Username" value="<?php echo $complaint["UserName"]?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="PostTitle" class="col-sm-2 col-form-label">Post Title</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="PostTitle" placeholder="Post Title" value="<?php echo $feedback["PostTitle"]?>"disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="Feedback" class="col-sm-2 col-form-label">Expert Feedback</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="Feedback" placeholder="Expert Feedback" value="<?php echo $feedback["ExpertFeedback"]?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="ComplaintType" class="col-sm-2 col-form-label">Complaint Type</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="ComplaintType" name="ComplaintType" placeholder="Complaint Type" value="<?php echo $complaint["ComplaintType"]?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="ComplaintDescription" class="col-sm-2 col-form-label">Complaint Description</label>
    <div class="col-sm-8 ">
      <textarea class="form-control" id="ComplaintDescription" name="ComplaintDescription" placeholder="Complaint Description"><?php echo $complaint["ComplaintDescription"]?></textarea>
    </div>
  </div>
  <div class="form-group row">
  <div class="col-sm-8 offset-sm-4">
  <input class="btn btn-primary" id="confirm-btn" type="submit" name="Submit" value="Confirm">
  </div>
  </div>
</form>
  </div>
  </div>

  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
<script>