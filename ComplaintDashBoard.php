<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | </title>
	<link rel="shortcut icon" href="./src/img/favicon.ico" type="image/x-icon">
	<link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
	<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
	<style>
		.navbar-brand {
  padding: 0;
}
.navbar-brand img{
  border-radius: 5px; 
}
.container{
	margin:0 5px;
}
.text1{
	font-size:36px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
}
.text2{
	font-size:18px;
}
.profileicon .fa-user
{
  font-size: 90px;
	padding:10px 20px;
}
.profileicon {
  border: 1.3px solid black;
	border-radius:58px;
	background-color: rgba(224, 223, 226);
}
.col-9 button{
	padding:30px 30px;
	margin-right:60px;
}
.footer{
	background-color:lightblue;
	padding:10px 10px;
	align-items:center;
}
.col-9 hr {
  border: 1px solid;
	border-color:black;
}
	</style>
</head>

<body>
<nav class="navbar bg-body-tertiary border-bottom">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center"href="#">
      <img src="./logo.png" alt="FK-EDUSEARCH" width="150" height="150">   
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
	&nbsp &nbsp<label class="text2">Complaint</label>
	<hr>
	<button type="button" class="btn btn-primary btn-1g">All Complaint Information</button>
  <button type="button" class="btn btn-secondary btn-1g">Calculation of Complaints</button>
	<button type="button" class="btn btn-info btn-1g">Report of Complaints</button>
</div>
</div>
<div class="footer">
	<p class="text-center">Copyright © 2023 FK-EduSearch System</p>
</div>
	<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
