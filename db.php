<?php

	try {
		$connection = new PDO(
	'mysql:host=localhost;dbname=confectionery', 'root','');
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	function getAllUsers(){
		global $connection;
		$query = $connection->prepare("select * from users");
		$query->execute();
		$result = $query->fetchAll();
		return $result;
	}

	function getAllGoods(){
		global $connection;
		$query = $connection->prepare("select * from goods");
		$query->execute();
		$result = $query->fetchAll();
		return $result;
	}

	function getAllCategories(){
		global $connection;
		$query = $connection->prepare("select * from categories");
		$query->execute();
		$result = $query->fetchAll();
		return $result;
	}

	function getGoods(){
		global $connection;
		$query = $connection->prepare("SELECT g.good_id, g.good_name, g.good_price, c.category_name AS categoryName
			FROM goods g
			LEFT OUTER JOIN categories c ON c.category_id = g.cat_id"
		);
		$query->execute();
		return $query->fetchAll();
	}

	function getGoodsByC($c_id){
		global $connection;
		$query = $connection->prepare("select good_id from goods where cat_id=:cid");
		$query->execute(array(":cid"=>$c_id));
		$result = $query->fetchAll();
		return $result;
	}

	function deleteUser($u_id){
		global $connection;
		$query = $connection->prepare("delete from users where user_id=:uid");
		$rows = $query->execute(array("uid"=>$u_id));

		return $rows>0;
	}

	function deleteGood($g_id){
		global $connection;
		$query = $connection->prepare("delete from goods where good_id=:gid");
		$rows = $query->execute(array("gid"=>$g_id));

		return $rows>0;
	}

	function deleteCategory($c_id){
		global $connection;
		$query = $connection->prepare("delete from categories where category_id=:cid");
		$rows = $query->execute(array("cid"=>$c_id));

		return $rows>0;
	}

	function deleteOrderU($u_id){
		global $connection;
		$query = $connection->prepare("
			delete from orders where user_id=:u_id");
		$rows = $query->execute(array(":u_id"=>$u_id));
		return $rows>0;
	}

	function deleteOrderG($g_id){
		global $connection;
		$query = $connection->prepare("
			delete from orders where good_id=:g_id");
		$rows = $query->execute(array(":g_id"=>$g_id));
		return $rows>0;
	}

	function auth($login, $password){
		global $connection;
		$query = $connection->prepare("select * from users where login=:l and password=:p");
		$rows = $query->execute(array(":l"=>$login, ":p"=>$password));
		$result = $query->fetch();
		return $result;
	}

	function addUser($login, $password, $fullname){
		global $connection;
		$query = $connection->prepare("insert into users(login, password, fullname, rid) values (:l, :p, :f, 3)");
		$rows = $query->execute(array(":l"=>$login, ":p"=>$password, ":f"=>$fullname));
		return $connection->lastInsertId();
	}

	function addCategory($cname){
		global $connection;
		$query = $connection->prepare("insert into categories(category_name) values (:n)"
		);
		$rows = $query->execute(array(":n"=>$cname));
		return $rows>0;
	}

	function addGood($gname, $gprice, $c_id,$img_url){
		global $connection;
		$query = $connection->prepare("insert into goods(good_name, good_price, cat_id, image) values (:n, :p, :c, :i)"
		);
		$rows = $query->execute(array(":n"=>$gname, ":p"=>$gprice, ":c"=>$c_id, ":i"=>$img_url));
		return $rows>0;
	}

	function getGoodByName($name){

		global $connection;
		$query = $connection->prepare("
			SELECT * FROM goods WHERE good_name = :name
		");
		$query->execute(array("name"=>$name));
		$result = $query->fetchAll();
		return sizeof($result)!=0;//1!=0 0!0
	}	

	function getCategoryByName($name){

		global $connection;
		$query = $connection->prepare("
			SELECT * FROM categories WHERE category_name = :name
		");
		$query->execute(array("name"=>$name));
		$result = $query->fetchAll();
		return sizeof($result)!=0;//1!=0 0!0
	}	

	function getOneGood($g_id){
		global $connection;
		$query = $connection->prepare("select * from goods where good_id=:gid");
		$rows = $query->execute(array("gid"=>$g_id));
		$result = $query->fetch();
		return $result;
	}

	function updateGood($g_id, $gname, $gprice, $c_id,$img_url){
		global $connection;
		$query = $connection->prepare( "update goods set good_name=:n, good_price=:p, cat_id=:c, image=:i WHERE good_id=:gid" );
		$rows = $query->execute(array(":n"=>$gname, ":p"=>$gprice,":c"=>$c_id,":i"=>$img_url, "gid"=>$g_id));
		return $rows>0;
	}

	function GoodVerify($u_id,$g_id){
		global $connection;
		$query = $connection->prepare("select * from orders where user_id=:u and good_id=:g");
		$rows = $query->execute(array(":u"=>$u_id, ":g"=>$g_id));
		$result = $query->fetch();
		return $result;
	}

	function orderGood($user_id, $good_id, $count){
		global $connection;
		$query = $connection->prepare("insert into orders(user_id,good_id,count) values (:u,:g,:c)");
		$rows = $query->execute(array(":u"=>$user_id,":g"=>$good_id,":c"=>$count));
		return $rows>0;
	}

	function unorderGood($user_id, $good_id){
		global $connection;
		$query = $connection->prepare("
			delete from orders where user_id=:usid and good_id=:gid
		");
		$rows = $query->execute(array(":usid"=>$user_id, ":gid"=>$good_id));
		return $rows>0;
	}

	function seeMyOrders($user_id){
        global $connection;
		$query=$connection->prepare(" select g.good_name,g.image,g.good_price, o.count 
			from goods g, orders o
			where o.good_id=g.good_id and o.user_id=:usid");
	    $query->execute(array("usid"=>$user_id));
		$result=$query->fetchAll();
		return $result;
	}

	function seeMyHistory($user_id){
        global $connection;
		$query=$connection->prepare(" select g.good_name,g.image,g.good_price, h.his_count 
			from goods g, history h
			where h.good_id=g.good_id and h.user_id=:usid");
	    $query->execute(array("usid"=>$user_id));
		$result=$query->fetchAll();
		return $result;
	}

	function getMyOrders($user_id){
        global $connection;
		$query=$connection->prepare(" select o.good_id, o.count 
			from orders o
			where o.user_id=:usid");
	    $query->execute(array("usid"=>$user_id));
		$result=$query->fetchAll();
		return $result;
	}

	function historyUp($user_id, $good_id, $count){
		global $connection;
		$query = $connection->prepare("insert into history(user_id,good_id,his_count) values (:u,:g,:c)");
		$rows = $query->execute(array(":u"=>$user_id,":g"=>$good_id,":c"=>$count));
		return $rows>0;
	}
?>