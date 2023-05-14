<nav class="navbar shadow-sm fixed-top bg-white">
	<div class="container-fluid">
		<button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive"><i class="fa-solid fa-bars fa-xl"></i></button>
		<a class="navbar-brand" href="./">
			FK-EduSearch
		</a>
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
		<h5 class="offcanvas-title" id="offcanvasResponsiveLabel">Menu</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body">
		<nav class="nav nav-pills flex-column">
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