<?php

	session_start();
	include("header.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Basket</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"
	>
</head>
<body style="background-color: #fef9cd;">
	<?php
	require 'db.php';
	$myHistory = seeMyHistory($_SESSION['user_id']);
	?>
	<div class="content">
		<div class="container">
			<div class="row mt-3">
				<div class="col-md-12">
					<div class="d-flex justify-content-around col-md-12 mb-5 mt-5">
						<h3>My history</h3>
						<h5><a href="profile.php" style="text-decoration:none; color:black;border: 1px solid black;border-radius:15px; padding:10px 15px; ">To profile</a></h5>
					</div>
					<div class="col-md-12">
						
						<table class="table">
						  <thead style="background: linear-gradient(123.97deg, #F5CAC3 13.65%, #98C1D9 87.93%);
">
						    <tr>
						      <th scope="col">Image</th>
						      <th scope="col">Name</th>
						      <th scope="col">Price</th>
						    </tr>
						  </thead>
						  <?php
							$total=0;
							if(!empty($myHistory)){
								foreach($myHistory as $mo){
									?>
								<tr>
									<td><img src="images/<?php echo $mo['image'];?>" alt="" style="width:100px;"></td>
									<td> <?php echo $mo['good_name']."&ensp;";?></td>
									<td>
										<span id="total"><?php echo $mo['his_count']."x". $mo["good_price"]." = ";?>    
										<?php
										$price = $mo["good_price"]*$mo['his_count'];
										$total=$total+$price;
										echo $price." tg;";
										?>
										</span>
									</td>
									<td></td>
								</tr>
							<?php
								}
							}
							?>
						</table>		
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="text-center mt-5">
		<?php
			if($total==0){
				echo "<h2>"."Your history is empty"."</h2>";
			}
		?>
	</div>
	
</body>
</html>