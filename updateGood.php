<?php
	include("header.php");
	session_start();
	if(!($_SESSION['role'] == 2)){
		header("Location:profile.php");
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Updating good</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="apps.js"></script>
</head>
<body style="width: 100%;
	height: auto;
	background: linear-gradient(123.97deg, #FDF6B5 13.65%, #FFC2A8 87.93%);
">
	<div class="parent d-flex justify-content-center mt-5">
	<?php

	if(isset($_GET['g_id'])){

		require 'db.php';
		$good = getOneGood($_GET['g_id']);

		if($good != null){

?>

	<div class="col-md-6 mb-5 " style="width: 80%; align-items: center;">
						
					<form action="success_edit.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="good_id" value=" <?php echo $good['good_id']; ?>">
						<div class="form-group">
							<label for="">Name of Good:</label>
							<input type="text" class="form-control" id="good_name" name="gname" value="<?php echo $good['good_name']; ?>">
						</div>
						<div class="form-group">
							<label for="">Price:</label>
							<input type="number" class="form-control" id="good_price" name="gprice" value="<?php echo $good['good_price']; ?>">
						</div>
						<div class="form-group">
							<label for="">Category id:</label>
							<select name="category_id" class="form-control">
								<?php
									$categories = getAllCategories();

									if($categories != null){
										foreach ($categories as $c) {
								?>
									<option <?php 
									if($good['cat_id'] == $c['category_id']){
										echo "selected";
									} 
									?> 
									value="<?php echo $c['category_id']; ?>">

									<?php echo $c['category_name']; ?>
										
									</option>

								<?php
										}
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Image url:</label>
							<input type="file" id="file" name="good_img" />
            				<input type="button" class="button" value="Upload" id="but_upload">
						</div>
						<br>
						<button type="submit" class="btn btn-warning">EDIT</button>
				</form>
	</div>

<?php
		}
	}
?> 
	</div>
</body>
</html>