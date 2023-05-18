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

		<div class="justify-content-center d-flex bg-light">
		<div class="col-4" style="margin-top: 20px; display:block;">
			<canvas id="UserActivity" style="background-color: #fff8e1; margin-top: 20px;"></canvas>
			<h3 style="text-align: center;" >User Activity</h3>
		</div>
		</div>
		</div>
	</div>
	<!-- No Changes Above -->
	<div class="col">
			<div class="container"> <br>
      &nbsp &nbsp<label class="text3 fs-3">Report List</label>
      <hr>
      <div id="alertContainer"></div>
 <table class="table w-100">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Comment ID</th>
      <th scope="col">Reported By</th>
      <th scope="col">Reported On</th>
      <th scope="col" style="width: 240px;">Report Status</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
  <tr>
  <th scope="row">1</th>
  <td>5534646723</td>
  <td>234512</td>
  <td>2023/05/27 07:48:12</td>
  <td>
    <select class="form-select" aria-label="Complaint Status">
      <option selected>Select Report Status</option>
      <option value="1">In Investigation</option>
      <option value="2">On Hold</option>
      <option value="3">Resolved</option>
    </select>
  </td>
  <td>
    <ul class="list-inline">
      <li class="list-inline-item">
      <button type="button" class="btn btn-primary" onclick="showAlert()">Update</button>
      </li>
    </ul>
  </td>
</tr>


      <th scope="row">2</th>
      <td>9476923039</td>
      <td>758023</td>
      <td>2023/08/07 13:25:32</td>
      <td><select class="form-select" aria-label="Complaint Status">
          <option selected>Select Report Status</option>
          <option value="1">In Investigation</option>
          <option value="2">On Hold</option>
          <option value="3">Resolved</option>
          </select></td>
      <td>
      <ul class="list-inline">
      <li class="list-inline-item">
      <button type="button" class="btn btn-primary" onclick="showAlert()">Update</button>
        </li>
        </li>
        </li>
      </ul>
      </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>1043465349</td>
      <td>884394</td>
      <td>2023/12/15 23:58:52</td>
      <td><select class="form-select" aria-label="Complaint Status">
          <option selected>Select Report Status</option>
          <option value="1">In Investigation</option>
          <option value="2">On Hold</option>
          <option value="3">Resolved</option>
          </select></td>
      <td>
      <ul class="list-inline">
      <li class="list-inline-item">
      <button type="button" class="btn btn-primary" onclick="showAlert()">Update</button>
        </li>
      </ul>
      </td>
    </tr>
  </tbody>
</table>
		</div>
    <nav aria-label="Page navigation">
  <ul class="pagination justify-content-end" style="margin-right:60px">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
	</div>
</nav>
	<div class="footer" style="background-color:lightblue; padding:10px 10px;">
	<p class="text-center" >Copyright © 2023 FK-EduSearch System</p>
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


		const info = [{
				activity: "Posts",
				count: 10,
			},
			{
				activity: "Comments",
				count: 20,
			},
			{
				activity: "Likes",
				count: 15,
			},
		];


		new Chart(document.getElementById("UserActivity"), {
			type: "polarArea",
			data: {
				labels: info.map((row) => row.activity),
				datasets: [{
					label: "Total counts",
					data: info.map((row) => row.count),
				}, ],
			},
		});

		function showAlert() {
    	var alertContainer = document.getElementById("alertContainer");
    	var alertHTML = `
      	<div class="alert alert-success alert-dismissible fade show" role="alert">
    		Report status updated!
        	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    	  </div>`;
    	alertContainer.innerHTML = alertHTML;
  }

	</script>
</body>

</html>




