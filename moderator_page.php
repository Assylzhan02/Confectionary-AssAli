<?php

	include("header.php");

	session_start();
	if($_SESSION['role']!=2){
		header("Location:profile.php");
	}
	else{
		require_once 'db.php';
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<head>
	<meta charset="UTF-8">
	<title>Moderator page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="apps.js"></script>
	<link rel="stylesheet" href="style2.css">
	
</head>
</head>
<body>

	<div class="content">
		<div class="container" style="display: block;">
			<div class="row mt-3">
				<div class="col-md-12">
					<div class="d-flex justify-content-between flex-wrap col-md-12 mb-5 mt-5">
						<h2 class="mb-5">Welcome moderator</h2>
						<h5><a href="profile.php" style="text-decoration:none; color:black;border: 1px solid black;border-radius:15px; padding:10px 15px; ">To profile</a></h5>
					</div>

					<h2 class="col-md-12">Categories</h2>
					<br>
					<div class="col-md-6 mb-5">
					<div class="alert alert-success" role="alert" id = "message_alert_cat" style="display: none;"></div>	
					<form>
						<div class="form-group">
							<label for="">Name of category:</label>
							<input type="text" class="form-control" id="cat_name">
						</div>
						<br>
						<button type="button" id="addCategoryButton" class="btn btn-warning">CREATE Category</button>
					</form>
					</div>
					<div class="col-md-12 table-responsive-md">
						<table class="table">
						  <thead class="thead-dark">
						    <tr class="table-dark">
						      <th scope="col">#</th>
						      <th scope="col">Name</th>
						    </tr>
						  </thead>
						  <tbody id = "cat_result"></tbody>
						</table>		
					</div>
 <!--------------------------------------------------------------------------------------------------------------------->
					<h2 class="col-md-12">Goods</h2>
					<br>
					<div class="col-md-6 mb-5">
						<div class="alert alert-success" role="alert" id = "message_alert" style="display: none;"></div>	
						<form>
						<div class="form-group">
							<label for="">Name of Good:</label>
							<input type="text" class="form-control" id="good_name">
						</div>
						<div class="form-group">
							<label for="">Price:</label>
							<input type="number" class="form-control" id="good_price">
						</div>
						<div class="form-group">
							<label for="">Category:</label>
							<select class="form-control" id="cat_id"></select>
						</div>
						<div class="form-group">
							<label for="">Image url:</label>
							<input type="file" id="file" name="file" />
							<br>
            				<input type="button" class="btn btn-warning" value="Upload" id="but_upload">
						</div>
						<br>
						<button type="button" id="addGoodButton" class="btn btn-warning">CREATE GOOD</button>
					</form>
					</div>
					<div class="col-md-12 table-responsive-md">
						<table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Name</th>
						      <th scope="col">Price</th>
						      <th scope="col">Category</th>
						      <th scope="col">Image url</th>
						      <th scope="col">EDIT</th>

						    </tr>
						  </thead>
						  <tbody id = "good_result"></tbody>
						</table>		
					</div>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>