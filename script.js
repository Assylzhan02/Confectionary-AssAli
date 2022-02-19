$('document').ready(function(){
	getCategories();
	getAllGoods();
	getAllUsers();

    var min_chars = 12;  

    var checking_html = 'Checking...';  

    $('#code').keyup(function(event){ 
        if($('#code').val().length == min_chars){  
            $('#promo_code_status').html(checking_html);  
            check_code($('#code').val());  
        }  
    }); 
});

function getCategories(){
	$.get("getCategories.php", {}, function(data){
		categories = JSON.parse(data);
		htmlData = "";

		for (i = 0; i < categories.length ; i++) {
			htmlData+= "<tr>";
			htmlData+= "<td>"+categories[i]['category_id']+"</td>";
			htmlData+= "<td>"+categories[i]['category_name']+"</td>";
			htmlData+= "<td><button type='submit' class='btn' onclick='deleteCategory("+categories[i]['category_id']+")'>DELETE</button></td>";
			htmlData+= "</tr>";
		}					
		$('#category').html(htmlData);
	});
}

function getAllGoods(){
	$.get("getgoods.php", {}, function(data){
		goods = JSON.parse(data);

		htmlData = "";
		for(i = 0; i< goods.length; i++){
			htmlData+= "<tr>";
			htmlData+= "<td>"+goods[i]['good_id']+"</td>";
			htmlData+= "<td>"+goods[i]['good_name']+"</td>";
			htmlData+= "<td>"+goods[i]['good_price']+"</td>";
			htmlData+= "<td>"+goods[i]['categoryName']+"</td>";
			htmlData+= "<td><button type='submit' class='btn' onclick='deleteGood("+goods[i]['good_id']+")'>DELETE</button></td>";
			htmlData+= "</tr>";
		}
		$('#result').html(htmlData);
	});
}

function getAllUsers(){
	$.get("getusers.php", {}, function(data){
		users = JSON.parse(data);

		htmlData = "";
		for(i = 0; i< users.length; i++){
			htmlData+= "<tr>";
			htmlData+= "<td>"+users[i]['user_id']+"</td>";
			htmlData+= "<td>"+users[i]['login']+"</td>";
			htmlData+= "<td>"+users[i]['password']+"</td>";
			htmlData+= "<td>"+users[i]['fullname']+"</td>";
			htmlData+= "<td><button type='submit' class='btn' onclick='deleteUser("+users[i]['user_id']+")'>DELETE</button></td>";
			htmlData+= "</tr>";
		}
		$('#users').html(htmlData);
	});
}

function deleteGood(gid){
	$.post("deletegood.php", {"good_id":gid}, function(data){
		getAllGoods();
		deleteOrderByGood(gid);
	});
}

function deleteUser(uid){
	$.post("deleteuser.php", {"user_id":uid}, function(data){
		getAllUsers();
		deleteOrderByUser(uid);
	});
}

function deleteCategory(cid){
	$.post("deletecategory.php", {"category_id":cid}, function(data){
		getCategories();
		deleteGoodsByCategory();		
	});
}
function deleteOrderByUser(uid){
	$.post("deleteorderbyuser.php", {"user_id":uid}, function(data){

	});
}

function deleteOrderByGood(gid){
	$.post("deleteorderbygood.php", {"good_id":gid}, function(data){

	});
}

function deleteGoodsByCategory(){
	$.get("getgoods.php", {}, function(data){
	goods = JSON.parse(data);

	htmlData = "";
	for (i = 0; i < goods.length; i++) {
		if(goods[i]['categoryName'] == null){
			deleteGood(goods[i]['good_id']);
		 }
		}
		getAllGoods();
	});

}
