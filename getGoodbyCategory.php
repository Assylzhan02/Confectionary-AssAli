<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		require_once 'db.php';
		$result = getGoodByC($_POST['category_id']);
	echo json_encode($result);
	}
	
?>