<?php  
	if($_SERVER['REQUEST_METHOD']=='GET'){
		require_once 'db.php';
		$result = getAllCategories();
		echo json_encode($result);
	}
?>