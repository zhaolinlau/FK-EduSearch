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
  <title>ReportComment</title>
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

  <div class="row justify-content-center d-flex py-5">
    <div class="col-12 my-auto text-center text-center">
      <div class="col-11 mx-auto shadow mt-5 text-center">
        <br><br>
        <form action="./controllers/CreateCommentReportController.php" method="post">
          <div class="container">
            <h3>Comment Report</h3>
            <hr><br>
            <div class="text-start">
              <label class="text-start mb-1" for="ReportDescription">Comment Report Description : <i>(Reasons of why reporting to this comment)</i></label>
              <textarea name="ReportDescription" id="ReportDescription" class="form-control fst-italic" rows="5" required></textarea>
              <input type="hidden" name="CommentID" value="<?php echo $_GET['comment_id']; ?>">
            </div>
            <br>
            <button type="submit" class="btn btn-outline-secondary">Save</button>
            <br>
            <br>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./resources/js/livechat.js"></script>
  <script src="./node_modules/chart.js/dist/chart.umd.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script>
    //
  </script>
</body>

</html>