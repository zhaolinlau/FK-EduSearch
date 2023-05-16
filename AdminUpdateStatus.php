<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK-EduSearch | Complaint Status</title>
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
</head>

<body class="h-100">
	<nav class="navbar navbar-expand-lg shadow-sm">
		<div class="container-fluid">
			<a class="navbar-brand" href="./">
				<img src="./logo.png" class="rounded-circle" width="50px">
				<span class="mx-3 fw-bold">FK-EduSearch</span>
			</a>

		</div>
	</nav>
	<div class="row h-100">
		<div class="col-3 h-100">
			<div class="offcanvas-lg offcanvas-end p-2 h-100" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
				<div class="offcanvas-body h-100">
					<ul class="nav nav-pills flex-column h-100 border-end pe-5 ps-4">
						<li class="nav-item mt-3">
							<a class="nav-link border" href="#">Admin Profile</a>
						</li>
						<li class="nav-item">
              <a class="nav-link border" href="#">Discussion Board</a>
            </li>
            <li class="nav-item">
              <a class="nav-link border" href="#">Report</a>
            </li>
            <li class="nav-item">
             <a class="nav-link active" aria-current="page" href="#">Complaint</a>
            </li>
	          <li class="nav-item">
             <a class="nav-link border" href="#"><b>Log Out</b></a>
           </li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col">
			<div style="width: 910px;"> <br>
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
  <tr>
  <th scope="row">1</th>
  <td>Mingkang</td>
  <td>Unsatisfied Expert’s Feedback</td>
  <td>The feedback doesn't provide me a clear direction</td>
  <td>4/5/2023</td>
  <td>7:48pm</td>
  <td>
    <select class="form-select" aria-label="Complaint Status">
      <option selected>Select Complaint Status</option>
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
      <td>William</td>
      <td>Wrongly Assigned Research Area</td>
      <td>The feedback provided is out of my research area</td>
      <td>5/5/2023</td>
      <td>11:48am</td>
      <td><select class="form-select" aria-label="Complaint Status">
          <option selected>Select Complaint Status</option>
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
      <td>Sit Wei Min</td>
      <td>Wrongly Assigned Research Area</td>
      <td>The feedback provided is not related to my reseaarch area</td>
      <td>5/4/2023</td>
      <td>1:48pm</td>
      <td><select class="form-select" aria-label="Complaint Status">
          <option selected>Select Complaint Status</option>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script>
  function showAlert() {
    var alertContainer = document.getElementById("alertContainer");
    var alertHTML = `
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Complaint status updated!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    `;
    alertContainer.innerHTML = alertHTML;
  }
</script>

</body>
</html>
