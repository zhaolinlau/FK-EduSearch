<?php
session_start();
require "./Middleware/Authenticate.php";
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FK-EduSearch | Complaint List</title>
    <link rel="shortcut icon" href="./src/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css" rel="stylesheet" />
</head>

<body class="h-100">
    <?php require "layouts/navbar.php"?>
    <div class="col" style="margin:0 auto;margin-top:40px; width:900px; ">
        <br>
        &nbsp &nbsp<label class="text2">Complaint List</label>
        <hr>
        <div style="width: 1000px;">
            <table class="table" id="complaint_table">
                <thead>
                    <tr>
                        <th scope="col" style="width: 120px;">Complaint ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Complaint Type</th>
                        <th scope="col">Complaint Description</th>
                        <th scope="col" style="width: 100px;">Date</th>
                        <th scope="col" style="width: 30px;">Time</th>
                        <th scope="col">Complaint Status</th>
                        <th scope="col" style="width: 150px;">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        require "./config/db.php";
												$UserID = $_SESSION["user_id"];
                        $stmt = $conn->prepare("SELECT c.ComplaintID, c.FeedbackID, u.UserName, c.ComplaintType, c.ComplaintDescription, c.ComplaintStatus,c.ComplaintCreatedDate
                        												FROM complaint c
                        												JOIN user u ON c.UserID = u.UserID
                        												WHERE c.UserID = :UserID");
                        $stmt->bindParam(':UserID', $UserID);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        if ($stmt->rowCount() > 0) :
                            foreach ($result as $complaint) :
									$timestamp=strtotime($complaint['ComplaintCreatedDate']);
                    ?>
                                <tr>
                                    <th scope="row"><?php echo $complaint['ComplaintID']; ?></th>
                                    <td><?php echo $complaint['UserName']; ?></td>
                                    <td><?php echo $complaint['ComplaintType']; ?></td>
                                    <td><?php echo $complaint['ComplaintDescription']; ?></td>
                                    <td><?php echo date("Y-m-d",$timestamp); ?></td>
                                    <td><?php echo date("H:i:s",$timestamp); ?></td>
                                    <td><?php echo $complaint['ComplaintStatus']; ?></td>
                                    <td style="width: 150px;">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="View" onclick="window.location.href='ViewComplaint.php?ComplaintID=<?php echo $complaint['ComplaintID'];?>'"><i class="fa fa-search"></i></button>
                                            </li>
                                            <li class="list-inline-item">
                                                <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit" onclick="window.location.href='EditComplaint.php?ComplaintID=<?php echo $complaint['ComplaintID'];?>'"><i class="fa fa-edit"></i></button>
                                            </li>
                                            <li class="list-inline-item">
																						<button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteComplaint(<?php echo $complaint['ComplaintID'];?>)"><i class="fa fa-trash"></i></button>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                        <?php
                            endforeach;
                        else :
                        ?>
                            <tr>
                                <td colspan="8">No complaints found.</td>
                            </tr>
                        <?php
                        endif;
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                        ?>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="alertModalLabel">Record</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="alertMessage"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js"></script>
    <script>
         function deleteComplaint(complaintID) {
            const confirmed = confirm("Are you sure you want to delete this record?");
            if (confirmed) {
                $.ajax({
                    type: "POST",
                    url: "./controllers/DeleteComplaint.php",
                    data: {
                        complaintID: complaintID
                    },
                    success: function(response) {
                        showAlert(response);
												location.reload();
                    },
                    error: function(xhr, status, error) {
                        showAlert("Error: " + xhr.responseText);
                    }
                });
            }
        }

        function showAlert(message) {
            var alertMessage = document.getElementById("alertMessage");
            alertMessage.textContent = message;
            var alertModal = new bootstrap.Modal(document.getElementById("alertModal"));
            alertModal.show();
        }
    </script>
    <script>
        (function() {
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        })();
        $.fn.dataTable.Buttons.defaults.dom.button.className = "btn btn-outline-primary";
    $("#complaint_table").DataTable({
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
    </script>
</body>
</html>
