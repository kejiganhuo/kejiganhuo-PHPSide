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
function getMd5Password($passwrod){
	return md5($passwrod.C('MD5_PRE'));
}