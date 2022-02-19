<?php
	$result = array();

	$result['message'] = "Good didnt delete";

	$result['status'] = "ERROR";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['good_id'])){

		require_once 'db.php';

		deleteOrderG($_POST['good_id']);

		$result['message'] = "good deleted succesfully!!!";
		$result['status'] = "OK";
		
		}
	}
	echo json_encode($result);
?>