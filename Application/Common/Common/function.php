<?php
/**
*公用方法
*/
function show($status,$message,$data){
	$result = array(
		'status' => $status,
		'message' => $message,
		'data' => $data,
	);
	
	exit(json_encode($result));
}
//md5
function getMd5Password($passwrod){
	return md5($passwrod.C('MD5_PRE'));
}
//菜单选择
function getMenuType($type){
	return $type == 1 ? '后台菜单' :'前端导航';
}
//情况
function status($status){
	if($status==0){
		$str ='关闭';
	}
	elseif($status ==1){
		$str ='正常';
	}
	elseif($status ==-1){
		$str ='删除';
	}
}
