<?php
session_start();
require "./Middleware/Authenticate.php";
try {
    require "./config/db.php";
    // Initialized the complaint data as an array
    $ComplaintData = [];
    $stmt = $conn->prepare("SELECT ComplaintStatus, Count(*) As total from complaint GROUP BY ComplaintStatus");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $ComplaintData[$row['ComplaintStatus']] = $row['total'];
    }

    $userComplaintstmt = $conn->prepare("SELECT u.UserName, COUNT(*) AS total FROM complaint c
                      JOIN user u ON u.UserID = c.UserID
                      GROUP BY u.UserName");
    $userComplaintstmt->execute();
    $result = $userComplaintstmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
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
        .form-group {
            margin: 10px;
        }
    </style>
</head>

<body class="h-100">
    <?php require "layouts/navbar.php" ?>
    <div class="container mt-5 h-300">
        <div class="row" style="margin-top:150px;">
            <div class="col-md-6" style="border:1px solid;">
                <div class="Chart">
                <p class="mt-3">Report of Total Number of Complaints based on complaint status:</p>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="col-md-6" style="border:1px solid;">
              <div class="table">
              <p class="mt-3">Report of Total User based on complaint status:</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>UserName</th>
                            <th>Total Complaint Made by General Users</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row) : ?>
                            <tr>
                                <td><?php echo $row['UserName'] ?></td>
                                <td><?php echo $row['total'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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

    </script>
</body>

</html>
