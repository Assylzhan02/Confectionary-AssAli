<?php

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(isset($_GET['lang'])){
			setcookie('lang', $_GET['lang'], time()+30*60);
		}
	}
	session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['role']) && !isset($_SESSION['user_id']))
		header("Location:main_page.php");
	else
		header("Location:profile.php");
?>