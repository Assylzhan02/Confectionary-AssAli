<?php
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		
		require_once 'db.php';

		$result = getGoods();

		echo json_encode($result);
	}
?>