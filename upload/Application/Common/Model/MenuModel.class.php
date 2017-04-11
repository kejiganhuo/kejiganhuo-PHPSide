<?php
namespace Common\Model;
use Think\Model;

class MenuModel extends Model{
    private $_db = '';
	public function __construct(){
		$this->_db = M('Menu');
	}
	public function insert($data = array()){
		if(!data || !is_array($data)){
			return(0);
		}
		return $this->_db->add($data);
	}
	//获取相应菜单数据
	public function getMenus($data,$page,$pageSize=10){
		$data['status'] = array('neq',-1);
		$offset = ($page - 1) * $pageSize;
		$list = $this->_db->where($data)->order('menu_id desc')->limit($offset,$pageSize)->select();
		return $list;
		config.console($list);
		
	}
	//获取相应条件的总数
	public function getMenusCount($data=array()){
		$data['status'] = array('neq',-1);
		return $this->_db->where($data)->count();
		
	}
}
?>