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
	<title>AnalyticsManagement/Admin-UI</title>
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="./node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="./node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
	<link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css" rel="stylesheet" />
</head>

<body>
<?php require "layouts/navbar.php" ?>
	<div class="row mt-5">
		<div class="col">
	
		</div>
	</div>

<!--	<div class="justify-content-center d-flex bg-light">
		<div class="col-4" style="margin-top: 20px; display:block;">
			<canvas id="UserActivity" style="background-color: #fff8e1; margin-top: 20px;"></canvas>
			<h3 style="text-align: center;" >User Activity</h3>
		</div>
		</div> 
		</div>
	</div>
    -->
	<!-- No Changes Above -->
    <div class="input-group">
    <div class="form-outline">
        <input id="search-input" type="search" id="form1" class="form-control" />
        <label class="form-label" for="form1">Search</label>
    </div>
    <button id="search-button" type="button" class="btn btn-primary">
        <i class="fas fa-search"></i>
    </button>
    </div>
	
    





	
	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
	<script src="./node_modules/chart.js/dist/chart.umd.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js"></script>
	<script src="./resources/js/datatables.js"></script>
	<script>

    const searchButton = document.getElementById('search-button');
    const searchInput = document.getElementById('search-input');
    searchButton.addEventListener('click', () => {
    const inputValue = searchInput.value;
    alert(inputValue);
    });

	</script>
</body>

</html>