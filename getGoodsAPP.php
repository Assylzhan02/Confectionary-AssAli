<?php  
	if($_SERVER['REQUEST_METHOD']=='GET'){
		require_once 'db.php';
		$result = getAllGoods();
		echo json_encode($result);
	}
?>