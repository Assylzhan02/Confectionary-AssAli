<?php
    include('header.php');
	session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['role']) && !isset($_SESSION['user_id'])){
		header("Location:main_page.php");
	}
	else{
		$uname = $_SESSION['username'];
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
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="style1.css">
	<title>AssAli</title>
</head>

<body>

	<header id="Main">
		<div class="topnav" id="myTopnav" >
	      <div class="logo">
	        <img src="images/photo_2021-04-30_22-05-01.png" alt="" id="logotip" style="display: inline;height: 60px;">
	        <b>AssAli</b>
	      </div>
	      <a href="#Main" class="navigation" style="font-weight:700; border-bottom:1px solid black;"><?php echo $data[$language]['main'];?></a>
		  <a href="#AboutUs" class="navigation" ><?php echo $data[$language]['aboutUs'];?></a>
		  <a href="#Menu" class="navigation"><?php echo $data[$language]['menu'];?></a>
		  <a href="#Contacts" class="navigation"><?php echo $data[$language]['contacts'];?></a>

		  <div class="mydropdown">
		  	<button class="mydropbtn" style="background: transparent;">
				 <?php echo $uname."&#9207";?> 
				     <i class="fa fa-caret-down"></i>
			</button>

			<?php 
				    if($_SESSION['role'] == 1){
				    		?>
				    		<div class="mydropdown-content">
				    			<a class="mydropdown-item" href="list_users.php"><?php echo $data[$language]['admin1'];?></a>
				    			<a class="mydropdown-item" href="list_goods.php"><?php echo $data[$language]['admin2'];?></a>
				    			<a class="mydropdown-item" href="list_categories.php"><?php echo $data[$language]['admin3'];?></a>
				    			<a class="mydropdown-item" href="logout.php" style="width: 150px;"><?php echo $data[$language]['logout'];?> &ensp; <img src="images/logout.png" style="width: 22px; height: 22px;"></a>
					        </div>
				    		<?php
				    	}
				    	else if($_SESSION['role'] == 2){
				    		?>
				    		<div class="mydropdown-content">
				    			<a class="mydropdown-item" href="moderator_page.php"><?php echo $data[$language]['moder1'];?></a>
				    			<a class="mydropdown-item" href="catalog.php"><?php echo $data[$language]['moder2'];?></a>
				    			<a class="mydropdown-item" href="logout.php" style="width: 150px;"><?php echo $data[$language]['logout'];?> &ensp; <img src="images/logout.png" style="width: 22px; height: 22px;"></a>
					        </div>
				    		<?php
				    	}

				    	else if($_SESSION['role'] == 3){
				    		?>
				    		<div class="mydropdown-content">
				    			<a class="mydropdown-item" href="basket.php"><?php echo $data[$language]['user1'];?></a>
				    			<a class="mydropdown-item" href="catalog.php"><?php echo $data[$language]['user2'];?></a>
				    			<a class="mydropdown-item" href="my_history_page.php"><?php echo $data[$language]['user3'];?></a>
				    			<a class="mydropdown-item" href="logout.php" style="width: 150px;"><?php echo $data[$language]['logout'];?> &ensp; <img src="images/logout.png" style="width: 22px; height: 22px;"></a>
					        </div>
				    		<?php
				    	}
				    ?>

	      </div>

	      <div class="mydropdown">
	        <button class="mydropbtn"><img src="images/earth-globe.png" alt="" style="width:20px;"> &#9207
	          <i class="fa fa-caret-down"></i>
	        </button>
	        <div class="mydropdown-content">
	          <a class="mydropdown-item" href="language_set.php?lang=en">English</a>
	          <a class="mydropdown-item" href="language_set.php?lang=ru">Русский</a>
	        </div>
	      </div>
	      <a href="javascript:void(0);" class="icon" onclick="newFunction()" style="font-size:20px;">&#9776;</a>
	    </div>

		<div class="parent">
			<div class="element element1">
				<h1><?php echo $data[$language]['title'];?></h1>
				<p><?php echo $data[$language]['subtitle'];?></p>
				<a href="catalog.php" class="button1" ><?php echo $data[$language]['order_btn'];?></a>
			</div>
			<div class="element element2">
				<svg height="360" width="360">
				  <ellipse cx="180" cy="180" rx="145" ry="145"
				  style="fill:none; stroke:#FFF6D7;stroke-width:60;"/>
				</svg>
				<img src="images/main_page_cake.png" alt="" id="main_img">
			</div>
		</div>
	</header>

	<section id="AboutUs">
		<div class="parent2">
			<div data-aos="zoom-in" class="block block1">
				<h2 class="five"><?php echo $data[$language]['question'];?></h2>
			</div>
			<div class="block block2">
				<div data-aos="zoom-in" class="reason">
					<img class="reason_img" src="images/reason_1.png" alt="">
					<div class="text">
						<h4><?php echo $data[$language]['reason1'];?></h4>
						<p><?php echo $data[$language]['text1'];?></p>
					</div>
				</div>
				<div data-aos="zoom-in" class="reason">
					<img class="reason_img" src="images/reason_2.png" alt="">
					<div class="text">
						<h4><?php echo $data[$language]['reason2'];?></h4>
						<p><?php echo $data[$language]['text2'];?></p>
					</div>
				</div>
				<div data-aos="zoom-in" class="reason">
					<img class="reason_img" src="images/reason_3.png" alt="">
					<div class="text">
						<h4><?php echo $data[$language]['reason3'];?></h4>
						<p><?php echo $data[$language]['text3'];?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="Bestsellers" class="d-flex  justify-content-center">
		<div class="container">
			<div data-aos="fade-down"
    			 data-aos-easing="linear"
    			 data-aos-duration="1000" class="mx-5 block d-flex justify-content-center" style="width:auto;">
				<h2 style="color: white;"><?php echo $data[$language]['bestsellers'];?></h2>
			</div>
			<div data-aos="fade-down"
    			 data-aos-easing="linear"
    			 data-aos-duration="1000" class="d-flex justify-content-evenly" style="flex-wrap:wrap;">
			<div class="card">
			  <img class="shadow" src="images/macaroon.jpg">
			  	<div class="card-body">
				    <h5 class="card-title"><b>Macaroons</b></h5>
				    <p class="card-text">1200 ₸</p>
				    <a href="catalog.php"class="box-shadow btn zakaz"><?php echo $data[$language]['order_btn'];?></a>
 				</div>
			</div>
			<div class="card">
			  <img class="shadow" src="images/doughnut.jpg">
			  	<div class="card-body">
				    <h5 class="card-title"><b>Doughnut</b></h5>
				    <p class="card-text">800 ₸</p>
				    <a href="catalog.php" class="box-shadow btn zakaz"><?php echo $data[$language]['order_btn'];?></a>
 				</div>
			</div>
			<div class="card">
			  <img class="shadow" src="images/coffee.jpg">
			  	<div class="card-body">
				    <h5 class="card-title"><b>Coffee</b></h5>
				    <p class="card-text">700 ₸</p>
				    <a href="catalog.php" class="box-shadow btn zakaz"><?php echo $data[$language]['order_btn'];?></a>
 				</div>
 				</div>
			</div>
		</div>
	</section>

	<section data-aos="fade-up"
     data-aos-duration="1000" id="Menu">
		<div class="title">
			<div  class="menu"><h2><?php echo $data[$language]['ourMenu'];?></h2>
            </div>
		</div>

		<div class="gallery">
			<span style="--i:1"><img src="images/Chocolate-Dipped-Strawberry-Cheesecake.jpg" alt=""></span>
			<span style="--i:2"><img src="images/exps119206.jpg" alt=""></span>
			<span style="--i:3"><img src="images/exps174535.jpg" alt=""></span>
			<span style="--i:4"><img src="images/Chocolate-Dipped-Strawberry-Meringue-Roses.jpg" alt=""></span>
			<span style="--i:5"><img src="images/Cherry-Bombs.jpg" alt=""></span>
			<span style="--i:6"><img src="images/Refrigerator-Lime-Cheesecake.jpg" alt=""></span>
			<span style="--i:7"><img src="images/e40b24dc-497c-4a23-a351-b47293abab3e.jpg" alt=""></span>
			<span style="--i:8"><img src="images/2a1d2d87-8aa5-47eb-bfbb-0f34c7ad4ce4.jpg" alt=""></span>
		</div>
		
		<div id="more">
			<a href="catalog.php"><?php echo $data[$language]['more'];?> &#10132;</a>
		</div>	
	</section>

	<footer id="Contacts">
		<div class="parent4">
			<div class="footer_logo">
				<img src="images/photo_2021-04-30_22-05-01.png" alt="" id="logotip">
				<h3>AssAli</h3>
			</div>
			<div>
				<p id="rights">2021 © <?php echo $data[$language]['right'];?></p>
			</div>
			<div class="bar">
				<img src="images/telephone.png" alt="" class="phone">
				<p id="number">+7 777 777-77-77</p>
			</div>
		</div>
	</footer>

	<script>
	  function newFunction() {
	    var x = document.getElementById("myTopnav");
	    if (x.className === "topnav") {
	      x.className += " responsive";
	    } else {
	      x.className = "topnav";
	    }
	  }
	</script>

	<script>
		let nav = document.querySelector('nav');

		window.addEventListener('scroll', function(){
			if(window.pageYOffset > 100){
				nav.classList.add('bg-light', 'shadow');
			}else{
				nav.classList.remove('bg-light', 'shadow');
			}
		});
	</script>
	<script>
 	 AOS.init();
	</script>

</body>
</html>