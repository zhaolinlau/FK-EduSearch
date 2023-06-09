<?php
session_start();
require "./Middleware/Authenticate.php";

try {
  require "./config/db.php";

  // Query for day interval
  $query = "SELECT ComplaintType, COUNT(*) AS total FROM complaint WHERE DATE(ComplaintCreatedDate) = CURDATE() GROUP BY ComplaintType";
  $stmt = $conn->prepare($query);
  $stmt->execute();

  // Fetch the day data and store it in the dayData array
  $dayData = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $dayData[$row['ComplaintType']] = $row['total'];
  }

  // Query for week interval
  $weekQuery = "SELECT ComplaintType, COUNT(*) AS total FROM complaint WHERE YEARWEEK(ComplaintCreatedDate) = YEARWEEK(CURDATE()) GROUP BY ComplaintType";
  $weekStmt = $conn->prepare($weekQuery);
  $weekStmt->execute();

  // Fetch the week data and store it in the weekData array
  $weekData = array();
  while ($row = $weekStmt->fetch(PDO::FETCH_ASSOC)) {
    $weekData[$row['ComplaintType']] = $row['total'];
  }

  // Query for month interval
  $monthQuery = "SELECT ComplaintType, COUNT(*) AS total FROM complaint WHERE YEAR(ComplaintCreatedDate) = YEAR(CURDATE()) AND MONTH(ComplaintCreatedDate) = MONTH(CURDATE()) GROUP BY ComplaintType";
  $monthStmt = $conn->prepare($monthQuery);
  $monthStmt->execute();

  // Fetch the month data and store it in the monthData array
  $monthData = array();
  while ($row = $monthStmt->fetch(PDO::FETCH_ASSOC)) {
    $monthData[$row['ComplaintType']] = $row['total'];
  }

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
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
    .form-group {
      margin: 10px;
    }

    .multi-line-button {
      display: inline-block;
      height: auto;
      padding: 25px 30px;
      white-space: normal;
      text-align: center;
      line-height: 1.2;
    }
  </style>
</head>

<body class="h-100">
  <?php require "./layouts/navbar.php"; ?>
  <div class="col">
    <div style="width: 1100px; border:1px solid; border-color:lightgrey; padding-left:20px;padding-right:20px; margin:0 auto; margin-top:75px; margin-bottom:20px;">
      <br>
      <label class="text2">Calculation of Complaints based on day/week/month</label>
      <hr>
      <br><br>
      <div class="container">
        <input class="btn btn-primary multi-line-button" id="dayButton" type="button" value="Calculation of total complaints by day">
        <input class="btn btn-primary multi-line-button" id="weekButton" type="button" value="Calculation of total complaints by week">
        <input class="btn btn-primary multi-line-button" id="monthButton" type="button" value="Calculation of total complaints by month">
      </div>
      <br>
      <div id="complaintContainer" class="container" style="width: 800px; height:400px">
        <canvas id="complaintDayChart" style="display:none"></canvas>
        <canvas id="complaintWeekChart" style="display:none"></canvas>
        <canvas id="complaintMonthChart" style="display:none"></canvas>
      </div>
    </div>
  </div>
  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    $(document).ready(function () {
      // Get the complaint data from PHP
      var dayData = <?php echo json_encode($dayData); ?>;
      var weekData = <?php echo json_encode($weekData); ?>;
      var monthData = <?php echo json_encode($monthData); ?>;

      // Create a new chart for day data
      var dayChart = new Chart(document.getElementById('complaintDayChart').getContext('2d'), {
        type: 'bar',
        data: {
          labels: Object.keys(dayData),
          datasets: [{
            label: 'Complaints by Day',
            data: Object.values(dayData),
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
            y: {
              beginAtZero: true,
              precision: 0
            }
          }
        }
      });

      // Create a new chart for week data
      var weekChart = new Chart(document.getElementById('complaintWeekChart').getContext('2d'), {
        type: 'bar',
        data: {
          labels: Object.keys(weekData),
          datasets: [{
            label: 'Complaints by Week',
            data: Object.values(weekData),
            backgroundColor: [
          'rgba(153, 102, 255, 0.2)',
          'rgba(165, 42, 42, 0.2)',
        ],
        borderColor: [
          'rgba(153, 102, 255, 1)',
          'rgba(165, 42, 42, 1)',
        ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
              precision: 0
            }
          }
        }
      });

      // Create a new chart for month data
      var monthChart = new Chart(document.getElementById('complaintMonthChart').getContext('2d'), {
        type: 'bar',
        data: {
          labels: Object.keys(monthData),
          datasets: [{
            label: 'Complaints by Month',
            data: Object.values(monthData),
            backgroundColor: [
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
        ],
        borderColor: [
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
        ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
              precision: 0
            }
          }
        }
      });

      // Show the day chart by default
      document.getElementById('complaintDayChart').style.display = 'block';

      // Attach click event handlers to the buttons
      document.getElementById('dayButton').addEventListener('click', function () {
        document.getElementById('complaintDayChart').style.display = 'block';
        document.getElementById('complaintWeekChart').style.display = 'none';
        document.getElementById('complaintMonthChart').style.display = 'none';
      });

      document.getElementById('weekButton').addEventListener('click', function () {
        document.getElementById('complaintDayChart').style.display = 'none';
        document.getElementById('complaintWeekChart').style.display = 'block';
        document.getElementById('complaintMonthChart').style.display = 'none';
      });

      document.getElementById('monthButton').addEventListener('click', function () {
        document.getElementById('complaintDayChart').style.display = 'none';
        document.getElementById('complaintWeekChart').style.display = 'none';
        document.getElementById('complaintMonthChart').style.display = 'block';
      });
    });
  </script>
</body>

</html>