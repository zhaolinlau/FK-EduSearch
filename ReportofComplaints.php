<?php
session_start();
require "./Middleware/Authenticate.php";
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | Report of Complaints</title>
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
			<div style="width: 900px; border:1px solid; border-color:lightgrey; padding-left:5px;padding-right:5px; margin:0 auto; margin-top:20px; margin-bottom:20px;"><br>
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
