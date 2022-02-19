<?php
	include('language_translator.php');
	if(isset($_COOKIE['lang'])){
		$language = $_COOKIE['lang'];
	}
	else{
		$language = 'en';
	}
?>
<?php 
	include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Catalog</title>
	<link rel="stylesheet" href="style2.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="content">
		<div class="container" style="display: block;">
			<div class="row mt-3">
				<div class="col-md-12">
					<div class="d-flex justify-content-between col-md-12 mb-5 mt-5">
						<h3>Catalog</h3>
						<h5><a href="profile.php" style="text-decoration:none; color:black;border: 1px solid black;border-radius:15px; padding:10px 15px; ">To profile</a></h5>
					</div>
					<div class="col-md-12 table-responsive-md">
						 <form class="form-inline d-flex my-2 my-lg-0 catalog_table mb-5">
					      <input id="myInput" class="form-control mr-sm-2" type="search" placeholder="Search to name..." onkeyup="myFunction()" aria-label="Search">
					      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" style="margin-left: 10px;"><?php echo $data[$language]['search']?></button>
					    </form>
						
						<table id="myTable" class="table mt-5">
						  <thead>
						    <tr style="background-color: transparent;">
						      <th scope="col">#</th>
						      <th scope="col">Name</th>
						      <th scope="col">Price</th>
						      <th scope="col">Image</th>
						      <th scope="col">Order</th>
						    </tr>
						  </thead>
						  <?php
							session_start();
							require 'db.php';
							$goods = getAllGoods();
							if(!empty($goods)){
								foreach($goods as $g){
									?>
								<tr style="background-color: transparent;">
									<td> <?php echo $g['good_id']."."."&ensp;" ?></td>
									<td> <?php echo $g['good_name']."&ensp;" ?></td>
									<td> <?php echo $g['good_price']."tg"."&ensp;" ?></td>
									<td><img src="images/<?php echo $g['image'];?>" alt="" style="width:200px;"></td>
									<td>
										<form action="good_info.php" method="post">
											<input type="hidden" name="uid" value="<?php  echo $_SESSION['user_id']; ?>">
											<input type="hidden" name="g_id" value=" <?php echo $g['good_id']; ?>">
											<button type="submit"class="btn btn-warning mt-5"><?php echo $data[$language]['order_btn']?></button>
										</form>  
									</td>
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
	<script>
	function myFunction() {
	  var input, filter, table, tr, td, i, txtValue;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable");
	  tr = table.getElementsByTagName("tr");

	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[1];
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