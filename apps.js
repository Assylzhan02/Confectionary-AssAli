$('document').ready(function(){
	getCategories();
	getAllGoods();
	let fileName = null;
	$("#but_upload").click(function(){

        var fd = new FormData();
        var files = $('#file')[0].files;
        
        // Check file selected or not
        if(files.length > 0 ){
           fd.append('file',files[0]);

           $.ajax({
              url: 'upload.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                 if(response != 0){
                    alert('file uploaded!'); 
                 }else{
                    alert('file not uploaded');
                 }
              },
           });
        }else{
           alert("Please select a file.");
        }
    });
	$('input[type="file"]').change(function(e){
        	fileName = e.target.files[0].name;
     });

	$('#addGoodButton').click(function(){
		addGood($("#good_name").val(), $("#good_price").val(), $("#cat_id").val(),fileName);
	});

	$('#addCategoryButton').click(function(){
		addCategory($("#cat_name").val());
	});
});

function getCategories(){
	$.get("getCategories.php", {}, function(data){
		categories = JSON.parse(data);

		htmlData="<option value='0'>Select category</option>";
		for(i=0; i<categories.length; i++){
			htmlData+="<option value='"+categories[i]['category_id']+"'>"+categories[i]['category_name']+"</option>";
		}
		$('#cat_id').html(htmlData);

		htmlDataC = "";

		for(i=0; i< categories.length; i++){
			htmlDataC += "<tr>";
			htmlDataC += "<td>"+categories[i]['category_id']+"</td>";
			htmlDataC += "<td>"+categories[i]['category_name']+"</td>";
			htmlDataC += "</tr>";
		}

		$("#cat_result").html(htmlDataC);

	});
}

function getAllGoods(){
	$.get("getGoodsAPP.php", {}, function(data){
		goods = JSON.parse(data);

		htmlData = "";

		for(i=0; i< goods.length; i++){
			htmlData += "<tr>";
			htmlData += "<td>"+goods[i]['good_id']+"</td>";
			htmlData += "<td>"+goods[i]['good_name']+"</td>";
			htmlData += "<td>"+goods[i]['good_price']+"</td>";
			htmlData += "<td>"+goods[i]['cat_id']+"</td>";
			htmlData += "<td>"+goods[i]['image']+"</td>";
			var loc = "updateGood.php?g_id="+ goods[i]['good_id'];
			htmlData += "<td>"+'<a href="' + loc + '" class="btn btn-warning">EDIT</a>'+"</td>"
			htmlData += "</tr>";
		}

		$("#good_result").html(htmlData);
	});
}

function addGood(goodName, goodPrice, category_id, image){
	$.post("addGood.php", {
		"good_name": goodName,
		"good_price": goodPrice,
		"cat_id": category_id,
		"image": image
	}, function(data){
		result = JSON.parse(data);

		if(result['status'] =='OK'){
			$("#message_alert").attr('class', 'alert alert-success');
		}
		else{
			$("#message_alert").attr('class', 'alert alert-danger');
		}

		$("#message_alert").fadeIn();
		$("#message_alert").html(result['message']);

		getAllGoods();
	});
}

function addCategory(categoryName){
	$.post("addCategory.php", {
		"category_name": categoryName
	}, function(data){
		result = JSON.parse(data);

		if(result['status'] =='OK'){
			$("#message_alert_cat").attr('class', 'alert alert-success');
		}
		else{
			$("#message_alert_cat").attr('class', 'alert alert-danger');
		}

		$("#message_alert_cat").fadeIn();
		$("#message_alert_cat").html(result['message']);

		getCategories();
	});
}