<?php
session_start();
require "./Middleware/Authenticate.php";
require './config/db.php';
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CommentStatust/Admin-UI</title>
  <link rel="shortcut icon" href="./resources/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="./node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="./node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css" rel="stylesheet" />
</head>

<body>
  <?php require "layouts/navbar.php" ?>

  <div class="row justify-content-center d-flex bg-light py-5">
    <div class="col-12">
      <div class="container"> <br>
        &nbsp &nbsp<label class="text3 fs-3">Report List</label>
        <hr>
        <div id="alertContainer"></div>
        <table class="table w-100" id="comment_report_table">
          <thead>
            <tr class="text-center">
              <th scope="col">No.</th>
              <th scope="col">Comment ID</th>
              <th scope="col">Reported By</th>
              <th scope="col">Report Description</th>
              <th scope="col">Status</th>
              <th scope="col">Reported On</th>
            </tr>
          </thead>
          <tbody>


            <?php
            //Get all data from table comment_report
            $UserID = $_SESSION['user_id'];
            $stmt = $conn->prepare('SELECT * FROM user JOIN comment_report ON user.UserID = comment_report.UserID WHERE comment_report.UserID = :user_id');
            $stmt->bindParam(':user_id', $UserID);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $count = 1;

            if ($stmt->rowCount() > 0) :
              foreach ($result as $row) :
            ?>
                
                <tr>
                  <th scope="row"><?php echo $count++ ?></th>
                  <td><?php echo $row['CommentID'] ?></td>
                  <td><?php echo $row['UserName'] ?></td>
                  <td><?php echo $row['ReportDescription'] ?></td>
                  <td><?php if ($row['ReportStatus'] == 1) {
                        echo "<p>In Investigation</p>";
                      } elseif ($row['ReportStatus'] == 2) {
                        echo "<p>On Hold</p>";
                      } elseif ($row['ReportStatus'] == 3) {
                        echo "<p>Resolved</p>";
                      }
                      ?></td>
                  <td><?php echo $row['Reported_On'] ?></td>
                  
                </tr>
            <?php
              endforeach;
            endif;
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./resources/js/livechat.js"></script>
  <script src="./node_modules/chart.js/dist/chart.umd.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js"></script>
  <script src="./resources/js/datatables.js"></script>
  <script>
    $.fn.dataTable.Buttons.defaults.dom.button.className =
      "btn btn-outline-primary";
    $("#comment_report_table").DataTable({
      language: {
        searchPlaceholder: "Search by a field...",
      },
      dom: "Bfrtip",
      buttons: [
        "colvis",
        "pageLength",
        {
          extend: "collection",
          text: "Export",
          buttons: ["csv", "excel", "pdf"],
        },
        "print",
      ],
    });

    document.getElementById("CommentReportStatus").classList.add("active");
  </script>


</body>

</html>
