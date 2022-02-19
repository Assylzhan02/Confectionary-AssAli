<?php

	session_start();
	include("header.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Information about good</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body style="height: auto;
	width: 100%;
	background: linear-gradient(123.97deg, #F5CAC3 13.65%, #98C1D9 87.93%);
">
	<div class="parent d-flex justify-content-center">
		<div class="d-flex justify-content-center col-md-8 mb-5 mt-5 ">
		<div style="border:5px solid rgb(255,255,255,0.8); border-radius:20px; background-color: rgb(255,255,255,0.3);" class="d-flex justify-content-around col-md-12 mb-5 mt-5 pb-3 pt-3">
		<?php
		require 'db.php';
		if(isset($_POST['uid'])){
			$info = getOneGood($_POST['g_id']);
			echo '<img src="images/'.$info['image'].'" style="width:250px;" >';
			echo "<div>";
			echo "<p>"."Name of the good: ".$info['good_name']."</p>";
			echo "<p>"."Price of the good: ".$info['good_price']."tg"."</p>";
			
		}
		$res = GoodVerify($_POST['uid'],$_POST['g_id']);
		if(!empty($res)){
			?>

			<form action="orderUnorder.php" method="post">
				<input type="hidden" name="uid" value=" <?php echo $_POST['uid']; ?>">
				<input type="hidden" name="g_id" value=" <?php echo $_POST['g_id']; ?>">
				<input type="hidden" name="action" value="unord">
				<button type="submit" class="btn btn-warning">Unorder</button>
			</form>

			<?php

		}
		else{
			?>

			<form action="orderUnorder.php" method="post">
				<input type="hidden" name="uid" value=" <?php echo $_POST['uid']; ?>">
				<input type="hidden" name="g_id" value=" <?php echo $_POST['g_id']; ?>">
				<input type="hidden" name="action" value="ord">
				<p>Count:</p><input type="number" name="count">
				<button type="submit" class="btn btn-warning">Order</button>
			</form>

			<?php

		}
		echo "</div>";
	?>
	    </div>
	</div>
	</div>
	<div class="d-flex justify-content-center col-md-12 mb-5">
		<h5><a href="profile.php" style="text-decoration:none; color:black;border: 1px solid black;border-radius:15px; padding:10px 15px; ">To profile</a></h5>
		<h5><a href="catalog.php" style="text-decoration:none; color:black;border: 1px solid black;border-radius:15px; padding:10px 15px;margin-left:30px; ">To catalog</a></h5>
	</div>
</body>
</html>