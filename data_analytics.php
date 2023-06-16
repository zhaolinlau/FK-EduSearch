<?php
session_start();
require "./config/db.php";
require "./Middleware/Authenticate.php";
require './Middleware/AdminAuth.php';
?>



<?php
// Get total likes
try {
  $stmt = $conn->prepare('SELECT COUNT(*) AS total_likes FROM likes');
  $stmt->execute();
  $likes = $stmt->fetch(PDO::FETCH_OBJ);
  $totalLikes = $likes->total_likes;
  // Get total posts
  $stmt = $conn->prepare('SELECT COUNT(*) AS total_posts FROM post');
  $stmt->execute();
  $posts = $stmt->fetch(PDO::FETCH_OBJ);
  $totalPosts = $posts->total_posts;

  // Get total comments
  $stmt = $conn->prepare('SELECT COUNT(*) AS total_comments FROM comment');
  $stmt->execute();
  $comments = $stmt->fetch(PDO::FETCH_OBJ);
  $totalComments = $comments->total_comments;
} catch (PDOException $e) {
  echo $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AnalyticsManagement/Admin-UI</title>
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
  <div class="row mt-5">
    <div class="col">

    </div>
  </div>

  <div class="justify-content-center d-flex bg-light">
    <div class="col-4" style="margin-top: 20px; display:block;">
      <canvas id="UserActivity" style="background-color: #fff8e1; margin-top: 20px;"></canvas>
      <h3 style="text-align: center;">User Activity</h3>
    </div>
  </div>
  </div>
  </div>
  <!-- No Changes Above -->
  


  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net./1.13.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.databases.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/databases.min.css">

  <div class="col">
    <div class="container"> <br>
      &nbsp &nbsp<label class="text3 fs-3">Report List</label>
      <hr>
      <div id="alertContainer">
        <form action="" method="post">
          <table class="table w-100" id="comment_report_table">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Comment ID</th>
                <th scope="col">Reported By</th>
                <th scope="col">Report Description</th>
                <th scope="col">Reported On</th>
                <th scope="col" style="width: 240px;">Report Status</th>
                <th scope="col">Operation</th>
              </tr>
            </thead>
            <tbody>
              <?php
              //Get all data from table comment_report
              $stmt = $conn->prepare('SELECT * FROM comment_report');
              $stmt->execute();
              $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

              if ($stmt->rowCount() > 0) :
                foreach ($result as $row) :
              ?>
                  <tr>
                    <th scope="row"><?php echo $row['ReportID'] ?></th>
                    <td><?php echo $row['CommentID'] ?></td>
                    <td><?php echo $row['UserID'] ?></td>
                    <td><?php echo $row['ReportDescription'] ?></td>
                    <td><?php echo $row['ReportStatus'] ?></td>
                    <td>
                      <select class="form-select" aria-label="Complaint Status">
                        <option selected>Select Report Status</option>
                        <option value="1">In Investigation</option>
                        <option value="2">On Hold</option>
                        <option value="3">Resolved</option>
                      </select>
                    </td>
                    <td>
                      <ul class="list-inline">
                        <li class="list-inline-item">
                          <button type="submit" class="btn btn-primary" onclick="return confirm('Confirm update?')">Update</button>
                        </li>
                      </ul>
                    </td>
                  </tr>
              <?php
                endforeach;
              endif;
              ?>
              <!-- <th scope="row">2</th>
          <td>9476923039</td>
          <td>758023</td>
          <td>How can I commit suicide wihtout pain?</td>
          <td>2023/08/07 13:25:32</td>
          <td><select class="form-select" aria-label="Complaint Status">
              <option selected>Select Report Status</option>
              <option value="1">In Investigation</option>
              <option value="2">On Hold</option>
              <option value="3">Resolved</option>
            </select></td>
          <td>
            <ul class="list-inline">
              <li class="list-inline-item">
                <button type="button" class="btn btn-primary" onclick="showAlert()">Update</button>
              </li>
              </li>
              </li>
            </ul>
          </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>1043465349</td>
            <td>884394</td>
            <td>You are fucking horrible animals!</td>
            <td>2023/12/15 23:58:52</td>
            <td><select class="form-select" aria-label="Complaint Status">
                <option selected>Select Report Status</option>
                <option value="1">In Investigation</option>
                <option value="2">On Hold</option>
                <option value="3">Resolved</option>
              </select></td>
            <td>
              <ul class="list-inline">
                <li class="list-inline-item">
                  <button type="button" class="btn btn-primary" onclick="showAlert()">Update</button>
                </li>
              </ul>
            </td>
          </tr> -->
            </tbody>
          </table>
          <!-- <nav aria-label="Page navigation">
            <ul class="pagination">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav> -->
        </form>
      </div>
    </div>
    </nav>

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
      const info = [{
          activity: "Posts",
          count: <?php if ($totalLikes == 0) {
                    echo 0;
                  } else {
                    echo $totalPosts;
                  } ?>,
        },
        {
          activity: "Comments",
          count: <?php if ($totalComments == 0) {
                    echo 0;
                  } else {
                    echo $totalComments;
                  } ?>,
        },
        {
          activity: "Likes",
          count: <?php if ($totalLikes == 0) {
                    echo 0;
                  } else {
                    echo $totalLikes;
                  } ?>,
        },
      ];


      new Chart(document.getElementById("UserActivity"), {
        type: "polarArea",
        data: {
          labels: info.map((row) => row.activity),
          datasets: [{
            label: "Total counts",
            data: info.map((row) => row.count),
          }, ],
        },
      });

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

    document.getElementById("data_analytics").classList.add("active");
    </script>
</body>

</html>