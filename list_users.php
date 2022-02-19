<?php
	include('header.php');
	session_start();
	if(!($_SESSION['role'] == 1)){
		header("Location:profile.php");
	}
	else{
		require 'db.php';
		$users = getAllUsers();
	}

?>
<?php
	include('language_translator.php');
	if(isset($_COOKIE['lang'])){
		$language = $_COOKIE['lang'];
	}
	else{
		$language = 'en';
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>List of users</title>
</head>
<body>

	<div class="content" >
		<div class="container">
			<div class="row mt-3">
				<div class="col-md-12">
					<div class="d-flex justify-content-between col-md-12 mb-5 mt-5">
						<h3>Users list</h3>
						<h5><a href="profile.php" style="text-decoration:none; color:black;border: 1px solid black;border-radius:15px; padding:10px 15px; ">To profile</a></h5>
					</div>
					<div class="col-md-6 table-responsive-md">
					 <form class="form-inline d-flex my-2 my-lg-0">
					      <input id="myInput" class="form-control mr-sm-2" type="search" placeholder="Search to name..." onkeyup="myFunction()" aria-label="Search">
					      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" style="margin-left: 10px;"><?php echo $data[$language]['search']?></button>
					    </form>
						<table id="myTable" class="table" style="margin-top: 40px;">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Login</th>
						      <th scope="col">Password</th>
						      <th scope="col">Name</th>
						      <th scope="col">Delete</th>
						    </tr>
						  </thead>
						  <tbody id="users"></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
	function myFunction() {
	  var input, filter, table, tr, td, i, txtValue;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable");
	  tr = table.getElementsByTagName("tr");

	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[3];
	    if (td) {
	      txtValue = td.textContent || td.innerText;
	      if (txtValue.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    }
	  }
	}
</script>

</body>
</html>