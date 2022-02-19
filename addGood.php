<?php

	$res = array();
	$res['message'] = "Couldn't add good";
	$res['status'] = "ERROR";

	if($_SERVER['REQUEST_METHOD']=='POST'){

		if(isset($_POST['good_name']) && isset($_POST['good_price']) && isset($_POST['cat_id']) && isset($_POST['image'])){

			require_once 'db.php';

			if(!getGoodByName(trim($_POST['good_name']))){
				if(addGood($_POST['good_name'], $_POST['good_price'], $_POST['cat_id'],$_POST['image'])){
					$res['message'] = "Good added successfully";
				$res['status'] = "OK";
				}

			}
			else{

				$res['message'] = "Good with name \"".$_POST['good_name']."\" is already exist";
				$res['status'] = "ERROR";

			}

		}
		else{
			$res['message'] = "Please fill all fields for creating a good";
			$res['status'] = "ERROR";
		}

	}

	echo json_encode($res);

?>