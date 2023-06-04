<?php
session_start();
require "./Middleware/Authenticate.php";
include "./controllers/ReturnProfile.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | Profile</title>
	<link rel="shortcut icon" href="./resources/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<?php
	if (isset($_SESSION["expert"])) :
	?>
		<link rel="stylesheet" href="./custom_css/custom.css">

	<?php
	endif;
	?>
</head>

<body>
	<?php require "layouts/navbar.php" ?>
	<div class="row" style="margin-top: 94px;">
		<div class="col">

		</div>
	</div>
	<?php
	if (isset($_SESSION["expert"])) :
	?>
		<div class="">
			<div class="col-9 mx-auto" style="margin-right: 0;">
				<br>
				<div class="d-flex justify-content-between align-items-center">
					<span class="text2">Expert Profile Page</span>
					<a href="editExpert.php" class="btn btn-light btn-sm ms-auto" style="height:fit-content;">Edit Profile</a>
				</div>
				<hr>
				<table class="table table-borderless">
					<tr>
						<td rowspan="5" style="width: 20%; position: relative;">
							<!-- Placeholder div  -->
							<div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; background-color: gray; border: 1px solid white;"></div>
						</td>
						<td style="width: 15%;" class="text-center align-middle"><b>Name</b></td>
						<td style="width: 60%;"><input type="text" class="form-control" value="<?php echo $userData['UserName']; ?>" disabled>
						</td>
					</tr>
					<tr>
						<td class="text-center align-middle"><b>Email</b></td>
						<td><input type="text" class="form-control" value="<?php echo $userData['UserEmail']; ?>" disabled></td>
					</tr>
					<tr>
						<td class="text-center align-middle"><b>Role</b></td>
						<td><input type="text" class="form-control" value="<?php
																			if ($userData["UserRole"] == 0) :
																				echo "Admin";
																			elseif ($userData["UserRole"] == 1) :
																				echo "Expert";
																			elseif ($userData["UserRole"] == 2) :
																				echo "Staff";
																			elseif ($userData["UserRole"] == 3) :
																				echo "Student";
																			endif;
																			?>" disabled></td>
					</tr>
					<tr>
						<td colspan="2" class="text-center">
							<h4>Social Media Accounts</h4>
						</td>

					</tr>
					<tr class="text-center align-middle">
						<td><i class="fa fa-rss" aria-hidden="true"></i>
						</td>
						<td><input type="text" class="form-control" value="<?php echo $userData['UserSocialMedia']; ?>" disabled></td>
					</tr>

				</table>

				<div class="accordion" id="accordionExpertPage">
					<div class="accordion-item">
						<h2 class="accordion-header" id="researchArea">
							<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								<b>Research Area</b>
							</button>
						</h2>
						<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<span id="UserResearchArea"><?php echo $userData['UserResearchArea']; ?></span>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="areaOfExpertise">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								<b>Area of Expertise</b>
							</button>
						</h2>
						<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<span id="ExpertAreaOfExpertise"><?php echo $userData['ExpertAreaOfExpertise']; ?></span>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="publicationList">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								<b>Publication List</b>
							</button>
						</h2>
						<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<table class="table table-bordered">
									<thead>
										<tr>
											<td style="width: 30%;"><b>Publication Date</b></td>
											<td style="width: 70%;"><b>Publication Title<b></td>
										</tr>
									</thead>
									<tbody>
										<?php
										try {
											require "./config/db.php";
											$user_id = $_SESSION['user_id'];
											$stmt = $conn->prepare("SELECT * FROM publication WHERE UserID = :user_id ORDER BY PublicationID ASC");
											$stmt->bindParam(':user_id', $user_id);
											$stmt->execute();
											$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
											foreach ($results as $row) :
										?>
												<tr>
													<td><?php echo $row['PublicationDate']; ?></td>
													<td><?php echo $row['PublicationTitle']; ?></td>
												</tr>
										<?php endforeach;
										} catch (PDOException $e) {
											echo $e->getMessage();
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="expertCV">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
								<b>Curriculum Vitae</b>
							</button>
						</h2>
						<div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<span id="expertCV"> <?php echo $userData['ExpertCV']; ?> </span>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="card" style="margin-bottom: 50px;">
					<div class="card-body" id="expertRatings">
						<h5 class="card-title">Account status:</h5>
						<p class="card-text"><span id="ExpertAccountStatus"><?php echo $userData['ExpertAccountStatus']; ?> </span> (<span id="daysRemaining">X</span> days until inactive)</p>
						<h5 class="card-title">Ratings:</h5>
						<p class="card-text"><span id="averageRatings"><?php echo $userData['ExpertRatings']; ?></span>★</p>
					</div>
				</div>
			</div>
		</div>
	<?php
	endif;
	?>

	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./resources/js/livechat.js"></script>
	<script></script>
</body>

</html>