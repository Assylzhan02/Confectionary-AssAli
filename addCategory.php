<?php
	$res = array();
	$res['message'] = "Couldn't add category";
	$res['status'] = "ERROR";

	if($_SERVER['REQUEST_METHOD']=='POST'){

		if(isset($_POST['category_name'])){

			require_once 'db.php';

			if(!getcategoryByName(trim($_POST['category_name']))){
				if(addCategory($_POST['category_name'])){
					$res['message'] = "Category added successfully";
				$res['status'] = "OK";
				}

			}
			else{

				$res['message'] = "Category with name \"".$_POST['good_name']."\" is already exist";
				$res['status'] = "ERROR";

			}

		}

	}

	echo json_encode($res);

?>