<?php
session_start();
require "./Middleware/Authenticate.php";
try{
  require "./config/db.php";
//initialized the complaintdata as array
$ComplaintData=[];
$stmt=$conn->prepare("SELECT ComplaintType, Count(*) As total from complaint GROUP BY ComplaintType");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $ComplaintData[$row['ComplaintType']] = $row['total'];
}
}catch(PDOException $e){
	echo "Error: " . $e->getMessage();
}
$conn=null;
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
  <input class="btn btn-primary" id="viewButton" type="button" value="View" style="margin-left: 30px; padding:10px 30px;margin-bottom:30px;">
<input class="btn btn-primary" id="qrbutton" type="button" value="Scan QR code to view" style="margin-left: 40px; padding:10px 30px; margin-bottom:30px;">
  <div class="col-md-8" id="chartContainer">
  <canvas id="myChart" style="display:none;"></canvas>
</div>
  </div>
</div>
</div>
<!-- QR Code Modal -->
<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="qrModalLabel">QR Code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="qrContainer">
        </div>
      </div>
    </div>
  </div>
</div>

  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
  <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<script>
  // Pass the complaint data to the JavaScript code
  var complaintData = <?php echo json_encode($ComplaintData); ?>;

  // Convert the complaint data into labels and values arrays for the chart
  var labels = Object.keys(complaintData);
  var values = Object.values(complaintData);
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: 'Complaint Type',
        data: values,
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

  document.getElementById('viewButton').addEventListener('click', function () {
    // Update the chart data and options
    document.getElementById('myChart').style.display = 'block';
    myChart.data.labels = labels;
    myChart.data.datasets[0].data = values;
    myChart.update();
  });

  document.getElementById('qrbutton').addEventListener('click', function () {
  var complaintData = <?php echo json_encode($ComplaintData); ?>;
  var complaintType = Object.keys(complaintData);
  var totalComplaints = Object.values(complaintData);
  var data = '';
  
  // Construct the data string with complaint type and total complaints
  for (var i = 0; i < complaintType.length; i++) {
    data += complaintType[i] + ' = ' + totalComplaints[i] + ', ';
  }
  
  var url = 'https://api.qrserver.com/v1/create-qr-code/?data=' + encodeURIComponent(data) + '&size=200x200';
  $('#qrContainer').empty();
  
  // Create a link element with the QR code as the href
  var qrLink = document.createElement('a');
  qrLink.href = url;
  qrLink.target = '_blank';
  
  // Create an image element for the QR code
  var qrImage = document.createElement('img');
  qrImage.src = url;
  qrImage.alt = 'QR Code';
  qrImage.style.width = '200px';
  qrImage.style.height = '200px';
  
  // Append the image element to the link element
  qrLink.appendChild(qrImage);
  
  // Append the link element to the qrContainer
  document.getElementById('qrContainer').appendChild(qrLink);
  
  $('#qrModal').modal('show');
});

</script>
</body>
</html>