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
//得到菜单
function getAdminMenuUrl($nav){
    $url = '/admin.php?c='.$nav['c'].'&a='.$nav['a'];
    if($nav['f']=='index'){
        $url = '/admin.php?c='.$nav['c'];
    }
    return $url;
}
//导航样式高亮
function getActive($navc){
    $c = strtolower(CONTROLLER_NAME);
    if(strtolower($navc) == $c){
        return 'class="active"';
    }
    return '';
}

function showKind($status,$data){
    header('Content-type:application/json;charset=utf-8');
    if($status==0){
        exit(json_encode(array('error'=>0,'url'=>$data)));
    }
    exit(json_encode(array('error'=>1,'message'=>'上传失败')));
}

function getLoginUsername(){
    return $_SESSION['adminUser']['username'] ? $_SESSION['adminUser']['username'] :'';
}