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
	var data = $("#singcms-form").serializeArray();

	postData={};
	$(data).each(function(i){
		postData[this.name] = this.value;
	});
	console.log(postData);
	//将取到的数据post给数据库
	url=SCOPE.save_url;
	jump_url=SCOPE.jump_url;
	$.post(url,postData,function(result){
		if(result.status == 1){
			//成功
			return dialog.success(result.message,jump_url);
		}else if(result.status == 0){
			//失败
			return dialog.error(result.message);
		}
		
	},"JSON");
});
/**
*编辑模型
*/
$('.singcms-table #singcms-edit').on('click',function(){
    var id = $(this).attr('attr-id');
    var url = SCOPE.edit_url + '&id=' +id;
    window.location.href=url;
});
/**
*删除JS操作
*/
$('.singcms-table #singcms-delete').on('click',function(){
	var id = $(this).attr('attr-id');
	var a = $(this).attr("attr-a");
	var message =$(this).attr("attr-message");
	var url =SCOPE.set_status_url;
	
	data ={};
	data['id'] =id;
	data['status'] =-1;
	
	layer.open({
		type:0,
		title:'是否提交？',
		btn:['yes','no'],
		icon:3,
		closeBtn:2,
		content:"是否确定"+message,
		scrollbar:true,
		yes:function(){
			todelete(url,data);
		},
		
	})
});
//
function todelete(url,data){
	$.post(
		url,
		data,
		function(s){
			if(s.status == 1){
				return dialog.success(s.message,'');
				//调到相关界面
			}else{
				return dialog.error(s.message);
			}
		}
	,"JSON");
}
/**
*排序JS操作
*/
$('#button-listorder').click(function(){
	//获取 listorder内容
	var data = $("#singcms-listorder").serializeArray();
	postData = {};
	//遍历
	$(data).each(function(i){
		postData[this.name] =this.value;
	});
	var url = SCOPE.listorder_url;
	$.post(url,postData,function(result){
		if(result.status == 1){
			//成功
			return dialog.success(result.message,result['data']['jump_url']);
		}else if(result.status == 0){
			//失败
			return dialog.error(result.message,result['data']['jump_url']);
		}
	},"JSON");
});
