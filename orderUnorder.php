<?php

	session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ordering</title>
</head>
<body>
	<?php

		require 'db.php';
		if(isset($_POST['action'])){
			if($_POST['action']=="unord"){
				$unordering = unorderGood($_POST['uid'],$_POST['g_id']);
				if($unordering){
					header("Location:catalog.php");
				}
			}
			if($_POST['action']=="ord"){
				$ordering = orderGood($_POST['uid'],$_POST['g_id'],$_POST['count']);
				if($ordering){
					header("Location:catalog.php");
				}
			}
	
		}

	?>
</body>
</html>