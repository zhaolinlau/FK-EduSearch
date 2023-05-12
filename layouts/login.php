<div class="row h-100 align-items-lg-center align-items-start">
	<div class="col h-100 bg-gradient bg-primary bg-opacity-25 d-none d-lg-flex align-items-center justify-content-center shadow-lg">
		<div>
			<img src="./src/img/logo.png" alt="logo.png" class="rounded-circle" height="100px" width="100px">
			<h2 class="text-primary fw-bold">A place to share, <br> learn, and connect.</h3>
				<img src="./src/img/discussion.svg" class="img-fluid" alt="discussion.svg">
		</div>
	</div>
	<div class="col">
		<img src="./src/img/logo.png" alt="logo.png" class="rounded-circle d-block d-lg-none m-3 mt-3 mx-md-5" height="100px" width="100px">
		<form action="./controllers/login.php" class="needs-validation row g-3 px-md-5 px-3" method="post" novalidate>
			<h2 class="fw-bold">Log In to FK-EduSearch</h1>
				<?php if (isset($_SESSION['error'])) : ?>
					<div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
						<i class="bi bi-exclamation-triangle-fill h5"></i> <?php echo $_SESSION['error']; ?>.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php
					unset($_SESSION['error']);
				endif;
				?>
				<div class="col-12">
					<label for="username" class="form-label"><b>Username</b></label>
					<input type="text" class="form-control" name="username" id="username" autocomplete="off" required>
					<div class="invalid-feedback">
						Please enter your username.
					</div>
				</div>
				<div class="col-12">
					<label for="password"><b>Password</b></label>
					<input type="password" class="form-control" name="password" id="password" autocomplete="off" required>
					<div class="invalid-feedback">
						Please enter your password.
					</div>
				</div>
				<div class="col-12">
					<button type="submit" class="btn btn-primary col-3" name="login"><b>Log In</b></button>
				</div>
		</form>
	</div>
</div>