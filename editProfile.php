<?php
session_start();
require "./Middleware/Authenticate.php";
require "./controllers/ProfileController.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	try {
		$userID = $_SESSION['user_id'];

		$userName = $_POST['userName'];
		$userEmail = $_POST['userEmail'];
		$userSocialMedia = $_POST['userSocialMedia'];
		$userResearchArea = $_POST['userResearchArea'];
		$expertAreaOfExpertise = $_POST['expertAreaOfExpertise'];
		$ResearchTopic = $_POST['ResearchTopic'];
		$profileController = new ProfileController();
		$profileController->updateProfileData($userID, $userName, $userEmail, $userSocialMedia, $userResearchArea, $expertAreaOfExpertise, $ResearchTopic);

		header("Location: profile.php");
		exit();
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
		die();
	}
}

try {
	require "./config/db.php";
	$userID = $_SESSION['user_id'];

	$profileController = new ProfileController();
	$userData = $profileController->fetchUserProfileData($userID);
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
	die();
} finally {
	$conn = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | Edit Profile</title>
	<link rel="shortcut icon" href="./resources/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./custom_css/custom.css">
</head>

<body>
	<?php require "layouts/navbar.php" ?>
	<div class="row" style="margin-top: 94px;">
		<div class="col">

		</div>
	</div>
	<div class="">
		<div class="col-9 mx-auto" style="margin-right: 0;">
			<br>
			<div class="d-flex justify-content-between align-items-center">
				<span class="text2">Edit Profile Page</span>
				<div>
					<span class="btn btn-light btn-sm me-2" onclick="history.back()">Back</span>
					<a href="#" class="btn btn-light btn-sm" onclick="document.getElementById('profileForm').submit()">Save Changes</a>
				</div>
			</div>
			<hr>
			<form id="profileForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

				<table class="table table-borderless">
					<tr>
						<td rowspan="5" style="width: 20%; position: relative;">
							<!-- Placeholder div with gray background color and border -->
							<div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; background-color: gray; border: 1px solid white;">
								<!-- Input field for uploading an image -->
								<input type="file" style="width: 100%; height: 100%; opacity: 0; cursor: pointer;">
							</div>
						</td>

						<td style="width: 15%;" class="text-center align-middle"><b>Name</b></td>
						<td style="width: 60%;"><input type="text" class="form-control" name="userName" value="<?php echo $userData['UserName']; ?>">
						</td>
					</tr>
					<tr>
						<td class="text-center align-middle"><b>Email</b></td>
						<td><input type="text" class="form-control" name="userEmail" value="<?php echo $userData['UserEmail']; ?>"></td>
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
						<td><i class="fa fa-rss" aria-hidden="true"></i></td>
						<td><input type="text" class="form-control" name="userSocialMedia" value="<?php echo $userData['UserSocialMedia']; ?>"></td>
					</tr>
				</table>

				<div class="accordion" id="accordionExpertPage">
					<?php if (isset($_SESSION["student"]) || isset($_SESSION["staff"])) : ?>

						<div class="accordion-item">
							<h2 class="accordion-header" id="researchtopic">
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRT" aria-expanded="true" aria-controls="collapseRT">
									<b>Research Topic</b>
								</button>
							</h2>
							<div id="collapseRT" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<input type="text" class="form-control border-0" name="ResearchTopic" value="<?php echo $userData['ResearchTopic']; ?>">
								</div>
							</div>
						</div>
					<?php endif; ?>

					<div class="accordion-item">
						<h2 class="accordion-header" id="researchArea">
							<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								<b>Research Area</b>
							</button>
						</h2>
						<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<input type="text" class="form-control border-0" name="userResearchArea" value="<?php echo $userData['UserResearchArea']; ?>">
							</div>
						</div>
					</div>
					<?php if (isset($_SESSION["expert"])) : ?>
						<div class="accordion-item">
							<h2 class="accordion-header" id="areaOfExpertise">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									<b>Area of Expertise</b>
								</button>
							</h2>
							<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<input type="text" class="form-control border-0" name="expertAreaOfExpertise" value="<?php echo $userData['ExpertAreaOfExpertise']; ?>">
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
									<a href="./publication_list.php" style="text-decoration:none;">Click here to edit publication lists.</a>
								</div>
							</div>
						</div>
						<div class="accordion-item">
							<h2 class="accordion-header" id="cv">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
									<b>Curriculum Vitae</b>
								</button>
							</h2>
							<div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<label for="fileInput" style="cursor: pointer; color:blue;">
										Click here to select a file
										<input type="file" id="expertCV" style="width: 100%; opacity: 0; cursor: pointer;">
									</label>
								</div>
							</div>
						</div>
					<?php endif; ?>

				</div>
				<br>
			</form>
		</div>
	</div>

	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./resources/js/livechat.js"></script>
</body>

</html>