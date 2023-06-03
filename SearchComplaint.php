<?php
session_start();
require "./Middleware/Authenticate.php";
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FK-EduSearch | Search Complaint</title>
    <link rel="shortcut icon" href="./src/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
</head>

<body class="h-100">
    <?php require "layouts/navbar.php"?>
    <div class="col" style="margin:0 auto;margin-top:40px; width:900px; ">
        <br>
        &nbsp &nbsp<label class="text2">View Complaint</label>
        <hr>
        <div class="row" style="margin-top:20px">
            <div class="col-md-3">
                <button type="button" class="btn btn-primary btn-1g" onclick="window.location.href='FileComplaint.php'">File A Complaint</button>
            </div>
            <div class="col-md-5">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Enter Complaint ID:" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
        <div style="width: 910px;">
            <br>
            &nbsp &nbsp<label class="text3">Complaint List</label>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Complaint ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Complaint Type</th>
                        <th scope="col">Complaint Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Complaint Status</th>
                        <th scope="col" style="width: 150px;">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        require "./config/db.php";
												$UserID = $_SESSION["user_id"];
                        $stmt = $conn->prepare("SELECT c.ComplaintID, u.UserName, c.ComplaintType, c.ComplaintDescription, c.ComplaintStatus
                        												FROM complaint c
                        												JOIN user u ON c.UserID = u.UserID
                        												WHERE c.UserID = :UserID");
                        $stmt->bindParam(':UserID', $UserID);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        if ($stmt->rowCount() > 0) :
                            foreach ($result as $complaint) :
                    ?>
                                <tr>
                                    <th scope="row"><?php echo $complaint['ComplaintID']; ?></th>
                                    <td><?php echo $complaint['UserName']; ?></td>
                                    <td><?php echo $complaint['ComplaintType']; ?></td>
                                    <td><?php echo $complaint['ComplaintDescription']; ?></td>
                                    <td></td>
                                    <td></td>
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
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end" style="margin-right:60px">
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
        </nav>
    </div>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
         function deleteComplaint(complaintID) {
        const confirmed = confirm("Are you sure you want to delete this record?");
        if (confirmed) {
					<?php
              try {
                require "./config/db.php";
								$stmt = $conn->prepare("DELETE FROM complaint WHERE ComplaintID = :complaintID");
               	$stmt->bindParam(':complaintID', $complaintID);
                $stmt->execute();
								?>
          showAlert("The record of the complaint is successfully deleted");
					<?php
						 $conn = null;
						  } catch (PDOException $e) {
					?>
					showAlert("Error: <?php echo $e->getMessage(); ?>");
					<?php
					}
					?>
            }
        });
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
    </script>
</body>
</html>
