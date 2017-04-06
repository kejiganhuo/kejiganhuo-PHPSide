/**
*添加按钮操作
*
*/
$("#button-add").click(function(){
	var url = SCOPE.add_url;
	window.location.href=url;
});

/**
*提交表单操作
*/
$("#singcms-button-submit").click(function(){
	var data =$("#singcms-form").serializeArray();
	$(data).each(function(i){
		postData[this.name]=this.value;
	});
	//将取到的数据post给数据库
	$.post(url,postData,function(result){
		
	});
});