<?php
session_start();
require "./Middleware/Authenticate.php";
require "./Middleware/AdminAuth.php";

if (isset($_POST["UpdateStatus"])) {
    try {
        require "./config/db.php";
        $Statuses = $_POST["ComplaintStatus"];
        $ComplaintIDs = $_POST["ComplaintID"];

        foreach ($ComplaintIDs as $key => $ComplaintID) {
            $Status = $Statuses[$key];
            $stmt = $conn->prepare("UPDATE complaint SET ComplaintStatus = :status WHERE ComplaintID = :complaintID");
            $stmt->bindParam(":status", $Status);
            $stmt->bindParam(":complaintID", $ComplaintID);
            $stmt->execute();
        }

        echo ' <script>
            document.addEventListener("DOMContentLoaded", function() {
                const alertContainer = document.getElementById("alertContainer");
                const successAlert = document.createElement("div");
                successAlert.classList.add("alert", "alert-success", "alert-dismissible", "fade", "show");
                successAlert.innerHTML = `The complaint records are successfully updated! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`;
                alertContainer.appendChild(successAlert);
            });
        </script>';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
    if (isset($_POST["post"])) {
        try {
            require "./config/db.php";
            $complaint_responses = $_POST['complaint_response'];
            $complaint_ids = $_POST['complaint_ids'];
    
            foreach ($complaint_ids as $key => $complaint_id) {
                $complaint_response = $complaint_responses[$key];
                $stmt = $conn->prepare("UPDATE complaint SET ComplaintResponse = :response WHERE ComplaintID = :complaintID");
                $stmt->bindParam(":response", $complaint_response);
                $stmt->bindParam(":complaintID", $complaint_id);
                $stmt->execute();
            }
    
            $_SESSION['success_message'] = 'The response has been recorded.';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | Complaint Status</title>
	<link rel="shortcut icon" href="./resources/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css" rel="stylesheet" />
</head>

<body class="h-100">
    <?php require "./layouts/navbar.php" ?>

    <div class="container d-flex justify-content-center h-100">
        <div class="row h-100">
            <div class="col-12 h-450 align-items-center d-flex">
                <div style="margin-top: 80px; margin-bottom: 20px;">
                    &nbsp;&nbsp;<label class="text3">Complaint List</label>
                    <hr>
                    <div id="successMessage">
    <?php
    if (isset($_SESSION['success_message'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $_SESSION['success_message'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        unset($_SESSION['success_message']); // Remove the message after displaying it
    }
    ?>
</div>
                    <div id="alertContainer"></div>
                    <button type="button" class="btn btn-secondary" value="report" style="background-color:lightgreen;margin-bottom:20px;" onclick="window.location.href='AdminComplaintReport.php'">View Complaint Report</button>
                    <form method="post" action="">
                        <table class="table" id="complaint_table">
                            <thead>
                                <tr>
                                    <th scope="col">Complaint ID</th>
                                    <th scope="col">Expert Feedback</th>
                                    <th scope="col">Post Title</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Complaint Type</th>
                                    <th scope="col">Complaint Description</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col" style="width: 240px;">Complaint Status</th>
                                    <th scope="col" style="width:200px;">Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                try {
                                    require "./config/db.php";
                                    $stmt = $conn->prepare("SELECT f.ExpertFeedback,p.PostTitle,c.ComplaintID, u.UserName, c.ComplaintType, c.ComplaintDescription, c.ComplaintStatus, c.ComplaintCreatedDate
                                                        FROM complaint c
                                                        JOIN user u ON c.UserID = u.UserID
                                                        JOIN feedback f ON c.FeedbackID= f.FeedbackID
                                                        JOIN post p ON f.PostID= p.PostID");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    if ($stmt->rowCount() > 0) {
                                        foreach ($result as $complaint) {
                                            $timestamp = strtotime($complaint['ComplaintCreatedDate']);
                                            $modalId = 'modal_' . $complaint['ComplaintID'];
                                            ?>
                                            <tr>
                                                <th scope="row">
                                                    <input type="hidden" name="ComplaintID[]" value="<?php echo $complaint['ComplaintID']; ?>">
                                                    <?php echo $complaint['ComplaintID']; ?>
                                                </th>
                                                <td><?php echo $complaint['ExpertFeedback'] ?></td>
                                                <td><?php echo $complaint['PostTitle'] ?></td>
                                                <td><?php echo $complaint['UserName']; ?></td>
                                                <td><?php echo $complaint['ComplaintType']; ?></td>
                                                <td><?php echo $complaint['ComplaintDescription']; ?></td>
                                                <td><?php echo date("Y-m-d", $timestamp); ?></td>
                                                <td><?php echo date("H:i:s", $timestamp); ?></td>
                                                <td>
                                                    <select class="form-select" aria-label="Complaint Status" name="ComplaintStatus[]">
                                                        <option>Select Complaint Status</option>
                                                        <option value="In Investigation" <?php if ($complaint['ComplaintStatus'] == 'In Investigation') echo 'selected'; ?>>In Investigation</option>
                                                        <option value="On Hold" <?php if ($complaint['ComplaintStatus'] == 'On Hold') echo 'selected'; ?>>On Hold</option>
                                                        <option value="Resolved" <?php if ($complaint['ComplaintStatus'] == 'Resolved') echo 'selected'; ?>>Resolved</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <button type="submit" class="btn btn-primary" name="UpdateStatus">Update</button>
                                                        </li>
                                                        </form>
                                                        <li class="list-inline-item">
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo $modalId; ?>" data-feedback-id="<?php echo $complaint['ComplaintID']; ?>">
                                                        Give Response</button>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
        <!-- ... -->
<div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title">Provide Response</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation row g-3" method="post" novalidate enctype="multipart/form-data">
            <input type="hidden" id="complaint_ids_input" name="complaint_ids[]" value="<?php echo $complaint['ComplaintID']; ?>">
                    <div class="col-12">
                        <label for="complaint_response">Complaint Response</label>
                        <textarea name="complaint_response[]" id="complaint_response" class="form-control" rows="5" required></textarea>
                        <div class="invalid-feedback">
                            Please enter your response toward the complaint.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" name="post" value="Submit">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ... -->


                                        <?php
                                        }
                                        
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="8">No complaints found.</td>
                                        </tr>
                                    <?php
                                    }
                                } catch (PDOException $e) {
                                    echo $e->getMessage();
                                }
                                ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        


		<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="./resources/js/livechat.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js"></script>
  <script src="./resources/js/form_validate.js"></script>
	<script src="./resources/js/livechat.js"></script>


<script>
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
    function showModal(complaintId) {
        const modalId = `modal_${complaintId}`;
        const modalElement = document.getElementById(modalId);
        const modal = new bootstrap.Modal(modalElement);
        modal.show();
    }

		</script>
</body>

</html>
