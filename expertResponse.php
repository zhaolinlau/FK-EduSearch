</html>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | Expert</title>
	<link rel="shortcut icon" href="./resources/img/favicon.ico" type="image/x-icon">
	<link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
	<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./custom_css/custom.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>
<nav class="navbar bg-body-tertiary border-bottom">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center"href="#">
      <img src="./resources/img/logo.png" alt="FK-EDUSEARCH" width="150" height="150">   
		</a>		
		<label class="text1"><b>FK-EduSearch System</b></label> 
		<div class="profileicon"><a href="#"><i class="fa fa-user"></i></a></div>
  </div>
</nav>
<div class="row">
<div class="col-2">
<ul class="nav flex-column border">
  <li class="nav-item">
    <a class="nav-link active border" href="#">User Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link border" href="#">Discussion Board</a>
  </li>
  <li class="nav-item">
    <a class="nav-link border" href="#">Report</a>
  </li>
  <li class="nav-item">
    <a class="nav-link border" href="#">Complaint</a>
  </li>
	<li class="nav-item">
    <a class="nav-link border" href="#"><b>Log Out</b></a>
  </li>
	<br><br><br><br><br><br><br><br><br>
</ul>
</div>
<div class="col-9">
	<br>
	<div class="d-flex justify-content-between align-items-center">
    <span class="text2" id="PostTitle"><b>Title of Post</b></span>
	  <span><b>Status</b> : <span id="PostStatus"> Active </span></span>
  </div>
	<hr>
  <i class="fa fa-thumbs-up" style="color:blue; float:right;"> <span id="PostLike">5</span></i>
	

</div>

<footer class="footer fixed-bottom">
  <div class="container-fluid">
    <p class="text-center" style="margin-bottom: 0;">Copyright © 2023 FK-EduSearch System</p>
  </div>
</footer>

	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
	<script src="./src/plugins/livechat.js"></script>
</body>

</html>
