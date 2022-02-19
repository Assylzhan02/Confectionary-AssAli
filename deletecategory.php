<?php
	$result = array();

	$result['message'] = "Category didnt delete";

	$result['status'] = "ERROR";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['category_id'])){

		require_once 'db.php';

		deleteCategory($_POST['category_id']);

		$result['message'] = "Category deleted succesfully!!!";
		$result['status'] = "OK";
		
		}
	}
	echo json_encode($result);
?>