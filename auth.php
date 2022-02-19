<?php

	if(isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login']) && !empty($_POST['password'])){
		session_start();

		require "db.php";

		$test = auth($_POST['login'],$_POST['password']);

		if($test != null){

			$_SESSION['username'] = $test["fullname"];
			$_SESSION['role'] = $test["rid"];
			$_SESSION['user_id']=$test['user_id'];

			header("Location:profile.php");
		}
		else{
			header("Location:login_page.php?noUser");
		}

	}
	else{
		header("Location:login_page.php?empty");
	}

?>
	
