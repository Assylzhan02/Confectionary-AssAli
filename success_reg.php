<?php
	session_start();

	if(isset($_POST['rg_login']) && isset($_POST['rg_pass']) && isset($_POST['rg_fullname'])){

		require "db.php";

		if(!empty($_POST['rg_login']) && !empty($_POST['rg_pass']) && !empty($_POST['rg_fullname'])){

			if($_POST['rg_pass'] == $_POST['confirm_password']){
				$user_id = addUser($_POST['rg_login'], $_POST['rg_pass'], $_POST['rg_fullname']);

				if($user_id){

					$_SESSION['username'] =  $_POST['rg_fullname'];
					$_SESSION['role'] = 3;
					$_SESSION['user_id']= $user_id;

					header("Location:profile.php");

				}
			}
			else{
				header("Location:login_page.php?password");
			}
		}
		else {
			header("Location:login_page.php?fillAll");
		}
	}
?>