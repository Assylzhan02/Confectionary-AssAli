<?php

	if(isset($_POST['good_id']) && isset($_POST['gname']) && isset($_POST['gprice']) && isset($_POST['category_id']) && isset($_FILES['good_img'])){
		require 'db.php';

		$img_name = $_FILES['good_img']['name'];

		$updated = updateGood($_POST['good_id'], $_POST['gname'], $_POST['gprice'], $_POST['category_id'],$img_name);
		if($updated){
			header("Location:moderator_page.php");
		}
	}
echo $_POST['good_id'];
echo $_POST['gname'];
echo $_POST['gprice'];
echo $_POST['category_id'];
echo $_POST['good_img'];

?>