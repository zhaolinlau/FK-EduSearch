<?php
session_start();
require "./Middleware/Authenticate.php";
 try{
	require "./config/db.php";
	$complaintID = $_GET['ComplaintID'];
	$UserID = $_SESSION["user_id"];

	$stmt=$conn->prepare("SELECT u.UserID, u.UserName,c.ComplaintPhoto,c.FeedbackID,c.ComplaintResponse, c.ComplaintStatus,c.ComplaintDescription,c.ComplaintType,c.ComplaintCreatedDate FROM user u
	                      JOIN complaint c ON c.UserID = u.UserID
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
		<div class="col" style="margin-top:80px; margin-bottom:30px">
			<div style="width: 900px; border:1px solid; margin:0 auto;border-color:lightgrey">
    	<br>
	&nbsp &nbsp<label class="text2">View Complaint</label>
	<hr>
  <div class="form-group row">
    <label for="UserID" class="col-sm-2 col-form-label">User ID</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="UserID" placeholder="UserID" value="<?php echo $complaint['UserID']?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="Username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="Username" placeholder="Username" value="<?php echo $complaint['UserName']?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="PostTitle" class="col-sm-2 col-form-label">Post Title</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="Post Title" placeholder="Post Title" value="<?php echo $feedback['PostTitle']?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="Feedback" class="col-sm-2 col-form-label">Feedback</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="Feedback" placeholder="Expert Feedback" value="<?php echo $feedback['FeedbackID']?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="ComplaintType" class="col-sm-2 col-form-label">Complaint Type</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="ComplaintType" placeholder="Complaint Type" value="<?php echo $complaint['ComplaintType']?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="ComplaintDescription" class="col-sm-2 col-form-label">Complaint Description</label>
    <div class="col-sm-8">
      <textarea class="form-control" id="ComplaintDescription" placeholder="Complaint Description" disabled><?php echo $complaint['ComplaintDescription']?></textarea>
    </div>
  </div>
  <div class="form-group row">
  <label for="ComplaintDate" class="col-sm-2 col-form-label">Complaint Date</label>
  <div class="col-sm-8">
     <input type="text" class="form-control" id="ComplaintDate" placeholder="Complaint Date" value="<?php echo date("Y-m-d",$timestamp); ?>" disabled>
  </div>
</div>
  <div class="form-group row">
  <label for="ComplaintTime" class="col-sm-2 col-form-label">Complaint Time</label>
  <div class="col-sm-8">
     <input type="text" class="form-control" id="ComplaintTime" placeholder="Complaint Time" value="<?php echo date("H:i:s",$timestamp); ?>"disabled>
  </div>
  </div>
  <div class="form-group row">
  <label for="ComplaintStatus" class="col-sm-2 col-form-label">Complaint Status</label>
  <div class="col-sm-8">
     <input type="text" class="form-control" id="ComplaintStatus" placeholder="Complaint Status" value="<?php echo $complaint['ComplaintStatus'];?>"disabled>
  </div>
  </div>
  <div class="form-group row">
  <label for="ComplaintResponse" class="col-sm-2 col-form-label">Complaint Response</label>
  <div class="col-sm-8">
     <input type="text" class="form-control" id="ComplaintResponse" placeholder="Complaint Response" value="<?php echo $complaint['ComplaintResponse'];?>"disabled>
  </div>
  </div>
  <div class="form-group row">
  <label for="ComplaintPhoto" class="col-sm-2 col-form-label">Complaint Photo</label>
  <div class="col-sm-8">
  <button class="btn btn-outline-info ms-2 preview-button" style="width:280px;" data-bs-toggle="modal" data-bs-target="#imageModal<?php echo $complaint['ComplaintPhoto']; ?>" data-image="./uploads/<?php echo $complaint['ComplaintPhoto']?>">
    View Complaint Photo  <i class="fa-regular fa-file-image fa-lg" style="color: #09f1ed;"></i>
  </button>
  </div>
  </div>
  <div class="form-group row">
  <div class="col-sm-8">
	<input class="btn btn-primary" type="button" value="Edit" style="margin-top:20px; margin-left: 100px; padding:10px 30px;" onclick="window.location.href='EditComplaint.php?ComplaintID=<?php echo $complaintID;?>'">
  <input class="btn btn-primary" type="button" value="Back" style="margin-top:20px; margin-left: 250px;padding:10px 30px;" onclick="window.location.href='ComplaintList.php'">
  </div>
  </div>
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
<!-- Modal -->
<div class="modal fade" id="imageModal<?php echo $complaint['ComplaintPhoto']; ?>" tabindex="-1" aria-labelledby="imageModalLabel<?php echo $complaint['ComplaintPhoto']; ?>" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="imageModalLabel<?php echo $complaint['ComplaintPhoto']; ?>">Screenshot</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <img id="previewImage<?php echo $complaint['ComplaintPhoto']; ?>" class="img-fluid" alt="Preview">
                      </div>
                    </div>
                  </div>
                </div>
<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script>
   const previewButtons = document.querySelectorAll('.preview-button');

previewButtons.forEach(button => {
  button.addEventListener('click', function() {
    const imagePath = this.getAttribute('data-image');
    const modalId = this.getAttribute('data-bs-target').replace('#imageModal', '');
    const previewImage = document.getElementById('previewImage' + modalId);
    previewImage.src = imagePath;
  });
});
</script>
</body>
</html>
