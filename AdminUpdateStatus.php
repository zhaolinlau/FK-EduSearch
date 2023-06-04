<?php
session_start();
require "./Middleware/Authenticate.php";
require "./Middleware/AdminAuth.php";

if(isset($_POST["UpdateStatus"])){
	try {
		require "./config/db.php";
    $Status = $_POST["ComplaintStatus"];
    $ComplaintID = $_POST["ComplaintID"];
	  $stmt = $conn->prepare("UPDATE complaint SET ComplaintStatus = :status WHERE ComplaintID = :complaintID");
    $stmt->bindParam(":status", $Status);
    $stmt->bindParam(":complaintID", $ComplaintID);
    $stmt->execute();
    echo ' <script>
		document.addEventListener("DOMContentLoaded", function() {
				const alertContainer = document.getElementById("alertContainer");
				const successAlert = document.createElement("div");
				successAlert.classList.add("alert", "alert-success", "alert-dismissible", "fade", "show");
				successAlert.innerHTML = `The complaint record is successfully edited! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`;
				alertContainer.appendChild(successAlert);
		});
	</script>';
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
</head>

<body class="h-100">
	<?php require "./layouts/navbar.php" ?>

	<div class="container d-flex justify-content-center h-100">
		<div class="row h-100">
			<div class="col-12 h-100 align-items-center d-flex">
				<div>
					&nbsp &nbsp<label class="text3">Complaint List</label>
					<hr>
					<div id="alertContainer"></div>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Complaint ID</th>
								<th scope="col">Username</th>
								<th scope="col">Complaint Type</th>
								<th scope="col">Complaint Description</th>
								<th scope="col">Date</th>
								<th scope="col">Time</th>
								<th scope="col" style="width: 240px;">Complaint Status</th>
								<th scope="col">Operation</th>
							</tr>
						</thead>
						<tbody>
                            <?php
                            try {
                                require "./config/db.php";
                                $stmt = $conn->prepare("SELECT c.ComplaintID, u.UserName, c.ComplaintType, c.ComplaintDescription, c.ComplaintStatus, c.ComplaintCreatedDate
                                                    FROM complaint c
                                                    JOIN user u ON c.UserID = u.UserID");
                                $stmt->execute();
                                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $complaintsPerPage = 3;
                                $totalComplaints = count($result);
                                $totalPages = ceil($totalComplaints / $complaintsPerPage);
                                $startIndex = ($page - 1) * $complaintsPerPage;
                                $complaints = array_slice($result, $startIndex, $complaintsPerPage);

                                if (!empty($complaints)) {
                                    foreach ($complaints as $complaint) {
                                        $timestamp = strtotime($complaint['ComplaintCreatedDate']);
                            ?>
														<form method="post" action="">
                                        <tr>
                                            <th scope="row">
																							<input type="hidden" name="ComplaintID" value="<?php echo $complaint['ComplaintID']; ?>">
																							<?php echo $complaint['ComplaintID']; ?></th>
                                            <td><?php echo $complaint['UserName']; ?></td>
                                            <td><?php echo $complaint['ComplaintType']; ?></td>
                                            <td><?php echo $complaint['ComplaintDescription']; ?></td>
                                            <td><?php echo date("Y-m-d", $timestamp); ?></td>
                                            <td><?php echo date("H:i:s", $timestamp); ?></td>
                                            <td>
                                                <select class="form-select" aria-label="Complaint Status" name="ComplaintStatus">
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
                                                </ul>
                                            </td>
                                        </tr>
																				</form>
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
					<nav aria-label="Page navigation" class="justify-content-end d-flex">
                        <ul class="pagination">
                            <?php
                            if ($totalPages > 1) {
                                if ($page > 1) {
                                    $prevPage = $page - 1;
                                    echo "<li class='page-item'><a class='page-link' href='?page=$prevPage'>Previous</a></li>";
                                } else {
                                    echo "<li class='page-item disabled'><a class='page-link' href='#'>Previous</a></li>";
                                }

                                for ($i = 1; $i <= $totalPages; $i++) {
                                    if ($i == $page) {
                                        echo "<li class='page-item active'><a class='page-link' href='?page=$i'>$i</a></li>";
                                    } else {
                                        echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                                    }
                                }

                                if ($page < $totalPages) {
                                    $nextPage = $page + 1;
                                    echo "<li class='page-item'><a class='page-link' href='?page=$nextPage'>Next</a></li>";
                                } else {
                                    echo "<li class='page-item disabled'><a class='page-link' href='#'>Next</a></li>";
                                }
                            }
                            ?>
                        </ul>
                    </nav>
				</div>
			</div>
		</div>

		<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<script src="./resources/js/livechat.js"></script>
		
</body>

</html>