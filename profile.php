<?php
session_start();
require "./Middleware/Authenticate.php";
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | My Profile</title>
	<link rel="shortcut icon" href="./resources/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
</head>

<body class="h-100">
	<?php require "layouts/navbar.php" ?>
	<div class="container-fluid h-100 d-flex align-items-center justify-content-center">
		<div class="row">
			<div class="col">
				<?php
				try {
					require "./config/db.php";
					$stmt = $conn->prepare("SELECT * FROM user WHERE UserID=:UserID");
					$stmt->bindParam(':UserID', $_GET['UserID']);
					$stmt->execute();
					$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
					if ($stmt->rowCount() > 0) :
						foreach ($result as $row) :
				?>
							<form action="" class="needs-validation" novalidate method="post">
								<label for="username">Username</label>
								<input type="text" value="<?php echo $row["UserName"]; ?>" name="username" id="username" required>
							</form>
				<?php
						endforeach;
					endif;
				} catch (PDOException $e) {
					echo $e->getMessage();
				}
				?>
			</div>
		</div>
	</div>

	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./resources/js/livechat.js"></script>
	<script src="./resources/js/form_validate.js"></script>
</body>

</html>