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
  <span class="text2">Edit Expert Profile Page</span>
  <div>
    <a href="./expert.php" class="btn btn-light btn-sm me-2">Back</a>
    <a href="#" class="btn btn-light btn-sm">Save Changes</a>
  </div>
  </div>
	<hr>
	<table class="table table-borderless">
  <tr>
  <td rowspan="7" style="width: 25%; position: relative;">
  <!-- Placeholder div with gray background color and border -->
  <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; background-color: gray; border: 1px solid white;">
    <!-- Input field for uploading an image -->
     <input type="file" style="width: 100%; height: 100%; opacity: 0; cursor: pointer;">
     </div>
  </td>

    <td style="width: 15%;"><b>Name</b></td>
    <td style="width: 60%;"><input type="text" class="form-control" value="UserName">
	</td>
  	</tr>
  	<tr>
    	<td><b>Email</b></td>
    	<td><input type="text" class="form-control" value="UserEmail"></td>
 	 </tr>
 	 <tr>
    	<td><b>Role</b></td>
   	 	<td><input type="text" class="form-control" value="UserRole"></td>
 	</tr>
 	 <tr>
    	<td colspan="2" class="text-center"><h4>Social Media Accounts</h4></td>
    
	  </tr>
 	<tr>
    	<td><span class="fa fa-facebook"></span></td>
   		<td><input type="text" class="form-control" value="Facebook Name"></td>
 	</tr>
 	 <tr>
    	<td><span class="fa fa-twitter"></span></td>
    	<td><input type="text" class="form-control" value="Twitter Handle"></td>
  	</tr>
  	<tr>
    	<td><span class="fa fa-linkedin"></span></td>
    	<td><input type="text" class="form-control" value="LinkedIn Name"></td>
  	</tr>
</table>

<div class="accordion" id="accordionExpertPage">
  <div class="accordion-item">
    <h2 class="accordion-header" id="researchArea">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <b>Research Area</b>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
    <div class="accordion-body">
      <input type="text" class="form-control border-0" value="UserResearchArea">
    </div>
  </div>
</div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="areaOfExpertise">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <b>Area of Expertise</b>
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <input type="text" class="form-control border-0" value="ExpertAreaOfExpertise">
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="publicationList">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        <b>Publication List</b>
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <input type="text" class="form-control border-0" value="ExpertPublicationList">
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="publicationList">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
        <b>Curriculum Vitae</b>
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <label for="fileInput" style="cursor: pointer; color:blue;">
         Click here to select a file
         <input type="file" id="expertCV" style="width: 100%; opacity: 0; cursor: pointer;">
        </label>
      </div>
    </div>
  </div>
</div>
<br>

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