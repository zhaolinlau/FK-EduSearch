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
			<div style="width: 900px; border:1px solid; border-color:lightgrey; padding-left:5px;padding-right:5px; margin-top:20px; margin-bottom:20px;"><br>
      <br>
	&nbsp &nbsp<label class="text2">Report of Complaints</label>
	<hr>
  <div class="container">
  <p>Report of Total Number of Complaints based on complaint type:</p>
  <input class="btn btn-primary" type="button" value="View" style="margin-left: 30px; padding:10px 30px;">
<input class="btn btn-primary" type="button" value="Scan QR code to view" style="margin-left: 40px; padding:10px 30px;">
  <div class="col-md-8">
  <canvas id="myChart"></canvas>
  <img src="./download_qr.png">
</div>
  </div>
</div>
</div>
  <div class="footer" style="background-color:lightblue; padding:10px 10px;">
	<p class="text-center" >Copyright © 2023 FK-EduSearch System</p>
</div>
  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
<script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["Unsatisfied Expert’s Feedback", "Wrongly Assigned Research Area"],
      datasets: [{
        label: 'Complaint Type',
        data: [2, 4],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>

</body>
</html>
