<?php
session_start();
require "./Middleware/Authenticate.php";
require "./Middleware/AdminAuth.php";
require './config/db.php';
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | Bug List</title>
	<link rel="shortcut icon" href="./resources/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="./node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="./node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
	<link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css" rel="stylesheet" />
</head>

<body class="h-100">
	<?php require "./layouts/navbar.php"; ?>
	<div class="container h-100 d-flex align-items-center">
		<div class="row w-100">
			<div class="col-12">
				<div class="table-responsive w-100">
					<table class="table table-hover w-100 table-bordered" id="bug_table">
						<h3>Bug List</h3>
						<thead>
							<tr>
								<th>No.</th>
								<th>Title</th>
								<th>Description</th>
								<th>Screenshot</th>
								<th>Reported By</th>
								<th>Status</th>
								<th>Fix Issue</th>
								<th>Close Issue</th>
								<th>Deletion</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$stmt = $conn->prepare('SELECT * FROM user JOIN bug ON user.UserID = bug.UserID ORDER BY BugID DESC');
							$stmt->execute();
							$bugs = $stmt->fetchAll(PDO::FETCH_OBJ);
							$count = 1;
							foreach($bugs as $bug) : ?>

							<div class="modal fade" id="imageModal<?php echo $bug->BugID ?>" tabindex="-1" aria-labelledby="imageModalLabel<?php echo $bug->BugID ?>" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
										<h5 class="modal-title" id="imageModalLabel<?php echo $bug->BugID ?>"><?php echo basename($bug->Screenshot); ?></h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<img src="./bug_reports/<?php echo $bug->BugID . '/' . $bug->Screenshot ?>" class="img-fluid" alt="<?php echo $bug->Screenshot ?>">
										</div>
										<div class="modal-footer">
							        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
							      </div>
									</div>
								</div>
							</div>

							<tr>
								<td><?php echo $count++ ?></td>
								<td><?php echo $bug->Bug_Title ?></td>
								<td><?php echo $bug->Bug_Description ?></td>
								<td>
									<a data-bs-toggle="modal" href="./bug_reports/<?php echo $bug->BugID . '/' . $bug->Screenshot ?>" data-bs-target="#imageModal<?php echo $bug->BugID ?>" data-image="./bug_reports/<?php echo $bug->BugID . '/' . $bug->Screenshot ?>">
										<?php echo $bug->Screenshot ?>
									</a>
								</td>
								<td><?php echo $bug->UserName ?></td>
								<td><?php echo $bug->Bug_Status ?></td>
								<td class="text-center"><a href="./controllers/FixBugController.php?bug_id=<?php echo $bug->BugID ?>" onclick="return confirm('Confirm add to fixing list?')" class="btn btn-warning"><i class="fa-solid fa-wrench"></i> Fix</a></td>
								<td class="text-center"><a href="./controllers/CloseBugController.php?bug_id=<?php echo $bug->BugID ?>" class="btn btn-success" onclick="return confirm('Are you sure the bug has been resolved?');"><i class="fa-regular fa-circle-check"></i> Close</a></td>
								<td class="text-center"><a href="./controllers/DeleteBugController.php?bug_id=<?php echo $bug->BugID ?>" class="btn btn-danger" onclick="return confirm('Confirm delete?');"><i class="fa-regular fa-trash-can"></i> Delete</a></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./resources/js/form_validate.js"></script>
	<script src="./resources/js/livechat.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js"></script>
	<script>
		document.getElementById("bug_list").classList.add("active");
		$.fn.dataTable.Buttons.defaults.dom.button.className =
			"btn btn-outline-primary";
		$("#bug_table").DataTable({
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
