<?php

	session_start();
	if(isset($_POST['user_id'])){
		require 'db.php';
		$myOrders = getMyOrders($_POST['user_id']);
		if(!(empty($myOrders))){
			foreach ($myOrders as $m) {
				echo $m['good_id'];
				echo $m['count'];
				$newHistory = historyUp($_POST['user_id'], $m['good_id'],$m['count']);
				$deleting = unorderGood($_POST['user_id'], $m['good_id']);
			}
			header("Location:basket.php");
		}
	}

?>
