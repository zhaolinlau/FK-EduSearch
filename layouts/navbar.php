<nav class="navbar shadow-sm fixed-top bg-white">
	<div class="container-fluid">
		<button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive"><i class="fa-solid fa-bars fa-xl"></i></button>
		<a class="navbar-brand d-none d-lg-flex" href="./">
			FK-EduSearch
		</a>

		<form action="" class="d-none d-lg-flex ms-5" method="get">
			<div class="input-group">
				<input class="form-control" type="text" placeholder="Search">
				<button class="btn btn-outline-info" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
			</div>
		</form>

		<div class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				<i class="fa-solid fa-user fa-xl"></i>
				<span><?php echo $_SESSION["id"] ?></span>
			</a>
			<ul class="dropdown-menu dropdown-menu-end shadow-sm">
				<li><a class="dropdown-item" href="./profile.php">My Profile</a></li>
				<li><a class="dropdown-item" href="./Controllers/LogoutController.php">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
	<div class="offcanvas-header">
		<h5 class="offcanvas-title" id="offcanvasResponsiveLabel">
			<span class="d-none d-lg-flex">Menu</span>
			<span class="d-lg-none">FK-EduSearch</span>
		</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body">
		<nav class="nav nav-pills flex-column">
			<form action="" class="d-" method="get">
				<div class="input-group">
					<input class="form-control" type="text" placeholder="Search">
					<button class="btn btn-outline-info" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
				</div>
			</form>
			<a class="nav-link" id="discussion" href="./">Discussion</a>
			<?php
			if (isset($_SESSION["admin"])) :
			?>
				<a class="nav-link" id="user_list" href="./user_list.php">User List</a>
			<?php
			endif;
			?>
		</nav>
	</div>
</div>